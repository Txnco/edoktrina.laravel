<footer class="footer p-10 bg-base-200 text-base-content border-t border-base-300 relative overflow-hidden">
  <!-- Decorative elements -->
  <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-primary/10 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
  <div class="absolute -bottom-40 left-20 w-72 h-72 bg-secondary/10 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
  
  <div class="container mx-auto px-4 relative z-10">
    <!-- Footer Columns -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- Logo and description -->
      <div class="space-y-4" data-aos="fade-up">
        <div class="flex items-center gap-2">
          <svg class="w-8 h-8 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6.25278V19.2528M12 6.25278C10.8324 5.47686 9.24649 5 7.5 5C5.75351 5 4.16756 5.47686 3 6.25278V19.2528C4.16756 18.4769 5.75351 18 7.5 18C9.24649 18 10.8324 18.4769 12 19.2528M12 6.25278C13.1676 5.47686 14.7535 5 16.5 5C18.2465 5 19.8324 5.47686 21 6.25278V19.2528C19.8324 18.4769 18.2465 18 16.5 18C14.7535 18 13.1676 18.4769 12 19.2528" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span class="text-xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">{{ config('app.name') }}</span>
        </div>
        <p class="text-sm opacity-80">Revolucionarna platforma za učenje koja povezuje studente i instruktore putem najmodernijih AI alata.</p>
        <div class="flex gap-2">
          <div class="badge badge-primary badge-outline">AI Powered</div>
          <div class="badge badge-secondary badge-outline">EduTech</div>
        </div>
      </div>

      <!-- Useful Links -->
      <div data-aos="fade-up" data-aos-delay="100">
        <h3 class="footer-title text-lg font-semibold mb-4">Korisni linkovi</h3>
        <ul class="space-y-3">
          <li><a href="/o-nama" class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            O nama
          </a></li>
          <li><a href="/kontakt" class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Kontakt
          </a></li>
          <li><a href="/faq" class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            FAQ
          </a></li>
          <li><a href="/uvjeti-koristenja" class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            Uvjeti korištenja
          </a></li>
        </ul>
      </div>

      <!-- Social Media -->
      <div data-aos="fade-up" data-aos-delay="200">
        <h3 class="footer-title text-lg font-semibold mb-4">Pratite nas</h3>
        <div class="flex flex-wrap gap-3">
          <a href="#" class="btn btn-circle btn-ghost hover:bg-primary/10 hover:text-primary transition-all duration-300 transform hover:-translate-y-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current">
              <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
            </svg>
          </a>
          <a href="#" class="btn btn-circle btn-ghost hover:bg-primary/10 hover:text-primary transition-all duration-300 transform hover:-translate-y-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current">
              <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
            </svg>
          </a>
          <a href="#" class="btn btn-circle btn-ghost hover:bg-primary/10 hover:text-primary transition-all duration-300 transform hover:-translate-y-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current">
              <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
            </svg>
          </a>
          <a href="#" class="btn btn-circle btn-ghost hover:bg-primary/10 hover:text-primary transition-all duration-300 transform hover:-translate-y-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="fill-current">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
        </div>
        
        <!-- Newsletter -->
        <div class="mt-6">
          <h4 class="text-sm font-semibold mb-2">Prijavite se na newsletter</h4>
          <div class="flex">
            <input type="email" placeholder="Vaš email" class="input input-bordered rounded-r-none w-full max-w-xs" />
            <button class="btn btn-primary rounded-l-none">Pošalji</button>
          </div>
        </div>
      </div>

      <!-- Contact Information -->
      <div data-aos="fade-up" data-aos-delay="300">
        <h3 class="footer-title text-lg font-semibold mb-4">Kontakt informacije</h3>
        <ul class="space-y-3">
          <li class="flex items-center gap-3">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span class="text-sm">info@salabahter.hr</span>
          </li>
          <li class="flex items-center gap-3">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <span class="text-sm">+385 1 2345 678</span>
          </li>
          <li class="flex items-center gap-3">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="text-sm">Ul. Ivana Gundulića 22, Zagreb</span>
          </li>
        </ul>
        
        <!-- Payment methods -->
        <div class="mt-6">
          <h4 class="text-sm font-semibold mb-2">Načini plaćanja</h4>
          <div class="flex gap-2">
            <div class="badge badge-outline p-4">Visa</div>
            <div class="badge badge-outline p-4">Mastercard</div>
            <div class="badge badge-outline p-4">PayPal</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Divider -->
    <div class="divider my-8 opacity-30"></div>

    <!-- Copyright and bottom links -->
    <div class="flex flex-col md:flex-row justify-between items-center">
      <p class="text-sm opacity-80">© 2023 {{ config('app.name') }}. Sva prava pridržana.</p>
      <div class="flex gap-4 mt-4 ml-5 md:mt-0">
        <a href="/politika-privatnosti" class="text-sm link link-hover hover:text-primary">Politika privatnosti</a>
        <a href="/uvjeti-koristenja" class="text-sm link link-hover hover:text-primary">Uvjeti korištenja</a>
        <a href="/kolacici" class="text-sm link link-hover hover:text-primary">Kolačići</a>
      </div>
    </div>
  </div>
</footer>

<style>
  /* Custom animations */
  @keyframes blob {
    0% {
      transform: translate(0px, 0px) scale(1);
    }
    33% {
      transform: translate(30px, -50px) scale(1.1);
    }
    66% {
      transform: translate(-20px, 20px) scale(0.9);
    }
    100% {
      transform: translate(0px, 0px) scale(1);
    }
  }
  .animate-blob {
    animation: blob 7s infinite;
  }
  .animation-delay-2000 {
    animation-delay: 2s;
  }
</style>