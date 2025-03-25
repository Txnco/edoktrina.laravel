@extends('layouts.app') {{-- Assuming you have a layout file with header and footer --}}

@section('main-content')

<x-div.container>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Side Menu -->
        <div class="col-span-1">
            <div class="bg-base-200 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Menu</h2>
                <ul class="menu bg-base-100 rounded-box">
                    <li><a href="">Edit Profile</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="">Activity Log</a></li>
                    <li><a href="">Security</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Profile Content -->
        <div class="col-span-3">
            <div class="bg-base-200 p-6 rounded-lg shadow-md">
                <!-- Profile Header -->
                <div class="flex items-center space-x-6 mb-8">
                    <!-- Profile Icon -->
                    @auth
                        <div class="flex justify-center">
                            <div class="dropdown dropdown-end">
                                @php
                                    $user = auth()->user();
                                    $profilePhoto = $user->profile_photo_url;
                                @endphp
                                <label tabindex="0" class="flex items-center justify-center">
                                    @if($profilePhoto)
                                        <div class="w-24 h-24 rounded-full flex items-center justify-center overflow-hidden">
                                            <img src="{{ $profilePhoto }}" alt="Profile Photo" class="object-cover w-full h-full cursor-pointer">
                                        </div>
                                    @else
                                        <div class="avatar online placeholder">
                                            <div class="bg-neutral text-neutral-content w-24 h-24 rounded-full flex items-center justify-center">
                                                <span class="text-4xl">{{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </label>
                            </div>
                        </div>
                    @endauth

                    <!-- User Info -->
                    <div>
                        <h1 class="text-3xl font-bold">{{ $user->first_name }} {{ $user->last_name }}</h1>
                        <p class="text-gray-500">{{ $user->email }}</p>
                        <p class="text-gray-500">Joined </p>
                    </div>
                </div>

                <!-- Additional Profile Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bio Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Bio</h2>
                        <p class="text-gray-700">{{ $user->bio ?? 'No bio available.' }}</p>
                    </div>

                    <!-- Contact Info Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Contact Info</h2>
                        <ul class="space-y-2">
                            <li><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</li>
                            <li><strong>Location:</strong> {{ $user->location ?? 'Not provided' }}</li>
                        </ul>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bio Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Bio</h2>
                        <p class="text-gray-700">{{ $user->bio ?? 'No bio available.' }}</p>
                    </div>

                    <!-- Contact Info Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Contact Info</h2>
                        <ul class="space-y-2">
                            <li><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</li>
                            <li><strong>Location:</strong> {{ $user->location ?? 'Not provided' }}</li>
                        </ul>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bio Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Bio</h2>
                        <p class="text-gray-700">{{ $user->bio ?? 'No bio available.' }}</p>
                    </div>

                    <!-- Contact Info Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Contact Info</h2>
                        <ul class="space-y-2">
                            <li><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</li>
                            <li><strong>Location:</strong> {{ $user->location ?? 'Not provided' }}</li>
                        </ul>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Bio Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Bio</h2>
                        <p class="text-gray-700">{{ $user->bio ?? 'No bio available.' }}</p>
                    </div>

                    <!-- Contact Info Section -->
                    <div class="bg-base-100 p-4 rounded-lg shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Contact Info</h2>
                        <ul class="space-y-2">
                            <li><strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}</li>
                            <li><strong>Location:</strong> {{ $user->location ?? 'Not provided' }}</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-div.container>
@endsection