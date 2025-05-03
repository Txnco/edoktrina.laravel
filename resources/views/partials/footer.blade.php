<footer class="footer p-10 bg-base-200 text-base-content border-t border-base-300/50 relative overflow-hidden">
  <!-- Subtle decorative elements -->
  <div class="absolute -bottom-32 -right-32 w-64 h-64 bg-primary/5 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-blob"></div>
  <div class="absolute -bottom-40 left-32 w-72 h-72 bg-secondary/5 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-blob animation-delay-2000"></div>
  
  <div class="container mx-auto px-4 relative z-10">
    <!-- Footer Columns -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
      <!-- Logo and description -->
      <div class="col-span-1 md:col-span-2 lg:col-span-1" data-aos="fade-up">
        <div class="flex items-center gap-3 mb-6">
          
          <span class="text-xl font-bold">{{ config('app.name') }}</span>
        </div>
        <p class="text-sm opacity-70 max-w-sm mb-6 leading-relaxed">
          Revolucionarna platforma za učenje koja povezuje studente i instruktore putem najmodernijih AI alata.
        </p>
       
      </div>

      <!-- Quick Links -->
      <div data-aos="fade-up" data-aos-delay="100">
        <h3 class="text-sm font-semibold uppercase tracking-wider mb-6 opacity-70">Korisni linkovi</h3>
        <ul class="space-y-3">
          <li><a href="/o-nama" class="link link-hover text-sm opacity-80 hover:opacity-100 transition-opacity duration-300">O nama</a></li>
          <li><a href="/kontakt" class="link link-hover text-sm opacity-80 hover:opacity-100 transition-opacity duration-300">Kontakt</a></li>
          <li><a href="/faq" class="link link-hover text-sm opacity-80 hover:opacity-100 transition-opacity duration-300">FAQ</a></li>
          <li><a href="/uvjeti-koristenja" class="link link-hover text-sm opacity-80 hover:opacity-100 transition-opacity duration-300">Uvjeti korištenja</a></li>
        </ul>
      </div>

      <!-- Connect -->
      <div data-aos="fade-up" data-aos-delay="200">
        <h3 class="text-sm font-semibold uppercase tracking-wider mb-6 opacity-70">Povezivanje</h3>
        
        <!-- Social Icons -->
        <div class="flex gap-2 mb-8">
          <a href="#" class="btn btn-circle btn-ghost btn-sm hover:bg-primary/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current opacity-70">
              <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
            </svg>
          </a>
          <a href="#" class="btn btn-circle btn-ghost btn-sm hover:bg-primary/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current opacity-70">
              <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
            </svg>
          </a>
          <a href="#" class="btn btn-circle btn-ghost btn-sm hover:bg-primary/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current opacity-70">
              <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
            </svg>
          </a>
          <a href="#" class="btn btn-circle btn-ghost btn-sm hover:bg-primary/10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="fill-current opacity-70">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
        </div>
        
     
      </div>

      <!-- Contact -->
      <div data-aos="fade-up" data-aos-delay="300">
        <h3 class="text-sm font-semibold uppercase tracking-wider mb-6 opacity-70">Kontakt</h3>
        <ul class="space-y-3 mb-8">
          <li class="flex items-center gap-3 text-sm">
            <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span class="opacity-80">info@salabahter.hr</span>
          </li>
          <li class="flex items-center gap-3 text-sm">
            <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <span class="opacity-80">+385 1 2345 678</span>
          </li>
          <li class="flex items-center gap-3 text-sm">
            <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span class="opacity-80">Ul. Ivana Gundulića 22, Zagreb</span>
          </li>
        </ul>
      
      </div>
    </div>

    <!-- Copyright -->
    <div class="divider  opacity-30"></div>
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 py-4">
      <p class="text-sm opacity-70 order-2 md:order-1">© {{ date('Y') }} {{ config('app.name') }}. Sva prava pridržana.</p>
      <div class="flex flex-wrap gap-3 order-1 md:order-2">
        <a href="/politika-privatnosti" class="text-sm link link-hover opacity-70 hover:opacity-100">Politika privatnosti</a>
        <a href="/uvjeti-koristenja" class="text-sm link link-hover opacity-70 hover:opacity-100">Uvjeti korištenja</a>
        <a href="/kolacici" class="text-sm link link-hover opacity-70 hover:opacity-100">Kolačići</a>
      </div>
    </div>
  </div>
</footer>

<style>
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