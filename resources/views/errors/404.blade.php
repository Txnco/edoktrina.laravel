<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page Not Found</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-base-100">
    <main class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-2xl text-center">
            <!-- Animated 404 Number -->
            <div class="text-7xl font-bold text-primary mb-4 animate-bounce">
                404
            </div>
            
            <!-- Space-themed Illustration -->
            <div class="mb-8">
                <svg class="w-40 h-40 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M12 2c3.866 0 7 3.134 7 7 0 5.25-7 13-7 13S5 14.25 5 9c0-3.866 3.134-7 7-7zm0 10a3 3 0 100-6 3 3 0 000 6z"/>
                    <circle cx="12" cy="9" r="1" fill="currentColor"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                          d="M12 9v4m0 0l-2-2m2 2l2-2"/>
                </svg>
            </div>

            <!-- Content Section -->
            <div class="space-y-6">
                <h1 class="text-4xl font-bold text-base-content mb-2">
                    Lost in Space? 🌌
                </h1>
                
                <p class="text-lg  mb-5">
                    The page you're looking for has drifted out of orbit. <br> Don't worry, we'll help you navigate back home!
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="/" class="btn btn-primary px-8 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        Return to Home
                    </a>
                    
                    <a href="/contact" class="btn btn-secondary px-8 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        Contact Support
                    </a>
                </div>

                

                <!-- Fun Message -->
                <p class="text-sm text-base-content/50 mt-8">
                    🚀 Pro Tip: Check your coordinates twice before launching!
                </p>
            </div>
        </div>
    </main>
</body>
</html>