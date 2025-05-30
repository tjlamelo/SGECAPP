<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGEC - Système de Gestion des Actes d'État Civil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        /* Base styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }
        
        /* Smooth scrolling for anchor links */
        html {
            scroll-behavior: smooth;
        }
        
        /* Glow effect for cards */
        .card-glow:hover {
            box-shadow: 0 0 30px -5px rgba(59, 130, 246, 0.5);
        }
        
        /* Parallax sections */
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        /* Animated gradient for hero */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animated-gradient {
            background: linear-gradient(270deg, #1e3a8a, #3b82f6, #6366f1, #8b5cf6);
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
        }
        
        /* Floating animation */
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        /* Scroll reveal animation */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }
        
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 5px;
        }
        
        /* Particles background */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            pointer-events: none;
        }
        
        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Custom shape dividers */
        .custom-shape-divider-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        
        .custom-shape-divider-top svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 50px;
        }
        
        .custom-shape-divider-top .shape-fill {
            fill: #FFFFFF;
        }
        
        /* Button pulse animation */
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }
        
        /* Timeline animation */
        .timeline-item {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }
        
        .timeline-item.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* 3D card effect */
        .card-3d {
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            transform-style: preserve-3d;
        }
        
        .card-3d:hover {
            transform: translateY(-10px) rotateY(5deg) rotateX(5deg);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        /* Mobile menu animation */
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }
        
        .mobile-menu.show {
            max-height: 500px;
        }
        
        /* Sparkle effect */
        .sparkle {
            position: relative;
        }
        
        .sparkle::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            right: -50%;
            bottom: -50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
            transform: rotate(30deg) translate(0, -60px) scale(0.8);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .sparkle:hover::after {
            opacity: 0.6;
            transform: rotate(30deg) translate(0, 0) scale(1);
            transition: all 0.6s ease;
        }
    </style>
