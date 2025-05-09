<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Project;
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
    $about = About::first();

    $isAuthenticated = auth()->check();

    return view('welcome', compact('skills', 'projects', 'about', 'isAuthenticated'));
  }
}

