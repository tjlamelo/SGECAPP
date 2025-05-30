<?php

namespace App\Http\Controllers\officier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CivilStatusRequest;
use App\Models\UserDocument;

class OfficierController extends Controller
{
    public function index()
    {
        $requests = CivilStatusRequest::latest()->get();
        return view('officier.index', compact('requests'));
    }

    public function show($id)
    {
        $request = CivilStatusRequest::with(['user.userDetail.documents'])->findOrFail($id);
        return view('officier.details', compact('request'));
    }

    public function approve($id)
    {
        $request = CivilStatusRequest::findOrFail($id);
        $request->status = 'approuve';
        $request->rejection_reason = null;
        $request->save();

        return redirect()->route('officier.requests.show', $id)->with('success', 'Demande approuvée.');
    }

    public function reject(Request $request, $id)
    {
        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        $demande = CivilStatusRequest::findOrFail($id);
        $demande->status = 'rejete';
        $demande->rejection_reason = $validated['rejection_reason'];
        $demande->save();

        return redirect()->route('officier.requests.show', $id)->with('error', 'Demande rejetée.');
    }

    // ✅ Approve a document
public function approveDocument($id)
{
    $document = UserDocument::findOrFail($id);
    $document->verification_status = 'approved'; // Changé ici
    $document->rejection_reason = null;
    $document->save();

    return back()->with('success', 'Document approuvé.');
}

public function rejectDocument(Request $request, $id)
{
    $validated = $request->validate([
        'rejection_reason' => 'required|string|min:5|max:255',
    ]);

    $document = UserDocument::findOrFail($id);
 $document->verification_status = 'rejected';

    $document->rejection_reason = $validated['rejection_reason'];
    $document->save();
   
    return back()->with('error', 'Document rejeté.');
}
}
