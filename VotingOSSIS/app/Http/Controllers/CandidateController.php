<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidate.index', compact('candidates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'vision' => 'required',
            'mission' => 'required',
        ]);

        $photo_url = null;
        if ($request->hasFile('photo')) {
            $photo_url = $request->file('photo')->store('photos', 'public');
        }

        Candidate::create([
            'name' => $request->name,
            'vision' => $request->vision,
            'mission' => $request->mission,
            'photo_url' => $photo_url ? 'storage/' . $photo_url : null
        ]);

        return redirect('/kandidat')->with('success', 'Kandidat ditambahkan.');
    }

    public function destroy($id)
    {
        Candidate::destroy($id);
        return redirect('/kandidat')->with('success', 'Kandidat dihapus.');
    }
}
