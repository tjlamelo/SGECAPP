<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/layout.css', "resources/css/{$style}.css"])
   
    <style>
        :root {
            --cam-green: #007a5e;
            --cam-red: #ce1126;
            --cam-yellow: #fcd116;
            --cam-dark: #1a2e35;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        
        .cameroun-flag-colors {
            background: linear-gradient(
                90deg,
                var(--cam-green) 0%,
                var(--cam-green) 33%,
                var(--cam-red) 33%,
                var(--cam-red) 66%,
                var(--cam-yellow) 66%,
                var(--cam-yellow) 100%
            );
            height: 6px;
        }
        
        .logo {
            background: linear-gradient(135deg, var(--cam-green), #005844);
            color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 122, 94, 0.2);
        }
        
        .nav-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
            color: #2d3748;
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 8px;
        }
        
        .nav-link:hover {
            color: var(--cam-green);
            background: rgba(0, 122, 94, 0.05);
        }
        
        .nav-link.active {
            color: var(--cam-green);
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 15px;
            width: calc(100% - 30px);
            height: 3px;
            background: var(--cam-green);
            border-radius: 3px;
        }
        
        .mobile-nav-link {
            transition: all 0.3s ease;
            padding: 14px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
        }
        
        .mobile-nav-link:hover {
            background-color: rgba(0, 122, 94, 0.1);
            transform: translateX(5px);
        }
        
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }
        
        #mobile-menu.open {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--cam-green), #005844);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .dropdown-menu {
            opacity: 0;
            transform: translateY(-10px);
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }
        
        .agent-badge {
            background: linear-gradient(135deg, #7e22ce, #6b21a8);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(126, 34, 206, 0.2);
        }
        
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 15px;
            }
            
            .logo-text {
                font-size: 1.25rem;
            }
        }
        
        .footer-logo {
            background: linear-gradient(135deg, var(--cam-green), #005844);
            color: white;
            border-radius: 12px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <!-- Barre supérieure aux couleurs du drapeau camerounais -->
    <div class="cameroun-flag-colors"></div>

    <!-- Navigation principale - Design amélioré -->
    <nav class="nav-container sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3">
                <!-- Logo avec design amélioré -->
                <div class="flex items-center">
                    <div class="logo p-3 mr-3">
                        <i class="fa-solid fa-landmark-flag text-xl"></i>
                    </div>
                    <span class="logo-text font-bold text-2xl text-gray-800">
                        eCivil<span class="text-green-600">Cam</span>
                    </span>
                </div>

                <!-- Liens de navigation - Desktop -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge mr-2"></i>Tableau de bord
                    </a>
                    <a href="{{ route('user.informations.index') }}" class="nav-link {{ request()->routeIs('user.informations.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user mr-2"></i>Mon Profil
                    </a>
                    <a href="{{ route('user.documents.index') }}" class="nav-link {{ request()->routeIs('user.documents.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-folder mr-2"></i>Documents
                    </a>
                    <a href="{{ route('user.civil_status_requests.store') }}" class="nav-link {{ request()->routeIs('user.civil_status_requests.*') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-contract mr-2"></i>Demande d'Acte
                    </a>
                    @if(auth()->user()->role->value === 'agent_etat_civil')
                    <a href="{{ route('officier.index') }}" class="px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-700 text-white rounded-lg hover:from-purple-700 hover:to-indigo-800 transition flex items-center shadow-md">
                        <i class="fa-solid fa-user-tie mr-2"></i>Espace Agent
                    </a>
                    @endif
                </div>

                <!-- Menu utilisateur et mobile -->
                <div class="flex items-center">
                    <!-- Menu utilisateur - Desktop -->
                    <div class="hidden lg:block dropdown relative ml-4">
                        <button class="flex items-center focus:outline-none">
                            <div class="user-avatar">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <span class="ml-2 text-gray-700 hidden md:inline">{{ auth()->user()->name }}</span>
                            <i class="fa-solid fa-chevron-down ml-1 text-gray-600 text-sm"></i>
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-2 w-56 bg-white rounded-md py-2 z-20">
                            <div class="px-4 py-3 border-b">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                                @if(auth()->user()->role->value === 'agent_etat_civil')
                                <div class="mt-1">
                                    <span class="agent-badge">Agent d'État Civil</span>
                                </div>
                                @endif
                            </div>
                            <a href="{{ route('user.informations.index') }}" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 flex items-center">
                                <i class="fa-solid fa-user-circle mr-3 text-gray-500"></i>Mon Profil
                            </a>
                            <a href="#" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 flex items-center">
                                <i class="fa-solid fa-cog mr-3 text-gray-500"></i>Paramètres
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 flex items-center">
                                    <i class="fa-solid fa-right-from-bracket mr-3 text-gray-500"></i>Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Menu mobile -->
                    <button id="mobile-menu-button" class="lg:hidden text-gray-600 ml-4 flex items-center justify-center w-10 h-10 rounded-full hover:bg-gray-100 transition">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile - Version améliorée avec animations -->
        <div id="mobile-menu" class="lg:hidden bg-white border-t">
            <div class="container mx-auto px-4 py-4">
                <div class="flex items-center justify-between mb-6 pb-4 border-b">
                    <div class="flex items-center">
                        <div class="user-avatar">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-gray-800">{{ auth()->user()->name }}</p>
                            <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    @if(auth()->user()->role->value === 'agent_etat_civil')
                    <div class="agent-badge">Agent</div>
                    @endif
                </div>
                
                <div class="space-y-1">
                    <a href="{{ route('home') }}" class="mobile-nav-link flex items-center {{ request()->routeIs('home') ? 'bg-green-50 text-green-700' : 'text-gray-700' }}">
                        <i class="fa-solid fa-gauge mr-4 text-lg w-6 text-center"></i>Tableau de bord
                    </a>
                    <a href="{{ route('user.informations.index') }}" class="mobile-nav-link flex items-center {{ request()->routeIs('user.informations.*') ? 'bg-green-50 text-green-700' : 'text-gray-700' }}">
                        <i class="fa-solid fa-user mr-4 text-lg w-6 text-center"></i>Mon Profil
                    </a>
                    <a href="{{ route('user.documents.index') }}" class="mobile-nav-link flex items-center {{ request()->routeIs('user.documents.*') ? 'bg-green-50 text-green-700' : 'text-gray-700' }}">
                        <i class="fa-solid fa-folder mr-4 text-lg w-6 text-center"></i>Documents
                    </a>
                    <a href="{{ route('user.civil_status_requests.store') }}" class="mobile-nav-link flex items-center {{ request()->routeIs('user.civil_status_requests.*') ? 'bg-green-50 text-green-700' : 'text-gray-700' }}">
                        <i class="fa-solid fa-file-contract mr-4 text-lg w-6 text-center"></i>Demande d'Acte
                    </a>
                    @if(auth()->user()->role->value === 'agent_etat_civil')
                    <a href="{{ route('officier.index') }}" class="mobile-nav-link flex items-center bg-purple-50 text-purple-700">
                        <i class="fa-solid fa-user-tie mr-4 text-lg w-6 text-center"></i>Espace Agent
                    </a>
                    @endif
                </div>
                
                <div class="mt-6 pt-4 border-t">
                    <a href="#" class="mobile-nav-link flex items-center text-gray-700">
                        <i class="fa-solid fa-cog mr-4 text-lg w-6 text-center"></i>Paramètres
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left mobile-nav-link flex items-center text-red-600 mt-1">
                            <i class="fa-solid fa-right-from-bracket mr-4 text-lg w-6 text-center"></i>Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <!-- Pied de page institutionnel amélioré -->
    <footer class="bg-gradient-to-b from-gray-900 to-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="flex items-start mb-4">
                        <div class="footer-logo">
                            <i class="fa-solid fa-landmark-flag text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">eCivil<span class="text-green-400">Cam</span></h3>
                            <p class="text-gray-400 mt-1">Système de Gestion des Actes Civils</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mt-4">
                        Plateforme officielle de gestion des actes d'état civil de la République du Cameroun.
                        Simplifiez vos démarches administratives en ligne.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Ministère</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition flex items-start">
                                <i class="fas fa-chevron-right text-xs mt-1.5 mr-2 text-green-400"></i>
                                Ministère de l'Administration Territoriale
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition flex items-start">
                                <i class="fas fa-chevron-right text-xs mt-1.5 mr-2 text-green-400"></i>
                                Ministère de la Justice
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition flex items-start">
                                <i class="fas fa-chevron-right text-xs mt-1.5 mr-2 text-green-400"></i>
                                Ministère de la Décentralisation
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Liens Utiles</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition flex items-start">
                                <i class="fas fa-chevron-right text-xs mt-1.5 mr-2 text-green-400"></i>
                                Portail du Gouvernement
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition flex items-start">
                                <i class="fas fa-chevron-right text-xs mt-1.5 mr-2 text-green-400"></i>
                                Services en ligne
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition flex items-start">
                                <i class="fas fa-chevron-right text-xs mt-1.5 mr-2 text-green-400"></i>
                                Actualités
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-10 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-500 text-sm">
                        © {{ date('Y') }} République du Cameroun - Tous droits réservés
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-400 text-sm">Mentions légales</a>
                        <a href="#" class="text-gray-500 hover:text-gray-400 text-sm">Politique de confidentialité</a>
                        <a href="#" class="text-gray-500 hover:text-gray-400 text-sm">Accessibilité</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/{{ $script }}.js"></script>
    <script>
        // Gestion améliorée du menu mobile avec animations
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            // Toggle l'icône
            const icon = mobileMenuButton.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
            
            // Toggle le menu avec animation
            mobileMenu.classList.toggle('open');
            
            // Empêcher le défilement de la page lorsque le menu est ouvert
            document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
        });
        
        // Fermer le menu lorsqu'on clique à l'extérieur
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = mobileMenu.contains(event.target);
            const isClickInsideButton = mobileMenuButton.contains(event.target);
            
            if (!isClickInsideMenu && !isClickInsideButton && mobileMenu.classList.contains('open')) {
                mobileMenu.classList.remove('open');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
                document.body.style.overflow = '';
            }
        });
        
        // Fermer le menu lorsqu'on clique sur un lien
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
                document.body.style.overflow = '';
            });
        });
    </script>
</body>
</html>