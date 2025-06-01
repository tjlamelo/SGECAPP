<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar-mini .sidebar {
            width: 80px;
        }
        .sidebar-mini .sidebar .nav-text {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .sidebar-mini .sidebar:hover {
            width: 260px;
        }
        .sidebar-mini .sidebar:hover .nav-text {
            opacity: 1;
        }
        .content {
            transition: margin-left 0.3s ease;
        }
        .active-link {
            background: linear-gradient(90deg, rgba(14, 165, 233, 0.2) 0%, rgba(14, 165, 233, 0) 100%);
            border-left: 4px solid #0ea5e9;
            color: #0ea5e9;
        }
        .active-link i {
            color: #0ea5e9;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="flex h-full bg-gray-50">
    <!-- Sidebar -->
    <div class="sidebar bg-gradient-to-b from-dark-900 to-dark-800 text-white w-64 min-h-screen fixed hidden md:block">
        <div class="p-5 flex items-center space-x-3 border-b border-gray-700">
            <div class="bg-primary-600 w-10 h-10 rounded-lg flex items-center justify-center">
                <i class="fas fa-cube text-white text-xl"></i>
            </div>
            <div>
                <a href="{{ route('home') }}">                <h2 class="text-xl font-bold">Admin<span class="text-primary-500">Pro</span></h2></a>

                <p class="text-xs text-gray-400">Dashboard Admin</p>
            </div>
        </div>
        
        <div class="py-4">
            <nav class="mt-6">
                <div class="px-4 text-xs uppercase tracking-wider text-gray-500 mb-2">Navigation</div>
                <a href="{{ route('admin.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white group active-link">
                    <i class="fas fa-home text-gray-400 group-hover:text-white mr-3"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white group">
                    <i class="fas fa-users-cog text-gray-400 group-hover:text-white mr-3"></i>
                    <span class="nav-text">Gestion Utilisateurs</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white group">
                    <i class="fas fa-chart-bar text-gray-400 group-hover:text-white mr-3"></i>
                    <span class="nav-text">Analytics</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white group">
                    <i class="fas fa-cog text-gray-400 group-hover:text-white mr-3"></i>
                    <span class="nav-text">Paramètres</span>
                </a>
                
                <div class="px-4 text-xs uppercase tracking-wider text-gray-500 mt-6 mb-2">Autres</div>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white group">
                    <i class="fas fa-calendar text-gray-400 group-hover:text-white mr-3"></i>
                    <span class="nav-text">Calendrier</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white group">
                    <i class="fas fa-file-alt text-gray-400 group-hover:text-white mr-3"></i>
                    <span class="nav-text">Documents</span>
                </a>
            </nav>
        </div>
        
        <div class="absolute bottom-0 w-full p-4 border-t border-gray-700">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center">
                    <span class="text-white font-bold">A</span>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">Admin User</p>
                    <p class="text-xs text-gray-400">Administrateur</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="content flex-1 md:ml-64">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <button class="md:hidden mr-3 text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-900">Dashboard</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell text-xl"></i>
                        </button>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </div>
                    
                    <div class="relative">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-envelope text-xl"></i>
                        </button>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-blue-500 rounded-full"></span>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center">
                            <span class="text-primary-600 font-bold">A</span>
                        </div>
                        <span class="ml-2 text-gray-700 hidden md:inline">Admin User</span>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main Content -->
        <main class="px-6 py-4">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-gray-800">Gestion des Utilisateurs</h2>
                        <button class="bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Nouvel Utilisateur
                        </button>
                    </div>
                </div>
                
                <!-- Contenu principal -->
                <div class="p-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="mt-8 px-6 py-4 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-600 text-sm">© 2023 AdminPro. Tous droits réservés.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-primary-600">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-primary-600">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-primary-600">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-primary-600">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.md\\:hidden').addEventListener('click', function() {
            document.body.classList.toggle('sidebar-mini');
        });

        // Set active link
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active-link');
                link.querySelector('i').classList.add('text-primary-500');
            }
        });
    </script>
</body>
</html>