@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="bg-[#242526] text-white">

      <x-section-card 
        image="images/students1.jpg" 
        title="Svatko može pronaći" 
        subtitle="put do znanja koje traži" 
     />
  
      <!-- Usluge Section  -->
      <section class="bg-[#242526] text-white py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-2 lg:py-4">
          <div class="text-left">
            <h2 class="text-3xl font-bold sm:text-4xl">Usluge koje pružamo</h2>
          </div>
      
          <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Skripte -->
            <x-card-link 
              href="#" 
              icon="M12 8v8m-4-4h8M21 12a9 9 0 11-18 0 9 9 0 0118 0z" 
              title="Skripte" 
              description="Dijeljenje je znanje. Možete učiti iz raznih skripti za pojedini predmet." 
            />
      
            <!-- Instrukcije -->
            <x-card-link 
                href="#" 
                icon="M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z M12 14l9-5-9-5-9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" 
                title="Instrukcije" 
                description="Pronađite instruktora koji odgovara Vama za bilo koji predmet." 
            />
      
            <!-- Kvizovi -->
            <x-card-link 
                href="#" 
                icon="M12 8v4m-2 2h4M4 12a8 8 0 1116 0A8 8 0 014 12z" 
                title="Kvizovi" 
                description="Učenje možete učiniti zabavnim putem kvizova i kartica za ponavljanje!" 
            />
          </div>
        </div>
      </section>
      
  
      <article class="rounded-xl bg-white p-4 ring ring-indigo-50 sm:p-6 lg:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:gap-8">
          <div
            class="hidden sm:grid sm:w-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500"
            aria-hidden="true"
          >
            <div class="flex items-center gap-1">
              <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
              <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
              <span class="h-4 w-0.5 rounded-full bg-indigo-500"></span>
              <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
              <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
            </div>
          </div>
  
          <div>
            <strong
              class="rounded border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white"
            >
              Episode #101
            </strong>
  
            <h3 class="mt-4 text-lg font-medium sm:text-xl">
              <a href="#" class="hover:underline"> Some Interesting Podcast Title </a>
            </h3>
  
            <p class="mt-1 text-sm text-gray-700">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam nulla amet voluptatum sit
              rerum, atque, quo culpa ut necessitatibus eius suscipit eum accusamus, aperiam voluptas
              exercitationem facere aliquid fuga. Sint.
            </p>
  
            <div class="mt-4 sm:flex sm:items-center sm:gap-2">
              <div class="flex items-center gap-1 text-gray-500">
                <svg
                  class="w-4 h-4"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
  
                <p class="text-xs font-medium">48:32 minutes</p>
              </div>
  
              <span class="hidden sm:block" aria-hidden="true">&middot;</span>
  
              <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
                Featuring <a href="#" class="underline hover:text-gray-700">Barry</a>,
                <a href="#" class="underline hover:text-gray-700">Sandra</a> and
                <a href="#" class="underline hover:text-gray-700">August</a>
              </p>
            </div>
          </div>
        </div>
      </article>
  
      <!-- Call to Action -->
      <section class="bg-[#244DC4] text-white py-16">
        <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8">
          <h3 class="text-4xl font-bold mb-4">Unovči svoje znanje!</h3>
          <p class="text-lg mb-8">Imate dovoljno znanja iz nekog predmeta? Podijelite svoje znanje i pomozite drugima! Prijavite se kao instruktor već danas.</p>
          <a class="bg-white text-[#244DC4] px-6 py-3 rounded-lg hover:bg-gray-100 transition" href="{{ url('racun/prijava') }}">Postani instruktor</a>
        </div>
      </section>
  

@endsection