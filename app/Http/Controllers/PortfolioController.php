<?php

namespace App\Http\Controllers;

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

    $projects = [
      [
        'title' => 'Site E-commerce',
        'description' => 'Plateforme de vente en ligne avec système de paiement intégré et gestion des stocks.',
        // 'image' => '/placeholder.svg?height=400&width=600',
        'tags' => ['React', 'Node.js', 'MongoDB', 'Stripe'],
        'demoLink' => '#',
        'codeLink' => '#',
      ],
      [
        'title' => 'Application de Gestion',
        'description' => 'Dashboard administratif pour la gestion des ressources et le suivi des performances.',
        // 'image' => '/placeholder.svg?height=400&width=600',
        'tags' => ['Vue.js', 'Express', 'MySQL', 'Chart.js'],
        'demoLink' => '#',
        'codeLink' => '#',
      ],
      [
        'title' => 'Portfolio Photographe',
        'description' => 'Galerie interactive pour un photographe professionnel avec système de réservation.',
        // 'image' => '/placeholder.svg?height=400&width=600',
        'tags' => ['Next.js', 'Tailwind CSS', 'Sanity.io'],
        'demoLink' => '#',
        'codeLink' => '#',
      ],
    ];

    return view('welcome', compact('skills', 'projects'));
  }
}

