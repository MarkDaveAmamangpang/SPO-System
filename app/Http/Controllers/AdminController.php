<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $coaches = User::where('user_type', 'coach')->get();
        $awards = Achievement::all();
        $players = User::where('user_type', 'player')->get();
        
        return view('admin.admindashboard', [
            'coaches' => $coaches,
            'awards' => $awards,
            'players' => $players,
            
        ]);
    }

    public function awards()
    {
        $awards = Achievement::all();
        
        return view('admin.awards', ['awards' => $awards]);
    }


    public function coaches()
    {
        $coaches = User::where('user_type', 'coach')->get();
        
        return view('admin.coaches-accounts', ['coaches' => $coaches]);
    }

    public function players()
    {
        $players = User::where('user_type', 'player')->active()->get();

        return view('admin.player-accounts', ['players' => $players]);
    }

    public function archive()
    {
        $archivedUsers = User::archived()->get();
        return view('admin.archive-accounts', ['archivedUsers' => $archivedUsers]);
    }

    public function archiveAccount($id)
    {
        $user = User::findOrFail($id);
        $user->archive();

        return redirect()->back()->with('success', 'Account archived successfully.');
    }

    public function unarchiveAccount($id)
    {
        $user = User::findOrFail($id);
        $user->unarchive();

        return redirect()->back()->with('success', 'Account unarchived successfully.');
    }

    public function archivedUsers()
    {
        $archivedUsers = User::archived()->get();
        return view('admin.archive-accounts', ['archivedUsers' => $archivedUsers]);  
    }

    public function archiveSelected(Request $request)
    {
        $selectedPlayers = $request->input('selected_players', []);

        foreach ($selectedPlayers as $playerId) {
            $player = User::findOrFail($playerId);
            $player->archive();
        }

        return response()->json(['success' => true]);
    }

    public function viewPlayer($id)
    {
        $player = User::with('documents')->findOrFail($id);
        return view('admin.player-view', compact('player'));
    }

    public function viewCoach($id)  
    {
        $coach = User::findOrFail($id);

        return view('admin.coach-view', compact('coach'));
    }


    public function printPlayers()
    {
        $players = User::where('user_type', 'player')->active()->get();
        return view('admin.print-player', ['players' => $players]);
    }
    

public function printCoaches()
{
    $coaches = User::where('user_type', 'coach')->get();
    return view('admin.print-coach', ['coaches' => $coaches]);
}

public function printAwards()
{
    $awards = Achievement::all();
    return view('admin.print-award', ['awards' => $awards]);
}

}
