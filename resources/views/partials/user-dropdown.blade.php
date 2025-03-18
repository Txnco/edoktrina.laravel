<!-- User Dropdown -->
@auth
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
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                </svg>
                Moj profil
            </a>
        </li>

         <!-- Dashboard -->
         <li>
          <a href="{{ route('user.dashboard') }}" class="hover:bg-base-200 mt-1">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
              </svg>
              Upravljačka ploča
          </a>
      </li>
        
        <!-- Settings -->
        <li>
            <a href="" class="hover:bg-base-200 mt-1">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd"/>
                </svg>
                Postavke
            </a>
        </li>
        
        <!-- Logout -->
        <li>
            <a class="btn btn-error btn-sm text-white text-left justify-start mt-1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                </svg>
                Odjava
            </a>
        </li>
    </ul>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>
@endauth