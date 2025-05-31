<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function chat(): View
    {
        $users = User::where('id', '!=', Auth::id())->get(['id', 'name']);
        return view('chat', compact('users'));
    }
    public function events(Request $request): View
    {
        $user = $request->user();
        return view('events', compact('user'));
    }
    public function services(Request $request): View
    {
        $user = $request->user();
        return view('services', compact('user'));
    }

    public function show(Request $request): View
    {
        $user = $request->user();
        return view('profile.show', compact('user'));
    }

    public function wallet(Request $request): View
    {
        $user = $request->user();
        return view('profile.wallet', compact('user'));
    }

    public function advertisements(Request $request): View
    {
        $user = $request->user();
        return view('profile.advertisements', compact('user'));
    }

    public function store(Request $request) {
        return redirect()->route('profile.advertisements')->with('success', 'Advertisement created successfully!');
    }
    
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
