<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class ResumeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $experiences = $user->experiences()->orderBy('start_date', 'desc')->get();
        $educations = $user->educations()->orderBy('graduation_year', 'desc')->get();
        $projects = $user->projects()->orderBy('created_at', 'desc')->get();
        $skills = $user->skills()->orderBy('proficiency', 'desc')->get();

        return view('resumes.index', compact('user', 'experiences', 'educations', 'projects', 'skills'));
    }

    public function downloadResume()
    {
        $user = Auth::user();
        $experiences = $user->experiences()->orderBy('start_date', 'desc')->get();
        $educations = $user->educations()->orderBy('graduation_year', 'desc')->get();
        $projects = $user->projects()->orderBy('created_at', 'desc')->get();
        $skills = $user->skills()->orderBy('proficiency', 'desc')->get();

        // Load the selected template
        $template = $user->template; // e.g., 'template1', 'template2', etc.
        $view = 'resumes.templates.' . $template;

        $pdf = PDF::loadView($view, [
            'user' => $user,
            'experiences' => $experiences,
            'educations' => $educations,
            'projects' => $projects,
            'skills' => $skills,
        ]);

        return $pdf->download($user->name . '_resume.pdf');
    }

    public function updateTemplate(Request $request)
    {
        $request->validate([
            'template' => 'required|string|in:template1,template2,template3,template4,template5',
        ]);

        $user = Auth::user();
        $user->template = $request->template;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function resumePreview(Request $request)
    {
        $user = Auth::user();
        $experiences = $user->experiences()->orderBy('start_date', 'desc')->get();
        $educations = $user->educations()->orderBy('graduation_year', 'desc')->get();
        $projects = $user->projects()->orderBy('created_at', 'desc')->get();
        $skills = $user->skills()->orderBy('proficiency', 'desc')->get();

        $template = $request->query('template') ?? $user->template ?? 'template1';

        return view('resumes.templates.' . $template, [
            'user' => $user,
            'experiences' => $experiences,
            'educations' => $educations,
            'projects' => $projects,
            'skills' => $skills,
        ]);
    }
}
