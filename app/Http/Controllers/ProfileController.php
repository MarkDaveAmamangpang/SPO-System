<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        
        // Fetch the documents associated with the current user
        $documents = Document::where('user_id', $user->id)->get();
        

        return view('profile.edit', [
            'user' => $user,
            'document' => $documents, // Pass the documents to the view
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        // $request->user()->fill($request->validated());
        // dd($request->all());
        // if(request()->has('profile_picture')){
        //     $imagePath = request('profile_picture')->store('profile', 'public');
        //     $user->profile_picture = $imagePath;

        //     Storage::disk('public')->delete($user->profile_picture);
        // }

        if (request()->hasFile('profile_picture')) {
            // Store the new profile picture
            $newImagePath = request()->file('profile_picture')->store('profile', 'public');
        
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                // Get the path of the old profile picture
                $oldImagePath = storage_path('app/public/' . $user->profile_picture);
                
                // Check if the old file exists before attempting to delete it
                if (file_exists($oldImagePath)) {
                    // Delete the old profile picture
                    unlink($oldImagePath);
                }
            }
        
            // Assign the new profile picture path to the user
            $user->profile_picture = $newImagePath;
        }
        
        
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // $request->user()->save();
        $user->save();


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
