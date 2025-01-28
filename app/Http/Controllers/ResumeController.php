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

        $pdf = PDF::loadView('resumes.pdf', [
            'user' => $user,
            'experiences' => $experiences,
            'educations' => $educations,
            'projects' => $projects,
            'skills' => $skills,
        ]);

        return $pdf->download($user->name . '_resume.pdf');
    }
}