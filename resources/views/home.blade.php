@extends('layouts.app')

@section('main-content')


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


<!-- Hero Section with Abstract Gradient Waves -->
<section class="relative hero min-h-screen" data-aos="fade-up">

  <div class="hero-content flex-col lg:flex-row-reverse z-10">
    <!-- AI Chat Visualization -->
    <div class="relative lg:w-1/2" data-aos="zoom-in-left">
      <div class="mockup-window border bg-base-300 shadow-xl ">
        <div class="flex justify-center px-4 py-8 bg-base-200">
          <div class="space-y-4 w-full max-w-md">
            <div class="flex items-center gap-2 mb-6">
              <div class="avatar">
                <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
                  <x-heroicon-s-sparkles class="m-2" />
                </div>
              </div>
              <div class="font-bold text-lg">{{ config('app.name') }} AI</div>
            </div>
            
            <div class="chat chat-start">
              <div class="chat-bubble chat-bubble-primary">Kako mogu pomoći s učenjem matematike?</div>
            </div>
            
            <div class="chat chat-end">
              <div class="chat-bubble chat-bubble-secondary">Trebam pomoć s integralima.</div>
            </div>
            
            <div class="chat chat-start">
              <div class="chat-bubble chat-bubble-primary">
                  <div class="animate-pulse mt-2">
                    <div class="h-2 w-2 bg-base-content rounded-full" style="--i: 0"></div>
                    <div class="h-2 w-2 bg-base-content rounded-full" style="--i: 1"></div>
                    <div class="h-2 w-2 bg-base-content rounded-full" style="--i: 2"></div>
                  </div>
              </div>
            </div>
            
            <div class="mt-4 flex">
              <input type="text" placeholder="Postavi pitanje..." class="input input-bordered input-sm flex-grow" />
              <button class="btn btn-primary btn-sm ml-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Hero Text Content -->
    <div class="lg:w-1/2" data-aos="fade-right">
      <h1 class="text-white text-5xl  font-bold ">Revolucioniraj svoje učenje uz AI</h1>
      <p class="py-6 text-white text-xl">Pronađi instruktore, generiraj materijale za učenje i savladaj gradivo bez napora</p>
      <div class="flex flex-wrap gap-4">
        <button class="btn btn-primary px-8">
          Pronađi instruktora
          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </button>
        <button class="btn btn-secondary px-8 ">Započni učenje</button>
      </div>
      
      <!-- Trust Badges -->
      <div class="mt-8 flex flex-wrap gap-4 items-center">
        <div class="badge badge-lg">4.9/5 ⭐</div>
        <div class="text-sm opacity-75">Preko 10,000+ zadovoljnih korisnika</div>
      </div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="py-20 px-4 bg-base-100" data-aos="fade-up">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-4">Ključne značajke</h2>
      <p class="text-lg opacity-75 max-w-2xl mx-auto">Naša platforma kombinira najnoviju AI tehnologiju s provjerenim metodama učenja za najbolje rezultate</p>
    </div>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Feature Card 1 -->
      <div class="card bg-base-200 shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl border border-base-300">
        <div class="card-body items-center text-center">
          <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          <h3 class="card-title mb-2">Stručni instruktori</h3>
          <p>Povezujemo te s provjerenim stručnjacima za svaki predmet</p>
          <div class="mt-4">
            <a href="#" class="link link-primary link-hover">Saznaj više →</a>
          </div>
        </div>
      </div>
      
      <!-- Feature Card 2 -->
      <div class="card bg-base-200 shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl border border-base-300">
        <div class="card-body items-center text-center">
          <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
            </svg>
          </div>
          <h3 class="card-title mb-2">AI asistent za učenje</h3>
          <p>Personalizirani AI asistent koji odgovara na pitanja i pomaže u učenju</p>
          <div class="mt-4">
            <a href="#" class="link link-secondary link-hover">Saznaj više →</a>
          </div>
        </div>
      </div>
      
      <!-- Feature Card 3 -->
      <div class="card bg-base-200 shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl border border-base-300">
        <div class="card-body items-center text-center">
          <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>
          <h3 class="card-title mb-2">Pametni materijali</h3>
          <p>Generiraj sažetke, bilješke i testove za bilo koji predmet</p>
          <div class="mt-4">
            <a href="#" class="link link-accent link-hover">Saznaj više →</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- How It Works Section -->
