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
        'icon' => '<i data-lucide="code" class="mx-auto mb-4 w-8 h-8 text-primary"></i>',
        'title' => 'Développement Frontend',
        'description' => 'HTML, CSS, JavaScript, React, Vue.js, Next.js'
        ],
        [
        'icon' => '<i data-lucide="palette" class="mx-auto mb-4 w-8 h-8 text-primary"></i>',
        'title' => 'Design UI/UX',
        'description' => 'Figma, Adobe XD, Responsive Design, Prototypage'
        ],
        [
        'icon' => '<i data-lucide="server" class="mx-auto mb-4 w-8 h-8 text-primary"></i>',
        'title' => 'Développement Backend',
        'description' => 'Node.js, Express, PHP, MySQL, MongoDB'
        ],
        [
        'icon' => '<i data-lucide="globe" class="mx-auto mb-4 w-8 h-8 text-primary"></i>',
        'title' => 'Langues',
        'description' => 'Français (natif), Anglais (scolaire)'
        ],
        [
        'icon' => '<i data-lucide="brain" class="mx-auto mb-4 w-8 h-8 text-primary"></i>',
        'title' => 'Résolution de problèmes',
        'description' => 'Analyse, Optimisation, Débogage'
        ],
        [
        'icon' => '<i data-lucide="settings" class="mx-auto mb-4 w-8 h-8 text-primary"></i>',
        'title' => 'Outils & Méthodologies',
        'description' => 'Git, Agile, CI/CD, Docker'
        ],
        ];

        $optionsSubjectFormContact = [
        [
        'value' => 'Demande de contact',
        'label' => 'Demande de contact',
        ],
        [
        'value' => 'Demande de devis',
        'label' => 'Demande de devis',
        ],
        [
        'value' => 'Autre',
        'label' => 'Autre',
        ],
        ];


        $projects = Project::all();
        $services = Service::where('isVisible', true)->get();
        $about = About::first();

        $preference = Preference::first();

        $isAuthenticated = auth()->check();

        return view('welcome', compact('skills', 'projects', 'about', 'isAuthenticated', 'services', 'preference', 'optionsSubjectFormContact'));
    }
}
