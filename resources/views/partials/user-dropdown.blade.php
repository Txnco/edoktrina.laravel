<!-- User Dropdown -->
@auth

<div class="flex items-center gap-2 mr-3">
    <!-- Messages Dropdown -->
    <div class="dropdown dropdown-end">
        <div tabindex="0" class="indicator cursor-pointer">
            @php
                $unreadMessages = 3; // Replace with your actual logic to count unread messages
            @endphp
            
            @if($unreadMessages > 0)
                <span class="indicator-item badge badge-primary badge-sm mt-3 mr-2">{{ $unreadMessages > 9 ? '9+' : $unreadMessages }}</span>
            @endif
            
            <button class="btn btn-ghost btn-circle">
                <x-heroicon-o-chat-bubble-bottom-center-text class="w-6 h-6"/>
            </button>
        </div>
        
        <!-- Messages Dropdown Content -->
        <div tabindex="0" class="dropdown-content z-[1] menu p-0 shadow bg-base-100 rounded-box w-72 mt-4">
            <div class="bg-base-200 p-3 font-medium text-sm border-b border-base-300 rounded-t-box flex justify-between items-center">
                <span>Poruke </span>
                <span class="badge badge-primary badge-sm">{{ $unreadMessages }} novih</span>
            </div>
            
            <!-- Messages List - Show latest 3 -->
            <div class="max-h-64 overflow-y-auto">
                <!-- Message 1 -->
                <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200">
                    <div class="avatar">
                        <div class="w-10 h-10 rounded-full">
                            <img src="https://ui-avatars.com/api/?name=Ana+Horvat" alt="User" />
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-sm">Ana Horvat</p>
                        <p class="text-xs text-base-content/70 truncate">Pozdrav, htjela sam pitati o...</p>
                        <p class="text-xs text-primary mt-1">Prije 10 min</p>
                    </div>
                </div>
                
                <!-- Message 2 -->
                <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200">
                    <div class="avatar">
                        <div class="w-10 h-10 rounded-full">
                            <img src="https://ui-avatars.com/api/?name=Marko+Kovač" alt="User" />
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-sm">Marko Kovač</p>
                        <p class="text-xs text-base-content/70 truncate">Bok, kad će biti dostupan novi tečaj?</p>
                        <p class="text-xs text-primary mt-1">Prije 1 sat</p>
                    </div>
                </div>
                
                <!-- Message 3 -->
                <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200">
                    <div class="avatar">
                        <div class="w-10 h-10 rounded-full">
                            <img src="https://ui-avatars.com/api/?name=Ivan+Perić" alt="User" />
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-sm">Ivan Perić</p>
                        <p class="text-xs text-base-content/70 truncate">Hvala na pomoći oko zadatka!</p>
                        <p class="text-xs text-primary mt-1">Jučer, 15:30</p>
                    </div>
                </div>
            </div>
            
            <!-- See More Button -->
            <div class="p-2 border-t border-base-200">
                <a href="#" class="btn btn-sm btn-ghost w-full">Pogledaj sve poruke</a>
            </div>
        </div>
    </div>

    <!-- Notifications Dropdown -->
    <div class="dropdown dropdown-end">
        <div tabindex="0" class="indicator cursor-pointer">
            @php
                // $unreadNotifications = auth()->user()->unreadNotifications->count();
                $unreadNotifications = 5;
            @endphp
            
            @if($unreadNotifications > 0)
                <span class="indicator-item badge badge-secondary badge-sm mt-3 mr-2">{{ $unreadNotifications > 9 ? '9+' : $unreadNotifications }}</span>
            @endif
            
            <button class="btn btn-ghost btn-circle">
                <x-heroicon-o-bell class="w-6 h-6"/>
            </button>
        </div>
        
        <!-- Notifications Dropdown Content -->
        <div tabindex="0" class="dropdown-content z-[1] menu p-0 shadow bg-base-100 rounded-box w-72 mt-4">
            <div class="bg-base-200 p-3 font-medium text-sm border-b border-base-300 rounded-t-box flex justify-between items-center">
                <span>Obavijesti</span>
                <span class="badge badge-secondary badge-sm">{{ $unreadNotifications }} novih</span>
            </div>
            
            <!-- Notifications List - Show latest 3 -->
            <div class="max-h-64 overflow-y-auto">
                <!-- Notification 1 -->
                <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200">
                    <div class="avatar placeholder">
                        <div class="bg-secondary text-secondary-content w-10 h-10 rounded-full">
                            <span class="text-lg"><x-heroicon-s-bell-alert class="w-5 h-5"/></span>
                        </div>
                    </div>
                    <div>
                        <p class="font-medium text-sm">Novi komentar</p>
                        <p class="text-xs text-base-content/70">Netko je komentirao vaš članak</p>
                        <p class="text-xs text-secondary mt-1">Prije 5 min</p>
                    </div>
                </div>
                
                <!-- Notification 2 -->
                <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200">
                    <div class="avatar placeholder">
                        <div class="bg-secondary text-secondary-content w-10  h-10 rounded-full">
                            <span class="text-lg"><x-heroicon-s-trophy class="w-5 h-5"/></span>
                        </div>
                    </div>
                    <div>
                        <p class="font-medium text-sm">Dovršen tečaj</p>
                        <p class="text-xs text-base-content/70">Čestitamo! Završili ste tečaj programiranja</p>
                        <p class="text-xs text-secondary mt-1">Prije 2 sata</p>
                    </div>
                </div>
                
                <!-- Notification 3 -->
                <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200">
                    <div class="avatar placeholder">
                        <div class="bg-secondary text-secondary-content w-10  h-10 rounded-full">
                            <span class="text-lg"><x-heroicon-s-document-text class="w-5 h-5"/></span>
                        </div>
                    </div>
                    <div>
                        <p class="font-medium text-sm">Novi sadržaj</p>
                        <p class="text-xs text-base-content/70">Dostupan je novi tečaj iz Python programiranja</p>
                        <p class="text-xs text-secondary mt-1">Jučer, 10:15</p>
                    </div>
                </div>
            </div>
            
            <!-- See More Button -->
            <div class="p-2 border-t border-base-200">
                <a href="#" class="btn btn-sm btn-ghost w-full">Pogledaj sve obavijesti</a>
            </div>
        </div>
    </div>
