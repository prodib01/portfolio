<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'proficiency' => 'required',
        ]);

        Skill::create($validated);
        return redirect('/skills')->with('sucess', 'Skill added!');
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required',
            'proficiency' => 'required',
        ]);
        $skill->update($validated);
        return redirect('/skills')->with('sucess', 'Skill updated!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect('/skills')->with('sucess', 'Skill deleted!');
    }
}
