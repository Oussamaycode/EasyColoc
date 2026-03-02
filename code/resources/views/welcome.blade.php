<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ColocManager - Gérez votre colocation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="text-center text-white">
        <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
            <i class="fas fa-home text-white text-3xl"></i>
        </div>
        
        <h1 class="text-4xl font-bold mb-2">ColocManager</h1>
        <p class="text-white/80 text-lg mb-10">Gérez votre colocation en toute simplicité</p>
        
        <div class="space-y-3 max-w-xs mx-auto">
            <a href="{{route('register')}}" class="block w-full bg-white text-indigo-600 py-3 rounded-lg font-semibold hover:bg-white/90 transition shadow-lg">
                <i class="fas fa-user-plus mr-2"></i>Créer un compte
            </a>
            
            <a href="{{route('login')}}" class="block w-full bg-white/20 backdrop-blur-sm text-white py-3 rounded-lg font-semibold hover:bg-white/30 transition border border-white/30">
                <i class="fas fa-sign-in-alt mr-2"></i>Se connecter
            </a>
        </div>
    </div>
</body>
</html>