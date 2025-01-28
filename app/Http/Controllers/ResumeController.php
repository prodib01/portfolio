<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function generate()
    {
        $user = Auth::user();
        $experiences = $user->experiences()->orderBy('start_date', 'desc')->get();
        $educations = $user->educations()->orderBy('graduation_year', 'desc')->get();
        $projects = $user->projects()->orderBy('created_at', 'desc')->get();
        $skills = $user->skills()->orderBy('proficiency', 'asc')->get();

        $pdf = PDF::loadView('resume.index', [
            'user' => $user,
            'experiences' => $experiences,
            'educations' => $educations,
            'projects' => $projects,
            'skills' => $skills,
        ]);

        return $pdf->download('resume.pdf');
    }
}
