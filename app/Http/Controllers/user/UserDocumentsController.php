<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;  
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\UserDocument;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserDocumentsController extends Controller
{
    public function index()
    {
        $documents = UserDocument::with('userDetail')->latest()->get();
        return view('user.documents.index', compact('documents'));
    }

    public function create()
    {
           $documentTypes = [
        'CNI',
        'Passeport',
        'Permis_conduire',
        'Carte_sejour',
        'Acte_naissance',
        'Justificatif_domicile',
        'Livret_famille',
        'Acte_mariage',
        'Acte_deces',
        'Autre'
    ];
        $userDetails = UserDetail::all();  
        return view('user.documents.form', compact('userDetails'), compact('documentTypes'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'document_type' => 'required',
        'document_number' => 'nullable|string',
        'issue_date' => 'required|date',
        'expiry_date' => 'required|date',
        'issuing_authority' => 'nullable|string',
        'front_file' => 'required|file|max:2048',
        'back_file' => 'nullable|file|max:2048',
    ]);

    $user = auth()->user();

    // Crée le UserDetail si inexistant
    $userDetail =  UserDetail::firstOrCreate(
        ['personne_id' => $user->id]
    );

    // Upload des fichiers
    $frontPath = $request->file('front_file')->store('documents', 'public');
    $frontHash = hash_file('sha256', $request->file('front_file')->getRealPath());

    $backPath = null;
    if ($request->hasFile('back_file')) {
        $backPath = $request->file('back_file')->store('documents', 'public');
    }

    // Création du document
        UserDocument::create([
        'user_detail_id' => $userDetail->id,
        'document_type' => $validated['document_type'],
        'document_number' => $validated['document_number'],
        'issue_date' => $validated['issue_date'],
        'expiry_date' => $validated['expiry_date'],
        'issuing_authority' => $validated['issuing_authority'],
        'front_path' => $frontPath,
        'back_path' => $backPath,
        'mime_type' => $request->file('front_file')->getClientMimeType(),
        'file_size' => $request->file('front_file')->getSize(),
        'file_hash' => $frontHash,
    ]);

    return redirect()->route('user.documents.index')->with('success', 'Document ajouté avec succès.');
}
public function edit(UserDocument $document)
{
      $documentTypes = [
        'CNI',
        'Passeport',
        'Permis_conduire',
        'Carte_sejour',
        'Acte_naissance',
        'Justificatif_domicile',
        'Livret_famille',
        'Acte_mariage',
        'Acte_deces',
        'Autre'
    ];
    $userDetails = UserDetail::all();
    return view('user.documents.form', [
        'document' => $document,
        'userDetails' => $userDetails,
        'isEdit' => true, 
        
    ],compact('documentTypes'));
}
public function update(Request $request, UserDocument $document)
{
    $validated = $request->validate([
        'document_type' => 'required',
        'document_number' => 'nullable|string',
        'issue_date' => 'required|date',
        'expiry_date' => 'required|date',
        'issuing_authority' => 'nullable|string',
        'front_file' => 'sometimes|file|max:2048', // 'sometimes' au lieu de 'required'
        'back_file' => 'nullable|file|max:2048',
    ]);

    $data = [
        'document_type' => $validated['document_type'],
        'document_number' => $validated['document_number'],
        'issue_date' => $validated['issue_date'],
        'expiry_date' => $validated['expiry_date'],
        'issuing_authority' => $validated['issuing_authority'],
    ];

    // Gestion du fichier avant si fourni
    if ($request->hasFile('front_file')) {
        // Supprimer l'ancien fichier
        Storage::disk('public')->delete($document->front_path);
        
        // Upload du nouveau fichier
        $frontPath = $request->file('front_file')->store('documents', 'public');
        $frontHash = hash_file('sha256', $request->file('front_file')->getRealPath());
        
        $data['front_path'] = $frontPath;
        $data['mime_type'] = $request->file('front_file')->getClientMimeType();
        $data['file_size'] = $request->file('front_file')->getSize();
        $data['file_hash'] = $frontHash;
    }

    // Gestion du fichier arrière si fourni
    if ($request->hasFile('back_file')) {
        // Supprimer l'ancien fichier s'il existe
        if ($document->back_path) {
            Storage::disk('public')->delete($document->back_path);
        }
        
        $backPath = $request->file('back_file')->store('documents', 'public');
        $data['back_path'] = $backPath;
    }

    $document->update($data);

    return redirect()->route('user.documents.index')->with('success', 'Document mis à jour avec succès.');
}

    public function show(UserDocument $document)
    {
        return view('user.documents.show', compact('document'));
    }

    public function destroy(UserDocument $document)
    {
        $document->delete();
        return back()->with('success', 'Document supprimé.');
    }
}