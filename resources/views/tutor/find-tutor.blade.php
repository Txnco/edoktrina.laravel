@php($invertedHeader = true)
@extends('layouts.app')

@section('main-content')
<div class="min-h-screen">

    @section('landingGradient')
    <div class="absolute inset-0 overflow-hidden">    
        <!-- Main gradient container -->
        <div class="absolute top-1/2 left-1/2 w-[200%] h-[200%] -translate-x-1/2 -translate-y-1/2">
        <!-- Primary gradient layers with theme-responsive colors -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/60 to-secondary/60 animate-gradient-shift opacity-70"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-secondary/60 to-accent/60 animate-gradient-shift animation-delay-3000 opacity-60 animate-fade-in delay-300"></div>
        
        <!-- Additional color layers for richness -->
        <div class="absolute inset-0 bg-gradient-to-r from-purple-700/60 to-violet-600/60 animate-gradient-float opacity-40"></div>
        <div class="absolute inset-0 bg-gradient-to-l from-blue-700/60 to-pink-600/60 animate-gradient-float animation-delay-4000 opacity-60 animate-fade-in delay-300"></div>
        
        <!-- 8 Fluid Shapes -->
        <div class="absolute top-[10%] left-[20%] w-[30%] h-[30%] rounded-blob bg-gradient-to-r from-indigo-700/30 to-purple-600/30 animate-blob-morph animation-delay-1000"></div>
        
        <div class="absolute top-[60%] left-[10%] w-[25%] h-[25%] rounded-blob bg-gradient-to-r from-blue-700/30 to-cyan-600/30 animate-blob-morph animation-delay-2000 animate-fade-in delay-300"></div>
        
        <div class="absolute top-[70%] left-[60%] w-[20%] h-[20%] rounded-blob bg-gradient-to-r from-rose-700/30 to-pink-600/30 animate-blob-morph animation-delay-4000 animate-fade-in delay-300"></div>
        
        <div class="absolute top-[40%] left-[40%] w-[40%] h-[40%] rounded-blob bg-gradient-to-r from-amber-700/20 to-orange-600/20 animate-blob-morph animation-delay-5000 animate-fade-in delay-300"></div>
        
        <div class="absolute top-[20%] left-[70%] w-[15%] h-[15%] rounded-blob bg-gradient-to-r from-fuchsia-700/30 to-purple-600/30 animate-blob-morph animation-delay-6000 animate-fade-in delay-300"></div>
        
        
        <!-- Blur overlay for dreamy effect -->
        <div class="absolute inset-0 backdrop-blur-[80px]"></div>
        </div>
    </div>
    @endsection

    <!-- Hero Section with Search -->
    <section class="relative py-24 overflow-hidden">
       
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-primary-content mb-12">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Pronađi svog idealnog <span class="text-white">instruktora</span>
                </h1>
                <p class="text-lg md:text-xl opacity-90 mb-8">
                    Više od 500 kvalificiranih instruktora spremno za pomoć. Odaberi predmet, definiraj cijenu i pronađi svog mentora.
                </p>
            </div>

            <!-- Search Form -->
            <div class="max-w-5xl mx-auto">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body p-4 md:p-8">
                        <form id="tutorSearchForm" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <!-- Subject Search -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Predmet</span>
                                    </label>
                                    <div class="dropdown w-full">
                                        <input type="text" placeholder="Odaberi predmet..." 
                                               class="input input-bordered w-full" 
                                               id="subjectSearch" tabindex="0">
                                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-full hidden" id="subjectDropdown">
                                            <li><a data-value="matematika">Matematika</a></li>
                                            <li><a data-value="fizika">Fizika</a></li>
                                            <li><a data-value="kemija">Kemija</a></li>
                                            <li><a data-value="engleski">Engleski jezik</a></li>
                                            <li><a data-value="programiranje">Programiranje</a></li>
                                            <li><a data-value="srpski">Srpski jezik</a></li>
                                            <li><a data-value="zgodovina">Povijest</a></li>
                                            <li><a data-value="biologija">Biologija</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Price Range -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Maksimalna cijena</span>
                                    </label>
                                    <select class="select select-bordered w-full" id="priceFilter">
                                        <option value="">Sve cijene</option>
                                        <option value="0-15">Do 15€/sat</option>
                                        <option value="15-25">15-25€/sat</option>
                                        <option value="25-35">25-35€/sat</option>
                                        <option value="35+">Više od 35€/sat</option>
                                    </select>
                                </div>

                                <!-- Location -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Lokacija</span>
                                    </label>
                                    <input type="text" placeholder="Grad ili regija..." 
                                           class="input input-bordered w-full" id="locationFilter">
                                </div>

                                <!-- Online/Offline -->
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text font-medium">Tip instrukcije</span>
                                    </label>
                                    <select class="select select-bordered w-full" id="typeFilter">
                                        <option value="">Sve opcije</option>
                                        <option value="online">Online</option>
                                        <option value="offline">Uživo</option>
                                        <option value="both">Oba</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mt-6">
                                <button type="submit" class="btn btn-primary btn-wide gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    Pretraži instruktore
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="py-24  max-w-6xl mx-auto px-4">
            <!-- Search Results Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-base-content">Pronađeni instruktori</h2>
                    <p class="text-base-content/70 mt-1">Prikazano <span id="resultsCount">24</span> od ukupno instruktora</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <select class="select select-bordered w-full md:w-auto" id="sortSelect">
                        <option value="relevance">Relevantnost</option>
                        <option value="price-low">Cijena: od najniže</option>
                        <option value="price-high">Cijena: od najviše</option>
                        <option value="rating">Najbolje ocijenjeni</option>
                        <option value="newest">Najnoviji</option>
                    </select>
                </div>
            </div>

            <!-- Tutor Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="tutorGrid">
                <!-- Tutor Card 1 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Ana+Matić&background=6419E6&color=ffffff" alt="Ana Matić" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Ana Matić</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Matematika</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Zagreb</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>60 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">18€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/ana-matic" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tutor Card 2 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Marko+Kovač&background=6419E6&color=ffffff" alt="Marko Kovač" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Marko Kovač</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Programiranje</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Split</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>45 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">25€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/marko-kovac" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tutor Card 3 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Luka+Perić&background=6419E6&color=ffffff" alt="Luka Perić" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Luka Perić</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Fizika</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Rijeka</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>90 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">32€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/luka-peric" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tutor Card 4 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Ivana+Novak&background=6419E6&color=ffffff" alt="Ivana Novak" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Ivana Novak</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Engleski jezik</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Osijek</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>60 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">22€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/ivana-novak" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add more tutor cards with different data -->
                <!-- Tutor Card 5 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Petra+Jukić&background=6419E6&color=ffffff" alt="Petra Jukić" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Petra Jukić</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Kemija</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Zagreb</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>60 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">20€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/petra-jukic" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tutor Card 6 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Tomislav+Ivanov&background=6419E6&color=ffffff" alt="Tomislav Ivanov" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Tomislav Ivanov</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Povijest</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Slavonski Brod</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>90 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">15€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/tomislav-ivanov" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tutor Card 7 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Marina+Horvat&background=6419E6&color=ffffff" alt="Marina Horvat" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Marina Horvat</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Biologija</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Pula</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>60 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">19€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/marina-horvat" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tutor Card 8 -->
                <div class="card bg-base-100 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="card-body p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="avatar">
                                <div class="w-16 h-16 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Davor+Žunić&background=6419E6&color=ffffff" alt="Davor Žunić" />
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">Davor Žunić</h3>
                                <div class="flex items-center gap-1">
                                    <div class="rating rating-sm">
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                        <input type="radio" class="mask mask-star-2 bg-warning"   />
                                    </div>
                                    <span class="text-sm font-medium">4.8 (32)</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="badge badge-primary badge-lg w-full justify-center py-3">
                                <span class="font-medium">Srpski jezik</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Vukovar</span>
                            </div>
                            <div class="flex items-center gap-2 text-base-content/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>45 min</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <p class="text-2xl font-bold text-primary">16€<span class="text-sm font-normal">/sat</span></p>
                        </div>

                        <div class="card-actions">
                            <a href="/u/davor-zunic" class="btn btn-primary btn-block btn-sm">
                                Pogledaj profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button id="loadMoreBtn" class="btn btn-outline btn-primary btn-wide">
                    Učitaj više instruktora
                    <span class="loading loading-spinner loading-sm hidden"></span>
                </button>
            </div>
    </section>

 
    
    @unless(Auth::check() && Auth::user()->hasRole('tutor'))
    <!-- Call to Action Section -->
    <section class="py-16  bg-gradient-to-r from-primary to-secondary text-primary-content">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Želiš postati instruktor?</h2>
            <p class="text-lg md:text-xl opacity-90 mb-8 max-w-2xl mx-auto">
                Dijeli svoje znanje, postavi svoj raspored i zarađuj fleksibilno. Pridruži se našoj zajednici instruktora!
            </p>
            <a href="{{ route('tutor.become') }}" class="btn btn-outline btn-lg gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Postani instruktor
            </a>
        </div>
    </section>
    @endunless
