<!-- User Dropdown -->
@auth
<div class="flex items-center gap-3">
    <!-- Messages Dropdown -->
    <div class="dropdown dropdown-end">
        <div tabindex="0" class="indicator cursor-pointer">
            @php
                $unreadMessages = 3; // Replace with your actual logic to count unread messages
            @endphp
            
            @if($unreadMessages > 0)
                <span class="indicator-item badge badge-primary badge-sm mt-3 mr-2">{{ $unreadMessages > 9 ? '9+' : $unreadMessages }}</span>
            @endif
            
            <button class="btn btn-ghost btn-circle hover:bg-base-200 transition-colors">
                <x-heroicon-o-chat-bubble-bottom-center-text class="w-5 h-5"/>
            </button>
        </div>
        
        <!-- Messages Dropdown Content -->
        <div tabindex="0" class="dropdown-content z-[1] p-0 shadow-lg bg-base-100 rounded-box w-80 mt-4 border border-base-200">
            <div class="bg-base-200 p-3 font-medium text-sm rounded-t-box flex justify-between items-center">
                <span class="flex items-center gap-2">
                    <x-heroicon-s-chat-bubble-left-right class="w-4 h-4 text-primary" />
                    Poruke
                </span>
                @if($unreadMessages > 0)
                    <span class="badge badge-primary">{{ $unreadMessages }} {{ $unreadMessages == 1 ? 'nova' : 'novih' }}</span>
                @endif
            </div>
            
            <!-- Messages List -->
            <div class="max-h-80 overflow-y-auto">
                @if($unreadMessages > 0)
                    <!-- Message 1 -->
                    <a href="/messages/1" class="block hover:no-underline">
                        <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200 transition-colors">
                            <div class="avatar online">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Ana+Horvat&background=6419E6&color=ffffff" alt="Ana Horvat" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start">
                                    <p class="font-medium text-sm">Ana Horvat</p>
                                    <p class="text-xs text-primary">10 min</p>
                                </div>
                                <p class="text-xs text-base-content/70 truncate w-full">Pozdrav, htjela sam pitati o novom tečaju iz programiranja koji ste najavili prošli tjedan...</p>
                                <span class="inline-block h-2 w-2 rounded-full bg-primary mt-1"></span>
                            </div>
                        </div>
                    </a>
                    
                    <!-- Message 2 -->
                    <a href="/messages/2" class="block hover:no-underline">
                        <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200 transition-colors">
                            <div class="avatar online">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="https://ui-avatars.com/api/?name=Marko+Kovač&background=6419E6&color=ffffff" alt="Marko Kovač" />
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start">
                                    <p class="font-medium text-sm">Marko Kovač</p>
                                    <p class="text-xs text-primary">1 sat</p>
                                </div>
                                <p class="text-xs text-base-content/70 truncate w-full">Bok, kad će biti dostupan novi tečaj? Čekam već neko vrijeme i stvarno me zanima...</p>
                                <span class="inline-block h-2 w-2 rounded-full bg-primary mt-1"></span>
                            </div>
                        </div>
                    </a>
                @endif
                
                <!-- Message 3 -->
                <a href="/messages/3" class="block hover:no-underline">
                    <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200 transition-colors">
                        <div class="avatar">
                            <div class="w-10 h-10 rounded-full">
                                <img src="https://ui-avatars.com/api/?name=Ivan+Perić&background=6419E6&color=ffffff" alt="Ivan Perić" />
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start">
                                <p class="font-medium text-sm">Ivan Perić</p>
                                <p class="text-xs text-base-content/60">jučer</p>
                            </div>
                            <p class="text-xs text-base-content/70 truncate w-full">Hvala na pomoći oko zadatka! Sada mi je sve jasnije i mogu nastaviti s projektom...</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- See More Button -->
            <div class="p-2 border-t border-base-200">
                <a href="/messages" class="btn btn-sm btn-ghost btn-block gap-2">
                    <span>Pogledaj sve poruke</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Notifications Dropdown -->
    <div class="dropdown dropdown-end">
        <div tabindex="0" class="indicator cursor-pointer">
            @php
                $unreadNotifications = 5;
            @endphp
            
            @if($unreadNotifications > 0)
                <span class="indicator-item badge badge-secondary badge-sm mt-3 mr-2">{{ $unreadNotifications > 9 ? '9+' : $unreadNotifications }}</span>
            @endif
            
            <button class="btn btn-ghost btn-circle hover:bg-base-200 transition-colors">
                <x-heroicon-o-bell class="w-5 h-5"/>
            </button>
        </div>
        
        <!-- Notifications Dropdown Content -->
        <div tabindex="0" class="dropdown-content z-[1] p-0 shadow-lg bg-base-100 rounded-box w-80 mt-4 border border-base-200">
            <div class="bg-base-200 p-3 font-medium text-sm rounded-t-box flex justify-between items-center">
                <span class="flex items-center gap-2">
                    <x-heroicon-s-bell-alert class="w-4 h-4 text-secondary" />
                    Obavijesti
                </span>
                @if($unreadNotifications > 0)
                    <span class="badge badge-secondary">{{ $unreadNotifications }} {{ $unreadNotifications == 1 ? 'nova' : 'novih' }}</span>
                @endif
            </div>
            
            <!-- Notifications List -->
            <div class="max-h-80 overflow-y-auto">
                <!-- Notification 1 -->
                <a href="/notifications/1" class="block hover:no-underline">
                    <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200 transition-colors">
                        <div class="avatar placeholder">
                            <div class="bg-secondary text-secondary-content w-10 h-10 rounded-lg flex items-center justify-center">
                                <x-heroicon-s-chat-bubble-left class="w-5 h-5"/>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start">
                                <p class="font-medium text-sm">Novi komentar</p>
                                <p class="text-xs text-secondary">5 min</p>
                            </div>
                            <p class="text-xs text-base-content/70">Ana Horvat je komentirala vaš članak "Uvod u programiranje"</p>
                            <span class="inline-block h-2 w-2 rounded-full bg-secondary mt-1"></span>
                        </div>
                    </div>
                </a>
                
                <!-- Notification 2 -->
                <a href="/notifications/2" class="block hover:no-underline">
                    <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200 transition-colors">
                        <div class="avatar placeholder">
                            <div class="bg-secondary text-secondary-content w-10 h-10 rounded-lg flex items-center justify-center">
                                <x-heroicon-s-trophy class="w-5 h-5"/>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start">
                                <p class="font-medium text-sm">Završen tečaj</p>
                                <p class="text-xs text-secondary">2 sata</p>
                            </div>
                            <p class="text-xs text-base-content/70">Čestitamo! Uspješno ste završili tečaj "Python za početnike" s ocjenom 95%.</p>
                            <span class="inline-block h-2 w-2 rounded-full bg-secondary mt-1"></span>
                        </div>
                    </div>
                </a>
                
                <!-- Notification 3 -->
                <a href="/notifications/3" class="block hover:no-underline">
                    <div class="flex gap-3 p-3 hover:bg-base-200 border-b border-base-200 transition-colors">
                        <div class="avatar placeholder">
                            <div class="bg-accent text-accent-content w-10 h-10 rounded-lg flex items-center justify-center">
                                <x-heroicon-s-document-text class="w-5 h-5"/>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start">
                                <p class="font-medium text-sm">Novi sadržaj dostupan</p>
                                <p class="text-xs text-base-content/60">jučer</p>
                            </div>
                            <p class="text-xs text-base-content/70">Novi tečaj "Python napredni koncepti" je sada dostupan. Pogledajte što ćete naučiti!</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- See More Button -->
            <div class="p-2 border-t border-base-200">
                <div class="flex justify-between">
                    <a href="/notifications" class="btn btn-sm btn-ghost gap-2">
                        <span>Sve obavijesti</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <button class="btn btn-sm btn-ghost text-secondary">Označi sve kao pročitano</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Dropdown (Desktop) -->
    <div class="dropdown dropdown-end {{ !Request::routeIs('admin.dashboard') ? 'hidden lg:block' : '' }}">
        @php
            $user = auth()->user();
            $profilePhoto = $user->profile_photo_url;
        @endphp
        <label tabindex="0" class="btn btn-ghost btn-circle avatar flex items-center justify-center hover:bg-base-200 transition-colors">
            @if($profilePhoto)
                <div class="w-10 h-10 rounded-full flex items-center justify-center overflow-hidden border-2 border-primary/20">
                    <img src="{{ $profilePhoto }}" alt="{{ $user->first_name }}" class="object-cover w-full h-full">
                </div>
            @else
                <div class="avatar online placeholder">
                    <div class="bg-primary text-primary-content rounded-full w-10 h-10">
                        <span class="text-lg">{{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}</span>
                    </div>
                </div>
            @endif
        </label>
        
        <ul tabindex="0" class="dropdown-content mt-3 z-[1] p-0 shadow-lg bg-base-100 rounded-box w-60 border border-base-200">
            <!-- User Info Section -->
            <div class="p-4 border-b border-base-200 bg-base-200/50 rounded-t-box">
                <div class="flex items-center gap-3">
                    @if($profilePhoto)
                        <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-primary/20">
                            <img src="{{ $profilePhoto }}" alt="{{ $user->first_name }}" class="object-cover w-full h-full">
                        </div>
                    @else
                        <div class="avatar online placeholder">
                            <div class="bg-primary text-primary-content rounded-full w-12 h-12">
                                <span class="text-lg">{{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}</span>
                            </div>
                        </div>
                    @endif
                    <div>
                        <p class="font-medium">{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p class="text-xs text-base-content/70 truncate max-w-[180px]">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Menu Items -->
            <div class="p-2">
                <!-- Profile -->
                <a href="{{ route('user.profile', ['username' => $user->username]) }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-base-200 transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span class="font-medium">Moj profil</span>
                </a>

                @hasrole('admin')
                    <!-- Admin Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-base-200 transition-colors mt-1">
                        <div class="w-8 h-8 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </div>
                        <span class="font-medium">Upravljačka ploča</span>
                    </a>
                @endhasrole

                @hasrole('tutor|admin') 
                    <!-- Tutor Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-base-200 transition-colors mt-1">
                        <div class="w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="font-medium">Instruktorska ploča</span>
                    </a>
                @endhasrole

                <!-- Settings -->
                <a href="/settings" class="flex items-center gap-3 p-2 rounded-lg hover:bg-base-200 transition-colors mt-1">
                    <div class="w-8 h-8 rounded-lg bg-base-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="font-medium">Postavke računa</span>
                </a>
                
                <div class="divider my-1"></div>
                
                <!-- Logout -->
                <button
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="flex w-full items-center gap-3 p-2 rounded-lg hover:bg-error/10 text-error transition-colors"
                >
                    <div class="w-8 h-8 rounded-lg bg-error/10 flex items-center justify-center text-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <span class="font-medium">Odjava</span>
                </button>
            </div>
        </ul>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>
@endauth
