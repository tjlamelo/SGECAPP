<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-800 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Adresse Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="mt-1 p-2 w-full border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium">Mot de passe</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 p-2 w-full border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>