</div>

<!-- JavaScript for search functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Subject search and dropdown
    const subjectSearch = document.getElementById('subjectSearch');
    const subjectDropdown = document.getElementById('subjectDropdown');
    
    subjectSearch.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const items = subjectDropdown.querySelectorAll('li');
        
        let hasResults = false;
        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = '';
                hasResults = true;
            } else {
                item.style.display = 'none';
            }
        });
        
        if (hasResults) {
            subjectDropdown.classList.remove('hidden');
        } else {
            subjectDropdown.classList.add('hidden');
        }
    });
    
    subjectDropdown.addEventListener('click', function(e) {
        const target = e.target.closest('a');
        if (target) {
            subjectSearch.value = target.textContent;
            subjectDropdown.classList.add('hidden');
        }
    });
    
    document.addEventListener('click', function(e) {
        if (!subjectSearch.contains(e.target) && !subjectDropdown.contains(e.target)) {
            subjectDropdown.classList.add('hidden');
        }
    });
    
    // Form submission
    const searchForm = document.getElementById('tutorSearchForm');
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // Implement search functionality here
        performSearch();
    });
    
    // Load more button
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    loadMoreBtn.addEventListener('click', function() {
        this.querySelector('.loading').classList.remove('hidden');
        // Simulate loading
        setTimeout(() => {
            this.querySelector('.loading').classList.add('hidden');
            // Add more tutors here
        }, 1000);
    });
    
    function performSearch() {
        const subject = subjectSearch.value;
        const priceRange = document.getElementById('priceFilter').value;
        const location = document.getElementById('locationFilter').value;
        const type = document.getElementById('typeFilter').value;
        
        // Implement actual search logic here
        console.log('Searching for:', {subject, priceRange, location, type});
    }
});
</script>

@endsection