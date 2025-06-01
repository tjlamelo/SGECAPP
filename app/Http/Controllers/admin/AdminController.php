<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Structure;
use App\Models\CivilStatusRequest;
use App\Models\UserDocument;
use App\Enum\Role;
use Illuminate\Support\Facades\Gate;
class AdminController extends Controller
{
        /**
     * Vérifie si l'utilisateur est admin
     */
private function checkAdmin()
{
    if (auth()->user()->role !== Role::Admin) { // Comparaison d'enums
        abort(403, 'Accès non autorisé');
    }
}

    public function index()
    {     
               $this->checkAdmin();
        // Statistiques
        $totalUsers = User::count();
        $totalStructures = Structure::count();
        
        // Demandes
        $totalRequests = CivilStatusRequest::count();
        $pendingRequests = CivilStatusRequest::where('status', 'en_attente')->count();
        $approvedRequests = CivilStatusRequest::where('status', 'approuve')->count();
        $rejectedRequests = CivilStatusRequest::where('status', 'rejete')->count();
        
        // Documents
        $totalDocuments = UserDocument::count();
        $pendingDocuments = UserDocument::where('verification_status', 'pending')->count();
        $approvedDocuments = UserDocument::where('verification_status', 'approved')->count();
        $rejectedDocuments = UserDocument::where('verification_status', 'rejected')->count();
        
        // Distribution des rôles
        $rolesDistribution = [
            (object)[
                'role' => Role::Admin,
                'label' => 'Administrateurs',
                'count' => User::where('role', Role::Admin)->count(),
                'color' => '#d8b4fe'
            ],
            (object)[
                'role' => Role::AgentEtatCivil,
                'label' => 'Agents État Civil',
                'count' => User::where('role', Role::AgentEtatCivil)->count(),
                'color' => '#60a5fa'
            ],
            (object)[
                'role' => Role::AgentTribunal,
                'label' => 'Agents Tribunal',
                'count' => User::where('role', Role::AgentTribunal)->count(),
                'color' => '#34d399'
            ],
            (object)[
                'role' => Role::AgentHopital,
                'label' => 'Agents Hôpital',
                'count' => User::where('role', Role::AgentHopital)->count(),
                'color' => '#fbbf24'
            ],
            (object)[
                'role' => Role::AgentMinistere,
                'label' => 'Agents Ministère',
                'count' => User::where('role', Role::AgentMinistere)->count(),
                'color' => '#f87171'
            ],
            (object)[
                'role' => Role::AgentOrganisme,
                'label' => 'Agents Organisme',
                'count' => User::where('role', Role::AgentOrganisme)->count(),
                'color' => '#a78bfa'
            ],
            (object)[
                'role' => Role::Default,
                'label' => 'Utilisateurs Standard',
                'count' => User::where('role', Role::Default)->count(),
                'color' => '#9ca3af'
            ]
        ];
        
        // Derniers enregistrements
        $latestRequests = CivilStatusRequest::with('user')->latest()->take(5)->get();
        $latestDocuments = UserDocument::with('userDetail.user')->latest()->take(5)->get();
        $latestUsers = User::with('structure')->latest()->take(5)->get();

        return view('admin.index', compact(
            'totalUsers', 'totalStructures',
            'totalRequests', 'pendingRequests', 'approvedRequests', 'rejectedRequests',
            'totalDocuments', 'pendingDocuments', 'approvedDocuments', 'rejectedDocuments',
            'rolesDistribution', 'latestRequests', 'latestDocuments', 'latestUsers'
        ));
    }

     /**
     * Affiche la gestion des utilisateurs
     */
   public function manageUsers()
    {
        $this->checkAdmin();
        
        $users = User::with('structure')->paginate(10);
        $roles = Role::cases();
        
        return view('admin.users', compact('users', 'roles'));
    }

    /**
     * Met à jour le rôle d'un utilisateur
     */
  public function updateRole(Request $request, User $user)
    {
        $this->checkAdmin();
        
        $request->validate([
            'role' => ['required', 'in:' . implode(',', array_column(Role::cases(), 'value'))]
        ]);

        $user->update(['role' => $request->role]);
        
        return back()->with('success', 'Rôle mis à jour avec succès!');
    }

    /**
     * Supprime un utilisateur
     */
    public function destroy(User $user)
    {
        $this->checkAdmin();
        
        // Empêche l'auto-suppression
        if (auth()->id() === $user->id) {
            return back()->withErrors('Vous ne pouvez pas supprimer votre propre compte!');
        }

        $user->delete();
        return back()->with('success', 'Utilisateur supprimé avec succès!');
    }
}