<section class="py-20 px-4 bg-base-200" data-aos="fade-up">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-4">Kako funkcionira</h2>
      <p class="text-lg opacity-75 max-w-2xl mx-auto">Jednostavan proces u tri koraka do boljeg učenja</p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <!-- Step 1 -->
      <div class="flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center text-primary-content text-2xl font-bold mb-6">1</div>
        <h3 class="text-xl font-bold mb-3">Odaberi predmet</h3>
        <p>Pretraži našu bazu predmeta ili dodaj novi koji te zanima</p>
        <div class="mt-4 w-full h-1 bg-primary/20 rounded-full"></div>
      </div>
      
      <!-- Step 2 -->
      <div class="flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-secondary flex items-center justify-center text-secondary-content text-2xl font-bold mb-6">2</div>
        <h3 class="text-xl font-bold mb-3">Postavi pitanje</h3>
        <p>Naš AI će odgovoriti na tvoja pitanja ili te povezati s instruktorom</p>
        <div class="mt-4 w-full h-1 bg-secondary/20 rounded-full"></div>
      </div>
      
      <!-- Step 3 -->
      <div class="flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-accent flex items-center justify-center text-accent-content text-2xl font-bold mb-6">3</div>
        <h3 class="text-xl font-bold mb-3">Uči i napreduj</h3>
        <p>Koristi generirane materijale i savjete za brže i učinkovitije učenje</p>
        <div class="mt-4 w-full h-1 bg-accent/20 rounded-full"></div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 px-4 bg-base-100" data-aos="fade-up">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-4">Što kažu naši korisnici</h2>
      <p class="text-lg opacity-75 max-w-2xl mx-auto">Pridruži se tisućama zadovoljnih studenata</p>
    </div>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Testimonial 1 -->
      <div class="card bg-base-200 shadow-xl border border-base-300">
        <div class="card-body">
          <div class="flex items-center mb-4">
            <div class="rating rating-sm">
              <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-1" class="mask mask-star-2 bg-orange-400" checked />
            </div>
          </div>
          <p class="italic">"{{ config('app.name') }} mi je pomogao položiti matematiku koju sam godinama padala. AI asistent je nevjerojatan!"</p>
          <div class="flex items-center mt-6">
            <div class="avatar">
              <div class="w-10 h-10 rounded-full bg-primary/20">
                <span class="text-lg font-bold text-primary">MK</span>
              </div>
            </div>
            <div class="ml-4">
              <p class="font-semibold">Marija K.</p>
              <p class="text-sm opacity-75">Studentica, PMF Zagreb</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 2 -->
      <div class="card bg-base-200 shadow-xl border border-base-300">
        <div class="card-body">
          <div class="flex items-center mb-4">
            <div class="rating rating-sm">
              <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
            </div>
          </div>
          <p class="italic">"Kao instruktor, ova platforma mi je omogućila da pomognem više studenata nego ikad prije."</p>
          <div class="flex items-center mt-6">
            <div class="avatar">
              <div class="w-10 h-10 rounded-full bg-secondary/20">
                <span class="text-lg font-bold text-secondary">IH</span>
              </div>
            </div>
            <div class="ml-4">
              <p class="font-semibold">Ivan H.</p>
              <p class="text-sm opacity-75">Instruktor fizike</p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 3 -->
      <div class="card bg-base-200 shadow-xl border border-base-300">
        <div class="card-body">
          <div class="flex items-center mb-4">
            <div class="rating rating-sm">
              <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" checked />
              <input type="radio" name="rating-3" class="mask mask-star-2 bg-orange-400" />
            </div>
          </div>
          <p class="italic">"Sažeci koje generira AI su fantastični. Uštedio sam sate učenja i poboljšao ocjene."</p>
          <div class="flex items-center mt-6">
            <div class="avatar">
              <div class="w-10 h-10 rounded-full bg-accent/20">
                <span class="text-lg font-bold text-accent">LB</span>
              </div>
            </div>
            <div class="ml-4">
              <p class="font-semibold">Luka B.</p>
              <p class="text-sm opacity-75">Student, FER</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Section -->
