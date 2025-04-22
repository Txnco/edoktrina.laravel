<header class="relative z-50">
  <nav class="navbar max-w-7xl mx-auto px-4 py-3">
    <!-- Logo -->
    <div class="navbar-start">
      <a href="/" class="text-2xl font-bold flex items-center  ">
        {{ config('app.name') }}
      </a>
    </div>

    <!-- Desktop Navigation -->
    <div class="navbar-center hidden lg:flex">
      <div class="flex items-center space-x-4">
        <!-- Učenje Dropdown -->
        <div class="group relative">
          <span class="text-base font-medium px-3 py-2 inline-flex items-center cursor-default select-none">
            Učenje
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </span>
          
          <!-- Dropdown menu (absolute positioned) -->
          <div class="absolute left-0 top-full opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out pt-2 w-80">
            <div class="bg-base-100 rounded-box shadow-xl border border-base-300 overflow-hidden">
              <!-- Dropdown Header -->
              <div class="p-4 border-b border-base-200 cursor-default">
                <h3 class="font-bold text-lg">Učenje</h3>
                <p class="text-sm opacity-70">Odaberite način učenja koji vam odgovara</p>
              </div>
              
              <!-- First Section -->
              <div class="p-2 cursor-default">
                {{-- <h4 class="px-4 py-2 text-xs font-semibold uppercase text-base-content/60">Popularne opcije</h4> --}}
                <ul>
                  <li>
                    <a href="/skripte" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">Skripte</div>
                          <div class="text-xs opacity-70">Preuzmi gotove materijale za učenje</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="/ai-ucenje" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">AI učenje</div>
                          <div class="text-xs opacity-70">Personalizirano učenje uz pomoć AI-a</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Instruktori Dropdown -->
        <div class="group relative">
          <span class="text-base font-medium px-3 py-2 inline-flex items-center cursor-default select-none">
            Instruktori
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </span>
          
          <!-- Dropdown menu (absolute positioned) -->
          <div class="absolute left-0 top-full opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out pt-2 w-80">
            <div class="bg-base-100 rounded-box shadow-xl border border-base-300 overflow-hidden">
              <!-- Dropdown Header -->
              <div class="p-4 border-b border-base-200 cursor-default">
                <h3 class="font-bold text-lg">Instruktori</h3>
                <p class="text-sm opacity-70">Pronađite svog idealnog instruktora</p>
              </div>
              
              <!-- Menu Options -->
              <div class="p-2 cursor-default">
                <h4 class="px-4 py-2 text-xs font-semibold uppercase text-base-content/60">Opcije</h4>
                <ul>
                  <li>
                    <a href="/pronadi-instruktora" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">Pronađi instruktora</div>
                          <div class="text-xs opacity-70">Pretraži bazu dostupnih instruktora</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="/najbolji-instruktori" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">Najbolji instruktori</div>
                          <div class="text-xs opacity-70">Pogledaj top-ocijenjene instruktore</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('become.tutor') }}" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-accent/10 flex items-center justify-center text-accent">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">Postani i ti instruktor</div>
                          <div class="text-xs opacity-70">Prijavi se i počni predavati</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
         <!-- Instruktori Dropdown -->
         <div class="group relative">
          <span class="text-base font-medium px-3 py-2 inline-flex items-center cursor-default select-none">
            Vježbaj
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </span>
          
          <!-- Dropdown menu (absolute positioned) -->
          <div class="absolute left-0 top-full opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out pt-2 w-80">
            <div class="bg-base-100 rounded-box shadow-xl border border-base-300 overflow-hidden">
              <!-- Dropdown Header -->
              <div class="p-4 border-b border-base-200 cursor-default">
                <h3 class="font-bold text-lg">Vježbaj zadatke</h3>
                <p class="text-sm opacity-70">Pronađite svoj način za utvrđivanje znanja</p>
              </div>
              
              <!-- Menu Options -->
              <div class="p-2 cursor-default">
                <h4 class="px-4 py-2 text-xs font-semibold uppercase text-base-content/60">Opcije</h4>
                <ul>
                  <li>
                    <a href="/pronadi-instruktora" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                            <path d="M12 4v16"></path>
                            <path d="M9 8h2"></path>
                            <path d="M15 8h1"></path>
                            <path d="M9 12h1"></path>
                            <path d="M15 12h1"></path>
                            <path d="M8 16h8"></path>
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">Flash kartice</div>
                          <div class="text-xs opacity-70">Sa jedne strane pitanje, a sa druge ti odgovaraš!</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                  
                  <li>
                    <a href="/najbolji-instruktori" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            <path d="M8 7h8"></path>
                            <path d="M8 17h8"></path>
                            <path d="M15.728 10.5h.545"></path>
                            <path d="M7.727 10.5h.545"></path>
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">Kviz</div>
                          <div class="text-xs opacity-70">Rješavaj male testove iz svojih omiljenih predmeta</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                  
                  <li>
                    <a href="/postani-instruktor" class="p-3 hover:bg-base-200 block group/item">
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-accent/10 flex items-center justify-center text-accent">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"></path>
                            <path d="M14 3v5h5M12 18v-6M9 15h6"></path>
                            <path d="M9 11h1M14 11h1"></path>
                          </svg>
                        </div>
                        <div class="flex-1">
                          <div class="font-medium">Kreiraj vlastite zadatke</div>
                          <div class="text-xs opacity-70">Budi kreativan/a i izradi svoje izazove!</div>
                        </div>
                        <svg class="w-4 h-4 opacity-0 group-hover/item:opacity-100 transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      </div>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>

        <a href="/o-nama" class="text-base font-medium px-3 py-2">O nama</a>
      </div>
    </div>

    <!-- Right Side - CTA Buttons -->
    <div class="navbar-end space-x-4">
      @guest
        <a href="/login" class="hidden md:flex items-center text-base font-medium hover:text-primary">
          Prijava
        </a>
        
        <a href="{{ route('register') }}" class="btn btn-primary rounded-full px-6">
          Registracija
        </a>
      @endguest

      @auth
        @include('partials.user-dropdown')
      @endauth

      <!-- Mobile Menu Button -->
      <div class="lg:hidden">
        <button id="mobile-menu-button" class="btn btn-ghost p-0">
          <svg width="16" height="10" viewBox="0 0 16 10">
            <g fill="currentColor" fill-rule="evenodd">
              <rect y="8" width="16" height="2" rx="1"></rect>
              <rect y="4" width="16" height="2" rx="1"></rect>
              <rect width="16" height="2" rx="1"></rect>
            </g>
          </svg>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="fixed inset-y-0 right-0 w-72 bg-base-100 shadow-xl transform translate-x-full transition-transform duration-200 ease-in-out z-50 lg:hidden overflow-y-auto">
    <div class="flex flex-col h-full">
      <!-- Close Button and Header -->
      <div class="flex items-center justify-between p-4 border-b border-base-200">
        <span class="font-bold text-lg">Meni</span>
        <button id="close-mobile-menu" class="btn btn-ghost btn-sm btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Menu Content -->
      <div class="overflow-y-auto flex-grow">
        <!-- Main Links -->
        <ul class="menu p-4 w-full">
          <!-- Učenje Section -->
          <li>
            <details>
              <summary class="flex items-center gap-3 font-medium">
                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                  </svg>
                </div>
                Učenje
              </summary>
              <ul class="pl-4 mt-2">
                <li>
                  <a href="/skripte" class="flex items-center gap-3 py-2">
                    <div class="w-7 h-7 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                    </div>
                    <span>Skripte</span>
                  </a>
                </li>
                <li>
                  <a href="/ai-ucenje" class="flex items-center gap-3 py-2">
                    <div class="w-7 h-7 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <span>AI učenje</span>
                  </a>
                </li>
              </ul>
            </details>
          </li>

          <!-- Instruktori Section -->
          <li>
            <details>
              <summary class="flex items-center gap-3 font-medium">
                <div class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                Instruktori
              </summary>
              <ul class="pl-4 mt-2">
                <li>
                  <a href="/pronadi-instruktora" class="flex items-center gap-3 py-2">
                    <div class="w-7 h-7 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                    </div>
                    <span>Pronađi instruktora</span>
                  </a>
                </li>
                <li>
                  <a href="/najbolji-instruktori" class="flex items-center gap-3 py-2">
                    <div class="w-7 h-7 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                      </svg>
                    </div>
                    <span>Najbolji instruktori</span>
                  </a>
                </li>
                <li>
                  <a href="/postani-instruktor" class="flex items-center gap-3 py-2">
                    <div class="w-7 h-7 rounded-lg bg-accent/10 flex items-center justify-center text-accent">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                      </svg>
                    </div>
                    <span>Postani instruktor</span>
                  </a>
                </li>
              </ul>
            </details>
          </li>

          <!-- Other Links -->
          <li>
            <a href="/materijali" class="flex items-center gap-3 font-medium">
              <div class="w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center text-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
              </div>
              Obrazovni materijali
            </a>
          </li>

          <li>
            <a href="/o-nama" class="flex items-center gap-3 font-medium">
              <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              O nama
            </a>
          </li>
        </ul>
        
        <div class="divider px-4"></div>
        
        <!-- Auth Section -->
        <div class="p-4">
          @guest
            <div class="space-y-3">
              <a href="/login" class="btn btn-outline btn-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Prijava
              </a>
              <a href="{{ route('register') }}" class="btn btn-primary btn-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Registracija
              </a>
            </div>
          @else
            <!-- User Profile Section -->
            <div class="flex items-center mb-4 p-2 bg-base-200 rounded-lg">
              @php
                $user = auth()->user();
                $profilePhoto = $user->profile_photo_url ?? null;
              @endphp
              
              @if($profilePhoto)
                <div class="w-10 h-10 rounded-full mr-3 overflow-hidden">
                  <img src="{{ $profilePhoto }}" alt="Profile" class="w-full h-full object-cover">
                </div>
              @else
                <div class="avatar placeholder mr-3">
                  <div class="bg-neutral text-neutral-content rounded-full w-10">
                    <span>{{ strtoupper(substr($user->first_name ?? '', 0, 1)) }}{{ strtoupper(substr($user->last_name ?? '', 0, 1)) }}</span>
                  </div>
                </div>
              @endif
              
              <div>
                <div class="font-medium">{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}</div>
                <div class="text-sm opacity-70">{{ $user->email ?? '' }}</div>
              </div>
            </div>
            
            <div class="space-y-1">
              <a href="{{ route('user.profile', ['username' => $user->username ?? '']) }}" class="btn btn-ghost btn-block justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Moj profil
              </a>
              
              @hasrole('admin')
              <a href="{{ route('admin.dashboard') ?? '#' }}" class="btn btn-ghost btn-block justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                </svg>
                Upravljačka ploča
              </a>
              @endhasrole
              
              <a href="#" class="btn btn-ghost btn-block justify-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Postavke
              </a>
              
              <a 
                href="#" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                class="btn btn-outline btn-error btn-block justify-start mt-3"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Odjava
              </a>
              
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
              </form>
            </div>
          @endguest
        </div>
      </div>
      
      <!-- Theme Toggle -->
      <div class="p-4 border-t border-base-200">
        <label class="flex items-center justify-between cursor-pointer">
          <span class="label-text">Tamna tema</span>
          <input id="theme-toggle" type="checkbox" class="toggle theme-controller" />
        </label>
      </div>
    </div>
  </div>
</header>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMobileMenuButton = document.getElementById('close-mobile-menu');

    // Toggle Mobile Menu
    mobileMenuButton.addEventListener('click', function(e) {
      e.stopPropagation();
      mobileMenu.classList.remove('translate-x-full');
      document.body.classList.add('overflow-hidden');
    });

    // Close Mobile Menu
    closeMobileMenuButton.addEventListener('click', function() {
      mobileMenu.classList.add('translate-x-full');
      document.body.classList.remove('overflow-hidden');
    });

    // Close Menu When Clicking Outside
    document.addEventListener('click', function(event) {
      if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
        mobileMenu.classList.add('translate-x-full');
        document.body.classList.remove('overflow-hidden');
      }
    });
    
    // Prevent clicks inside the mobile menu from closing it
    mobileMenu.addEventListener('click', function(e) {
      e.stopPropagation();
    });
  });
</script>
