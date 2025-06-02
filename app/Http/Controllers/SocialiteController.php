<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider(Request $request, $provider)
    {
        $scheme = $request->getScheme();
        $domain = $request->getHttpHost();
        config(['services.' . $provider . '.redirect' => "{$scheme}://{$domain}/{$provider}/callback"]);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            $scheme = $request->getScheme();
            $domain = $request->getHttpHost();
            config(['services.' . $provider . '.redirect' => "{$scheme}://{$domain}/{$provider}/callback"]);
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
                'registration_domain' => $domain,
                'password' => Hash::make(Str::random(24)), // <-- Add this line
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