<section class="py-20 px-4 bg-base-200" data-aos="fade-up">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-4">Cjenik</h2>
      <p class="text-lg opacity-75 max-w-2xl mx-auto">Odaberi plan koji odgovara tvojim potrebama</p>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <!-- Free Plan -->
      <div class="card bg-base-100 shadow-xl transform transition duration-500 hover:scale-105 border border-base-300">
        <div class="card-body">
          <h3 class="card-title">Osnovni</h3>
          <div class="text-4xl font-bold mt-4">Besplatno</div>
          <p class="text-sm opacity-75">Savršeno za početak</p>
          <div class="divider"></div>
          <ul class="space-y-3">
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Pristup osnovnim materijalima
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              5 AI upita dnevno
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Pretraga instruktora
            </li>
            <li class="flex items-center gap-2 opacity-50">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              Generiranje sažetaka
            </li>
            <li class="flex items-center gap-2 opacity-50">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              Napredni AI alati
            </li>
          </ul>
          <div class="card-actions justify-center mt-8">
            <button class="btn btn-outline btn-primary w-full">Započni besplatno</button>
          </div>
        </div>
      </div>
      
      <!-- Pro Plan -->
      <div class="card bg-base-100 shadow-xl transform transition duration-500 hover:scale-105 border-2 border-primary relative">
        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-primary text-primary-content px-4 py-1 rounded-full text-sm font-bold">Najpopularnije</div>
        <div class="card-body">
          <h3 class="card-title">Student</h3>
          <div class="text-4xl font-bold mt-4">9.99€</div>
          <p class="text-sm opacity-75">Mjesečno</p>
          <div class="divider"></div>
          <ul class="space-y-3">
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Sve iz Osnovnog plana
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Neograničeni AI upiti
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Generiranje sažetaka
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              5 sati instrukcija mjesečno
            </li>
            <li class="flex items-center gap-2 opacity-50">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              Napredni AI alati
            </li>
          </ul>
          <div class="card-actions justify-center mt-8">
            <button class="btn btn-primary w-full">Odaberi plan</button>
          </div>
        </div>
      </div>
      
      <!-- Premium Plan -->
      <div class="card bg-base-100 shadow-xl transform transition duration-500 hover:scale-105 border border-base-300">
        <div class="card-body">
          <h3 class="card-title">Premium</h3>
          <div class="text-4xl font-bold mt-4">19.99€</div>
          <p class="text-sm opacity-75">Mjesečno</p>
          <div class="divider"></div>
          <ul class="space-y-3">
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Sve iz Student plana
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Napredni AI alati
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              15 sati instrukcija mjesečno
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Prioritetna podrška
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-success" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>
              Pristup svim predmetima
            </li>
          </ul>
          <div class="card-actions justify-center mt-8">
            <button class="btn btn-outline btn-secondary w-full">Odaberi plan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-20 px-4 bg-base-100" data-aos="fade-up">
  <div class="max-w-4xl mx-auto">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-4">Često postavljana pitanja</h2>
      <p class="text-lg opacity-75 max-w-2xl mx-auto">Odgovori na najčešća pitanja o našoj platformi</p>
    </div>
    
    <div class="space-y-4">
      <div class="collapse collapse-plus bg-base-200">
        <input type="radio" name="faq-accordion" checked="checked" /> 
        <div class="collapse-title text-xl font-medium">
          Kako funkcionira AI asistent za učenje?
        </div>
        <div class="collapse-content"> 
          <p>Naš AI asistent koristi napredne algoritme strojnog učenja i obradu prirodnog jezika kako bi razumio tvoja pitanja i pružio relevantne odgovore. Može pomoći s objašnjenjima, primjerima, zadacima i generiranjem materijala za učenje.</p>
        </div>
      </div>
      
      <div class="collapse collapse-plus bg-base-200">
        <input type="radio" name="faq-accordion" /> 
        <div class="collapse-title text-xl font-medium">
          Mogu li koristiti platformu na mobilnom uređaju?
        </div>
        <div class="collapse-content"> 
          <p>Da, naša platforma je potpuno responzivna i optimizirana za sve uređaje - računala, tablete i mobilne telefone. Možeš učiti gdje god se nalaziš!</p>
        </div>
      </div>
      
      <div class="collapse collapse-plus bg-base-200">
        <input type="radio" name="faq-accordion" /> 
        <div class="collapse-title text-xl font-medium">
          Kako mogu postati instruktor na platformi?
        </div>
        <div class="collapse-content"> 
          <p>Ako želiš postati instruktor, potrebno je ispuniti prijavu na našoj stranici, proći verifikaciju stručnosti i kratku obuku za korištenje platforme. Nakon toga možeš početi pomagati studentima i zarađivati.</p>
        </div>
      </div>
      
      <div class="collapse collapse-plus bg-base-200">
        <input type="radio" name="faq-accordion" /> 
        <div class="collapse-title text-xl font-medium">
          Mogu li otkazati pretplatu u bilo kojem trenutku?
        </div>
        <div class="collapse-content"> 
          <p>Da, pretplatu možeš otkazati u bilo kojem trenutku kroz postavke svog računa. Nastavit ćeš imati pristup do kraja plaćenog razdoblja.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-4 bg-base-200 relative overflow-hidden" data-aos="fade-up">
  <!-- Abstract Gradient Waves -->
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute bottom-0 left-0 w-full h-[30vh] opacity-10 bg-gradient-to-t from-primary via-secondary to-accent"></div>
  </div>

  <div class="max-w-4xl mx-auto text-center relative z-10">
    <h2 class="text-4xl font-bold mb-6">Spreman za revoluciju u učenju?</h2>
    <p class="text-lg mb-8 max-w-2xl mx-auto">Pridruži se tisućama studenata koji već koriste našu platformu za bolje rezultate</p>
    
    <div class="flex flex-wrap justify-center gap-4">
      <button class="btn btn-primary btn-lg">
        Započni besplatno
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
      </button>
      <button class="btn btn-outline btn-lg">Kontaktiraj nas</button>
    </div>
    
    <div class="mt-10 flex flex-wrap justify-center gap-8">
      <div class="stat place-items-center">
        <div class="stat-title">Korisnici</div>
        <div class="stat-value text-primary">10K+</div>
      </div>
      <div class="stat place-items-center">
        <div class="stat-title">Predmeti</div>
        <div class="stat-value text-secondary">100+</div>
      </div>
      <div class="stat place-items-center">
        <div class="stat-title">Instruktori</div>
        <div class="stat-value text-accent">500+</div>
      </div>
    </div>
  </div>
