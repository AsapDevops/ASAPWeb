<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Advertisement;

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
        $ads = \App\Models\Advertisement::where('user_id', $user->id)->latest()->get();
        return view('profile.advertisements', compact('user', 'ads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'ad-date' => 'required|date',
            'ad-time' => 'required',
            'contact' => 'required|string|max:255',
            'details' => 'required|string',
            'duration' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:10240',
            'billboard' => 'nullable',
            'online' => 'nullable',
        ]);

        $imagePath = null;
        $videoPath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ads/images', 'public');
        }
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('ads/videos', 'public');
        }

        Advertisement::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'ad_date' => $validated['ad-date'],
            'ad_time' => $validated['ad-time'],
            'contact' => $validated['contact'],
            'details' => $validated['details'],
            'duration' => $validated['duration'],
            'image' => $imagePath,
            'video' => $videoPath,
            'billboard' => $request->has('billboard'),
            'online' => $request->has('online'),
        ]);

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
