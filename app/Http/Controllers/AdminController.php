<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Devis;
use App\Models\Project;
use App\Models\Service;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function admin()
  {
    $nbDevis = Devis::count();
    $visitsTotal = Visit::count();
    $visitsUnique = Visit::distinct('ip')->count('ip');

    $visitsPerDay = Visit::select(
      DB::raw("DATE(created_at) as date"),
      DB::raw("COUNT(*) as count")
    )
      ->where('created_at', '>=', now()->subDays(6)->startOfDay())
      ->groupBy('date')
      ->orderBy('date')
      ->pluck('count', 'date')
      ->toArray();

    return view('admin.dashboard', compact(
      'nbDevis',
      'visitsTotal',
      'visitsUnique',
      'visitsPerDay'
    ));
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