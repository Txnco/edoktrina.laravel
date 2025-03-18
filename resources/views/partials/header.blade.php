
<header>
  <nav class="navbar bg-base-200 sticky top-0 z-50 border-b h-16 shadow-md">
        <div class="navbar-start">
            <!-- Logo -->
            <a href="/" class="btn btn-ghost text-2xl font-bold">Šalabahter</a>
        </div>
            
          <!-- Desktop Links -->
          <div class="hidden lg:flex space-x-4 navbar-center">
              <a href="/" class="btn btn-ghost text-base capitalize-first hover:text-primary-focus">Početna</a>
              
              <!-- Dropdown for Učenje -->
              <div class="dropdown dropdown-hover">
                  <label tabindex="0" class="btn btn-ghost text-base capitalize-first hover:text-primary-focus">Učenje</label>
                  <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                      <li><a href="/skripte" class="capitalize-first hover:text-primary-focus">Skripte</a></li>
                      <li><a href="/ai-ucenje" class="capitalize-first hover:text-primary-focus">AI učenje</a></li>
                      <li><a href="/tečajevi-programiranja" class="capitalize-first hover:text-primary-focus">Tečajevi programiranja</a></li>
                  </ul>
              </div>

              <a href="/instruktori" class="btn btn-ghost text-base capitalize-first hover:text-primary-focus">Instruktori</a>
              <a href="/materijali" class="btn btn-ghost text-base capitalize-first hover:text-primary-focus">Obrazovni materijali</a>
              <a href="/o-nama" class="btn btn-ghost text-base capitalize-first hover:text-primary-focus">O nama</a>
          </div>

        <div class="navbar-end">
            @guest
                <!-- Right Buttons -->
                <div class="hidden md:flex space-x-2">
                    <a href="/login" class="btn btn-ghost text-base capitalize-first hover:text-primary-focus">Prijava</a>
                    <a href="{{ route('register') }}" class="btn btn-primary text-base">Registracija</a>
                </div>
            @endguest

            @include('partials.user-dropdown')
            
            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" class="btn btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>


      <!-- Mobile Menu -->
      <div id="mobile-menu" class="fixed inset-y-0 right-0 w-64 bg-base-100 shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">

        
          <div class="p-4">
              <!-- Close Button -->
              <button id="close-mobile-menu" class="btn btn-ghost absolute top-2 right-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>

                  <!-- Profile Icon (Mobile) -->
            @auth
                <div class="flex justify-center mb-4">
                    <div class="dropdown dropdown-end">
                        @php
                            $user = auth()->user();
                            $profilePhoto = $user->profile_photo_url;
                        @endphp
                        <label tabindex="0" class="flex items-center justify-center">
                            @if($profilePhoto)
                                <div class="w-10 h-10 rounded-full flex items-center justify-center overflow-hidden">
                                    <img src="{{ $profilePhoto }}" alt="Profile Photo" class="object-cover w-full h-full cursor-pointer">
                                </div>
                            @else
                                <div class="avatar online placeholder">
                                  <div class="bg-neutral text-neutral-content w-24 rounded-full">
                                      <span class="text-4xl">{{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}</span>
                                  </div>
                                </div>
                            @endif
                        </label>
                    </div>
                </div>
            @endauth

              <!-- Mobile Menu Links -->
              <ul class="menu space-y-2">
                  <li><a href="/" class="text-base capitalize-first">Početna</a></li>
                  
                  <!-- Dropdown for Učenje in Mobile -->
                  <li>
                      <details>
                          <summary class="text-base capitalize-first">Učenje</summary>
                          <ul class="pl-4">
                              <li><a href="/skripte" class="text-base capitalize-first">Skripte</a></li>
                              <li><a href="/ai-ucenje" class="text-base capitalize-first">AI učenje</a></li>
                              <li><a href="/tečajevi-programiranja" class="text-base capitalize-first">Tečajevi programiranja</a></li>
                          </ul>
                      </details>
                  </li>

                  <li><a href="/instruktori" class="text-base capitalize-first">Instruktori</a></li>
                  <li><a href="/materijali" class="text-base capitalize-first">Obrazovni materijali</a></li>
                  <li><a href="/o-nama" class="text-base capitalize-first">O nama</a></li>

                <div class="divider"></div>


                  @guest
                      <li><a href="/login" class="text-base capitalize-first">Prijava</a></li>
                      <li><a href="{{ route('register') }}" class="text-base capitalize-first">Registracija</a></li>
                  @endguest

                  @auth
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
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                  @endauth
              </ul>

              <!-- Theme Toggle (Mobile) -->
              <div class="form-control w-52 absolute bottom-4">
                  <label class="label cursor-pointer">
                      <span class="label-text">Toggle Theme</span>
                      <label class="grid cursor-pointer place-items-center">
                          <input id="theme-toggle"
                              type="checkbox"
                              value="dark"
                              class="toggle theme-controller bg-base-content col-span-2 col-start-1 row-start-1" />
                          <svg
                              class="stroke-base-100 fill-base-100 col-start-2 row-start-1"
                              xmlns="http://www.w3.org/2000/svg"
                              width="14"
                              height="14"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round">
                              <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                          </svg>
                          <svg
                              class="stroke-base-100 fill-base-100 col-start-1 row-start-1"
                              xmlns="http://www.w3.org/2000/svg"
                              width="14"
                              height="14"
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round">
                              <circle cx="12" cy="12" r="5" />
                              <path
                                  d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
                          </svg>
                      </label>
                  </label>
              </div>

          </div>
      </div>
  </nav>
</header>

  <!-- JavaScript for Mobile Menu -->
  <script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMobileMenuButton = document.getElementById('close-mobile-menu');

    // Toggle Mobile Menu
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
    });

    // Close Mobile Menu
    closeMobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
    });

    // Close Menu When Clicking Outside
    document.addEventListener('click', (event) => {
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('translate-x-full');
        }
    });
   

    $(document).ready(function(){
    $('#profileImg').on('click', function(e) {
        $('#profileMenu').toggle();
        e.stopPropagation(); // Prevent the click from propagating to the document
    });
    
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#profileDropdown').length) {
        $('#profileMenu').hide();
        }
    });
    });

  </script>


    


