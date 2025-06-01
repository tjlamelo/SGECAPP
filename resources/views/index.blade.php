<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGEC - Système de Gestion des Actes d'État Civil | Cameroun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --cameroon-green: #007A5E;
            --cameroon-red: #CE1126;
            --cameroon-yellow: #FCD116;
            --cameroon-dark: #1A2B3C;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }
        
        .cameroon-bg {
            background: linear-gradient(45deg, var(--cameroon-green) 0%, var(--cameroon-red) 33%, var(--cameroon-yellow) 66%, var(--cameroon-green) 100%);
            background-size: 300% 300%;
            animation: gradientBG 15s ease infinite;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .coat-of-arms {
            width: 90px;
            height: 90px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }
        
        .official-title {
            font-weight: 700;
            color: var(--cameroon-dark);
            letter-spacing: 0.5px;
        }
        
        .cameroun-map {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.03;
            z-index: 0;
            pointer-events: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600"><path d="M400,100 C450,120 500,150 550,180 C600,210 650,250 700,300 C650,350 600,400 550,450 C500,500 450,550 400,580 C350,550 300,500 250,450 C200,400 150,350 100,300 C150,250 200,200 250,150 C300,130 350,110 400,100 Z" fill="%23007A5E"/></svg>');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .cameroon-flag {
            width: 30px;
            height: 20px;
            background: linear-gradient(to right, 
                var(--cameroon-green) 0%, 
                var(--cameroon-green) 33.33%, 
                var(--cameroon-red) 33.33%, 
                var(--cameroon-red) 66.66%, 
                var(--cameroon-yellow) 66.66%, 
                var(--cameroon-yellow) 100%);
            display: inline-block;
            margin-right: 8px;
            border-radius: 2px;
            vertical-align: middle;
        }
        
        .btn-cameroon {
            background: var(--cameroon-green);
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        
        .btn-cameroon:hover {
            background: #00634d;
            transform: translateY(-2px);
        }
        
        .card-glow:hover {
            box-shadow: 0 0 30px -5px rgba(0, 122, 94, 0.5);
        }
        
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }
        
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        .header-banner {
            background: linear-gradient(90deg, 
                var(--cameroon-green) 0%, 
                var(--cameroon-green) 33.33%, 
                var(--cameroon-red) 33.33%, 
                var(--cameroon-red) 66.66%, 
                var(--cameroon-yellow) 66.66%, 
                var(--cameroon-yellow) 100%);
            height: 8px;
            width: 100%;
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--cameroon-yellow);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
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
        
        .card-3d {
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            transform-style: preserve-3d;
        }
        
        .card-3d:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }
        
        .mobile-menu.show {
            max-height: 500px;
        }
        
        .feature-icon {
            background: linear-gradient(135deg, var(--cameroon-green), var(--cameroon-yellow));
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .ministry-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                         url('https://www.cameroon-tribune.cm/sites/default/files/styles/amp_metadata_content_image_min_696px_wide/public/2023-01/mint.jpg') no-repeat center center;
            background-size: cover;
        }
    </style>
