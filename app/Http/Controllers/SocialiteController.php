<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider(Request $request, $provider)
    {
        // Set dynamic redirect URL based on current domain
        $domain = $request->getHttpHost();
        config(['services.' . $provider . '.redirect' => "http://{$domain}/{$provider}/callback"]);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            // Set dynamic redirect URL for callback
            $domain = $request->getHttpHost();
            config(['services.' . $provider . '.redirect' => "http://{$domain}/{$provider}/callback"]);

            // Attempt to get the user information from Socialite
            $socialiteUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'An error occurred during social login. Please try again.');
        }

        $user = User::where('email', $socialiteUser->email)->first();
        $domain = $request->header('host');

        // Disable user creation in staging environment
        if (!$user && config('app.env') !== 'staging') {
            $user = User::create([
                'name' => $socialiteUser->name,
                'email' => $socialiteUser->email,
                'provider' => $provider,
                'provider_id' => $socialiteUser->id,
                'registration_domain' => $domain
            ]);

            $user->sendEmailVerificationNotification();
        } elseif (!$user) {
            return redirect()->route('login')
                ->withErrors([400, 'User creation is disabled in the staging environment.']);
        }

        Auth::login($user, true);
        return redirect('/dashboard');
    }
}
