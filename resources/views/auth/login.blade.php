<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système de Gestion des États Civils | Cameroun</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cameroon-green: #007A5E;
            --cameroon-red: #CE1126;
            --cameroon-yellow: #FCD116;
            --cameroon-dark: #1A2B3C;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f0f7fa 0%, #e6f3e9 100%);
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="white" opacity="0.9"/><path d="M0,50 Q25,30 50,50 T100,50" fill="none" stroke="%23007A5E" stroke-width="0.5" opacity="0.1"/></svg>');
            min-height: 100vh;
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
        
        .login-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .input-field {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
            padding-left: 40px;
        }
        
        .input-field:focus {
            border-color: var(--cameroon-green);
            box-shadow: 0 0 0 3px rgba(0, 122, 94, 0.2);
        }
        
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--cameroon-green);
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
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #718096;
        }
        
        .password-toggle:hover {
            color: var(--cameroon-green);
        }
        
        .language-switcher {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }
        
        .footer-links a:hover {
            color: var(--cameroon-green);
            text-decoration: underline;
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
        
        .coat-of-arms {
            width: 90px;
            height: 90px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }
        
        .official-title {
            font-family: 'Playfair Display', serif;
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
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <!-- Bandeau de couleurs nationales -->
    <div class="fixed top-0 left-0 w-full h-2 cameroon-bg z-50"></div>
    
    <div class="language-switcher">
        <button class="bg-white px-3 py-2 rounded-lg shadow text-sm font-medium flex items-center">
            <span class="cameroon-flag"></span>
            Français
            <i class="fas fa-chevron-down ml-2 text-gray-500"></i>
        </button>
    </div>
    
    <div class="w-full max-w-xl">
        <!-- En-tête officiel avec armoiries -->
        <div class="text-center mb-8">
            <div class="relative flex flex-col items-center">
                <!-- Armoiries du Cameroun -->
                <div class="bg-white rounded-full p-3 shadow-lg inline-flex items-center justify-center mb-4 border-2 border-gold-100">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Coat_of_arms_of_Cameroon.svg" 
                         alt="Armoiries de la République du Cameroun" 
                         class="coat-of-arms">
                </div>
                
                <div class="mb-2">
                    <h1 class="official-title text-3xl">République du Cameroun</h1>
                    <div class="w-24 h-1 bg-green-600 mx-auto mt-2 mb-3 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-gray-800">Système de Gestion des États Civils</h2>
                    <p class="text-gray-600 mt-2">Ministère de l'Administration Territoriale</p>
                </div>
            </div>
        </div>
        
        <!-- Carte de connexion -->
        <div class="login-card bg-white relative overflow-hidden">
            <!-- Fond avec silhouette du Cameroun -->
            <div class="cameroun-map">
                <svg viewBox="0 0 1000 600" xmlns="http://www.w3.org/2000/svg">
                    <path d="M510,120 L530,140 L540,160 L550,180 L560,200 L570,220 L580,240 L590,260 L600,280 L610,300 L620,320 L630,340 L640,360 L650,380 L660,400 L670,420 L680,440 L690,460 L700,480 L710,500 L720,520 L730,540 L740,560 L750,580 L760,600 L770,620 L780,640 L790,660 L800,680 L810,700 L820,720 L830,740 L840,760 L850,780 L860,800 L870,820 L880,840 L890,860 L900,880 L910,900 L920,920 L930,940 L940,960 L950,980 L960,1000 L970,1020 L980,1040 L990,1060 L1000,1080" 
                          fill="var(--cameroon-green)" 
                          opacity="0.1" />
                </svg>
            </div>
            
            <div class="relative z-10">
                <div class="px-8 pt-8">
                    <div class="text-center mb-2">
                        <h2 class="text-2xl font-bold text-gray-800">Portail d'Accès Sécurisé</h2>
                        <p class="text-gray-600 mt-2">Identifiez-vous pour accéder au système</p>
                    </div>
                    
                    <!-- Message d'erreur -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 text-red-700 p-4 rounded-lg border border-red-200">
                            <div class="font-medium flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                Erreur d'authentification
                            </div>
                            <ul class="mt-2 list-disc pl-5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                
                <form method="POST" action="{{ route('login') }}" class="px-8 pb-8">
                    @csrf
                    
                    <div class="mb-5 relative">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse Institutionnelle</label>
                        <div class="relative">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="input-field w-full py-3 px-4 rounded-lg focus:outline-none"
                                placeholder="prenom.nom@gouv.cm">
                        </div>
                    </div>
                    
                    <div class="mb-5 relative">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password" id="password" required
                                class="input-field w-full py-3 px-4 rounded-lg focus:outline-none pr-10"
                                placeholder="••••••••">
                            <span class="password-toggle" id="password-toggle">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Maintenir la session</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-green-600 hover:text-green-500">Mot de passe oublié?</a>
                        </div>
                    </div>
                    
                    <button type="submit"
                        class="btn-cameroon w-full text-white py-3 px-4 rounded-lg font-medium text-base flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Accéder au système
                    </button>
                    
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Vous n'avez pas de compte? 
                            <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500">S'inscrire</a>
                        </p>
                    </div>
                </form>
                
                <!-- Bandeau de sécurité -->
                <div class="bg-gray-50 border-t py-3 px-8 flex items-center text-sm">
                    <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                    <span>Système sécurisé - Données cryptées - Conformité RGPD</span>
                </div>
            </div>
        </div>
        
        <!-- Pied de page officiel -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <div class="footer-links flex justify-center space-x-6 mb-3">
                <a href="#" class="hover:text-green-700 flex items-center">
                    <i class="fas fa-question-circle mr-1"></i> Assistance
                </a>
                <a href="#" class="hover:text-green-700 flex items-center">
                    <i class="fas fa-file-contract mr-1"></i> Conditions
                </a>
                <a href="#" class="hover:text-green-700 flex items-center">
                    <i class="fas fa-lock mr-1"></i> Confidentialité
                </a>
                <a href="#" class="hover:text-green-700 flex items-center">
                    <i class="fas fa-phone-alt mr-1"></i> Contact
                </a>
            </div>
            <p class="mt-4">
                <i class="far fa-copyright"></i> 2023 République du Cameroun - Tous droits réservés
            </p>
            <p class="mt-2 flex items-center justify-center">
                <span class="cameroon-flag"></span>
                Système National de Gestion des États Civils
            </p>
        </div>
    </div>
    
    <script>
        // Toggle password visibility
        document.getElementById('password-toggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Animation on focus for inputs
        const inputs = document.querySelectorAll('.input-field');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.input-icon').style.color = '#007A5E';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.input-icon').style.color = '#007A5E';
            });
        });
        
        // Add subtle animation to coat of arms
        const coatOfArms = document.querySelector('.coat-of-arms');
        coatOfArms.addEventListener('mouseenter', () => {
            coatOfArms.style.transform = 'scale(1.05)';
            coatOfArms.style.transition = 'transform 0.3s ease';
        });
        
        coatOfArms.addEventListener('mouseleave', () => {
            coatOfArms.style.transform = 'scale(1)';
        });
    </script>
</body>
</html>