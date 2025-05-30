<x-admin-layout>

    <div class="container py-4">
        <h1 class="mb-4">Gestion des Utilisateurs</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Structure</th>
                                <th>Rôle</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->structure?->name ?? 'Aucune' }}</td>
                                <td>
                                    <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" class="form-select form-select-sm" onchange="this.form.submit()">
                                            @foreach ($roles as $roleItem)
                                            <option value="{{ $roleItem->value }}" {{ $user->role->value === $roleItem->value ? 'selected' : '' }}>
                                                <!-- Correction ici -->
                                                {{ ucfirst(str_replace('_', ' ', $roleItem->name)) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')">
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
