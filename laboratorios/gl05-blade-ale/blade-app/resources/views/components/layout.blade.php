@props(['title' => 'eventos-app']) 
  
<!DOCTYPE html> 
<html lang="es" class="h-full"> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>{{ $title }} — eventos-app</title> 
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    @stack('estilos') 
</head> 
<body class="min-h-full bg-slate-50 text-slate-800 antialiased">     <x-navbar /> 
  
    <main class="mx-auto max-w-3xl p-6"> 
        {{ $slot }} 
    </main> 
  
    <x-footer /> 
  
    @stack('scripts') 
</body> 
</html> 
