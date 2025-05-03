@extends('layouts.app') 

@section('main-content') 
<div class="bg-base-100 min-h-screen py-12">
   <div class="max-w-4xl mx-auto px-4">
      <!-- Page Header --> 
      <div class="text-center mb-10">
         <h1 class="text-3xl md:text-4xl font-bold text-base-content mb-3">Postani instruktor</h1>
         <p class="text-base-content/70 max-w-2xl mx-auto">Pridruži se našoj zajednici instruktora i podijeli svoje znanje. Pomozi učenicima da ostvare svoje ciljeve i zaradi pritom.</p>
      </div>

      <div class="w-full mb-8">
         <ul class="steps steps-horizontal w-full">
             <li class="step step-primary" data-step="1">Osobne informacije</li>
             <li class="step" data-step="2">Obrazovanje</li>
             <li class="step" data-step="3">Iskustvo u poučavanju</li>
             <li class="step" data-step="4">Dokumenti</li>
             <li class="step" data-step="5">Pregled i slanje</li>
         </ul>
     </div>

     <!-- Application Form -->
     <div class="card shadow-xl bg-base-100">
         <div class="card-body">
             <form id="tutorApplicationForm" method="POST" action="" enctype="multipart/form-data">
                 @csrf
                 
                 <!-- Step 1: Osobne informacije -->
                 <div class="step-content" data-step="1">
                     <h2 class="text-2xl font-bold mb-6">Osobne informacije</h2>
                     
                     <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                         <!-- User Profile Card -->
                         <div class="col-span-1">
                             <div class="card w-full shadow-sm bg-base-200">
                                 <div class="card-body items-center text-center">
                                     <div class="avatar mb-4">
                                         <div class="w-32 rounded-full">
                                             @if(Auth::user()->profile_image)
                                                 <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" class="w-32 h-32 rounded-full object-cover">
                                             @else
                                                 <div class="w-32 h-32 rounded-full bg-primary text-white flex items-center justify-center text-4xl">
                                                     {{ substr(Auth::user()->first_name, 0, 1) }}{{ substr(Auth::user()->last_name, 0, 1) }}
                                                 </div>
                                             @endif
                                         </div>
                                     </div>
                                     <h3 class="text-xl font-semibold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                     <p class="text-base-content/60">{{ Auth::user()->email }}</p>
                                 </div>
                             </div>
                         </div>

                         <!-- Form Fields -->
                         <div class="col-span-1 md:col-span-2">
                             <div class="space-y-4">
                                 <div class="form-control">
                                     <label class="label">
                                         <span class="label-text">Ime i prezime</span>
                                     </label>
                                     <input type="text" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" 
                                            disabled class="input input-bordered input-disabled">
                                 </div>

                                 <div class="form-control">
                                     <label class="label">
                                         <span class="label-text">Email</span>
                                     </label>
                                     <input type="email" value="{{ Auth::user()->email }}" 
                                            disabled class="input input-bordered input-disabled">
                                 </div>

                                 <div class="form-control">
                                     <label class="label">
                                         <span class="label-text">Telefon (neobavezno)</span>
                                     </label>
                                     <input type="tel" name="phone" placeholder="Unesite telefon" 
                                            value="{{ old('phone') }}"
                                            class="input input-bordered">
                                 </div>

                                 <div class="grid grid-cols-2 gap-4">
                                     <div class="form-control">
                                         <label class="label">
                                             <span class="label-text">Grad</span>
                                         </label>
                                         <input type="text" name="city" placeholder="Unesite grad" 
                                                value="{{ old('city') }}"
                                                class="input input-bordered" required>
                                     </div>

                                     <div class="form-control">
                                         <label class="label">
                                             <span class="label-text">Županija</span>
                                         </label>
                                         <input type="text" name="region" placeholder="Unesite regiju" 
                                                value="{{ old('region') }}"
                                                class="input input-bordered" required>
                                     </div>
                                 </div>

                                 <div class="form-control">
                                     <label class="label">
                                         <span class="label-text">Biografija</span>
                                     </label>
                                     <textarea name="biography" placeholder="Napišite kratku biografiju" 
                                               rows="4" class="textarea textarea-bordered" required>{{ old('biography') }}</textarea>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Step 2: Obrazovanje -->
                 <div class="step-content hidden" data-step="2">
                     <h2 class="text-2xl font-bold mb-6">Obrazovanje</h2>
                     
                     <div id="educationList">
                         <div class="education-item card shadow-sm bg-base-200 mb-4">
                             <div class="card-body">
                                 <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                     <div class="form-control">
                                         <label class="label">
                                             <span class="label-text">Obrazovna institucija</span>
                                         </label>
                                         <input type="text" name="education[0][institution]" placeholder="Unesite naziv institucije" 
                                                class="input input-bordered" required>
                                     </div>

                                     <div class="form-control">
                                         <label class="label">
                                             <span class="label-text">Stupanj obrazovanja</span>
                                         </label>
                                         <select name="education[0][degree]" class="select select-bordered" required>
                                             <option value="">Odaberite stupanj</option>
                                             <option value="srednja">Srednja škola</option>
                                             <option value="vss">Viša stručna sprema</option>
                                             <option value="vss_mag">Magisterij</option>
                                             <option value="doktorat">Doktorat</option>
                                         </select>
                                     </div>

                                     <div class="form-control">
                                         <label class="label">
                                             <span class="label-text">Područje obrazovanja</span>
                                         </label>
                                         <input type="text" name="education[0][field]" placeholder="Unesite područje" 
                                                class="input input-bordered" required>
                                     </div>

                                     <div class="form-control">
                                         <label class="label">
                                             <span class="label-text">Početak</span>
                                         </label>
                                         <input type="date" name="education[0][start_date]" 
                                                class="input input-bordered" required>
                                     </div>

                                     <div class="form-control">
                                         <label class="label">
                                             <span class="label-text">Završetak</span>
                                         </label>
                                         <input type="date" name="education[0][end_date]" 
                                                class="input input-bordered">
                                     </div>

                                     <div class="form-control">
                                         <label class="cursor-pointer label">
                                             <span class="label-text">Trenutno pohađam ovo obrazovanje</span>
                                             <input type="checkbox" name="education[0][current]" class="checkbox checkbox-primary">
                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <button type="button" class="btn btn-outline btn-primary mt-4" onclick="addEducation()">
                         Dodaj novo obrazovanje
                     </button>
                 </div>

                 <!-- Step 3: Iskustvo u poučavanju -->
                 <div class="step-content hidden" data-step="3">
                     <h2 class="text-2xl font-bold mb-6">Iskustvo u poučavanju</h2>
                     
                     <div class="space-y-4">
                         <div class="form-control">
                             <label class="label">
                                 <span class="label-text">Godine iskustva</span>
                             </label>
                             <input type="number" name="experience_years" min="0" placeholder="Unesite broj godina" 
                                    value="{{ old('experience_years') }}"
                                    class="input input-bordered" required>
                         </div>

                         <div class="form-control">
                             <label class="label">
                                 <span class="label-text">Opis iskustva u poučavanju</span>
                             </label>
                             <textarea name="experience_description" rows="5" 
                                       placeholder="Opišite svoje iskustvo u poučavanju" 
                                       class="textarea textarea-bordered" required>{{ old('experience_description') }}</textarea>
                         </div>

                         <div class="form-control">
                             <label class="cursor-pointer label">
                                 <span class="label-text">Iskustvo u online poučavanju</span>
                                 <input type="checkbox" name="online_experience" 
                                        class="checkbox checkbox-primary" 
                                        {{ old('online_experience') ? 'checked' : '' }}>
                             </label>
                         </div>
                     </div>
                 </div>

                 <!-- Step 4: Dokumenti -->
                 <div class="step-content hidden" data-step="4">
                     <h2 class="text-2xl font-bold mb-6">Dokumenti</h2>
                     
                     <div class="space-y-6">
                         <div class="form-control">
                             <label class="label">
                                 <span class="label-text">CV (Curriculum Vitae)</span>
                             </label>
                             <input type="file" name="cv" accept=".pdf,.doc,.docx" 
                                    class="file-input file-input-bordered w-full" required>
                         </div>

                         <div class="form-control">
                             <label class="label">
                                 <span class="label-text">Diploma/Certifikat</span>
                             </label>
                             <input type="file" name="diploma" accept=".pdf,.jpg,.jpeg,.png" 
                                    class="file-input file-input-bordered w-full" required>
                         </div>

                         <div class="form-control">
                             <label class="label">
                                 <span class="label-text">Osobna iskaznica</span>
                             </label>
                             <input type="file" name="id_card" accept=".pdf,.jpg,.jpeg,.png" 
                                    class="file-input file-input-bordered w-full" required>
                         </div>
                     </div>
                 </div>

                 <!-- Step 5: Pregled i slanje -->
                 <div class="step-content hidden" data-step="5">
                     <h2 class="text-2xl font-bold mb-6">Pregled i slanje</h2>
                     
                     <div class="space-y-6">
                         <!-- Osobne informacije -->
                         <div class="card shadow-sm bg-base-200">
                             <div class="card-body">
                                 <h3 class="card-title">Osobne informacije</h3>
                                 <p><strong>Ime:</strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                 <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                 <p><strong>Telefon:</strong> <span id="review-phone"></span></p>
                                 <p><strong>Grad:</strong> <span id="review-city"></span></p>
                                 <p><strong>Regija:</strong> <span id="review-region"></span></p>
                                 <p><strong>Biografija:</strong> <span id="review-biography"></span></p>
                                 <button type="button" class="btn btn-outline btn-xs mt-2" onclick="goToStep(1)">Uredi</button>
                             </div>
                         </div>

                         <!-- Obrazovanje -->
                         <div class="card shadow-sm bg-base-200">
                             <div class="card-body">
                                 <h3 class="card-title">Obrazovanje</h3>
                                 <div id="review-education"></div>
                                 <button type="button" class="btn btn-outline btn-xs mt-2" onclick="goToStep(2)">Uredi</button>
                             </div>
                         </div>

                         <!-- Iskustvo -->
                         <div class="card shadow-sm bg-base-200">
                             <div class="card-body">
                                 <h3 class="card-title">Iskustvo u poučavanju</h3>
                                 <p><strong>Godine iskustva:</strong> <span id="review-experience-years"></span></p>
                                 <p><strong>Opis iskustva:</strong> <span id="review-experience-description"></span></p>
                                 <p><strong>Online iskustvo:</strong> <span id="review-online-experience"></span></p>
                                 <button type="button" class="btn btn-outline btn-xs mt-2" onclick="goToStep(3)">Uredi</button>
                             </div>
                         </div>

                         <!-- Dokumenti -->
                         <div class="card shadow-sm bg-base-200">
                             <div class="card-body">
                                 <h3 class="card-title">Dokumenti</h3>
                                 <p><strong>CV:</strong> <span id="review-cv"></span></p>
                                 <p><strong>Diploma:</strong> <span id="review-diploma"></span></p>
                                 <p><strong>Osobna iskaznica:</strong> <span id="review-id"></span></p>
                                 <button type="button" class="btn btn-outline btn-xs mt-2" onclick="goToStep(4)">Uredi</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 
                 <!-- Navigation buttons -->
                 <div class="flex justify-between mt-8">
                     <button type="button" class="btn btn-outline hidden" id="prevBtn" onclick="changeStep(-1)">Prethodno</button>
                     <button type="button" class="btn btn-primary ml-auto" id="nextBtn" onclick="changeStep(1)">Sljedeće</button>
                     <button type="submit" class="btn btn-success ml-auto hidden" id="submitBtn">Pošalji prijavu</button>
                 </div>
             </form>
         </div>
     </div>
      
      
      <!-- What Happens Next Section --> 
      <div class="mt-16">
         <h2 class="text-2xl font-bold mb-6 text-center">Što slijedi nakon prijave?</h2>
         <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card bg-base-100 shadow-lg border border-base-200">
               <div class="card-body items-center text-center">
                  <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </div>
                  <h3 class="card-title">1. Verifikacija</h3>
                  <p>Provjeriti ćemo vašu prijavu i dokumente kako bismo potvrdili vaše kvalifikacije. Ovaj proces obično traje 1-2 radna dana.</p>
               </div>
            </div>
            <div class="card bg-base-100 shadow-lg border border-base-200">
               <div class="card-body items-center text-center">
                  <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                     </svg>
                  </div>
                  <h3 class="card-title">2. Intervju</h3>
                  <p>Kontaktirati ćemo vas za kratki online intervju kako bismo bolje razumjeli vaš stil podučavanja i očekivanja.</p>
               </div>
            </div>
            <div class="card bg-base-100 shadow-lg border border-base-200">
               <div class="card-body items-center text-center">
                  <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                     </svg>
                  </div>
                  <h3 class="card-title">3. Onboarding</h3>
                  <p>Nakon odobrenja, provesti ćemo vas kroz platformu, postaviti vaš profil instruktora i pomoći vam da započnete.</p>
               </div>
            </div>
         </div>
      </div>
      <!-- FAQ Section --> 
      <div class="mt-16">
         <h2 class="text-2xl font-bold mb-6 text-center">Često postavljana pitanja</h2>
         <div class="space-y-4 max-w-3xl mx-auto">
            <div class="collapse collapse-plus bg-base-100 shadow border border-base-200 rounded-box">
               <input type="radio" name="faq-accordion" checked="checked" /> 
               <div class="collapse-title text-lg font-medium"> Koliko mogu zaraditi kao instruktor? </div>
               <div class="collapse-content">
                  <p>Zarada ovisi o broju sati koje ćete podučavati, vašem iskustvu i predmetima. Instruktori na našoj platformi u prosjeku zarađuju između 10€ i 25€ po satu instrukcija. Vi sami postavljate svoju satnicu.</p>
               </div>
            </div>
            <div class="collapse collapse-plus bg-base-100 shadow border border-base-200 rounded-box">
               <input type="radio" name="faq-accordion" /> 
               <div class="collapse-title text-lg font-medium"> Koliko traje proces odobravanja prijave? </div>
               <div class="collapse-content">
                  <p>Proces odobravanja prijave obično traje 3-5 radnih dana, uključujući provjeru dokumentacije i intervju. Nakon odobrenja, možete odmah početi podučavati.</p>
               </div>
            </div>
            <div class="collapse collapse-plus bg-base-100 shadow border border-base-200 rounded-box">
               <input type="radio" name="faq-accordion" /> 
               <div class="collapse-title text-lg font-medium"> Moram li imati prethodno iskustvo u podučavanju? </div>
               <div class="collapse-content">
                  <p>Nije nužno da imate prethodno iskustvo u podučavanju, ali je poželjno. Važno je da imate duboko razumijevanje predmeta koje želite podučavati i sposobnost da znanje prenesete na jasan i razumljiv način.</p>
               </div>
            </div>
            <div class="collapse collapse-plus bg-base-100 shadow border border-base-200 rounded-box">
               <input type="radio" name="faq-accordion" /> 
               <div class="collapse-title text-lg font-medium"> Koje obrazovanje moram imati da bih bio instruktor? </div>
               <div class="collapse-content">
                  <p>Za većinu predmeta tražimo minimalno završenu srednju školu, a za fakultetske predmete očekujemo da imate relevantno fakultetsko obrazovanje ili da ste student viših godina odgovarajućeg smjera. Svaka prijava se procjenjuje individualno.</p>
               </div>
            </div>
            <div class="collapse collapse-plus bg-base-100 shadow border border-base-200 rounded-box">
               <input type="radio" name="faq-accordion" /> 
               <div class="collapse-title text-lg font-medium"> Koja je provizija platforme? </div>
               <div class="collapse-content">
                  <p>Naša provizija iznosi 15% od cijene svake održane instrukcije. U ovu proviziju su uključeni svi troškovi platforme, procesuiranja plaćanja, marketinga i dovođenja učenika.</p>
               </div>
            </div>
         </div>
      </div>
      <!-- Testimonials from Instructors --> 
      <div class="mt-16 mb-10">
         <h2 class="text-2xl font-bold mb-8 text-center">Što kažu naši instruktori</h2>
         <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card bg-base-100 shadow-xl border border-base-200">
               <div class="card-body p-6">
                  <div class="flex items-center gap-4 mb-4">
                     <div class="avatar">
                        <div class="w-16 h-16 rounded-full"> <img src="https://ui-avatars.com/api/?name=Ana+Marić&background=6419E6&color=FFFFFF" alt="Ana Marić" /> </div>
                     </div>
                     <div>
                        <h3 class="font-bold text-lg">Ana Marić</h3>
                        <p class="text-base-content/70">Instruktorica matematike</p>
                     </div>
                  </div>
                  <div class="rating rating-sm mb-4"> <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-1" class="mask mask-star-2 bg-primary" checked disabled /> </div>
                  <p class="text-base-content/80 italic">"Podučavanje preko ove platforme mi je omogućilo fleksibilan raspored i dodatni prihod. Sustav je jednostavan za korištenje, a podrška tim je uvijek spremna pomoći."</p>
               </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-200">
               <div class="card-body p-6">
                  <div class="flex items-center gap-4 mb-4">
                     <div class="avatar">
                        <div class="w-16 h-16 rounded-full"> <img src="https://ui-avatars.com/api/?name=Marko+Kovač&background=6419E6&color=FFFFFF" alt="Marko Kovač" /> </div>
                     </div>
                     <div>
                        <h3 class="font-bold text-lg">Marko Kovač</h3>
                        <p class="text-base-content/70">Instruktor programiranja</p>
                     </div>
                  </div>
                  <div class="rating rating-sm mb-4"> <input type="radio" name="rating-2" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-2" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-2" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-2" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-2" class="mask mask-star-2 bg-primary" checked disabled /> </div>
                  <p class="text-base-content/80 italic">"Kao student doktorskog studija, tražio sam način da podijelim svoje znanje. Ova platforma mi je omogućila da doprem do učenika iz cijele Hrvatske i pomognem im u razumijevanju programiranja."</p>
               </div>
            </div>
            <div class="card bg-base-100 shadow-xl border border-base-200">
               <div class="card-body p-6">
                  <div class="flex items-center gap-4 mb-4">
                     <div class="avatar">
                        <div class="w-16 h-16 rounded-full"> <img src="https://ui-avatars.com/api/?name=Ivana+Novak&background=6419E6&color=FFFFFF" alt="Ivana Novak" /> </div>
                     </div>
                     <div>
                        <h3 class="font-bold text-lg">Ivana Novak</h3>
                        <p class="text-base-content/70">Instruktorica engleskog</p>
                     </div>
                  </div>
                  <div class="rating rating-sm mb-4"> <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" checked disabled /> <input type="radio" name="rating-3" class="mask mask-star-2 bg-primary" disabled /> </div>
                  <p class="text-base-content/80 italic">"Proces prijave je bio jednostavan i brz. Nakon što sam odobrena, počela sam dobivati upite za instrukcije skoro odmah. Sada imam redovite učenike i stabilan dodatni prihod."</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   let currentStep = 1;
   let educationCount = 1;

   $(document).ready(function() {
       updateStepDisplay();
       
       // Handle checkbox for current education
       $(document).on('change', 'input[name$="[current]"]', function() {
           const index = $(this).attr('name').match(/\d+/)[0];
           const endDateInput = $(`input[name="education[${index}][end_date]"]`);
           
           if ($(this).is(':checked')) {
               endDateInput.prop('disabled', true).val('');
               endDateInput.prop('required', false);
           } else {
               endDateInput.prop('disabled', false);
               endDateInput.prop('required', true);
           }
       });
   });

   function addEducation() {
       const educationList = $('#educationList');
       const newEducation = `
           <div class="education-item card shadow-sm bg-base-200 mb-4">
               <div class="card-body">
                   <div class="flex justify-end mb-2">
                       <button type="button" class="btn btn-ghost btn-sm" onclick="removeEducation(this)">Ukloni</button>
                   </div>
                   <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                       <div class="form-control">
                           <label class="label">
                               <span class="label-text">Obrazovna institucija</span>
                           </label>
                           <input type="text" name="education[${educationCount}][institution]" placeholder="Unesite naziv institucije" 
                                  class="input input-bordered" required>
                       </div>

                       <div class="form-control">
                           <label class="label">
                               <span class="label-text">Stupanj obrazovanja</span>
                           </label>
                           <select name="education[${educationCount}][degree]" class="select select-bordered" required>
                               <option value="">Odaberite stupanj</option>
                               <option value="srednja">Srednja škola</option>
                               <option value="vss">Viša stručna sprema</option>
                               <option value="vss_mag">Magisterij</option>
                               <option value="doktorat">Doktorat</option>
                           </select>
                       </div>

                       <div class="form-control">
                           <label class="label">
                               <span class="label-text">Područje obrazovanja</span>
                           </label>
                           <input type="text" name="education[${educationCount}][field]" placeholder="Unesite područje" 
                                  class="input input-bordered" required>
                       </div>

                       <div class="form-control">
                           <label class="label">
                               <span class="label-text">Početak</span>
                           </label>
                           <input type="date" name="education[${educationCount}][start_date]" 
                                  class="input input-bordered" required>
                       </div>

                       <div class="form-control">
                           <label class="label">
                               <span class="label-text">Završetak</span>
                           </label>
                           <input type="date" name="education[${educationCount}][end_date]" 
                                  class="input input-bordered">
                       </div>

                       <div class="form-control">
                           <label class="cursor-pointer label">
                               <span class="label-text">Trenutno pohađam ovo obrazovanje</span>
                               <input type="checkbox" name="education[${educationCount}][current]" class="checkbox checkbox-primary">
                           </label>
                       </div>
                   </div>
               </div>
           </div>
       `;
       
       educationList.append(newEducation);
       educationCount++;
   }

   function removeEducation(button) {
       $(button).closest('.education-item').remove();
   }

   function goToStep(step) {
       currentStep = step;
       updateStepDisplay();
   }

   function changeStep(direction) {
       if (direction === 1 && validateCurrentStep()) {
           currentStep++;
       } else if (direction === -1) {
           currentStep--;
       } else {
           return;
       }
       
       updateStepDisplay();
   }

   function updateStepDisplay() {
       $('.step-content').addClass('hidden');
       $(`.step-content[data-step="${currentStep}"]`).removeClass('hidden');
       
       // Update steps styling
       $('.step').removeClass('step-primary');
       $(`.step[data-step="${currentStep}"]`).addClass('step-primary');
       
       // Previous steps should also be highlighted
       for (let i = 1; i < currentStep; i++) {
           $(`.step[data-step="${i}"]`).addClass('step-primary');
       }
       
       // Update navigation buttons
       const prevBtn = $('#prevBtn');
       const nextBtn = $('#nextBtn');
       const submitBtn = $('#submitBtn');
       
       prevBtn.toggleClass('hidden', currentStep === 1);
       
       if (currentStep === 5) {
           nextBtn.addClass('hidden');
           submitBtn.removeClass('hidden');
           updateReviewSection();
       } else {
           nextBtn.removeClass('hidden');
           submitBtn.addClass('hidden');
       }
   }

   function validateCurrentStep() {
       let isValid = true;
       
       $(`.step-content[data-step="${currentStep}"] [required]`).each(function() {
           if (!$(this).val()) {
               isValid = false;
               $(this).addClass('input-error');
           } else {
               $(this).removeClass('input-error');
           }
       });
       
       return isValid;
   }

   function updateReviewSection() {
       // Update personal info
       $('#review-phone').text($('input[name="phone"]').val() || 'Nije navedeno');
       $('#review-city').text($('input[name="city"]').val());
       $('#review-region').text($('input[name="region"]').val());
       $('#review-biography').text($('textarea[name="biography"]').val());
       
       // Update education
       let educationHtml = '';
       $('.education-item').each(function(index) {
           const institution = $(this).find('input[name^="education"][name$="[institution]"]').val();
           const degree = $(this).find('select[name^="education"][name$="[degree]"]').val();
           const field = $(this).find('input[name^="education"][name$="[field]"]').val();
           const startDate = $(this).find('input[name^="education"][name$="[start_date]"]').val();
           const endDate = $(this).find('input[name^="education"][name$="[end_date]"]').val();
           const current = $(this).find('input[name^="education"][name$="[current]"]').is(':checked');
           
           educationHtml += `
               <div class="mb-4">
                   <p><strong>${institution}</strong></p>
                   <p>Stupanj: ${getDegreeLabel(degree)}</p>
                   <p>Područje: ${field}</p>
                   <p>Razdoblje: ${startDate} - ${current ? 'Trenutno' : endDate}</p>
               </div>
           `;
       });
       $('#review-education').html(educationHtml);
       
       // Update experience
       $('#review-experience-years').text($('input[name="experience_years"]').val());
       $('#review-experience-description').text($('textarea[name="experience_description"]').val());
       $('#review-online-experience').text($('input[name="online_experience"]').is(':checked') ? 'Da' : 'Ne');
       
       // Update documents
       $('#review-cv').text($('input[name="cv"]')[0].files[0]?.name || 'Nije dodan');
       $('#review-diploma').text($('input[name="diploma"]')[0].files[0]?.name || 'Nije dodan');
       $('#review-id').text($('input[name="id_card"]')[0].files[0]?.name || 'Nije dodan');
   }

   function getDegreeLabel(value) {
       const degrees = {
           'srednja': 'Srednja škola',
           'vss': 'Viša stručna sprema',
           'vss_mag': 'Magisterij',
           'doktorat': 'Doktorat'
       };
       return degrees[value] || value;
   }
</script>
    
@endsection