</head>
<body class="min-h-screen relative">
    <!-- Bandeau national -->
    <div class="fixed top-0 left-0 w-full h-2 cameroon-bg z-50"></div>
    
    <!-- Navigation -->
    <nav class="bg-gray-900/90 backdrop-blur-md text-white shadow-xl fixed w-full top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-white rounded-full p-2 shadow-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Coat_of_arms_of_Cameroon.svg" 
                         alt="Armoiries du Cameroun" 
                         class="coat-of-arms">
                </div>
                <a href="#home" class="text-2xl font-bold bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent">
                    SGEC Cameroun
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="relative px-2 py-1 nav-link hover:text-yellow-300 transition-all duration-300">
                    Accueil
                </a>
                <a href="#features" class="relative px-2 py-1 nav-link hover:text-yellow-300 transition-all duration-300">
                    Fonctionnalités
                </a>
                <a href="#about" class="relative px-2 py-1 nav-link hover:text-yellow-300 transition-all duration-300">
                    À propos
                </a>
                <a href="#ministry" class="relative px-2 py-1 nav-link hover:text-yellow-300 transition-all duration-300">
                    Ministère
                </a>
                <a href="#contact" class="relative px-2 py-1 nav-link hover:text-yellow-300 transition-all duration-300">
                    Contact
                </a>
            </div>
            <a href="{{ route('login') }}" class="hidden md:block bg-yellow-400 text-gray-900 font-bold py-2 px-6 rounded-full hover:bg-yellow-300 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Connexion
            </a>
            <button class="md:hidden focus:outline-none" id="mobile-menu-button">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Menu mobile -->
        <div class="mobile-menu bg-gray-800/95 backdrop-blur-sm md:hidden" id="mobile-menu">
            <div class="px-5 py-3 space-y-2">
                <a href="#home" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-gray-700/50 transition-all duration-300">Accueil</a>
                <a href="#features" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-gray-700/50 transition-all duration-300">Fonctionnalités</a>
                <a href="#about" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-gray-700/50 transition-all duration-300">À propos</a>
                <a href="#ministry" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-gray-700/50 transition-all duration-300">Ministère</a>
                <a href="#contact" class="block px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-gray-700/50 transition-all duration-300">Contact</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-center bg-yellow-400 text-gray-900 hover:bg-yellow-300 transition-all duration-300">
                    Connexion
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-32 pb-20 md:pt-40 md:pb-24 px-4 bg-gradient-to-b from-gray-50 to-white" id="home">
        <div class="absolute top-0 left-0 w-full h-full cameroun-map"></div>
        
        <div class="container mx-auto relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                        Innovation numérique
                    </span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-6 leading-tight reveal" style="transition-delay: 0.1s">
                        Système de Gestion des <br>
                        <span class="bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text text-transparent">Actes d'État Civil</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8 max-w-lg reveal" style="transition-delay: 0.2s">
                        Une solution complète pour centraliser, sécuriser et moderniser la gestion des actes d'état civil au Cameroun.
                    </p>
                    <div class="flex flex-wrap gap-4 reveal" style="transition-delay: 0.3s">
                        <a href="{{ route('login') }}" class="btn-cameroon text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center">
                            <span>Accéder au système</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#features" class="bg-white hover:bg-gray-100 text-green-700 font-bold py-4 px-6 rounded-lg border border-green-200 transition-all duration-300 transform hover:scale-105 shadow flex items-center">
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
                            <p class="text-gray-600 text-sm">Utilisé par <span class="font-bold text-green-600">120+ communes</span></p>
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
                        <div class="absolute -top-8 -left-8 w-32 h-32 bg-green-100 rounded-full z-0 animate-pulse"></div>
                        <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-yellow-100 rounded-full z-0 animate-pulse animation-delay-2000"></div>
                        <div class="relative z-10 card-3d max-w-lg">
                            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                                <div class="bg-green-600 p-4 text-white font-bold text-center">
                                    Tableau de bord SGEC
                                </div>
                                <div class="p-4 bg-white">
                                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-64 flex items-center justify-center text-gray-500">
                                        Aperçu du tableau de bord
                                    </div>
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
                            <i class="fas fa-file-certificate text-5xl text-green-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-12 bg-gray-50 border-t border-b border-gray-200">
        <div class="container mx-auto px-4">
            <p class="text-center text-gray-500 text-sm mb-8 reveal">Utilisé par les communes camerounaises :</p>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-center">
                <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                    <div class="font-bold text-green-700">Yaoundé</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                    <div class="font-bold text-green-700">Douala</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                    <div class="font-bold text-green-700">Garoua</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                    <div class="font-bold text-green-700">Bamenda</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                    <div class="font-bold text-green-700">Bafoussam</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                    <div class="font-bold text-green-700">Maroua</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white" id="features">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Fonctionnalités
                </span>
                <h2 class="text-3xl font-bold text-gray-800 mb-4 reveal" style="transition-delay: 0.1s">
                    Modernisez la gestion <br> 
                    <span class="bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text text-transparent">des actes d'état civil</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Découvrez les fonctionnalités clés qui font de notre solution l'outil idéal pour les communes camerounaises.
                </p>
            </div>
            
            <!-- Featured Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.1s">
                    <div class="feature-icon">
                        <i class="fas fa-edit text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Enregistrement simplifié</h3>
                    <p class="text-gray-600 mb-4">
                        Saisie dématérialisée des actes avec vérification automatique et assistance intelligente adaptée aux besoins locaux.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.2s">
                    <div class="feature-icon">
                        <i class="fas fa-folder-open text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Archivage sécurisé</h3>
                    <p class="text-gray-600 mb-4">
                        Stockage numérique certifié avec chiffrement avancé et sauvegarde automatique redondante sur le territoire national.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.3s">
                    <div class="feature-icon">
                        <i class="fas fa-network-wired text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Interconnexion nationale</h3>
                    <p class="text-gray-600 mb-4">
                        Synchronisation avec les registres centraux et autres systèmes administratifs nationaux.
                    </p>
                </div>
                
                <!-- Feature 4 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.4s">
                    <div class="feature-icon">
                        <i class="fas fa-certificate text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Certificats officiels</h3>
                    <p class="text-gray-600 mb-4">
                        Génération instantanée de certificats avec signature électronique reconnue par l'État.
                    </p>
                </div>
                
                <!-- Feature 5 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.5s">
                    <div class="feature-icon">
                        <i class="fas fa-search text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Recherche avancée</h3>
                    <p class="text-gray-600 mb-4">
                        Recherche multicritères avec reconnaissance de noms similaires adaptée aux spécificités locales.
                    </p>
                </div>
                
                <!-- Feature 6 -->
                <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 card-glow reveal" style="transition-delay: 0.6s">
                    <div class="feature-icon">
                        <i class="fas fa-chart-bar text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Statistiques démographiques</h3>
                    <p class="text-gray-600 mb-4">
                        Tableaux de bord personnalisables avec indicateurs clés pour le suivi démographique national.
                    </p>
                </div>
            </div>
            
            <!-- CTA -->
            <div class="mt-20 text-center reveal">
                <div class="bg-gradient-to-r from-green-600 to-yellow-500 rounded-2xl p-8 shadow-xl relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-60 h-60 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-20 -left-20 w-60 h-60 rounded-full bg-white/10"></div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold text-white mb-4">Prêt à moderniser votre gestion d'état civil ?</h3>
                        <p class="text-green-100 mb-6 max-w-2xl mx-auto">
                            Découvrez comment notre solution peut transformer vos processus administratifs.
                        </p>
                        <div class="flex flex-col md:flex-row justify-center space-y-3 md:space-y-0 md:space-x-4">
                            <a href="#contact" class="bg-white hover:bg-gray-100 text-green-700 font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
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

    <!-- Ministry Section -->
    <section class="py-20 ministry-section text-white" id="ministry">
        <div class="custom-shape-divider-top">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                    <div class="bg-white rounded-full p-3 inline-flex items-center justify-center mb-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Coat_of_arms_of_Cameroon.svg" 
                             alt="Armoiries du Cameroun" 
                             class="coat-of-arms">
                    </div>
                    <h2 class="text-3xl font-bold mb-6">Ministère de l'Administration Territoriale</h2>
                    <p class="text-green-100 mb-6">
                        Le SGEC est le système officiel de gestion des états civils approuvé par le Ministère de l'Administration Territoriale de la République du Cameroun. 
                        Conformément aux lois et réglementations nationales, notre solution garantit l'intégrité et la sécurité des données d'état civil.
                    </p>
                    <div class="flex justify-center">
                        <a href="#" class="bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center">
                            <i class="fas fa-file-alt mr-2"></i>
                            Circulaire ministérielle
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white" id="about">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0 md:pr-12 reveal">
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-96 flex items-center justify-center text-gray-500">
                        Illustration du système
                    </div>
                </div>
                <div class="md:w-1/2 reveal">
                    <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4">
                        À propos
                    </span>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">
                        Moderniser l'administration <br>
                        <span class="bg-gradient-to-r from-green-600 to-yellow-500 bg-clip-text text-transparent">des actes d'état civil</span>
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Développé spécifiquement pour le contexte camerounais, le SGEC répond aux besoins uniques des communes et des citoyens en matière de gestion des actes d'état civil.
                    </p>
                    <p class="text-gray-600 mb-8">
                        Notre équipe de développeurs, juristes et spécialistes en administration publique travaille en étroite collaboration avec les autorités locales pour assurer une solution adaptée et efficace.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="flex items-start">
                            <div class="bg-green-100 text-green-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Certifié</h4>
                                <p class="text-gray-500 text-sm">Normes nationales</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 text-green-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Localisation</h4>
                                <p class="text-gray-500 text-sm">Data centers au Cameroun</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 text-green-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Communes</h4>
                                <p class="text-gray-500 text-sm">120+ communes utilisatrices</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-green-100 text-green-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Satisfaction</h4>
                                <p class="text-gray-500 text-sm">97% de satisfaction</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#contact" class="inline-flex items-center btn-cameroon text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Contactez-nous
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
                    <div class="bg-gradient-to-br from-green-700 to-green-900 p-10 text-white relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-full opacity-10">
                            <div class="absolute top-20 left-20 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
                            <div class="absolute bottom-20 right-20 w-64 h-64 bg-white rounded-full filter blur-3xl"></div>
                        </div>
                        <div class="relative z-10">
                            <h2 class="text-3xl font-bold mb-6">Accédez à votre espace SGEC</h2>
                            <p class="text-green-200 mb-8">
                                Connectez-vous pour gérer les actes d'état civil de votre commune.
                            </p>
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="bg-green-600/30 p-3 rounded-full mr-4">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">Sécurité renforcée</h4>
                                        <p class="text-green-200 text-sm">Protection des données sensibles</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-green-600/30 p-3 rounded-full mr-4">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold">Suivi des activités</h4>
                                        <p class="text-green-200 text-sm">Journalisation complète des accès</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-10">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Connexion administrateur</h3>
                        <form>
                            <div class="mb-5">
                                <label class="block text-gray-700 font-medium mb-2">Identifiant</label>
                                <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-transparent" placeholder="Votre identifiant">
                            </div>
                            <div class="mb-5">
                                <label class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                                <input type="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-300 focus:border-transparent" placeholder="Votre mot de passe">
                                <a href="#" class="text-sm text-green-600 hover:text-green-800 mt-2 inline-block">Mot de passe oublié ?</a>
                            </div>
                            <div class="flex items-center mb-5">
                                <input type="checkbox" id="remember" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="w-full btn-cameroon text-white font-bold py-4 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                                Se connecter
                            </button>
                        </form>
                        <div class="mt-6 text-center">
                            <p class="text-gray-600">Vous n'avez pas encore de compte ?</p>
                            <a href="#contact" class="text-green-600 hover:text-green-800 font-medium inline-flex items-center mt-2">
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
                <span class="inline-block bg-green-800 text-green-200 text-xs px-3 py-1 rounded-full uppercase font-semibold tracking-wide mb-4 reveal">
                    Contact
                </span>
                <h2 class="text-3xl font-bold text-white mb-4 reveal" style="transition-delay: 0.1s">
                    Contactez notre <br>
                    <span class="bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent">équipe d'assistance</span>
                </h2>
                <p class="text-green-200 max-w-2xl mx-auto reveal" style="transition-delay: 0.2s">
                    Notre équipe est à votre disposition pour toute question ou demande d'assistance technique.
                </p>
            </div>
            
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div class="reveal">
                        <h3 class="text-2xl font-bold mb-8">Coordonnées</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-green-800/50 p-3 rounded-lg mr-6">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Adresse</h4>
                                    <p class="text-green-200">
                                        Ministère de l'Administration Territoriale<br>
                                        Yaoundé, Cameroun
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-800/50 p-3 rounded-lg mr-6">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Téléphone</h4>
                                    <p class="text-green-200">
                                        Standard : +237 222 22 22 22<br>
                                        Support : +237 233 33 33 33
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-800/50 p-3 rounded-lg mr-6">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Email</h4>
                                    <p class="text-green-200">
                                        Contact : contact@sgec.cm<br>
                                        Support : support@sgec.cm
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="font-bold text-lg mt-10 mb-4">Heures d'ouverture</h4>
                        <p class="text-green-200">
                            Lundi - Vendredi : 7h30 - 15h30<br>
                            Samedi : 8h - 12h
                        </p>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="reveal" style="transition-delay: 0.1s">
                        <h3 class="text-2xl font-bold mb-8">Envoyez-nous un message</h3>
                        
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-green-200 font-medium mb-2">Nom</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre nom">
                                </div>
                                <div>
                                    <label class="block text-green-200 font-medium mb-2">Prénom</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre prénom">
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-green-200 font-medium mb-2">Email</label>
                                <input type="email" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre email">
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-green-200 font-medium mb-2">Commune</label>
                                <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre commune">
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-green-200 font-medium mb-2">Sujet</label>
                                <select class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-white">
                                    <option>Demande d'information</option>
                                    <option>Support technique</option>
                                    <option>Demande de démonstration</option>
                                    <option>Autre</option>
                                </select>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-green-200 font-medium mb-2">Message</label>
                                <textarea rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-white placeholder-gray-500" placeholder="Votre message"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full btn-cameroon text-white font-bold py-4 px-4 rounded-lg transition-all duration-300 transform hover:scale-105">
                                Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="bg-white rounded-full p-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Coat_of_arms_of_Cameroon.svg" 
                                 alt="Armoiries du Cameroun" 
                                 class="coat-of-arms">
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-green-400 to-yellow-300 bg-clip-text text-transparent">SGEC Cameroun</h3>
                    </div>
                    <p class="text-green-200 mb-4">
                        Système officiel de gestion des états civils de la République du Cameroun.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Navigation</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-green-200 hover:text-white transition">Accueil</a></li>
                        <li><a href="#features" class="text-green-200 hover:text-white transition">Fonctionnalités</a></li>
                        <li><a href="#about" class="text-green-200 hover:text-white transition">À propos</a></li>
                        <li><a href="#ministry" class="text-green-200 hover:text-white transition">Ministère</a></li>
                        <li><a href="#contact" class="text-green-200 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Ressources</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-green-200 hover:text-white transition">Documentation</a></li>
                        <li><a href="#" class="text-green-200 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-green-200 hover:text-white transition">Support technique</a></li>
                        <li><a href="#" class="text-green-200 hover:text-white transition">Formations</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Mentions légales</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-green-200 hover:text-white transition">CGU</a></li>
                        <li><a href="#" class="text-green-200 hover:text-white transition">Confidentialité</a></li>
                        <li><a href="#" class="text-green-200 hover:text-white transition">Accessibilité</a></li>
                        <li><a href="#" class="text-green-200 hover:text-white transition">Plan du site</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="text-green-300 text-sm mb-4 md:mb-0">
                    © 2023 République du Cameroun - Tous droits réservés
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-green-300 hover:text-white text-sm transition">Mentions légales</a>
                    <a href="#" class="text-green-300 hover:text-white text-sm transition">Politique de confidentialité</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('show');
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
        window.addEventListener('load', revealOnScroll);

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>