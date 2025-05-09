<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Project;
use App\Models\Service;

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

  public function project()
  {
    $projects = Project::all();

    return view('admin.project', compact('projects'));
  }


  public function contact()
  {
    return view('admin.contact');
  }

  public function services()
  {
    $services = Service::all();
    return view('admin.services', compact('services'));
  }

  public function preferences()
  {
    return view('admin.preferences');
  }
}