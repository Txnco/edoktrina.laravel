@extends('layouts.app')

@section('main-content')

<!-- Hero Section -->
<section class="hero min-h-screen bg-base-200">
  <div class="hero-content text-center">
    <div class="max-w-4xl">
      <h1 class="text-5xl font-bold">Pronađite najbolje instruktore i skripte za učenje</h1>
      <p class="py-6 text-xl">Naša platforma omogućuje lakše učenje kroz kvalitetne instrukcije, skripte, kvizove i AI alate. Pridružite se zajednici koja vam pomaže postići akademski uspjeh.</p>
      <div class="flex justify-center gap-4">
        <a href="#instruktori" class="btn btn-primary">Pronađi Instruktora</a>
        <a href="#skripte" class="btn btn-primary">Istraži Skripte</a>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us Section -->
<section class="bg-base-100 py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-bold text-center mb-8">Zašto odabrati nas?</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Card 1 -->
      <div class="card bg-base-200 shadow-xl">
        <div class="card-body">
          <h3 class="card-title text-2xl font-bold">Kvalitetni Instruktori</h3>
          <p>Naši instruktori su stručnjaci u svojim područjima s iskustvom u podučavanju.</p>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="card bg-base-200 shadow-xl">
        <div class="card-body">
          <h3 class="card-title text-2xl font-bold">AI Alati za Učenje</h3>
          <p>Koristite napredne AI alate za rješavanje zadataka, kvizove i učenje.</p>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="card bg-base-200 shadow-xl">
        <div class="card-body">
          <h3 class="card-title text-2xl font-bold">Besplatne Skripte</h3>
          <p>Pristupite besplatnim skriptama za različite predmete i olakšajte svoje učenje.</p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Call to Action Section -->
<section class="bg-primary text-primary-content py-16">
  <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-bold mb-4">Unovči svoje znanje!</h2>
    <p class="text-lg mb-8">Imate dovoljno znanja iz nekog predmeta? Podijelite svoje znanje i pomozite drugima! Prijavite se kao instruktor već danas.</p>
    <a href="{{ url('racun/prijava') }}" class="btn">Postani Instruktor</a>
  </div>
</section>

<!-- Featured Instruktors Section -->
<section class="bg-base-100 py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-bold text-center mb-8">Najbolji Instruktori</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Instruktor 1 -->
      <div class="card bg-base-200 shadow-xl">
        <figure class="px-10 pt-10">
          <img src="{{ asset('assets\images\students1.jpg') }}" alt="Instruktor 1" >
        </figure>
        <div class="card-body items-center text-center">
          <h3 class="card-title text-2xl font-bold">Ivan Horvat</h3>
          <p>Stručnjak za matematiku s 5+ godina iskustva.</p>
          <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Rezerviraj</a>
          </div>
        </div>
      </div>
      <!-- Instruktor 2 -->
      <div class="card bg-base-200 shadow-xl">
        <figure class="px-10 pt-10">
          <img src="{{ asset('assets\images\students2.jpg') }}" alt="Instruktor 2" >
        </figure>
        <div class="card-body items-center text-center">
          <h3 class="card-title text-2xl font-bold">Ana Kovač</h3>
          <p>Instruktorica za programiranje i web development.</p>
          <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Rezerviraj</a>
          </div>
        </div>
      </div>
      <!-- Instruktor 3 -->
      <div class="card bg-base-200 shadow-xl">
        <figure class="px-10 pt-10">
          <img src="{{ asset('assets\images\students4.jpg') }}" alt="Instruktor 3" >
        </figure>
        <div class="card-body items-center text-center">
          <h3 class="card-title text-2xl font-bold">Marko Petrović</h3>
          <p>Stručnjak za fiziku i prirodne znanosti.</p>
          <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Rezerviraj</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="bg-base-200 py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-bold text-center mb-8">Usluge koje pružamo</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Skripte -->
      <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
          <h3 class="card-title text-2xl font-bold">Skripte</h3>
          <p>Dijeljenje je znanje. Pristupite raznim skriptama za pojedine predmete.</p>
          <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Istraži</a>
          </div>
        </div>
      </div>
      <!-- Instrukcije -->
      <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
          <h3 class="card-title text-2xl font-bold">Instrukcije</h3>
          <p>Pronađite instruktora koji odgovara vašim potrebama za bilo koji predmet.</p>
          <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Pronađi Instruktora</a>
          </div>
        </div>
      </div>
      <!-- Kvizovi -->
      <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
          <h3 class="card-title text-2xl font-bold">Kvizovi</h3>
          <p>Učinite učenje zabavnim putem kvizova i kartica za ponavljanje.</p>
          <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Započni Kviz</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection