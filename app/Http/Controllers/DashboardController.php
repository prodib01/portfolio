<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'user' => auth()->user(),
            'educations' => auth()->user()->educations()->latest()->get(),
            'skills' => auth()->user()->skills()->take(6)->get(),
            'recentProjects' => auth()->user()->projects()->take(3)->get(),
        ]);
    }
}
