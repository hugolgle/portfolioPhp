<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Devis;
use App\Models\Project;
use App\Models\Service;

class AdminController extends Controller
{
  public function admin()
  {
    $nbDevis = Devis::count();
    return view('admin.dashboard', compact('nbDevis'));
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
    $nbDevis = Devis::count();
    $services = Service::all();
    return view('admin.services', compact('services', 'nbDevis'));
  }

  public function devis()
  {
    $devis = Devis::all();
    return view('admin.services.devis', compact('devis'));
  }

  public function preferences()
  {
    return view('admin.preferences');
  }
}