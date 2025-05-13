<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'selected_services_data' => 'required|json',
            'client_name' => 'required|string',
            'client_phone' => 'required|string',
            'client_email' => 'required|email',
        ]);

        $services = json_decode($data['selected_services_data'], true);

        Devis::create([
            'services' => $services,
            'client_name' => $data['client_name'],
            'client_phone' => $data['client_phone'],
            'client_email' => $data['client_email'],
        ]);

        return redirect()->to(url('/'))
            ->with('success', 'Votre devis a bien été enregistré.');
    }


    public function destroy(Devis $devis)
    {
        $devis->delete();
        return redirect()
            ->route('admin.services.devis')
            ->with('success', 'Devis supprimé.');
    }
}
