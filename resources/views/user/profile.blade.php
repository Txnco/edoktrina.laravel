@extends('layouts.app')

@section('main-content')
<div class="bg-base-100 min-h-screen">
  <x-div.container>
    <!-- Main Container -->
    <div class="max-w-5xl mx-auto pt-6 pb-12">
      
      <!-- Profile Header Card -->
      <div class="card shadow-xl relative overflow-visible bg-base-100 border border-base-200 mb-8">
        <!-- Gradient Banner with Texture Overlay -->
        <div 
          class="h-48 w-full rounded-t-box relative overflow-hidden"
          style="background-image: linear-gradient(135deg, #a78bfa 0%, #7e5bef 100%);"
        >
          <div class="absolute inset-0 opacity-10 bg-repeat" 
               style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+CjxyZWN0IHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgZmlsbD0iIzg4NUFGRiI+PC9yZWN0Pgo8Y2lyY2xlIGN4PSIzMCIgY3k9IjMwIiByPSIyIiBmaWxsPSJ3aGl0ZSI+PC9jaXJjbGU+Cjwvc3ZnPg==');">
          </div>
        </div>
        
        <!-- Profile Content -->
        <div class="px-8 pb-8 pt-0 -mt-16">
          <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-1">
            <!-- Avatar & Name Section -->
            <div class="flex flex-col items-start">
              <!-- Avatar -->
              <div class="relative group mb-2">
                @php
                  $profilePhoto = $user->profile_photo_url;
                @endphp
                <div class="relative">
                  @if($profilePhoto)
                    <div class="w-32 h-32 rounded-full border-4 border-base-100 shadow-lg overflow-hidden">
                      <img src="{{ $profilePhoto }}" alt="{{ $user->first_name }}" class="object-cover w-full h-full">
                    </div>
                  @else
                    <div class="avatar online placeholder">
                      <div class="bg-primary text-primary-content w-32 h-32 rounded-full border-4 border-base-100 shadow-lg">
                        <span class="text-4xl font-bold">
                          {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                        </span>
                      </div>
                    </div>
                  @endif
                  
                </div>
              </div>
        
              <!-- Name & Bio -->
              <div class="text-start mt-1">
                <div class="flex items-center justify-left gap-2">
                  <h1 class="text-3xl font-bold text-base-content leading-none">
                    {{ $user->first_name }} {{ $user->last_name }}
                  </h1>
                
                  @hasrole('tutor')
                    <div class="tooltip" data-tip="Verified Tutor">
                      <svg xmlns="http://www.w3.org/2000/svg"
                           class="h-6 w-6 text-primary align-middle"
                           viewBox="0 0 20 20"
                           fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd" />
                      </svg>
                    </div>
                  @endhasrole
                </div>
                
                @if($isOwner)
                  <p class="text-base-content/70 mt-1">{{ $user->email }}</p>
                @endif
                
                <!-- Bio Section -->
                <div class="mt-3 text-base-content/80 max-w-xl">
                  <p>{{ $user->bio ?? 'Student matematike i entuzijast za učenje. Volim pomagati drugima u svladavanju složenih koncepata na jednostavan način.' }}</p>
                </div>
                
                <div class="flex flex-wrap items-center gap-4 mt-4">
                  <!-- Joined Date -->
                  <div class="flex items-center text-base-content/60 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Pridružio/la se {{ $user->created_at->locale('hr')->isoFormat('D. MMMM YYYY.') }}</span>
                  </div>
                  
                
                </div>
              </div>
            </div>
            
            <!-- Activity & Actions Section -->
            <div class="flex flex-col md:items-end gap-4">
              <!-- Activity Stats -->
              <div class="stats stats-vertical lg:stats-horizontal shadow bg-base-200">
                <div class="stat px-4 py-2">
                  <div class="stat-title text-xs">Materijala</div>
                  <div class="stat-value text-primary text-2xl">89</div>
                </div>
                
                <div class="stat px-4 py-2">
                  <div class="stat-title text-xs">Instrukcija</div>
                  <div class="stat-value text-secondary text-2xl">23</div>
                </div>
                
                <div class="stat px-4 py-2">
                  <div class="stat-title text-xs">Recenzija</div>
                  <div class="stat-value text-accent text-2xl">4.8</div>
                </div>
              </div>
              
              <!-- Action Buttons -->
              <div class="flex gap-2">
                @if($isOwner)
                  <a href="/settings/profile" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Uredi profil
                  </a>
                @else
                  <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    Poruka
                  </button>
                  
                  <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                      </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                      <li><a>Prijavi korisnika</a></li>
                      <li><a>Blokiraj</a></li>
                    </ul>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Tab Navigation -->
      <div class="tabs tabs-boxed bg-base-200 mb-6 p-1 gap-1 justify-center">
        <a class="tab tab-active !bg-primary !text-primary-content rounded-lg">Pregled</a>
        <a class="tab">Materijali</a>
        <a class="tab">Skripte</a>
        @hasrole('tutor')
          <a class="tab">Instrukcije</a>
          <a class="tab">Recenzije</a>
        @endhasrole
        <a class="tab">Aktivnost</a>
      </div>

      <!-- Main Content Area -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
          @hasrole('tutor')
            <!-- Tutor Information -->
            <div class="card bg-base-100 shadow-lg border border-base-200">
              <div class="card-body">
                <div class="flex justify-between items-center">
                  <h2 class="card-title flex items-center gap-2 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M12 14l9-5-9-5-9 5 9 5z" />
                      <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    Informacije o instruktoru
                  </h2>
                  @if($isOwner)
                    <button class="btn btn-ghost btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                    </button>
                  @endif
                </div>
                
                <div class="text-base-content/80 mt-2">
                  <p>{{ $user->tutor_bio ?? 'Iskusan instruktor s više od 5 godina iskustva podučavanja matematike i fizike. Specijaliziran za pripremu učenika za državnu maturu i fakultetske prijemne ispite.' }}</p>
                </div>

                <!-- Subjects & Expertise -->
                <div class="mt-4">
                  <h3 class="font-semibold mb-2 text-base-content">Predmeti</h3>
                  <div class="flex flex-wrap gap-2">
                    <div class="badge badge-lg badge-primary p-3">Matematika</div>
                    <div class="badge badge-lg badge-primary p-3">Fizika</div>
                    <div class="badge badge-lg badge-primary p-3">Statistika</div>
                  </div>
                </div>

                <!-- Education -->
                <div class="mt-4">
                  <h3 class="font-semibold mb-2 text-base-content">Obrazovanje</h3>
                  <div class="flex items-start gap-4">
                    <div class="avatar">
                      <div class="w-12 h-12 rounded-full bg-base-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-base-content/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M12 14l9-5-9-5-9 5 9 5z" />
                          <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                      </div>
                    </div>
                    <div>
                      <h4 class="font-medium">Prirodoslovno-matematički fakultet</h4>
                      <p class="text-sm text-base-content/70">Magistar matematike i fizike</p>
                      <p class="text-xs text-base-content/60">2018 - 2023</p>
                    </div>
                  </div>
                </div>

                <!-- Tutor Stats -->
                <div class="grid grid-cols-3 gap-4 mt-6">
                  <div class="bg-base-200 rounded-box p-3 text-center">
                    <div class="text-2xl font-bold text-primary">235</div>
                    <div class="text-xs text-base-content/70">Sati podučavanja</div>
                  </div>
                  <div class="bg-base-200 rounded-box p-3 text-center">
                    <div class="text-2xl font-bold text-secondary">48</div>
                    <div class="text-xs text-base-content/70">Učenika</div>
                  </div>
                  <div class="bg-base-200 rounded-box p-3 text-center">
                    <div class="text-2xl font-bold text-accent">4.9</div>
                    <div class="text-xs text-base-content/70">Prosječna ocjena</div>
                  </div>
                </div>
                
                <!-- Call to Action -->
                <div class="mt-6">
                  <a href="#" class="btn btn-primary w-full gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Rezerviraj instrukciju
                  </a>
                </div>
              </div>
            </div>
          @endhasrole

          <!-- Recent Materials -->
          <div class="card bg-base-100 shadow-lg border border-base-200">
            <div class="card-body">
              <div class="flex justify-between items-center">
                <h2 class="card-title flex items-center gap-2 text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  Nedavni materijali
                </h2>
                <a href="#" class="text-primary text-sm">Pogledaj sve</a>
              </div>

              <div class="space-y-3 mt-2">
                <!-- Material Item 1 -->
                <div class="bg-base-200 p-3 rounded-lg hover:bg-base-300 transition-colors">
                  <div class="flex items-center gap-3">
                    <div class="avatar">
                      <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                      </div>
                    </div>
                    <div class="flex-1">
                      <div class="flex justify-between items-start">
                        <h3 class="font-medium">Calculus: Limits & Derivatives</h3>
                        <div class="badge badge-primary badge-sm">Matematika</div>
                      </div>
                      <p class="text-xs text-base-content/70 mt-1">Comprehensive guide to understanding limits and derivatives with practical examples.</p>
                      <div class="flex items-center justify-between mt-2">
                        <div class="text-xs text-base-content/60">Dodano prije 3 dana</div>
                        <div class="flex items-center gap-3">
                          <span class="flex items-center text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            48
                          </span>
                          <span class="flex items-center text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            12
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Material Item 2 -->
                <div class="bg-base-200 p-3 rounded-lg hover:bg-base-300 transition-colors">
                  <div class="flex items-center gap-3">
                    <div class="avatar">
                      <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                      </div>
                    </div>
                    <div class="flex-1">
                      <div class="flex justify-between items-start">
                        <h3 class="font-medium">Quantum Mechanics Flashcards</h3>
                        <div class="badge badge-secondary badge-sm">Fizika</div>
                      </div>
                      <p class="text-xs text-base-content/70 mt-1">A set of 50 flashcards covering key concepts in quantum mechanics for physics students.</p>
                      <div class="flex items-center justify-between mt-2">
                        <div class="text-xs text-base-content/60">Dodano prije 1 tjedan</div>
                        <div class="flex items-center gap-3">
                          <span class="flex items-center text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            76
                          </span>
                          <span class="flex items-center text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            24
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              @if($isOwner)
                <div class="mt-4">
                  <a href="#" class="btn btn-outline btn-primary w-full">Dodaj novi materijal</a>
                </div>
              @endif
            </div>
          </div>

          <!-- Recent Activity -->
          <div class="card bg-base-100 shadow-lg border border-base-200">
            <div class="card-body">
              <h2 class="card-title flex items-center gap-2 text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Nedavne aktivnosti
              </h2>

              <div class="mt-2">
                <ul class="timeline timeline-snap-icon timeline-compact max-md:timeline-compact timeline-vertical">
                  <li>
                    <div class="timeline-middle">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-primary">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <div class="timeline-start md:text-end mb-6">
                      <time class="text-xs opacity-60">Jučer, 13:45</time>
                      <div class="text-sm font-medium">Objavio/la novi materijal</div>
                      <div class="text-xs opacity-70">Calculus: Limits & Derivatives</div>
                    </div>
                    <hr/>
                  </li>
                  <li>
                    <hr/>
                    <div class="timeline-middle">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-secondary">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <div class="timeline-start md:text-end mb-6">
                      <time class="text-xs opacity-60">Prije 3 dana</time>
                      <div class="text-sm font-medium">Dodao/la komentar</div>
                      <div class="text-xs opacity-70">Komentirao/la na "Physics for Beginners"</div>
                    </div>
                    <hr/>
                  </li>
                  <li>
                    <hr/>
                    <div class="timeline-middle">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-accent">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <div class="timeline-start md:text-end mb-6">
                      <time class="text-xs opacity-60">Prošli tjedan</time>
                      <div class="text-sm font-medium">Ocjenio/la materijal</div>
                      <div class="text-xs opacity-70">Dao/la 5 zvjezdica za "Calculus Guide"</div>
                    </div>
                  </li>
                </ul>
              </div>
              
              <div class="mt-4 text-center">
                <a href="#" class="btn btn-ghost btn-sm">Pogledaj sve aktivnosti</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Right Column -->
        <div class="space-y-6">
          @if($isOwner)
            <!-- Quick Actions Card -->
            <div class="card bg-base-100 shadow-lg border border-base-200">
              <div class="card-body">
                <h2 class="card-title">Brze akcije</h2>
                <div class="space-y-2 mt-2">
                  <a href="#" class="btn btn-primary w-full justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Novi materijal
                  </a>
                  <a href="#" class="btn btn-outline w-full justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Povijest pregleda
                  </a>
                  @hasrole('tutor')
                    <a href="#" class="btn btn-outline w-full justify-start">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      Zakaži instrukcije
                    </a>
                  @endhasrole
                </div>
              </div>
            </div>
          @endif
          
          <!-- Statistics Card -->
          <div class="card bg-base-100 shadow-lg border border-base-200">
            <div class="card-body">
              <h2 class="card-title">Statistika</h2>
              
              <div class="mt-3">
                <!-- Visualization 1: Materials Distribution -->
                <div class="mb-6">
                  <h3 class="text-sm font-medium mb-2">Distribucija materijala</h3>
                  <div class="w-full bg-base-200 rounded-full h-4">
                    <div class="flex rounded-full overflow-hidden h-4">
                      <div class="bg-primary h-4" style="width: 45%"></div>
                      <div class="bg-secondary h-4" style="width: 30%"></div>
                      <div class="bg-accent h-4" style="width: 25%"></div>
                    </div>
                  </div>
                  <div class="flex justify-between mt-2 text-xs">
                    <div class="flex items-center">
                      <div class="w-2 h-2 rounded-full bg-primary mr-1"></div>
                      <span>Skripte (45%)</span>
                    </div>
                    <div class="flex items-center">
                      <div class="w-2 h-2 rounded-full bg-secondary mr-1"></div>
                      <span>Flashcards (30%)</span>
                    </div>
                    <div class="flex items-center">
                      <div class="w-2 h-2 rounded-full bg-accent mr-1"></div>
                      <span>Quiz (25%)</span>
                    </div>
                  </div>
                </div>
                
                <!-- Visualization 2: Activity Over Time -->
                <div>
                  <h3 class="text-sm font-medium mb-2">Aktivnost (posljednjih 7 dana)</h3>
                  <div class="flex h-24 items-end gap-1">
                    <div class="bg-primary/20 hover:bg-primary/40 flex-1 h-[15%] rounded-t-sm transition-all tooltip" data-tip="Pon: 3"></div>
                    <div class="bg-primary/20 hover:bg-primary/40 flex-1 h-[40%] rounded-t-sm transition-all tooltip" data-tip="Uto: 8"></div>
                    <div class="bg-primary/20 hover:bg-primary/40 flex-1 h-[65%] rounded-t-sm transition-all tooltip" data-tip="Sri: 13"></div>
                    <div class="bg-primary/20 hover:bg-primary/40 flex-1 h-[90%] rounded-t-sm transition-all tooltip" data-tip="Čet: 18"></div>
                    <div class="bg-primary/20 hover:bg-primary/40 flex-1 h-[55%] rounded-t-sm transition-all tooltip" data-tip="Pet: 11"></div>
                    <div class="bg-primary/20 hover:bg-primary/40 flex-1 h-[25%] rounded-t-sm transition-all tooltip" data-tip="Sub: 5"></div>
                    <div class="bg-primary/20 hover:bg-primary/40 flex-1 h-[10%] rounded-t-sm transition-all tooltip" data-tip="Ned: 2"></div>
                  </div>
                  <div class="flex justify-between mt-1 text-[10px] text-base-content/60">
                    <span>Pon</span>
                    <span>Uto</span>
                    <span>Sri</span>
                    <span>Čet</span>
                    <span>Pet</span>
                    <span>Sub</span>
                    <span>Ned</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Skills & Interests Card -->
          <div class="card bg-base-100 shadow-lg border border-base-200">
            <div class="card-body">
              <div class="flex justify-between items-center">
                <h2 class="card-title">Vještine & Interesi</h2>
                @if($isOwner)
                  <button class="btn btn-ghost btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                  </button>
                @endif
              </div>
              
              <div class="mt-3 space-y-4">
                <!-- Skills Section -->
                <div>
                  <h3 class="text-sm font-medium mb-2">Akademske vještine</h3>
                  <div class="flex flex-wrap gap-2">
                    <div class="badge badge-primary">Matematika</div>
                    <div class="badge badge-primary">Fizika</div>
                    <div class="badge badge-primary">Programiranje</div>
                    <div class="badge badge-primary">Statistika</div>
                    <div class="badge badge-primary">Analiza podataka</div>
                  </div>
                </div>
                
                <!-- Languages Section -->
                <div>
                  <h3 class="text-sm font-medium mb-2">Jezici</h3>
                  <div class="space-y-2">
                    <div>
                      <div class="flex justify-between text-xs mb-1">
                        <span>Hrvatski</span>
                        <span>Materinski</span>
                      </div>
                      <div class="w-full bg-base-200 rounded-full h-2">
                        <div class="bg-primary h-2 rounded-full" style="width: 100%"></div>
                      </div>
                    </div>
                    <div>
                      <div class="flex justify-between text-xs mb-1">
                        <span>Engleski</span>
                        <span>C1</span>
                      </div>
                      <div class="w-full bg-base-200 rounded-full h-2">
                        <div class="bg-primary h-2 rounded-full" style="width: 90%"></div>
                      </div>
                    </div>
                    <div>
                      <div class="flex justify-between text-xs mb-1">
                        <span>Njemački</span>
                        <span>B1</span>
                      </div>
                      <div class="w-full bg-base-200 rounded-full h-2">
                        <div class="bg-primary h-2 rounded-full" style="width: 60%"></div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Interests Section -->
                <div>
                  <h3 class="text-sm font-medium mb-2">Interesi</h3>
                  <div class="flex flex-wrap gap-2">
                    <div class="badge badge-outline">Astronomija</div>
                    <div class="badge badge-outline">Programiranje</div>
                    <div class="badge badge-outline">Robotika</div>
                    <div class="badge badge-outline">Šah</div>
                    <div class="badge badge-outline">Umjetna inteligencija</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Reviews Preview -->
          @hasrole('tutor')
            <div class="card bg-base-100 shadow-lg border border-base-200">
              <div class="card-body">
                <div class="flex justify-between items-center">
                  <h2 class="card-title">Recenzije</h2>
                  <a href="#" class="text-primary text-sm">Pogledaj sve</a>
                </div>
                
                <div class="mt-2 space-y-4">
                  <!-- Review Stats -->
                  <div class="flex items-center gap-4">
                    <div class="text-4xl font-bold text-primary">4.8</div>
                    <div class="flex-1">
                      <div class="rating rating-sm">
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" disabled/>
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" disabled/>
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" disabled/>
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" disabled/>
                        <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" checked disabled/>
                      </div>
                      <div class="text-xs text-base-content/70">Bazirano na 48 recenzija</div>
                    </div>
                  </div>
                  
                  <!-- Recent Review -->
                  <div class="bg-base-200 p-3 rounded-lg">
                    <div class="flex items-start gap-3">
                      <div class="avatar">
                        <div class="w-8 h-8 rounded-full">
                          <img src="https://ui-avatars.com/api/?name=Ivan+Kralj&background=6419E6&color=ffffff" alt="Ivan Kralj" />
                        </div>
                      </div>
                      <div class="flex-1">
                        <div class="flex justify-between items-start">
                          <h4 class="font-medium text-sm">Ivan Kralj</h4>
                          <div class="flex items-center">
                            <div class="rating rating-xs mr-1">
                              <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" disabled/>
                              <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" disabled/>
                              <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" disabled/>
                              <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" disabled/>
                              <input type="radio" name="rating-5" class="mask mask-star-2 bg-primary" checked disabled/>
                            </div>
                            <span class="text-xs">5.0</span>
                          </div>
                        </div>
                        <p class="text-xs mt-1">Izvrstan instruktor! Vrlo strpljiv i objašnjava kompleksne koncepte na jednostavan način. Stvarno mi je pomogao da poboljšam svoje znanje matematike.</p>
                        <div class="text-xs text-base-content/60 mt-2">Prije 2 dana</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endhasrole
          
          <!-- Badges & Achievements -->
          <div class="card bg-base-100 shadow-lg border border-base-200">
            <div class="card-body">
              <h2 class="card-title">Postignuća</h2>
              
              <div class="grid grid-cols-3 gap-3 mt-3">
                <div class="tooltip" data-tip="Autor 10+ materijala">
                  <div class="flex flex-col items-center p-2 bg-base-200 rounded-lg hover:bg-base-300 transition-colors">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                    </div>
                    <span class="text-xs text-center">Kreator</span>
                  </div>
                </div>
                
                <div class="tooltip" data-tip="100+ pregleda materijala">
                  <div class="flex flex-col items-center p-2 bg-base-200 rounded-lg hover:bg-base-300 transition-colors">
                    <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary mb-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </div>
                    <span class="text-xs text-center">Popularno</span>
                  </div>
                </div>
                
                <div class="tooltip" data-tip="Aktivan 6+ mjeseci">
                  <div class="flex flex-col items-center p-2 bg-base-200 rounded-lg hover:bg-base-300 transition-colors">
                    <div class="w-12 h-12 rounded-full bg-accent/10 flex items-center justify-center text-accent mb-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </div>
                    <span class="text-xs text-center">Dosljedan</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </x-div.container>
</div>
@endsection
