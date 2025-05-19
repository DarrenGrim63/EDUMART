<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;

class VotingController extends Controller
{
    public function index()
    {
        $user = session('user');
        if ($user['has_voted']) {
            return redirect('/hasil')->with('info', 'Anda sudah melakukan voting.');
        }

        $candidates = Candidate::all();
        return view('voting.index', compact('candidates'));
    }

    public function store(Request $request)
    {
        $user = session('user');

        if ($user['has_voted']) {
            return redirect('/hasil')->with('info', 'Anda sudah voting.');
        }

        Vote::create([
            'user_id' => $user['id'],
            'candidate_id' => $request->candidate_id,
        ]);

        \App\Models\User::find($user['id'])->update(['has_voted' => true]);

        session()->put('user.has_voted', true);

        return redirect('/hasil')->with('success', 'Voting berhasil!');
    }

    public function hasil()
    {
        $hasil = Candidate::withCount('votes')->get();
        return view('voting.hasil', compact('hasil'));
    }
}
