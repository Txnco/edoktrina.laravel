@extends('layouts.base')

@section('content')

<div class="flex flex-col lg:flex-row min-h-screen">
  <!-- Fixed Header -->
  @include('partials.admin.header')

  <div class="drawer lg:drawer-open">
      <input id="main-drawer" type="checkbox" class="drawer-toggle" />
      
      <!-- Main Content -->
      <div class="drawer-content flex flex-col pl-10 pr-10 pt-20"> <!-- Added margin-top -->
          @yield('main-content')
      </div>

      <!-- Sidebar -->
      <div class="drawer-side lg:drawer-open !important">
          <label for="main-drawer" class="drawer-overlay lg:hidden"></label>
            <div class="menu p-4 w-64 bg-base-100 text-base-content border-r border-base-300 min-h-[calc(100vh-4rem)] h-full lg:static pt-16 mt-0 flex flex-col justify-between">
            <!-- Navigation Menu - Top Section -->
            <div>
              <li class="menu-title mt-4 text-base-content">{{ __('Glavni izbornik') }}</li>
              <li class="mt-1 mb-1">
                <a href="{{ route('admin.dashboard') }}" class="hover:bg-base-300 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                  <x-heroicon-o-chart-pie class="w-6 h-6" />
                  {{ __('Kontrolna ploča') }}
                </a>
              </li>
              <li class="mt-1 mb-1">
                <a class="hover:bg-base-300 ">
                  <x-heroicon-o-chart-bar class="w-6 h-6" />
                  {{ __('Grafovi') }}
                  <span class="badge badge-primary badge-sm">Pro</span>
                </a>
              </li>
              @php
                  use App\Models\TutorApplication;
                  $pendingCount = TutorApplication::where('status', 'pending')->count();
              @endphp
              <li class="mt-1 mb-1">
                <a href="{{ route('admin.tutors.applications') }}" class="hover:bg-base-300 {{ request()->routeIs('admin.subjects') ? 'active' : '' }}">
                  <x-heroicon-o-academic-cap class="w-6 h-6" />
                  {{ __('Prijave za instruktora') }} 
                  @if($pendingCount)
                    <span class="badge badge-error badge-sm">{{ $pendingCount }}</span>
                  @endif
                </a>
              </li>
              <li class="mt-1 mb-1">
                <a href="{{ route('admin.subjects') }}" class="hover:bg-base-300 {{ request()->routeIs('admin.subjects') ? 'active' : '' }}">
                  <x-heroicon-o-book-open class="w-6 h-6" />
                  {{ __('Predmeti') }}
                </a>
              </li>
              <li class="mt-1 mb-1">
                <a href="{{ route('admin.users') }}" class="hover:bg-base-300 {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                  <x-heroicon-o-users class="w-6 h-6" />
                  {{ __('Korisnici') }}
                </a>
              </li>
              <li class="mt-1 mb-1">
                <a href="{{ route('admin.roles-permissions') }}" class="hover:bg-base-300">
                  <x-heroicon-o-shield-check class="w-6 h-6" />
                  {{ __('Uloge i dozvole') }}
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