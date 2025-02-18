@extends('layouts.base')

@section('content')
    @include('partials.header')


    @yield('main-content')

    <!-- Floating Theme Toggle Button -->
    <div class="fixed bottom-4 right-4 z-50 ">
        <div class="form-control">
            <label class="swap swap-rotate cursor-pointer bg-primary text-primary-content shadow-lg rounded-full p-2">
                <!-- Toggle Input -->
                <input id="theme-toggle2" type="checkbox" class="hidden" />
                <!-- Icon for Light Mode (shown when checkbox is checked) -->
                <svg class="swap-on stroke-primary-content fill-primary-content w-8 h-8" 
                     xmlns="http://www.w3.org/2000/svg" 
                     viewBox="0 0 24 24" 
                     fill="none" 
                     stroke="currentColor" 
                     stroke-width="2" 
                     stroke-linecap="round" 
                     stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5" />
                    <path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/>
                </svg>
                <!-- Icon for Dark Mode (shown when checkbox is unchecked) -->
                <svg class="swap-off stroke-primary-content fill-primary-content w-8 h-8" 
                     xmlns="http://www.w3.org/2000/svg" 
                     viewBox="0 0 24 24" 
                     fill="none" 
                     stroke="currentColor" 
                     stroke-width="2" 
                     stroke-linecap="round" 
                     stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>
            </label>
            
        </div>
    </div>
  

    @include('partials.footer')
@endsection