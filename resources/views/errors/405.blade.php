<!DOCTYPE html>
<html lang="en">
<head>
    <title>Method Not Allowed</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-100 flex flex-col justify-center items-center">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-4">405 | Method Not Allowed</h1>
        <p class="mb-6">Oops! The requested method isn't allowed on this route.</p>
        <a href="{{ route('landing.page') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Go to Homepage</a>
    </div>
</div>