</head>
<body class="min-h-screen relative">
    <!-- Floating particles background -->
    <div id="particles-js" class="particles"></div>
    
    <!-- Navigation -->
    <nav class="bg-blue-900/90 backdrop-blur-md text-white shadow-xl fixed w-full top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="sparkle">
                    <i class="fas fa-certificate text-2xl text-blue-300"></i>
                </div>
                <a href="#home" class="text-2xl font-bold bg-gradient-to-r from-blue-300 to-white bg-clip-text text-transparent hover:text-blue-300 transition-all duration-500">SGEC</a>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="relative px-2 py-1 nav-link hover:text-blue-200 transition-all duration-300 group">
                    <span class="relative">Accueil</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-300 group-hover:w-full transition-all duration-500"></span>
                </a>
                <a href="#features" class="relative px-2 py-1 nav-link hover:text-blue-200 transition-all duration-300 group">
                    <span class="relative">Fonctionnalités</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-300 group-hover:w-full transition-all duration-500"></span>
                </a>
                <a href="#about" class="relative px-2 py-1 nav-link hover:text-blue-200 transition-all duration-300 group">
                    <span class="relative">À propos</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-300 group-hover:w-full transition-all duration-500"></span>
                </a>
                <a href="#testimonials" class="relative px-2 py-1 nav-link hover:text-blue-200 transition-all duration-300 group">
                    <span class="relative">Témoignages</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-300 group-hover:w-full transition-all duration-500"></span>
                </a>
                <a href="#contact" class="relative px-2 py-1 nav-link hover:text-blue-200 transition-all duration-300 group">
                    <span class="relative">Contact</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-300 group-hover:w-full transition-all duration-500"></span>
                </a>
            </div>
            <a href="#login" class="hidden md:block bg-white text-blue-600 font-bold py-2 px-6 rounded-full hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Connexion
            </a>
            <button class="md:hidden focus:outline-none" id="mobile-menu-button">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Menu mobile -->
        <div class="mobile-menu bg-blue-800/95 backdrop-blur-sm md:hidden" id="mobile-menu">
            <div class="px-5 py-3 space-y-2">
                <a href="#home" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-blue-700/50 transition-all duration-300">Accueil</a>
                <a href="#features" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-blue-700/50 transition-all duration-300">Fonctionnalités</a>
                <a href="#about" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-blue-700/50 transition-all duration-300">À propos</a>
                <a href="#testimonials" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-blue-700/50 transition-all duration-300">Témoignages</a>
                <a href="#contact" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-blue-700/50 transition-all duration-300">Contact</a>
                <a href="#login" class="block px-3 py-2 rounded-lg text-base font-medium text-center bg-white text-blue-600 hover:bg-blue-50 transition-all duration-300">
                    Connexion
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-32 pb-20 md:pt-40 md:pb-24 px-4" id="home">
        <!-- Floating elements -->
        <div class="absolute -top-20 -left-20 w-60 h-60 rounded-full bg-blue-500/20 filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/3 -right-20 w-80 h-80 rounded-full bg-indigo-500/20 filter blur-3xl animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-20 -left-10 w-96 h-96 rounded-full bg-purple-500/20 filter blur-3xl animate-pulse animation-delay-4000"></div>
        
        <div class="container mx-auto relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                        Innovation digitale
                    </span>
                    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 mb-6 leading-tight reveal" style="transition-delay: 0.1s">
                        Système de Gestion <br>
                        <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">des Actes d'État Civil</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 max-w-lg reveal" style="transition-delay: 0.2s">
                        Une solution complète pour centraliser, sécuriser et optimiser la gestion des actes d'état civil avec une technologie de pointe.
                    </p>
                    <div class="flex space-x-4 reveal" style="transition-delay: 0.3s">
                        <a href="#login" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center">
                            <span>Commencez maintenant</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#features" class="bg-white hover:bg-gray-100 text-blue-600 font-bold py-4 px-6 rounded-lg border border-blue-200 transition-all duration-300 transform hover:scale-105 shadow flex items-center">
                            <i class="fas fa-play-circle mr-2"></i>
                            <span>Voir la démo</span>
                        </a>
                    </div>
                    <div class="mt-10 flex items-center space-x-6 reveal" style="transition-delay: 0.4s">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm">Rejoint par <span class="font-bold text-blue-600">250+ communes</span></p>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                <span class="text-gray-500 ml-2 text-sm">5.0/5.0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center reveal" style="transition-delay: 0.5s">
                    <div class="relative">
                        <div class="absolute -top-8 -left-8 w-32 h-32 bg-blue-100 rounded-full z-0 animate-pulse"></div>
                        <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-purple-100 rounded-full z-0 animate-pulse animation-delay-2000"></div>
                        <div class="relative z-10 card-3d max-w-lg">
                            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                                <div class="bg-blue-600 p-4 text-white font-bold text-center">
                                    Tableau de bord SGEC
                                </div>
                                <div class="p-4 bg-white">
                                    <img src="https://img.freepik.com/free-vector/isometric-data-processing-composition-with-images-tiny-people-working-data-collection_1284-28445.jpg" alt="Dashboard Preview" class="rounded-lg border border-gray-200">
                                </div>
                                <div class="bg-gray-50 p-4 flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500">Enregistrement en cours</p>
                                        <p class="font-semibold">Acte de naissance #2023-04567</p>
                                    </div>
                                    <div class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-sm font-medium">
                                        En traitement
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -bottom-10 -right-10 bg-white p-6 rounded-lg shadow-xl z-20 card-3d transform rotate-6">
                            <i class="fas fa-file-certificate text-5xl text-blue-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-12 bg-gray-50 border-t border-b border-gray-200">
        <div class="container mx-auto px-4">
            <p class="text-center text-gray-500 text-sm mb-8 reveal">Ils nous font confiance :</p>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-center">
                <img src="https://via.placeholder.com/150x60?text=Mairie+Paris" alt="Client" class="grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 reveal" style="transition-delay: 0.1s">
                <img src="https://via.placeholder.com/150x60?text=Mairie+Lyon" alt="Client" class="grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 reveal" style="transition-delay: 0.2s">
                <img src="https://via.placeholder.com/150x60?text=Mairie+Nice" alt="Client" class="grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 reveal" style="transition-delay: 0.3s">
                <img src="https://via.placeholder.com/150x60?text=État+Civil" alt="Client" class="grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 reveal" style="transition-delay: 0.4s">
                <img src="https://via.placeholder.com/150x60?text=Ministère" alt="Client" class="grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 reveal" style="transition-delay: 0.5s">
                <img src="https://via.placeholder.com/150x60?text=Collectivité" alt="Client" class="grayscale hover:grayscale-0 transition-all duration-300 opacity-70 hover:opacity-100 reveal" style="transition-delay: 0.6s">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white" id="features">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Fonctionnalités
                </span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal" style="transition-delay: 0.1s">
                    Simplifiez la gestion <br> 
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">de vos actes</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Découvrez les principales fonctionnalités qui font de notre solution le choix idéal pour la gestion moderne des actes d'état civil.
                </p>
            </div>
            
            <!-- Featured Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.1s">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-edit text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Enregistrement intelligent</h3>
                    <p class="text-gray-600 mb-4">
                        Saisie dématérialisée des actes avec vérification automatique des données et assistance intelligente.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-all">
                        En savoir plus
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.2s">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-folder-open text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Archivage sécurisé</h3>
                    <p class="text-gray-600 mb-4">
                        Stockage numérique certifié avec chiffrement AES-256 et sauvegarde automatique redondante.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-all">
                        En savoir plus
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.3s">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-network-wired text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Interconnexions</h3>
                    <p class="text-gray-600 mb-4">
                        Synchronisation automatique avec les registres de population et autres systèmes administratifs.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-all">
                        En savoir plus
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
                
                <!-- Feature 4 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.4s">
                    <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-certificate text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Certificats en ligne</h3>
                    <p class="text-gray-600 mb-4">
                        Génération instantanée de certificats avec signature électronique reconnue juridiquement.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-all">
                        En savoir plus
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
                
                <!-- Feature 5 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.5s">
                    <div class="bg-gradient-to-br from-red-500 to-red-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-search text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Recherche avancée</h3>
                    <p class="text-gray-600 mb-4">
                        Recherche multicritères avec reconnaissance de noms similaires et suggestions intelligentes.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-all">
                        En savoir plus
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
                
                <!-- Feature 6 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.6s">
                    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 w-16 h-16 rounded-xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-chart-bar text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Analytics</h3>
                    <p class="text-gray-600 mb-4">
                        Tableaux de bord personnalisables avec indicateurs clés pour le suivi démographique.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-all">
                        En savoir plus
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
            
            <!-- CTA -->
            <div class="mt-20 text-center reveal">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 shadow-xl relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-60 h-60 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-20 -left-20 w-60 h-60 rounded-full bg-white/10"></div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-white mb-4">Prêt à révolutionner votre gestion d'état civil ?</h3>
                        <p class="text-blue-100 mb-6 max-w-2xl mx-auto">
                            Découvrez comment notre solution peut transformer vos processus et améliorer votre efficacité.
                        </p>
                        <div class="flex flex-col md:flex-row justify-center space-y-3 md:space-y-0 md:space-x-4">
                            <a href="#contact" class="bg-white hover:bg-gray-100 text-blue-600 font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Prendre rendez-vous
                            </a>
                            <a href="#" class="bg-transparent hover:bg-white/10 text-white font-bold py-4 px-8 rounded-lg border border-white transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-play-circle mr-2"></i>
                                Voir la vidéo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Demo Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0 lg:pr-12">
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                        Démonstration
                    </span>
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 leading-tight reveal" style="transition-delay: 0.1s">
                        Découvrez le SGEC <br>
                        <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">en action</span>
                    </h2>
                    <p class="text-gray-600 mb-6 reveal" style="transition-delay: 0.2s">
                        Regardez notre vidéo de démonstration pour voir comment le SGEC peut transformer votre gestion des actes d'état civil en quelques minutes seulement.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start reveal" style="transition-delay: 0.3s">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Interface intuitive et facile à prendre en main</span>
                        </li>
                        <li class="flex items-start reveal" style="transition-delay: 0.4s">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Processus d'enregistrement optimisé</span>
                        </li>
                        <li class="flex items-start reveal" style="transition-delay: 0.5s">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">Fonctionnalités avancées de recherche et d'analyse</span>
                        </li>
                    </ul>
                    <div class="mt-8 reveal" style="transition-delay: 0.6s">
                        <a href="#contact" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            Demander une démo personnalisée
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 reveal">
                    <div class="relative rounded-xl overflow-hidden shadow-2xl">
                        <div class="relative pb-[56.25%] h-0">
                            <div class="absolute top-0 left-0 w-full h-full bg-gray-300 flex items-center justify-center">
                                <button class="bg-white/90 hover:bg-white text-blue-600 w-20 h-20 rounded-full flex items-center justify-center shadow-xl transform transition-all duration-300 hover:scale-110 pulse">
                                    <i class="fas fa-play text-2xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-blue-900 text-white" id="testimonials">
        <div class="custom-shape-divider-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block bg-blue-800 text-blue-200 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Témoignages
                </span>
                <h2 class="text-4xl font-bold text-white mb-4 reveal" style="transition-delay: 0.1s">
                    Ce que disent nos <br>
                    <span class="bg-gradient-to-r from-blue-300 to-white bg-clip-text text-transparent">clients</span>
                </h2>
                <p class="text-blue-200 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Découvrez comment le SGEC a déjà transformé la gestion des actes d'état civil dans de nombreuses communes.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-blue-800/50 hover:bg-blue-800/70 p-8 rounded-xl shadow-lg transition-all duration-300 reveal" style="transition-delay: 0.1s">
                    <div class="flex items-center mb-4">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Marie Dupont" class="w-12 h-12 rounded-full border-2 border-white">
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-white">Marie Dupont</h4>
                            <p class="text-blue-200 text-sm">Maire de Chantilly</p>
                        </div>
                    </div>
                    <div class="text-blue-100 mb-6">
                        <i class="fas fa-quote-left text-blue-300 mr-2"></i>
                        La mise en place du SGEC a révolutionné notre manière de travailler. Ce qui prenait des heures maintenant se fait en quelques clics. La sécurité des données est impeccable et les citoyens adorent pouvoir faire leurs demandes en ligne.
                        <i class="fas fa-quote-right text-blue-300 ml-2"></i>
                    </div>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-blue-800/50 hover:bg-blue-800/70 p-8 rounded-xl shadow-lg transition-all duration-300 reveal" style="transition-delay: 0.2s">
                    <div class="flex items-center mb-4">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Jean Martin" class="w-12 h-12 rounded-full border-2 border-white">
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-white">Jean Martin</h4>
                            <p class="text-blue-200 text-sm">Responsable état civil, Bordeaux</p>
                        </div>
                    </div>
                    <div class="text-blue-100 mb-6">
                        <i class="fas fa-quote-left text-blue-300 mr-2"></i>
                        Après 25 ans de registres papier, passer au SGEC a été une révélation. Plus d'erreurs de transcription, une recherche ultra-rapide, et une interconnexion parfaite avec nos autres systèmes. L'équipe support est réactive et les mises à jour fréquentes.
                        <i class="fas fa-quote-right text-blue-300 ml-2"></i>
                    </div>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-blue-800/50 hover:bg-blue-800/70 p-8 rounded-xl shadow-lg transition-all duration-300 reveal" style="transition-delay: 0.3s">
                    <div class="flex items-center mb-4">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Sophie Leroy" class="w-12 h-12 rounded-full border-2 border-white">
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-white">Sophie Leroy</h4>
                            <p class="text-blue-200 text-sm">Adjointe au maire, Lyon</p>
                        </div>
                    </div>
                    <div class="text-blue-100 mb-6">
                        <i class="fas fa-quote-left text-blue-300 mr-2"></i>
                        La formation a été très bien menée et en 3 jours toute notre équipe était autonome. Les statistiques intégrées nous permettent maintenant de mieux anticiper nos besoins. Les citoyens apprécient particulièrement la rapidité d'obtention des certificats.
                        <i class="fas fa-quote-right text-blue-300 ml-2"></i>
                    </div>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Notre processus
                </span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal" style="transition-delay: 0.1s">
                    Mise en place en <br>
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">3 étapes simples</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Nous accompagnons chaque collectivité dans sa transition numérique pour une adoption en douceur de notre solution.
                </p>
            </div>
            
            <!-- Timeline -->
            <div class="max-w-4xl mx-auto">
                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row mb-16 timeline-item" style="transition-delay: 0.1s">
                    <div class="md:w-1/3 text-right pr-8 mb-4 md:mb-0">
                        <div class="bg-blue-100 text-blue-800 w-14 h-14 rounded-full flex items-center justify-center text-2xl font-bold shadow-lg float-right">
                            1
                        </div>
                    </div>
                    <div class="md:w-2/3 pl-8 reveal">
                        <div class="relative pb-8">
                            <div class="absolute top-4 -left-4 w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center shadow-lg">
                                <i class="fas fa-handshake text-white"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">Diagnostic & Engagement</h4>
                            <p class="text-gray-600 mb-2">
                                Nous analysons votre organisation actuelle pour proposer une solution parfaitement adaptée à vos besoins.
                            </p>
                            <ul class="list-disc list-inside text-gray-500 text-sm space-y-1">
                                <li>Audit des processus existants</li>
                                <li>Évaluation des besoins spécifiques</li>
                                <li>Planification du déploiement</li>
                            </ul>
                        </div>
                        <div class="absolute left-1/3 w-1 bg-gray-200 h-full top-8 transform -translate-x-1/2 hidden md:block"></div>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col md:flex-row mb-16 timeline-item" style="transition-delay: 0.3s">
                    <div class="md:w-1/3 text-right pr-8 mb-4 md:mb-0">
                        <div class="bg-blue-100 text-blue-800 w-14 h-14 rounded-full flex items-center justify-center text-2xl font-bold shadow-lg float-right">
                            2
                        </div>
                    </div>
                    <div class="md:w-2/3 pl-8 reveal">
                        <div class="relative pb-8">
                            <div class="absolute top-4 -left-4 w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center shadow-lg">
                                <i class="fas fa-graduation-cap text-white"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">Formation & Déploiement</h4>
                            <p class="text-gray-600 mb-2">
                                Nos experts forment votre équipe et supervisent la migration des données vers la nouvelle plateforme.
                            </p>
                            <ul class="list-disc list-inside text-gray-500 text-sm space-y-1">
                                <li>Formation complète des utilisateurs</li>
                                <li>Migration sécurisée des données</li>
                                <li>Configuration personnalisée</li>
                            </ul>
                        </div>
                        <div class="absolute left-1/3 w-1 bg-gray-200 h-full top-8 transform -translate-x-1/2 hidden md:block"></div>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col md:flex-row timeline-item" style="transition-delay: 0.5s">
                    <div class="md:w-1/3 text-right pr-8 mb-4 md:mb-0">
                        <div class="bg-blue-100 text-blue-800 w-14 h-14 rounded-full flex items-center justify-center text-2xl font-bold shadow-lg float-right">
                            3
                        </div>
                    </div>
                    <div class="md:w-2/3 pl-8 reveal">
                        <div class="relative">
                            <div class="absolute top-4 -left-4 w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center shadow-lg">
                                <i class="fas fa-headset text-white"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">Support & Amélioration</h4>
                            <p class="text-gray-600 mb-2">
                                Nous restons à vos côtés pour optimiser l'utilisation du système et déployer les nouvelles fonctionnalités.
                            </p>
                            <ul class="list-disc list-inside text-gray-500 text-sm space-y-1">
                                <li>Support technique réactif</li>
                                <li>Mises à jour régulières</li>
                                <li>Analyse des retours d'expérience</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white" id="pricing">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Nos Offres
                </span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal" style="transition-delay: 0.1s">
                    Tarifs adaptés à <br>
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">chaque collectivité</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Choisissez la formule qui correspond le mieux à votre commune, avec la possibilité d'ajuster selon vos besoins.
                </p>
                
                <div class="mt-8 inline-flex bg-gray-200 rounded-full p-1">
                    <button id="monthly-btn" class="px-6 py-2 rounded-full font-medium text-white bg-blue-600 transition-all reveal">Mensuel</button>
                    <button id="annual-btn" class="px-6 py-2 rounded-full font-medium text-gray-700 hover:text-gray-900 transition-all reveal" style="transition-delay: 0.1s">Annuel (-20%)</button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Plan 1 -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 reveal" style="transition-delay: 0.1s">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Communes &lt;5k hab.</h4>
                                <p class="text-gray-600 text-sm">Parfait pour les petites communes</p>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">Populaire</span>
                        </div>
                        
                        <div class="mt-8">
                            <div class="flex items-end">
                                <span class="text-4xl font-bold text-gray-800 monthly-price">199€</span>
                                <span class="text-4xl font-bold text-gray-800 annual-price hidden">159€</span>
                                <span class="text-gray-600 ml-2 mb-1">/mois</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">
                                <span class="annual-price hidden">Soit 1 908€ par an</span>
                            </p>
                        </div>
                        
                        <button class="w-full mt-6 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 px-4 rounded-lg transition-all duration-300">
                            Choisir cette offre
                        </button>
                    </div>
                    
                    <div class="p-6">
                        <h5 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Ce qui est inclus :</h5>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Jusqu'à 500 actes/mois</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>3 comptes utilisateurs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Stockage 100 Go</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Support par e-mail</span>
                            </li>
                            <li class="flex items-start text-gray-400">
                                <i class="fas fa-times-circle mt-1 mr-3"></i>
                                <span>Formation avancée</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Plan 2 -->
                <div class="bg-white border-2 border-blue-600 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 reveal" style="transition-delay: 0.2s">
                    <div class="bg-blue-600 text-white text-center py-2 text-sm font-bold">
                        Meilleur choix
                    </div>
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Communes 5k-50k hab.</h4>
                                <p class="text-gray-600 text-sm">Solution idéale pour les villes moyennes</p>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">Plus choisi</span>
                        </div>
                        
                        <div class="mt-8">
                            <div class="flex items-end">
                                <span class="text-4xl font-bold text-gray-800 monthly-price">499€</span>
                                <span class="text-4xl font-bold text-gray-800 annual-price hidden">399€</span>
                                <span class="text-gray-600 ml-2 mb-1">/mois</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">
                                <span class="annual-price hidden">Soit 4 788€ par an</span>
                            </p>
                        </div>
                        
                        <button class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                            Commencer maintenant
                        </button>
                    </div>
                    
                    <div class="p-6">
                        <h5 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Tout dans l'offre de base, plus :</h5>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Jusqu'à 2 000 actes/mois</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>10 comptes utilisateurs</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Stockage 500 Go</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Support téléphonique</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>1 journée de formation</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Plan 3 -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 reveal" style="transition-delay: 0.3s">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Communes &gt;50k hab.</h4>
                                <p class="text-gray-600 text-sm">Solution premium pour grandes villes</p>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">Entreprise</span>
                        </div>
                        
                        <div class="mt-8">
                            <div class="flex items-end">
                                <span class="text-4xl font-bold text-gray-800 monthly-price">899€</span>
                                <span class="text-4xl font-bold text-gray-800 annual-price hidden">719€</span>
                                <span class="text-gray-600 ml-2 mb-1">/mois</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">
                                <span class="annual-price hidden">Soit 8 628€ par an</span>
                            </p>
                        </div>
                        
                        <button class="w-full mt-6 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 px-4 rounded-lg transition-all duration-300">
                            Demander un devis
                        </button>
                    </div>
                    
                    <div class="p-6">
                        <h5 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Tout dans l'offre standard, plus :</h5>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Actes illimités</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Comptes illimités</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Stockage 2 To</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Support 24/7</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span>Formation personnalisée</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center reveal">
                <p class="text-gray-600 mb-4">
                    Vous avez des besoins spécifiques ou une intercommunalité ?
                </p>
                <a href="#contact" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    Contactez-nous pour une solution sur mesure
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Questions fréquentes
                </span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4 reveal" style="transition-delay: 0.1s">
                    Tout ce que vous devez savoir <br>
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">sur le SGEC</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Nous avons rassemblé ici les questions les plus fréquemment posées sur notre solution.
                </p>
            </div>
            
            <div class="max-w-3xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden reveal" style="transition-delay: 0.1s">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none flex justify-between items-center">
                        <span class="font-medium text-gray-800">La solution SGEC est-elle conforme au RGPD ?</span>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Absolument. Le SGEC a été conçu dès l'origine pour être pleinement conforme au RGPD. Toutes les données sont stockées en France sur des serveurs certifiés Hébergeurs de Données de Santé (HDS) pour les aspects les plus sensibles. Nous mettons en œuvre des mesures techniques et organisationnelles strictes pour garantir la protection des données personnelles (chiffrement, contrôle d'accès, journalisation des accès, etc.).
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden reveal" style="transition-delay: 0.2s">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none flex justify-between items-center">
                        <span class="font-medium text-gray-800">Comment se passe la migration de nos données existantes ?</span>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Nous prenons en charge intégralement la migration de vos données existantes. Nos experts accompagnent votre équipe pour numériser et structurer vos registres papier ou vos données numériques actuelles. Nous utilisons des processus validés qui garantissent l'intégrité et la confidentialité des données lors de la migration. Un contrôle qualité est systématiquement effectué avant la mise en production.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden reveal" style="transition-delay: 0.3s">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none flex justify-between items-center">
                        <span class="font-medium text-gray-800">Quelles sont les garanties de disponibilité du service ?</span>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Nous garantissons une disponibilité de 99,9% grâce à une infrastructure redondante et hautement disponible. Nos serveurs sont répartis sur deux datacenters géographiquement distincts en France. Un mode dégradé local est également disponible pour assurer la continuité d'activité même en cas de coupure Internet prolongée. Un SLA (Service Level Agreement) détaillé est fourni avec chaque contrat.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden reveal" style="transition-delay: 0.4s">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none flex justify-between items-center">
                        <span class="font-medium text-gray-800">La solution est-elle accessible aux personnes en situation de handicap ?</span>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Oui, le SGEC répond aux exigences du RGAA (Référentiel Général d'Amélioration de l'Accessibilité) niveau AA. L'interface a été conçue pour être utilisable avec des lecteurs d'écran, fonctionne au clavier, propose des contrastes suffisants et des alternatives textuelles pour tous les éléments non textuels. Nous réalisons chaque année un audit d'accessibilité par un organisme indépendant.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden reveal" style="transition-delay: 0.5s">
                    <button class="faq-toggle w-full text-left p-6 focus:outline-none flex justify-between items-center">
                        <span class="font-medium text-gray-800">Comment évolue la solution dans le temps ?</span>
                        <i class="fas fa-chevron-down text-blue-600 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content px-6 pb-6 hidden">
                        <p class="text-gray-600">
                            Le SGEC bénéficie de mises à jour régulières (environ tous les 2 mois) comprenant des améliorations fonctionnelles, des adaptations réglementaires et des corrections. Ces mises à jour sont incluses dans votre abonnement. Nous avons également un programme d'innovation continu qui intègre les retours de nos clients. Vous pouvez suggérer des évolutions via votre espace client et voter pour les fonctionnalités les plus demandées.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center reveal">
                <p class="text-gray-600 mb-4">
                    Vous ne trouvez pas de réponse à votre question ?
                </p>
                <a href="#contact" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    Contactez notre équipe support
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white" id="about">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0 md:pr-12 reveal">
                    <img src="https://img.freepik.com/free-vector/teamwork-concept-illustration_114360-1179.jpg" alt="About SGEC" class="rounded-xl shadow-xl w-full">
                    <div class="mt-8 bg-blue-100/30 p-6 rounded-xl border-l-4 border-blue-600">
                        <div class="flex items-start">
                            <div class="bg-blue-600 text-white p-3 rounded-full mr-4">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2">Notre engagement</h4>
                                <p class="text-gray-600">
                                    Nous nous engageons à fournir une solution éthique, respectueuse des données personnelles et au service de l'intérêt général.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 reveal">
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4">
                        À propos
                    </span>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">
                        Nous modernisons l'administration <br>
                        <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">des actes d'état civil</span>
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Fondé en 2015, notre groupe spécialisé dans les solutions logicielles pour les administrations publiques a développé le SGEC pour répondre aux besoins croissants de digitalisation des services d'état civil.
                    </p>
                    <p class="text-gray-600 mb-8">
                        Notre équipe de 45 experts (développeurs, juristes, designers UX) travaille en étroite collaboration avec les institutions publiques pour concevoir des solutions à la fois innovantes et parfaitement adaptées aux contraintes du secteur public.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Certifié</h4>
                                <p class="text-gray-500 text-sm">ISO 27001 & RGPD</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Localisation</h4>
                                <p class="text-gray-500 text-sm">Data centers en France</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Clients</h4>
                                <p class="text-gray-500 text-sm">250+ collectivités</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Satisfaction</h4>
                                <p class="text-gray-500 text-sm">98% de clients satisfaits</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#contact" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Rencontrer notre équipe
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Section -->
    <section class="py-20 bg-gray-50" id="login">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="bg-gradient-to-br from-blue-700 to-indigo-800 p-10 text-white relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-full opacity-10">
                            <div class="absolute top-20 left-20 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
                            <div class="absolute bottom-20 right-20 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
                        </div>
                        <div class="relative z-10">
                            <h2 class="text-3xl font-bold mb-6">Accédez à votre espace SGEC</h2>
                            <p class="text-blue-200 mb-8">
                                Connectez-vous pour gérer vos actes d'état civil, consulter les statistiques et accéder à toutes les fonctionnalités.
                            </p>
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="bg-blue-600/30 p-3 rounded-full mr-4">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">Authentification sécurisée</h4>
                                        <p class="text-blue-200 text-sm">Double authentification disponible</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-blue-600/30 p-3 rounded-full mr-4">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">Suivi des activités</h4>
                                        <p class="text-blue-200 text-sm">Journalisation complète des accès</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-blue-600/30 p-3 rounded-full mr-4">
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">Besoin d'aide ?</h4>
                                        <p class="text-blue-200 text-sm">Contactez notre support technique</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-10">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Connectez-vous</h3>
                        <form>
                            <div class="mb-5">
                                <label class="block text-gray-700 font-medium mb-2">Identifiant</label>
                                <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" placeholder="Votre identifiant">
                            </div>
                            <div class="mb-5">
                                <label class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                                <input type="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" placeholder="Votre mot de passe">
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-800 mt-2 inline-block">Mot de passe oublié ?</a>
                            </div>
                            <div class="flex items-center mb-5">
                                <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                                Se connecter
                            </button>
                        </form>
                        <div class="mt-6 text-center">
                            <p class="text-gray-600">Vous n'avez pas encore de compte ?</p>
                            <a href="#contact" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center mt-2">
                                Demander un accès
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-gray-900 text-white" id="contact">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block bg-blue-800 text-blue-200 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Contact
                </span>
                <h2 class="text-4xl font-bold text-white mb-4 reveal" style="transition-delay: 0.1s">
                    Parlons de votre <br>
                    <span class="bg-gradient-to-r from-blue-400 to-white bg-clip-text text-transparent">projet</span>
                </h2>
                <p class="text-blue-200 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Notre équipe est à votre écoute pour répondre à toutes vos questions et vous accompagner dans votre projet de digitalisation.
                </p>
            </div>
            
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div class="reveal">
                        <h3 class="text-2xl font-bold mb-8">Nos coordonnées</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-blue-800/50 p-3 rounded-lg mr-6">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Adresse</h4>
                                    <p class="text-blue-200">
                                        123 Avenue de l'État Civil<br>
                                        75001 Paris, France
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-800/50 p-3 rounded-lg mr-6">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Téléphone</h4>
                                    <p class="text-blue-200">
                                        Standard : +33 1 23 45 67 89<br>
                                        Support technique : +33 1 23 45 67 90
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-800/50 p-3 rounded-lg mr-6">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Email</h4>
                                    <p class="text-blue-200">
                                        Commercial : contact@sgec.fr<br>
                                        Support : support@sgec.fr
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-800/50 p-3 rounded-lg mr-6">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Horaires</h4>
                                    <p class="text-blue-200">
                                        Lundi - Vendredi : 8h30 - 18h30<br>
                                        Samedi : 9h - 13h
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="font-bold text-lg mt-10 mb-4">Suivez-nous</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-blue-800/50 hover:bg-blue-800/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="bg-blue-800/50 hover:bg-blue-800/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="bg-blue-800/50 hover:bg-blue-800/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="bg-blue-800/50 hover:bg-blue-800/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="reveal" style="transition-delay: 0.1s">
                        <h3 class="text-2xl font-bold mb-8">Envoyez-nous un message</h3>
                        
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-blue-200 font-medium mb-2">Nom</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre nom">
                                </div>
                                <div>
                                    <label class="block text-blue-200 font-medium mb-2">Prénom</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre prénom">
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-blue-200 font-medium mb-2">Email</label>
                                <input type="email" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre email">
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-blue-200 font-medium mb-2">Collectivité</label>
                                <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre commune ou administration">
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-blue-200 font-medium mb-2">Sujet</label>
                                <select class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white">
                                    <option>Demande d'information</option>
                                    <option>Support technique</option>
                                    <option>Demande de démonstration</option>
                                    <option>Recrutement</option>
                                    <option>Autre</option>
                                </select>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-blue-200 font-medium mb-2">Message</label>
                                <textarea rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre message"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                                Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div class="h-96 bg-gray-200 overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.77824544158!2d2.2646348923437323!3d48.858950680977986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1623245678901!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" class="filter grayscale-50 contrast-75"></iframe>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="sparkle">
                            <i class="fas fa-certificate text-2xl text-blue-400"></i>
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-blue-400 to-white bg-clip-text text-transparent">SGEC</h3>
                    </div>
                    <p class="text-blue-200 mb-4">
                        Système de Gestion des Actes d'État Civil - Une solution moderne pour une gestion efficace et sécurisée.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-300 hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-blue-300 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-blue-300 hover:text-white transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-blue-300 hover:text-white transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Navigation</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-blue-200 hover:text-white transition">Accueil</a></li>
                        <li><a href="#features" class="text-blue-200 hover:text-white transition">Fonctionnalités</a></li>
                        <li><a href="#pricing" class="text-blue-200 hover:text-white transition">Tarifs</a></li>
                        <li><a href="#about" class="text-blue-200 hover:text-white transition">À propos</a></li>
                        <li><a href="#testimonials" class="text-blue-200 hover:text-white transition">Témoignages</a></li>
                        <li><a href="#contact" class="text-blue-200 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Ressources</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Documentation</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Support technique</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Mises à jour</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Presse</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Mentions légales</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-blue-200 hover:text-white transition">CGU</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Politique de confidentialité</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">RGPD</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Plan du site</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Accessibilité</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white transition">Relations presse</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="text-blue-300 text-sm mb-4 md:mb-0">
                    © 2023 SGEC - Tous droits réservés
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-blue-300 hover:text-white text-sm transition">Mentions légales</a>
                    <a href="#" class="text-blue-300 hover:text-white text-sm transition">Politique de confidentialité</a>
                    <a href="#" class="text-blue-300 hover:text-white text-sm transition">Conditions d'utilisation</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('show');
        });

        // Pricing toggle
        document.getElementById('monthly-btn').addEventListener('click', function() {
            this.classList.add('bg-blue-600', 'text-white');
            this.classList.remove('text-gray-700', 'hover:text-gray-900');
            document.getElementById('annual-btn').classList.remove('bg-blue-600', 'text-white');
            document.getElementById('annual-btn').classList.add('text-gray-700', 'hover:text-gray-900');
            
            document.querySelectorAll('.monthly-price').forEach(el => el.classList.remove('hidden'));
            document.querySelectorAll('.annual-price').forEach(el => el.classList.add('hidden'));
        });

        document.getElementById('annual-btn').addEventListener('click', function() {
            this.classList.add('bg-blue-600', 'text-white');
            this.classList.remove('text-gray-700', 'hover:text-gray-900');
            document.getElementById('monthly-btn').classList.remove('bg-blue-600', 'text-white');
            document.getElementById('monthly-btn').classList.add('text-gray-700', 'hover:text-gray-900');
            
            document.querySelectorAll('.annual-price').forEach(el => el.classList.remove('hidden'));
            document.querySelectorAll('.monthly-price').forEach(el => el.classList.add('hidden'));
        });

        // FAQ toggle
        document.querySelectorAll('.faq-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('i');
                
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });

        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.reveal');

        const revealOnScroll = function() {
            for (let i = 0; i < revealElements.length; i++) {
                const windowHeight = window.innerHeight;
                const revealTop = revealElements[i].getBoundingClientRect().top;
                const revealPoint = 150;

                if (revealTop < windowHeight - revealPoint) {
                    revealElements[i].classList.add('active');
                }
            }
        };

        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll); // Trigger on page load for elements already in view

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100, // Adjust for fixed header
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Timeline animation
        const timelineItems = document.querySelectorAll('.timeline-item');

        const timelineOnScroll = function() {
            for (let i = 0; i < timelineItems.length; i++) {
                const windowHeight = window.innerHeight;
                const itemTop = timelineItems[i].getBoundingClientRect().top;
                const itemPoint = 150;

                if (itemTop < windowHeight - itemPoint) {
                    timelineItems[i].classList.add('active');
                }
            }
        };

        window.addEventListener('scroll', timelineOnScroll);
        window.addEventListener('load', timelineOnScroll);

        // Create particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles-js');
            
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 5 + 1;
                const posX = Math.random() * window.innerWidth;
                const posY = Math.random() * window.innerHeight;
                const delay = Math.random() * 5;
                const duration = Math.random() * 10 + 10;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}px`;
                particle.style.top = `${posY}px`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.opacity = Math.random() * 0.5;
                
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles when page loads
        window.addEventListener('load', createParticles);

        // Update nav link active state on scroll
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');

        function updateActiveNavLink() {
            let scrollPosition = window.scrollY + 150;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    navLinks.forEach(link => {
                        link.classList.remove('text-blue-300');
                        if (link.getAttribute('href') === `#${sectionId}`) {
                            link.classList.add('text-blue-300');
                        }
                    });
                }
            });
        }

        window.addEventListener('scroll', updateActiveNavLink);
        window.addEventListener('load', updateActiveNavLink);
    </script>
</body>
</html>