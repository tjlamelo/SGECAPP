<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Système de Gestion des États Civils | Cameroun</title>
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
        
        .register-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }
        
        .register-card:hover {
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
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600"><path d="M400,100 C450,120 500,150 550,180 C600,210 650,250 700,300 C650,350 600,400 550,450 C500,500 450,550 400,580 C350,550 300,500 250,450 C200,400 150,350 100,300 C150,250 200,200 250,150 C300,130 350,110 400,100 Z" fill="%23007A5E"/></svg>');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .password-strength {
            height: 4px;
            margin-top: 4px;
            border-radius: 2px;
            background: #e2e8f0;
            overflow: hidden;
        }
        
        .strength-meter {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }
        
        .form-container {
            max-width: 480px;
            width: 100%;
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
    
    <div class="form-container">
        <!-- En-tête officiel avec armoiries -->
        <div class="text-center mb-8">
            <div class="relative flex flex-col items-center">
                <!-- Armoiries du Cameroun -->
                <div class="bg-white rounded-full p-3 shadow-lg inline-flex items-center justify-center mb-4 border-2 border-yellow-200">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Coat_of_arms_of_Cameroon.svg" 
                         alt="Armoiries de la République du Cameroun" 
                         class="coat-of-arms">
                </div>
                
                <div class="mb-2">
                    <h1 class="official-title text-3xl">République du Cameroun</h1>
                    <div class="w-24 h-1 bg-green-600 mx-auto mt-2 mb-3 rounded-full"></div>
                    <h2 class="text-2xl font-bold text-gray-800">Système de Gestion des États Civils</h2>
                    <p class="text-gray-600 mt-2">Création de compte administrateur</p>
                </div>
            </div>
        </div>
        
        <!-- Carte d'inscription -->
        <div class="register-card bg-white relative overflow-hidden">
            <!-- Fond avec silhouette du Cameroun -->
            <div class="cameroun-map"></div>
            
            <div class="relative z-10">
                <div class="px-8 pt-8">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Création de Compte</h2>
                        <p class="text-gray-600 mt-2">Veuillez fournir vos informations pour créer un compte</p>
                    </div>
                    
                    <!-- Message d'erreur -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 text-red-700 p-4 rounded-lg border border-red-200">
                            <div class="font-medium flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                Erreur dans le formulaire
                            </div>
                            <ul class="mt-2 list-disc pl-5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                
                <form method="POST" action="{{ route('register') }}" class="px-8 pb-8">
                    @csrf
                    
                    <div class="space-y-5">
                        <!-- Nom complet -->
                        <div class="mb-4 relative">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                            <div class="relative">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="input-field w-full py-3 px-4 rounded-lg focus:outline-none"
                                    placeholder="Votre nom complet">
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="mb-4 relative">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                            <div class="relative">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="input-field w-full py-3 px-4 rounded-lg focus:outline-none"
                                    placeholder="votre.email@gouv.cm">
                            </div>
                        </div>
                        
                        <!-- Mot de passe -->
                        <div class="mb-4 relative">
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
                            <div class="password-strength mt-1">
                                <div class="strength-meter" id="password-strength"></div>
                            </div>
                            <div class="text-xs text-gray-500 mt-1">
                                Minimum 8 caractères, avec majuscule, minuscule et chiffre
                            </div>
                        </div>
                        
                        <!-- Confirmation mot de passe -->
                        <div class="mb-4 relative">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                            <div class="relative">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="input-field w-full py-3 px-4 rounded-lg focus:outline-none pr-10"
                                    placeholder="••••••••">
                                <span class="password-toggle" id="password-confirm-toggle">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        
                        <!-- Conditions d'utilisation -->
                        <div class="mb-6 mt-6">
                            <div class="flex items-start">
                                <input id="terms" name="terms" type="checkbox" required
                                    class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded mt-1">
                                <label for="terms" class="ml-2 block text-sm text-gray-700">
                                    J'accepte les <a href="#" class="text-green-600 font-medium hover:underline">conditions d'utilisation</a> 
                                    et la <a href="#" class="text-green-600 font-medium hover:underline">politique de confidentialité</a>.
                                </label>
                            </div>
                        </div>
                        
                        <!-- Bouton d'inscription -->
                        <button type="submit"
                            class="btn-cameroon w-full text-white py-3 px-4 rounded-lg font-medium text-base flex items-center justify-center">
                            <i class="fas fa-user-plus mr-2"></i>
                            Créer mon compte
                        </button>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Vous avez déjà un compte? 
                            <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-500">Connectez-vous ici</a>
                        </p>
                    </div>
                </form>
                
                <!-- Bandeau de sécurité -->
                <div class="bg-gray-50 border-t py-3 px-8 flex items-center justify-center text-sm">
                    <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                    <span>Système sécurisé - Données cryptées - Conformité RGPD</span>
                </div>
            </div>
        </div>
        
        <!-- Pied de page officiel -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <div class="footer-links flex flex-wrap justify-center gap-4 mb-3">
                <a href="#" class="hover:text-green-700 flex items-center">
                    <i class="fas fa-question-circle mr-1"></i> Assistance
                </a>
                <a href="#" class="hover:text-green-700 flex items-center">
                    <i class="fas fa-file-contract mr-1"></i> Conditions
                </a>
                <a href="#" class="hover:text-green-700 flex items-center">
                    <i class="fas fa-lock mr-1"></i> Confidentialité
                </a>
            </div>
            <p class="mt-4">
                <i class="far fa-copyright"></i> 2023 République du Cameroun - Tous droits réservés
            </p>
            <p class="mt-2 flex items-center justify-center">
                <span class="cameroon-flag"></span>
                Ministère de l'Administration Territoriale
            </p>
        </div>
    </div>
    
    <script>
        // Toggle password visibility
        function setupPasswordToggle(inputId, toggleId) {
            const toggle = document.getElementById(toggleId);
            if (!toggle) return;
            
            toggle.addEventListener('click', function() {
                const passwordInput = document.getElementById(inputId);
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
        }
        
        setupPasswordToggle('password', 'password-toggle');
        setupPasswordToggle('password_confirmation', 'password-confirm-toggle');
        
        // Password strength meter
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.getElementById('password-strength');
        
        if (passwordInput && strengthMeter) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Check password length
                if (password.length >= 8) strength += 25;
                
                // Check for uppercase letters
                if (/[A-Z]/.test(password)) strength += 25;
                
                // Check for lowercase letters
                if (/[a-z]/.test(password)) strength += 25;
                
                // Check for numbers
                if (/[0-9]/.test(password)) strength += 25;
                
                // Update strength meter
                strengthMeter.style.width = strength + '%';
                
                // Update color
                if (strength < 50) {
                    strengthMeter.style.backgroundColor = '#CE1126'; // red
                } else if (strength < 75) {
                    strengthMeter.style.backgroundColor = '#FCD116'; // yellow
                } else {
                    strengthMeter.style.backgroundColor = '#007A5E'; // green
                }
            });
        }
        
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
        if (coatOfArms) {
            coatOfArms.addEventListener('mouseenter', () => {
                coatOfArms.style.transform = 'scale(1.05)';
                coatOfArms.style.transition = 'transform 0.3s ease';
            });
            
            coatOfArms.addEventListener('mouseleave', () => {
                coatOfArms.style.transform = 'scale(1)';
            });
        }
    </script>
</body>
</html>