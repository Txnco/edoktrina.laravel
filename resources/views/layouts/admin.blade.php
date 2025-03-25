@extends('layouts.base')

@section('content')

<div class="flex flex-col lg:flex-row min-h-screen">
  <!-- Fixed Header -->
  @include('partials.admin.header')

  <div class="drawer lg:drawer-open">
      <input id="main-drawer" type="checkbox" class="drawer-toggle" />
      
      <!-- Main Content -->
      <div class="drawer-content flex flex-col ml-10 mr-10 mt-20"> <!-- Added margin-top -->
          @yield('main-content')
      </div>

      <!-- Sidebar -->
      <div class="drawer-side lg:drawer-open !important">
          <label for="main-drawer" class="drawer-overlay lg:hidden"></label>
            <div class="menu p-4 w-64 bg-base-200 text-base-content border-r border-base-300 min-h-[calc(100vh-4rem)] h-full lg:static pt-16 mt-0 flex flex-col justify-between">
            <!-- Navigation Menu - Top Section -->
            <div>
              <li class="menu-title mt-4">{{ __('Glavni izbornik') }}</li>
              <li>
                <a class="active hover:bg-base-300">
                  <x-heroicon-o-chart-pie class="w-6 h-6" />
                  {{ __('Kontrolna ploča') }}
                </a>
              </li>
              <li>
                <a class="hover:bg-base-300">
                  <x-heroicon-o-chart-bar class="w-6 h-6" />
                  {{ __('Grafovi') }}
                  <span class="badge badge-primary badge-sm">Pro</span>
                </a>
              </li>
              <li>
                <a class="hover:bg-base-300">
                  <x-heroicon-o-inbox class="w-6 h-6" />
                  {{ __('Poruke') }}
                  <span class="badge badge-secondary badge-sm">3</span>
                </a>
              </li>
              <li>
                <a class="hover:bg-base-300">
                  <x-heroicon-o-users class="w-6 h-6" />
                  {{ __('Korisnici') }}
                </a>
              </li>
              <li>
                <a class="hover:bg-base-300">
                  <x-heroicon-o-shopping-bag class="w-6 h-6" />
                  {{ __('Prodaja') }}
                </a>
              </li>
            </div>
      
            <!-- Settings Section - Bottom Section -->
            <div class="mt-auto pt-4 border-t border-base-300">
              <li class="menu-title">{{ __('Postavke') }}</li>
              <li>
                <a class="hover:bg-base-300">
                  <x-heroicon-o-cog-6-tooth class="w-6 h-6" />
                  {{ __('Postavke sustava') }}
                </a>
              </li>
              <li>
                <a class="hover:bg-base-300">
                  <x-heroicon-o-question-mark-circle class="w-6 h-6" />
                  {{ __('Pomoć') }}
                </a>
              </li>
            </div>
          </div>
      </div>
  </div>
</div>

<!-- Floating Theme Toggle Button -->
<div class="fixed bottom-4 right-4 z-30 hidden lg:block ">
    <div class="form-control">
        <label class="swap swap-rotate cursor-pointer bg-primary text-primary-content shadow-lg rounded-full p-2">
            <!-- Toggle Input -->
            <input id="theme-toggle2" type="checkbox" class="hidden" />
            <!-- Icon for Light Mode (shown when checkbox is checked) -->
            <div class="swap-on">
                <x-heroicon-o-sun class="w-8 h-8" />
            </div>
            <!-- Icon for Dark Mode (shown when checkbox is unchecked) -->
            <div class="swap-off">
                <x-heroicon-s-moon class="w-8 h-8" />
            </div>
        </label>
    </div>
</div>

@endsection