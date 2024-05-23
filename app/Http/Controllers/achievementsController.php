<?php

namespace App\Http\Controllers;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required|string|max:255',
            'sportstype' => 'required|string|max:255',
            'placing' => 'required|string|max:255',
        ]);

        $achievement = new Achievement();
        $achievement->event = $request->input('event');
        $achievement->sportstype = $request->input('sportstype');
        $achievement->placing = $request->input('placing');
        $achievement->user_id = Auth::id();
        $achievement->save();

        return redirect()->route('profile.edit')->with('success', 'Achievement added successfully.');
    }

    public function edit($id)
    {
        $award = Achievement::findOrFail($id);
        return view('admin.award-edit', ['award' => $award]);
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event' => 'required|string|max:255',
            'sportstype' => 'required|string|max:255',
            'placing' => 'required|string|max:255',
        ]);

        $achievement = Achievement::findOrFail($id);
        $achievement->event = $request->input('event');
        $achievement->sportstype = $request->input('sportstype');
        $achievement->placing = $request->input('placing');
        $achievement->save();

        return redirect()->route('admin.awards')->with('success', 'Achievement updated successfully.');
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();

        return redirect()->route('admin.awards')->with('success', 'Achievement deleted successfully.');
    }
}
