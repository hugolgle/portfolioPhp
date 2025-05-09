<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Project;

class AdminController extends Controller
{
  public function admin()
  {
    return view('admin.dashboard');
  }

  public function about()
  {
    $about = About::all();
    return view('admin.about', compact('about'));
  }

  public function skills()
  {
    return view('admin.skills');
  }

  public function project()
  {
    $projects = Project::all();

    return view('admin.project', compact('projects'));
  }


  public function contact()
  {
    return view('admin.contact');
  }

  public function settings()
  {
    return view('admin.settings');
  }
}