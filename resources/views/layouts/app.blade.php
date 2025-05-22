@extends('layouts.base')

@section('content')

    @isset($invertedHeader)
        <div class="absolute inset-0 z-0">@yield('landingGradient')</div>
    @endisset

    @include('partials.header' , ['inverted' => $invertedHeader ?? false])


    @yield('main-content')

    <!-- Floating Theme Toggle Button -->
    <div class="fixed bottom-4 right-4 z-30 hidden lg:block">
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
  

    @include('partials.footer')
@endsection