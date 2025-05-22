
@extends('layouts.app')

@section('main-content')
<div class="bg-base-100 min-h-screen">
            <!-- Search Section with Gradient Background -->
            <section class="relative py-16 overflow-hidden mb-8">
                <div class="absolute inset-0 overflow-hidden">    
                    <!-- Main gradient container -->
                    <div class="absolute top-1/2 left-1/2 w-[200%] h-[200%] -translate-x-1/2 -translate-y-1/2">
                        <!-- Primary gradient layers with theme-responsive colors -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/50 to-secondary/50 animate-gradient-shift opacity-70"></div>
                        <div class="absolute inset-0 bg-gradient-to-tr from-secondary/40 to-accent/40 animate-gradient-shift animation-delay-3000 opacity-70"></div>
                        <div class="absolute inset-0 bg-gradient-to-bl from-accent/40 to-primary/40 animate-gradient-shift animation-delay-6000 opacity-80"></div>
                        
                        <!-- Additional color layers for richness -->
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500/40 to-violet-600/40 animate-gradient-float opacity-40"></div>
                        <div class="absolute inset-0 bg-gradient-to-l from-blue-500/40 to-pink-500/40 animate-gradient-float animation-delay-4000 opacity-70"></div>
                        
                        <!-- 8 Fluid Shapes -->
                        <div class="absolute top-[10%] left-[20%] w-[30%] h-[30%] rounded-blob bg-gradient-to-r from-indigo-500/30 to-purple-500/30 animate-blob-morph animation-delay-1000"></div>
                        <div class="absolute top-[60%] left-[10%] w-[25%] h-[25%] rounded-blob bg-gradient-to-r from-blue-500/30 to-cyan-500/30 animate-blob-morph animation-delay-2000"></div>
                        <div class="absolute top-[30%] left-[60%] w-[35%] h-[35%] rounded-blob bg-gradient-to-r from-emerald-500/30 to-teal-500/30 animate-blob-morph animation-delay-3000"></div>
                        <div class="absolute top-[70%] left-[60%] w-[20%] h-[20%] rounded-blob bg-gradient-to-r from-rose-500/30 to-pink-500/30 animate-blob-morph animation-delay-4000"></div>
                        <div class="absolute top-[40%] left-[40%] w-[40%] h-[40%] rounded-blob bg-gradient-to-r from-amber-500/20 to-orange-500/20 animate-blob-morph animation-delay-5000"></div>
                        <div class="absolute top-[20%] left-[70%] w-[15%] h-[15%] rounded-blob bg-gradient-to-r from-fuchsia-500/30 to-purple-500/30 animate-blob-morph animation-delay-6000"></div>
                        <div class="absolute top-[80%] left-[30%] w-[22%] h-[22%] rounded-blob bg-gradient-to-r from-sky-500/30 to-indigo-500/30 animate-blob-morph animation-delay-7000"></div>
                        
                        <!-- Blur overlay for dreamy effect -->
                        <div class="absolute inset-0 backdrop-blur-[80px]"></div>
                    </div>
                </div>
                
                <div class="container mx-auto px-4 relative z-10">
                    <div class="max-w-4xl mx-auto text-center text-primary-content mb-12">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight text-white">
                            Pronađi skripte i materijale
                        </h1>
                        <p class="text-lg opacity-90 mb-8 text-white">
                            Pretraži našu bazu od više stotina kvalitetnih materijala za učenje. Odaberi predmet i pronađi savršen materijal.
                        </p>
                    </div>

                    <!-- Search Form -->
                    <div class="max-w-5xl mx-auto">
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body p-4 md:p-8">
                                <form id="scriptSearchForm" class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                        <!-- Search Input -->
                                        <div class="form-control md:col-span-2">
                                            <label class="label">
                                                <span class="label-text font-medium">Pretraga</span>
                                            </label>
                                            <input type="text" 
                                                   id="search-input"
                                                   placeholder="Traži po nazivu, autoru ili ključnim riječima..." 
                                                   class="input input-bordered w-full" 
                                                   value="{{ request('search') }}">
                                        </div>

                                        <!-- Quick Subject Filter -->
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text font-medium">Predmet</span>
                                            </label>
                                            <select id="quick-subject" class="select select-bordered w-full">
                                                <option value="">Svi predmeti</option>
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}" 
                                                        {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                                        {{ $subject->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Sort -->
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text font-medium">Sortiraj</span>
                                            </label>
                                            <select id="sort-select" class="select select-bordered w-full">
                                                <option value="relevance" {{ request('sort') == 'relevance' ? 'selected' : '' }}>Najrelevantnije</option>
                                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Najnovije</option>
                                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Najpopularnije</option>
                                                <option value="downloads" {{ request('sort') == 'downloads' ? 'selected' : '' }}>Najviše preuzeto</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-center mt-6">
                                        <button type="submit" id="search-btn" class="btn btn-primary btn-wide gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                            Pretraži materijale
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <x-div.container>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Filters Sidebar -->
                <div class="lg:col-span-1">
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title text-lg mb-4">Filteri</h2>
                            
                            <!-- Subject Filter -->
                            <div class="mb-6">
                                <label class="label">
                                    <span class="label-text font-semibold">Predmet</span>
                                </label>
                                <select id="subject-filter" class="select select-bordered w-full">
                                    <option value="">Svi predmeti</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" 
                                            {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Educational Level Filter -->
                            <div class="mb-6">
                                <label class="label">
                                    <span class="label-text font-semibold">Obrazovni nivo</span>
                                </label>
                                <select id="level-filter" class="select select-bordered w-full">
                                    <option value="">Svi nivoi</option>
                                    <option value="elementary" {{ request('level') == 'elementary' ? 'selected' : '' }}>Osnovna škola</option>
                                    <option value="high-school" {{ request('level') == 'high-school' ? 'selected' : '' }}>Srednja škola</option>
                                    <option value="university" {{ request('level') == 'university' ? 'selected' : '' }}>Fakultet</option>
                                </select>
                            </div>

                            <!-- Year Filter -->
                            <div class="mb-6">
                                <label class="label">
                                    <span class="label-text font-semibold">Godina</span>
                                </label>
                                <select id="year-filter" class="select select-bordered w-full">
                                    <option value="">Sve godine</option>
                                    @for($y = date('Y'); $y >= 2015; $y--)
                                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>
                                            {{ $y }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Type Filter -->
                            <div class="mb-6">
                                <label class="label">
                                    <span class="label-text font-semibold">Tip materijala</span>
                                </label>
                                <div class="space-y-2">
                                    <label class="cursor-pointer flex items-center gap-2">
                                        <input type="checkbox" name="type[]" value="summary" 
                                               class="checkbox checkbox-primary checkbox-sm"
                                               {{ in_array('summary', request('type', [])) ? 'checked' : '' }}>
                                        <span>Sažeci</span>
                                    </label>
                                </div>
                            </div>

                            <!-- University Filter (shown only when university is selected) -->
                            <div class="mb-6" id="university-section" style="display: none;">
                                <label class="label">
                                    <span class="label-text font-semibold">Fakultet</span>
                                </label>
                                <select id="university-filter" class="select select-bordered w-full">
                                    <option value="">Svi fakulteti</option>
                                    <option value="fer">FER - Fakultet elektrotehnike i računarstva</option>
                                    <option value="pmf">PMF - Prirodoslovno-matematički fakultet</option>
                                    <option value="ffzg">FFZG - Filozofski fakultet Zagreb</option>
                                    <option value="med">MF - Medicinski fakultet</option>
                                    <option value="efzg">EFZG - Ekonomski fakultet</option>
                                    <!-- Add more universities -->
                                </select>
                            </div>

                            <!-- Clear Filters Button -->
                            <button id="clear-filters" class="btn btn-ghost btn-sm w-full">
                                Očisti filtere
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Results Section -->
                <div class="lg:col-span-3">
                    <!-- Results Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold">
                            Pronađeno: <span id="results-count"></span> rezultata
                        </h2>
                        <div class="flex gap-2">
                            <button class="btn btn-ghost btn-sm" id="grid-view" onclick="toggleView('grid')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </button>
                            <button class="btn btn-ghost btn-sm active" id="list-view" onclick="toggleView('list')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Loading Indicator -->
                    <div id="loading" class="text-center py-8 hidden">
                        <span class="loading loading-spinner loading-lg"></span>
                    </div>

                    <!-- Results List -->
                    <div id="results-container" class="list-view">
                        @forelse($scripts as $script)
                            <div class="bg-base-200 script-item card mb-4 shadow-sm hover:shadow-md transition-shadow">
                                <div class="card-body">
                                    <div class="flex flex-col md:flex-row justify-between">
                                        <div class="flex-1">
                                            <h3 class="card-title text-lg">
                                                <a href="{{ route('scripts.show', $script->id) }}" class="link link-hover">
                                                    {{ $script->title }}
                                                </a>
                                            </h3>
                                            <div class="flex flex-wrap gap-2 my-2">
                                                <div class="badge badge-primary">{{ $script->subject->name }}</div>
                                                <div class="badge badge-secondary">{{ $script->educational_level }}</div>
                                                <div class="badge badge-accent">{{ $script->type }}</div>
                                            </div>
                                            <p class="text-base-content/70 mb-2">
                                                {{ Str::limit($script->description, 150) }}
                                            </p>
                                            <div class="flex items-center gap-4 text-sm text-base-content/60">
                                                <span class="flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    {{ $script->author->first_name }} {{ $script->author->last_name }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $script->created_at->diffForHumans() }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                                    </svg>
                                                    {{ $script->downloads_count }} preuzimanja
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-between gap-2 mt-4 md:mt-0 md:ml-4">
                                            <div class="rating rating-sm">
                                                <input type="radio" name="rating-{{ $script->id }}" class="mask mask-star-2 bg-orange-400" {{ $script->avg_rating >= 1 ? 'checked' : '' }} disabled>
                                                <input type="radio" name="rating-{{ $script->id }}" class="mask mask-star-2 bg-orange-400" {{ $script->avg_rating >= 2 ? 'checked' : '' }} disabled>
                                                <input type="radio" name="rating-{{ $script->id }}" class="mask mask-star-2 bg-orange-400" {{ $script->avg_rating >= 3 ? 'checked' : '' }} disabled>
                                                <input type="radio" name="rating-{{ $script->id }}" class="mask mask-star-2 bg-orange-400" {{ $script->avg_rating >= 4 ? 'checked' : '' }} disabled>
                                                <input type="radio" name="rating-{{ $script->id }}" class="mask mask-star-2 bg-orange-400" {{ $script->avg_rating >= 5 ? 'checked' : '' }} disabled>
                                                <span class="ml-2 text-sm">({{ $script->reviews_count }})</span>
                                            </div>
                                            <div class="flex gap-2">
                                                <a href="{{ route('scripts.show', $script->id) }}" class="btn btn-outline btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Pregled
                                                </a>
                                                <a href="{{ route('scripts.download', $script->id) }}" class="btn btn-primary btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                    </svg>
                                                    Preuzmi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="text-6xl mb-4 opacity-50">📚</div>
                                    <h3 class="text-lg font-semibold">Nema rezultata</h3>
                                    <p class="text-base-content/70">Pokušajte promijeniti kriterije pretraživanja</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Grid View (hidden by default) -->
                    <div id="grid-container" class="grid-view hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($scripts as $script)
                                <div class="bg-base-200  script-item card shadow-sm hover:shadow-md transition-shadow">
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">
                                            <a href="{{ route('scripts.show', $script->id) }}" class="link link-hover">
                                                {{ $script->title }}
                                            </a>
                                        </h3>
                                        <div class="flex flex-wrap gap-1 mb-3">
                                            <div class="badge badge-primary badge-sm">{{ $script->subject->name }}</div>
                                            <div class="badge badge-secondary badge-sm">{{ $script->educational_level }}</div>
                                        </div>
                                        <p class="text-sm text-base-content/70 mb-4">
                                            {{ Str::limit($script->description, 100) }}
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <div class="rating rating-sm">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <input type="radio" name="rating-grid-{{ $script->id }}" 
                                                           class="mask mask-star-2 bg-orange-400" 
                                                           {{ $script->avg_rating >= $i ? 'checked' : '' }} disabled>
                                                @endfor
                                            </div>
                                            <div class="flex gap-2">
                                                <a href="{{ route('scripts.show', $script->id) }}" class="btn btn-outline btn-xs">Pregled</a>
                                                <a href="{{ route('scripts.download', $script->id) }}" class="btn btn-primary btn-xs">Preuzmi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
    </x-div.container>

        </div>
</div>

<script>
    $(document).ready(function() {
        // Handle view toggle
        window.toggleView = function(view) {
            if (view === 'grid') {
                $('#results-container').hide();
                $('#grid-container').show();
                $('#grid-view').addClass('active');
                $('#list-view').removeClass('active');
            } else {
                $('#results-container').show();
                $('#grid-container').hide();
                $('#list-view').addClass('active');
                $('#grid-view').removeClass('active');
            }
        }

        // Show/hide university filter based on educational level
        $('#level-filter').change(function() {
            if ($(this).val() === 'university') {
                $('#university-section').show();
            } else {
                $('#university-section').hide();
            }
        });

        // Initialize university filter visibility
        if ($('#level-filter').val() === 'university') {
            $('#university-section').show();
        }

        // Handle search and filters
        function performSearch() {
            const search = $('#search-input').val();
            const subject = $('#subject-filter').val();
            const level = $('#level-filter').val();
            const year = $('#year-filter').val();
            const sort = $('#sort-select').val();
            const university = $('#university-filter').val();
            const types = $('input[name="type[]"]:checked').map(function() {
                return this.value;
            }).get();

            // Build query string
            const params = new URLSearchParams();
            if (search) params.append('search', search);
            if (subject) params.append('subject', subject);
            if (level) params.append('level', level);
            if (year) params.append('year', year);
            if (sort) params.append('sort', sort);
            if (university) params.append('university', university);
            types.forEach(type => params.append('type[]', type));

            // Redirect with query string
            window.location.href = '/scripts?' + params.toString();
        }

        // Search button click
        $('#search-btn').click(performSearch);

        // Enter key in search input
        $('#search-input').keypress(function(e) {
            if (e.which === 13) {
                performSearch();
            }
        });

        // Filter changes
        $('#subject-filter, #level-filter, #year-filter, #sort-select, #university-filter').change(performSearch);
        $('input[name="type[]"]').change(performSearch);

        // Clear filters
        $('#clear-filters').click(function() {
            window.location.href = '/scripts';
        });
    });
</script>

@endsection