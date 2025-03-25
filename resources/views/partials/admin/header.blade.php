<header>
  <nav class="navbar bg-base-100 border-b border-base-300  fixed top-0 z-50  h-16">
      <div class="navbar-start">
         <!-- Mobile Menu Toggle -->
        <label for="main-drawer" class="btn btn-square btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </label>

        <!-- Logo -->
        <a href="/" class="btn btn-ghost text-2xl font-bold">Šalabahter</a>
      </div>
      
      <div class="navbar-center">
        <!-- Center content if needed -->
      </div>
      
      <div class="navbar-end">
        @include('partials.user-dropdown')
      </div>
  </nav>
</header>