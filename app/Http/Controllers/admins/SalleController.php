<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Equipement;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::with('equipements')->get();

        return view('admins.salles.index', compact("salles"));
    }

    public function search(Request $request)
        {
            $query = $request->input('query');

            // Rechercher les salles par nom ou capacité
            $salles = Salle::where('nom', 'LIKE', "%{$query}%")
                ->orWhere('capacite', 'LIKE', "%{$query}%")
                ->get();

            // Retourner la vue avec les résultats
            return view('admins.salles.index', compact('salles'))->with('success', 'Résultats de la recherche pour : ' . $query);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipements = Equipement::all();
        return view('admins.salles.create', compact("equipements"));
    }

    public function showImportForm()
    {
        return view('admins.salles.import');
    }



    public function exportToXml()
    {
            // Récupérer toutes les salles avec leurs équipements associés
        $salles = Salle::with('equipements')->get();


        // Créer un objet SimpleXMLElement pour générer un fichier XML
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><salles></salles>');

        // Ajouter chaque salle à l'objet XML
        foreach ($salles as $salle) {
            $salleNode = $xml->addChild('salle');
            $salleNode->addChild('id', $salle->id);
            $salleNode->addChild('nom', $salle->nom); // champ nom
            $salleNode->addChild('capacite', $salle->capacite); // champ capacite
            $salleNode->addChild('disponbilite', $salle->disponbilite); // champ disponbilite

            // Ajouter les équipements de chaque salle
            $equipementsNode = $salleNode->addChild('equipements');
            foreach ($salle->equipements as $equipement) {
                $equipementNode = $equipementsNode->addChild('equipement');
                $equipementNode->addChild('nom', $equipement->nom); // Nom de l'équipement
                $equipementNode->addChild('type', $equipement->type); // Type d'équipement
                // Vous pouvez ajouter d'autres champs si nécessaire
            }
        }

        // Convertir l'objet XML en chaîne de caractères
        $xmlContent = $xml->asXML();

        // Retourner le fichier XML en réponse pour téléchargement
        return Response::make($xmlContent, 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'attachment; filename="salles_avec_equipements.xml"',
        ]);
    }
    public function import(Request $request)
{
    $request->validate([
        'xml_file' => 'required|file|mimes:xml',
    ]);

    $xmlContent = file_get_contents($request->file('xml_file')->getRealPath());
    $xml = simplexml_load_string($xmlContent);

    foreach ($xml->salle as $salleData) {
        $salle = Salle::create([
            'nom' => (string) $salleData->nom,
            'capacite' => (int) $salleData->capacite,
            'disponiblite' => (int) $salleData->disponibilite,
        ]);

        foreach ($salleData->equipements->equipement as $equipementData) {
            $equipement = Equipement::firstOrCreate([
                'nom' => (string) $equipementData->nom
            ]);

            $salle->equipements()->attach($equipement->id);
        }
    }

    return redirect()->route('salles.index')->with('success', 'Les salles ont été importées avec succès depuis le fichier XML.');
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',  
            'equipements' => 'required|array', 
        ]);

        $salle = Salle::create([
            'nom' => $request->nom,
            'capacite' => $request->capacite,
            'disponiblite' => $request->disponbilite,
        ]);

        $salle->equipements()->attach($request->equipements);

       
        return redirect()->route('salles.index')->with('success', 'Salle créée avec succès et équipements associés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salle = Salle::with('equipements')->findOrFail($id);
        $equipements = Equipement::all();

        return view('admins.salles.edit', compact('salle', 'equipements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $salle = Salle::findOrFail($id);

        $salle->update([
            'nom' => $request->nom,
            'capacite' => $request->capacite,
            'disponbilite' => $request->disponbilite,
        ]);
    
        $salle->equipements()->sync($request->equipements);
    
        return redirect()->route('salles.index')->with('success', 'Salle mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salle = Salle::findOrFail($id);
        $salle->equipements()->detach();
        $salle->delete();
    
        return redirect()->route('salles.index')->with('success', 'Salle supprimée avec succès.');
    }



}
