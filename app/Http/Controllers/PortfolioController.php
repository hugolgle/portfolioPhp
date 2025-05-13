<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Preference;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
  public function index()
  {
    $skills = [
      [
        'title' => 'Développement Frontend',
        'description' => 'HTML, CSS, JavaScript, React, Vue.js, Next.js'
      ],
      [
        'title' => 'Design UI/UX',
        'description' => 'Figma, Adobe XD, Responsive Design, Prototypage'
      ],
      [
        'title' => 'Développement Backend',
        'description' => 'Node.js, Express, PHP, MySQL, MongoDB'
      ],
      [
        'title' => 'Langues',
        'description' => 'Français (natif), Anglais (courant)'
      ],
      [
        'title' => 'Résolution de problèmes',
        'description' => 'Analyse, Optimisation, Débogage'
      ],
      [
        'title' => 'Outils & Méthodologies',
        'description' => 'Git, Agile, CI/CD, Docker'
      ],
    ];

    $projects = Project::all();
    $services = Service::where('isVisible', true)->get();
    $about = About::first();

    $preference = Preference::first();

    $isAuthenticated = auth()->check();

    return view('welcome', compact('skills', 'projects', 'about', 'isAuthenticated', 'services', 'preference'));
  }
}

