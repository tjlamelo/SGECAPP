<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
   <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  

        {{-- @vite(['resources/css/layout.css', "resources/css/{$style}.css"]) --}}
   
</head>
<body>
<!-- Dans votre layout -->
{{-- <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users') }}">
        Gestion Utilisateurs
    </a>
</li> --}}
{{-- @if(auth()->check() && auth()->user()->role === \App\Enum\Role::Admin->value)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-users-cog me-1"></i> Gestion Utilisateurs
        </a>
    </li>
@endif --}}

{{-- @php
    dd([
        'user_authenticated' => auth()->check(),
        'user_role' => auth()->check() ? auth()->user()->role : null,
        'admin_role_value' => \App\Enum\Role::Admin->value,
        'is_admin' => auth()->check() && auth()->user()->role === \App\Enum\Role::Admin->value,
        'full_user_object' => auth()->user()
    ]);
@endphp --}}

@if(auth()->check() && auth()->user()->role === \App\Enum\Role::Admin)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fas fa-users-cog me-1"></i> Gestion Utilisateurs
        </a>
    </li>
@endif
<main>
{{ $slot }}

</main>

 {{-- <script src="js/{{ $script }}.js"></script> --}}
</body>
</html>