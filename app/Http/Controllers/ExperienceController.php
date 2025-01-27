<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
  public function index()
  {
      $experiences = Auth::user()->experiences()->orderBy('created_at', 'desc')->get();
      return view('experiences.index', compact('experiences'));
  }

  public function create()
  {
      return view('experiences.create');
  }

  public function store(Request $request)
  {
      $validated = $request->validate([
          'company' => 'required',
          'role' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'description' => 'required',
      ]);

      Auth::user()->experiences()->create($validated);
      return redirect()->route('experiences.index')->with('success', 'Experience created successfully.');
  }

  public function edit(Experience $experience)
  {
      return view('experiences.edit', compact('experience'));
  }

  public function update(Request $request, Experience $experience)
  {
      $validated = $request->validate([
          'company' => 'required',
          'role' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'description' => 'required',
      ]);
      $experience->update($validated);
      return redirect()->route('experiences.index')->with('success', 'Experience updated successfully.');
  }

  public function destroy(Experience $experience)
  {
      $this->authorize('delete', $experience);
      $experience->delete();
      return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully.');
  }
}