</div>


<!-- Profile Dropdown (Desktop) -->
<div class="dropdown dropdown-end {{ !Request::routeIs('user.dashboard') ? 'hidden lg:block' : '' }}">
    @php
        $user = auth()->user();
        $profilePhoto = $user->profile_photo_url;
    @endphp
    <label tabindex="0" class="btn btn-ghost btn-circle avatar flex items-center justify-center">
        @if($profilePhoto)
            <div class="w-10 h-10 rounded-full flex items-center justify-center overflow-hidden">
                <img src="{{ $profilePhoto }}" alt="Profile Photo" class="object-cover w-full h-full cursor-pointer">
            </div>
        @else
            <div class="avatar online placeholder w-10 h-10">
                <div class="bg-neutral text-neutral-content rounded-full">
                    <span class="text-xl">{{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}</span>
                </div>
            </div>
        @endif
    </label>
    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <!-- User Info Section -->
        <div class="px-4 py-3 border-b border-base-200">
            <p class="text-sm font-medium">{{ $user->first_name }} {{ $user->last_name }}</p>
            <p class="text-xs text-base-content/70">{{ $user->email }}</p>
        </div>
        
        <!-- Profile -->
        <li>
            <a href="{{ route('user.profile') }}" class="hover:bg-base-200 mt-1">
                <x-heroicon-s-user-circle class="w-6 h-6" />
                Moj profil
            </a>
        </li>

         <!-- Dashboard -->
         <li>
          <a href="{{ route('user.dashboard') }}" class="hover:bg-base-200 mt-1">
            <x-heroicon-s-chart-pie class="w-6 h-6" />
              Upravljačka ploča
          </a>
      </li>
        
        <!-- Settings -->
        <li>
            <a href="" class="hover:bg-base-200 mt-1">
                <x-heroicon-s-cog-6-tooth class="w-6 h-6" />
                
                Postavke
            </a>
        </li>
        
        <!-- Logout -->
        <li>
            <a class="btn btn-error btn-sm text-white text-left justify-start mt-1 pt-1 pb-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <x-heroicon-o-arrow-right-end-on-rectangle class="w-6 h-6" />
                Odjava
            </a>
        </li>
    </ul>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>
@endauth