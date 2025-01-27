<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Auth::user()->educations()->orderBy('graduation_year', 'desc')->get();
        return view('educations.index', compact('educations'));
    }

    public function create()
    {
        return view('educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'graduation_year' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'gpa' => 'nullable|numeric|min:0|max:4.0',
            'honors' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        Auth::user()->educations()->create($validated);

        return redirect()->route('educations.index')
            ->with('success', 'Education entry added successfully.');
    }

    public function edit(Education $education)
    {
        $this->authorize('update', $education);
        return view('educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $this->authorize('update', $education);

        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'graduation_year' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'gpa' => 'nullable|numeric|min:0|max:4.0',
            'honors' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $education->update($validated);

        return redirect()->route('educations.index')
            ->with('success', 'Education entry updated successfully.');
    }

    public function destroy(Education $education)
    {
        $this->authorize('delete', $education);
        $education->delete();

        return redirect()->route('educations.index')
            ->with('success', 'Education entry deleted successfully.');
    }
}
