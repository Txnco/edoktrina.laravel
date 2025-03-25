@extends('layouts.app')

@section('main-content')
<x-div.container>
    <!-- Main Container -->
    <div class="max-w-4xl mx-auto p-6 bg-base-100 min-h-screen">

      <div class="card shadow-lg mb-6 relative overflow-visible bg-base-200">
        <!-- Gradient Banner -->
        <div 
          class="h-32 w-full bg-gradient-to-r from-purple-400 to-purple-600 rounded-t-box"
          style="background-image: linear-gradient(135deg, #a78bfa 0%, #7e5bef 100%)"
        ></div>
      
        <!-- Profile Content -->
        <div class="px-6 pb-6 -mt-16">
          <!-- Avatar Container -->
          <div class="flex flex-col items-start relative">
            <!-- Avatar -->
            <div class="relative group">
                @php
                  $profilePhoto = $user->profile_photo_url;
                @endphp
                <label tabindex="0" class="flex items-start justify-start">
                  @if($profilePhoto)
                  <div class="w-32 h-32 rounded-full border-4 border-base-100 flex items-center justify-start overflow-hidden shadow-lg">
                    <img src="{{ $profilePhoto }}" alt="Profile Photo" class="object-cover w-full h-full cursor-pointer">
                  </div>
                  @else
                  <div class="avatar online placeholder">
                    <div class="bg-gray-500 text-neutral-content w-32 h-32 rounded-full border-4 border-base-100 flex items-start justify-start shadow-lg">
                      <span class="text-5xl font-medium">
                        {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                      </span>
                    </div>
                  </div>
                  @endif
                </label>
      
            </div>
      
            <!-- Name -->
            <div class="text-start mt-3">
              <h1 class="text-3xl font-bold text-base-content">
                {{ $user->first_name }} {{ $user->last_name }}
              </h1>
                @if($isOwner)
                  <p class="text-gray-500 mt-1 ">{{ $user->email }}</p>
                @endif
                  <div class="flex items-center mt-3 text-gray-500 text-sm">
                    <x-heroicon-o-calendar-days class="w-5 h-5 mr-1" /> 
                    <span>{{ $user->email_verified_at ? $user->email_verified_at->locale('hr')->isoFormat('D. MMMM YYYY.') : 'Još nije potvrđeno' }}</span>
                  </div>
            </div>
          </div>
      
          @if($isOwner)
            <!-- Edit Dropdown -->
            <div class="absolute right-4 top-4 dropdown dropdown-end">
              <div tabindex="0" role="button" class="btn btn-ghost btn-circle text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01" />
                </svg>
              </div>
              <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                <li><a>Edit Profile</a></li>
                <li><a>View Applications</a></li>
                <li><a>Account Settings</a></li>
              </ul>
            </div>
          @endif
         
        </div>
      </div>
      

        @hasrole('tutor')
          <!-- Subjects Section -->
          <div class="mt-8 mb-6">
              <div class="card shadow-lg border border-base-200 bg-base-200">
                  <div class="card-body">
                      <h2 class="text-xl font-bold mb-4 text-base-content">{{ __('Predmeti') }}</h2>
                      <div class="flex items-center gap-6">
                          <div class="flex flex-wrap gap-2">
                              <span class="badge badge-lg badge-primary">{{ __('Matematika') }}</span>
                              <span class="badge badge-lg badge-secondary">{{ __('Fizika') }}</span>
                              <span class="badge badge-lg badge-accent">{{ __('Kemija') }}</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          @if($isOwner)
          <!-- Tutor Application Status -->
          <div class="mt-8 mb-6">
              <div class="card bg-primary/10 border border-primary/20">
                  <div class="card-body">
                      <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                          <div class="flex-1">
                              <h2 class="card-title text-primary-content">Tutor Application Status: Approved ✅</h2>
                              <p class="text-base-content/70">Mathematics & Physics | Submitted: 15 March 2024</p>
                          </div>
                          <button class="btn btn-secondary">View Application</button>
                      </div>
                  </div>
              </div>
          </div>
          @endif
        @endhasrole

        <!-- Stats with Circular Graphs -->
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <!-- Scripts Graph -->
            <div class="card shadow-lg border border-base-200 bg-base-200">
                <div class="card-body">
                    <div class="flex items-center gap-6">
                        <div class="relative w-24 h-24">
                            <svg class="transform -rotate-90 w-24 h-24">
                                <circle cx="48" cy="48" r="44" class="stroke-base-300" stroke-width="8" fill="none"/>
                                <circle cx="48" cy="48" r="44" class="stroke-primary" stroke-width="8" fill="none"
                                    stroke-dasharray="276"
                                    stroke-dashoffset="276"
                                    style="stroke-dashoffset: calc(276 - (276 * 70) / 100)"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-primary">47</div>
                                    <div class="text-xs text-base-content/70">Scripts</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-base-content">Script Statistics</h3>
                            <div class="space-y-1 mt-2">
                                <div class="flex items-center gap-2 text-base-content">
                                    <div class="w-3 h-3 bg-primary rounded-full"></div>
                                    <span class="text-sm">12 Public</span>
                                </div>
                                <div class="flex items-center gap-2 text-base-content">
                                    <div class="w-3 h-3 bg-primary/30 rounded-full"></div>
                                    <span class="text-sm">35 Private</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flashcards Graph -->
            <div class="card shadow-lg border border-base-200 bg-base-200">
                <div class="card-body">
                    <div class="flex items-center gap-6">
                        <div class="relative w-24 h-24">
                            <svg class="transform -rotate-90 w-24 h-24">
                                <circle cx="48" cy="48" r="44" class="stroke-base-300" stroke-width="8" fill="none"/>
                                <circle cx="48" cy="48" r="44" class="stroke-secondary" stroke-width="8" fill="none"
                                    stroke-dasharray="276"
                                    stroke-dashoffset="276"
                                    style="stroke-dashoffset: calc(276 - (276 * 85) / 100)"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-secondary">1.2k</div>
                                    <div class="text-xs text-base-content/70">Uses</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-base-content">Flashcard Stats</h3>
                            <div class="space-y-1 mt-2">
                                <div class="flex items-center gap-2 text-base-content">
                                    <div class="w-3 h-3 bg-secondary rounded-full"></div>
                                    <span class="text-sm">340 This Month</span>
                                </div>
                                <div class="flex items-center gap-2 text-base-content">
                                    <div class="w-3 h-3 bg-secondary/30 rounded-full"></div>
                                    <span class="text-sm">860 Previous</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Scripts Section -->
            <div class="card shadow-lg border border-base-200 bg-base-200">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="card-title text-primary">My Scripts</h2>
                        @if($isOwner)
                        <button class="btn btn-primary btn-sm">
                            + New Script
                        </button>
                        @endif
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center bg-base-300 p-4 rounded-box group hover:bg-base-300 transition-colors">
                            <div>
                                <h3 class="font-bold text-base-content">Calculus Basics</h3>
                                <p class="text-sm text-base-content/70">Mathematics • 15 revisions</p>
                            </div>
                            <div class="badge badge-primary">Public</div>
                        </div>
                        <!-- Repeat script items -->
                    </div>
                </div>
            </div>

            <!-- Flashcards Section -->
            <div class="card shadow-lg border border-base-200 bg-base-200">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="card-title text-secondary">My Flashcards</h2>
                        @if($isOwner)
                        <button class="btn btn-secondary btn-sm">
                            + New Set
                        </button>
                        @endif
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="card bg-base-300 hover:bg-base-300 transition-colors">
                            <div class="card-body p-4">
                                <h3 class="font-bold text-base-content">Quantum Physics</h3>
                                <p class="text-sm text-base-content/70">32 cards</p>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="badge badge-secondary">Private</div>
                                    <span class="text-xs text-secondary">↗︎ 89 uses</span>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat flashcard items -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-div.container>
@endsection