</section>


<style>
  /* Your existing pulse animation */
  .animate-pulse {
    display: flex;
    gap: 0.5rem;
  }

  .animate-pulse div {
    animation: ripple 1.5s infinite;
    animation-delay: calc(var(--i) * 0.3s);
  }

  @keyframes ripple {
    0% {
      opacity: 0.3;
      transform: scale(0.9);
    }
    50% {
      opacity: 1;
      transform: scale(1);
    }
    100% {
      opacity: 0.3;
      transform: scale(0.9);
    }
  }

 /* Blob shape */
 .rounded-blob {
    border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
  }

  /* Smooth shifting gradient animation */
  @keyframes gradient-shift {
    0% {
      transform: translate(-50%, -50%) rotate(0deg) scale(1);
      filter: hue-rotate(0deg);
    }
    33% {
      transform: translate(-50%, -50%) rotate(120deg) scale(1.1);
      filter: hue-rotate(30deg);
    }
    67% {
      transform: translate(-50%, -50%) rotate(240deg) scale(1);
      filter: hue-rotate(60deg);
    }
    100% {
      transform: translate(-50%, -50%) rotate(360deg) scale(1.1);
      filter: hue-rotate(0deg);
    }
  }
  
  /* Floating motion animation */
  @keyframes gradient-float {
    0% {
      transform: translate(-5%, -5%);
      opacity: 0.4;
    }
    50% {
      transform: translate(5%, 5%);
      opacity: 0.6;
    }
    100% {
      transform: translate(-5%, -5%);
      opacity: 0.4;
    }
  }
  
  /* Blob morphing animation */
  @keyframes blob-morph {
    0% {
      border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
      transform: translate(0, 0) rotate(0deg);
      filter: hue-rotate(0deg);
    }
    25% {
      border-radius: 40% 60% 70% 30% / 30% 40% 60% 70%;
      transform: translate(-5px, 5px) rotate(5deg);
      filter: hue-rotate(90deg);
    }
    50% {
      border-radius: 30% 60% 70% 40% / 50% 60% 30% 40%;
      transform: translate(5px, -5px) rotate(0deg);
      filter: hue-rotate(180deg);
    }
    75% {
      border-radius: 60% 40% 30% 70% / 40% 50% 60% 50%;
      transform: translate(5px, 5px) rotate(-5deg);
      filter: hue-rotate(270deg);
    }
    100% {
      border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
      transform: translate(0, 0) rotate(0deg);
      filter: hue-rotate(360deg);
    }
  }
  
  .animate-gradient-shift {
    animation: gradient-shift 20s infinite ease-in-out;
    transform-origin: center center;
  }
  
  .animate-gradient-float {
    animation: gradient-float 15s infinite ease-in-out;
  }
  
  .animate-blob-morph {
    animation: blob-morph 25s infinite ease-in-out;
  }
  
  .animation-delay-1000 {
    animation-delay: 1s;
  }
  
  .animation-delay-2000 {
    animation-delay: 2s;
  }
  
  .animation-delay-3000 {
    animation-delay: 3s;
  }
  
  .animation-delay-4000 {
    animation-delay: 4s;
  }
  
  .animation-delay-5000 {
    animation-delay: 5s;
  }
  
  .animation-delay-6000 {
    animation-delay: 6s;
  }
  
  .animation-delay-7000 {
    animation-delay: 7s;
  }
  
  .animation-delay-8000 {
    animation-delay: 8s;
  }
</style>
@endsection