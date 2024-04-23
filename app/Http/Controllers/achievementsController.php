<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Http\Requests\AchievementUpdateRequest;
use Illuminate\Support\Facades\Auth;

class achievementsController extends Controller
{
    //

    public function store (AchievementUpdateRequest $request)
    {
        $event = $request->event;
        $sportstype = $request->sportstype;
        $placing = $request->placing;

        $achievement = new Achievement();
        $achievement->event = $event;
        $achievement->sportstype = $sportstype;
        $achievement->placing = $placing;
        $achievement->user_id = Auth::id();
        $achievement->save();

        return redirect()->route('profile.edit')->with('success', 'Achievement added successfully.');
    }
}
