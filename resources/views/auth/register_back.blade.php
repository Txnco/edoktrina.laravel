@extends('layouts.auth')

@section('main-content')
<div class="max-w-md mx-auto my-8 p-6 bg-white rounded-lg shadow-lg ">
    <div class="mb-3 text-center">
        <a href="{{ config('app.url') }}"
            class="text-7xl  font-bold text-center mb-8 bg-gradient-to-r from-[#7360DF] to-[#8472E5] text-transparent bg-clip-text">{{ config('app.name') }}</a>
    </div>
    <h4
        class="text-3xl font-bold text-center mb-6 bg-gradient-to-r from-[#33186B] to-[#3F2A78] text-transparent bg-clip-text">
        Registriraj se</h4>
        <form method="POST" action="{{ route('register') }}">
            @csrf
        <!-- Username Field -->
        <div class="relative mb-6">
            <input type="text" id="first_name" name="first_name" required
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 dark:border-gray-600 dark:text-black focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="username"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-2 z-10 origin-[0] bg-white  px-2 ml-3 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-90">Ime</label>
        </div>

        <!-- Username Field -->
        <div class="relative mb-6">
            <input type="text" id="last_name" name="last_name" required
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 dark:border-gray-600 dark:text-black focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="username"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-2 z-10 origin-[0] bg-white  px-2 ml-3 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-90">Prezime</label>
        </div>

        <!-- Email Field -->
        <div class="relative mb-6">
            <input type="email" id="email" name="email" required
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 dark:border-gray-600 dark:text-black focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="email"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-2 z-10 origin-[0] bg-white  px-2 ml-3 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-90">Email</label>
        </div>

        <!-- Password Field -->
        <div class="relative mb-6"> 
            <input type="password"  name="password" required
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 dark:border-gray-600 dark:text-black focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="password"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-2 z-10 origin-[0] bg-white  px-2 ml-3 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-90">Lozinka</label>
        </div>

        <!-- Confirm Password Field -->
        <div class="relative mb-6">
            <input type="password" name="password_confirmation" required
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-2 border-gray-300 dark:border-gray-600 dark:text-black focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="password"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-2 z-10 origin-[0] bg-white  px-2 ml-3 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-90">Ponovi
                Lozinku</label>
        </div>

        <!-- Secondary Button -->
        <button type="submit"
            class="w-full text-center bg-gradient-to-r from-[#7360DF] to-[#8472E5] text-white font-bold py-2 px-6 rounded shadow-lg hover:scale-105 hover:shadow-xl transition-transform transition-colors duration-300 ease-in-out ">
            Registriraj se
        </button>

    </form>

    <div class="text-center mt-4 font-weight-light  text-black  "> Već imate račun? <a href="{{ config('app.url') }}/login"
            class=" text-primary  ">Prijavite se</a>
    </div>

</div>


@endsection