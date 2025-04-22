@extends('layouts.app') 

@section('main-content') 
<div class="bg-base-100 min-h-screen py-12">
   <div class="max-w-4xl mx-auto px-4">
      <!-- Page Header --> 
      <div class="text-center mb-10">
         <h1 class="text-3xl md:text-4xl font-bold text-base-content mb-3">Postani instruktor</h1>
         <p class="text-base-content/70 max-w-2xl mx-auto">Pridruži se našoj zajednici instruktora i podijeli svoje znanje. Pomozi učenicima da ostvare svoje ciljeve i zaradi pritom.</p>
      </div>
      <!-- Application Process Timeline --> 
      <div class="mb-10">
         <div class="steps steps-vertical lg:steps-horizontal w-full">
            <div class="step step-primary">Prijava</div>
            <div class="step" id="step-verification">Verifikacija</div>
            <div class="step" id="step-interview">Intervju</div>
            <div class="step" id="step-onboarding">Onboarding</div>
         </div>
      </div>
      <!-- Application Form Card --> 
      <div class="card bg-base-100 shadow-xl border border-base-200">
         <div class="card-body p-6 md:p-8">
            <form id="instructor-application-form" class="space-y-6">
               <!-- Validation Message Alert --> 
               <div id="validation-message" class="alert alert-error shadow-lg hidden">
                  <div>
                     <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                     <span>Molimo popunite sva potrebna polja prije nastavka.</span> 
                  </div>
               </div>
               <!-- Step 1: Personal Information --> 
               <div id="step-personal" class="form-step">
                  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"> <span class="w-8 h-8 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">1</span> Osobne informacije </h2>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <div class="form-control"> <label class="label"> <span class="label-text">Ime</span> </label> <input type="text" id="first_name" name="personal[first_name]" class="input input-bordered" value="{{ auth()->user()->first_name ?? '' }}" required /> </div>
                     <div class="form-control"> <label class="label"> <span class="label-text">Prezime</span> </label> <input type="text" id="last_name" name="personal[last_name]" class="input input-bordered" value="{{ auth()->user()->last_name ?? '' }}" required /> </div>
                     <div class="form-control"> <label class="label"> <span class="label-text">Email</span> </label> <input type="email" id="email" name="personal[email]" class="input input-bordered" value="{{ auth()->user()->email ?? '' }}" required /> </div>
                     <div class="form-control"> <label class="label"> <span class="label-text">Telefon</span> </label> <input type="tel" id="phone" name="personal[phone]" class="input input-bordered" required placeholder="+385 XX XXX XXXX" /> </div>
                     <div class="form-control md:col-span-2"> <label class="label"> <span class="label-text">Grad i država</span> </label> <input type="text" id="location" name="personal[location]" class="input input-bordered" required placeholder="Zagreb, Hrvatska" /> </div>
                     <div class="form-control md:col-span-2"> <label class="label"> <span class="label-text">O meni (biografija)</span> </label> <textarea id="bio" name="personal[bio]" class="textarea textarea-bordered h-24" placeholder="Kratko se predstavite budućim učenicima"></textarea> </div>
                  </div>
               </div>
               <!-- Step 2: Educational Background --> 
               <div id="step-education" class="form-step hidden">
                  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"> <span class="w-8 h-8 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">2</span> Obrazovanje </h2>
                  <div id="education-container" class="space-y-8">
                     <div class="education-item bg-base-200 p-4 rounded-lg">
                        <div class="flex justify-between items-center mb-4">
                           <h3 class="font-bold text-lg">Obrazovanje 1</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                           <div class="form-control"> <label class="label"> <span class="label-text">Obrazovna institucija</span> </label> <input type="text" name="education[0][institution]" class="input input-bordered" required placeholder="Sveučilište, Fakultet, Škola..." /> </div>
                           <div class="form-control">
                              <label class="label"> <span class="label-text">Stupanj obrazovanja</span> </label> 
                              <select name="education[0][degree]" class="select select-bordered w-full" required>
                                 <option value="">Odaberite...</option>
                                 <option value="high_school">Srednja škola</option>
                                 <option value="bachelor">Preddiplomski studij</option>
                                 <option value="master">Diplomski studij</option>
                                 <option value="phd">Doktorat</option>
                                 <option value="other">Ostalo</option>
                              </select>
                           </div>
                           <div class="form-control"> <label class="label"> <span class="label-text">Područje obrazovanja</span> </label> <input type="text" name="education[0][field]" class="input input-bordered" required placeholder="npr. Matematika, Fizika..." /> </div>
                           <div class="grid grid-cols-2 gap-3">
                              <div class="form-control"> <label class="label"> <span class="label-text">Početak</span> </label> <input type="number" name="education[0][start_year]" min="1950" max="2023" class="input input-bordered" required placeholder="Godina" /> </div>
                              <div class="form-control"> <label class="label"> <span class="label-text">Završetak</span> </label> <input type="number" name="education[0][end_year]" min="1950" max="2030" class="input input-bordered end-year" placeholder="Godina" /> </div>
                           </div>
                           <div class="form-control"> <label class="label cursor-pointer justify-start gap-3"> <input type="checkbox" name="education[0][current]" class="checkbox checkbox-primary current-education" /> <span class="label-text">Trenutno studiram</span> </label> </div>
                        </div>
                     </div>
                  </div>
                  <button type="button" id="add-education" class="btn btn-outline btn-primary">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                     </svg>
                     Dodaj obrazovanje 
                  </button>
               </div>
               <!-- Step 3: Subjects --> 
               <div id="step-subjects" class="form-step hidden">
                  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"> <span class="w-8 h-8 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">3</span> Predmeti koje želite podučavati </h2>
                  <p class="text-base-content/70 mb-6">Odaberite predmete i razine za koje nudite instrukcije. Možete odabrati više opcija.</p>
                  <div id="subjects-container" class="space-y-8">
                     <!-- Subject items will be added here dynamically by jQuery --> 
                  </div>
                  <div id="selected-subjects-display" class="alert alert-info shadow-lg hidden mt-4">
                     <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                           <span class="font-medium">Odabrani predmeti:</span> 
                           <div id="selected-subjects-list" class="flex flex-wrap gap-2 mt-2">
                              <!-- Selected subjects badges will be added here --> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Step 4: Teaching Experience --> 
               <div id="step-experience" class="form-step hidden">
                  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"> <span class="w-8 h-8 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">4</span> Iskustvo u podučavanju </h2>
                  <div class="space-y-6">
                     <div class="form-control">
                        <label class="label"> <span class="label-text">Koliko godina iskustva imate u podučavanju?</span> </label> 
                        <select id="years" name="experience[years]" class="select select-bordered w-full" required>
                           <option value="">Odaberite...</option>
                           <option value="0">Nemam iskustva</option>
                           <option value="<1">Manje od 1 godine</option>
                           <option value="1-3">1-3 godine</option>
                           <option value="3-5">3-5 godina</option>
                           <option value="5+">Više od 5 godina</option>
                        </select>
                     </div>
                     <div class="form-control"> <label class="label"> <span class="label-text">Opišite vaše iskustvo u podučavanju</span> </label> <textarea id="experience-description" name="experience[description]" class="textarea textarea-bordered h-32" placeholder="Opišite vaše iskustvo u podučavanju, s kim ste radili, pripreme za državnu maturu, posebne metode učenja koje koristite..."></textarea> </div>
                     <div class="form-control"> <label class="label cursor-pointer justify-start gap-3"> <input type="checkbox" id="has-online-experience" name="experience[has_online_experience]" class="checkbox checkbox-primary" /> <span class="label-text">Imam iskustva u online podučavanju</span> </label> </div>
                  </div>
               </div>
               <!-- Step 5: Availability --> 
               <div id="step-availability" class="form-step hidden">
                  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"> <span class="w-8 h-8 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">5</span> Dostupnost </h2>
                  <div class="space-y-6">
                     <div class="form-control">
                        <label class="label"> <span class="label-text">Koliko sati tjedno možete podučavati?</span> </label> 
                        <select id="hours-per-week" name="availability[hours_per_week]" class="select select-bordered w-full" required>
                           <option value="">Odaberite...</option>
                           <option value="1-5">1-5 sati</option>
                           <option value="5-10">5-10 sati</option>
                           <option value="10-20">10-20 sati</option>
                           <option value="20+">Više od 20 sati</option>
                        </select>
                     </div>
                     <div class="form-control">
                        <label class="label"> <span class="label-text">Koji dani u tjednu vam najviše odgovaraju?</span> </label> 
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-2"> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" name="availability[weekdays][]" value="Ponedjeljak" class="checkbox checkbox-primary" /> <span class="label-text">Ponedjeljak</span> </label> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" name="availability[weekdays][]" value="Utorak" class="checkbox checkbox-primary" /> <span class="label-text">Utorak</span> </label> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" name="availability[weekdays][]" value="Srijeda" class="checkbox checkbox-primary" /> <span class="label-text">Srijeda</span> </label> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" name="availability[weekdays][]" value="Četvrtak" class="checkbox checkbox-primary" /> <span class="label-text">Četvrtak</span> </label> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" name="availability[weekdays][]" value="Petak" class="checkbox checkbox-primary" /> <span class="label-text">Petak</span> </label> </div>
                        <div class="mt-3"> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200 inline-flex"> <input type="checkbox" id="weekends" name="availability[weekends]" class="checkbox checkbox-primary" /> <span class="label-text">Dostupan/na sam i vikendom</span> </label> </div>
                     </div>
                     <div class="form-control">
                        <label class="label"> <span class="label-text">Način podučavanja</span> </label> 
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-2"> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" id="online" name="availability[online]" class="checkbox checkbox-primary" checked /> <span class="label-text">Online instrukcije</span> </label> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" id="in-person" name="availability[in_person]" class="checkbox checkbox-primary" /> <span class="label-text">Instrukcije uživo</span> </label> <label class="label cursor-pointer justify-start gap-2 border border-base-300 rounded-lg p-3 hover:bg-base-200"> <input type="checkbox" id="group-sessions" name="availability[group_sessions]" class="checkbox checkbox-primary" /> <span class="label-text">Grupne instrukcije</span> </label> </div>
                     </div>
                  </div>
               </div>
               <!-- Step 6: Documents Upload --> 
               <div id="step-documents" class="form-step hidden">
                  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"> <span class="w-8 h-8 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">6</span> Dokumenti </h2>
                  <div class="alert alert-info mb-6">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                     <span>Priložite potrebne dokumente koji dokazuju vaše kvalifikacije i identitet.</span> 
                  </div>
                  <div class="space-y-6">
                     <div class="form-control">
                        <label class="label"> <span class="label-text">Životopis (CV)</span> </label> 
                        <div id="cv-upload-container" class="bg-base-200 rounded-lg p-4 flex items-center justify-center border-2 border-dashed border-base-300 cursor-pointer hover:bg-base-300 transition-colors">
                           <input type="file" id="cv-upload" name="documents[cv]" class="hidden" accept=".pdf,.doc,.docx" /> 
                           <div id="cv-upload-empty" class="text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-base-content/50 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                              </svg>
                              <p class="text-base-content/70">Kliknite za dodavanje ili povucite dokument ovdje<br><span class="text-xs">PDF, DOC ili DOCX (max 5MB)</span></p>
                           </div>
                           <div id="cv-upload-complete" class="text-center hidden">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-success mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              <p id="cv-filename" class="text-base-content font-medium"></p>
                              <p class="text-xs text-base-content/70 mt-1">Kliknite za promjenu dokumenta</p>
                           </div>
                        </div>
                     </div>
                     <div class="form-control">
                        <label class="label"> <span class="label-text">Diploma ili certifikat (opcionalno)</span> </label> 
                        <div id="certificate-upload-container" class="bg-base-200 rounded-lg p-4 flex items-center justify-center border-2 border-dashed border-base-300 cursor-pointer hover:bg-base-300 transition-colors">
                           <input type="file" id="certificate-upload" name="documents[certificate]" class="hidden" accept=".pdf,.jpg,.jpeg,.png" /> 
                           <div id="certificate-upload-empty" class="text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-base-content/50 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                              </svg>
                              <p class="text-base-content/70">Kliknite za dodavanje ili povucite dokument ovdje<br><span class="text-xs">PDF, JPG, JPEG ili PNG (max 5MB)</span></p>
                           </div>
                           <div id="certificate-upload-complete" class="text-center hidden">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-success mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              <p id="certificate-filename" class="text-base-content font-medium"></p>
                              <p class="text-xs text-base-content/70 mt-1">Kliknite za promjenu dokumenta</p>
                           </div>
                        </div>
                     </div>
                     <div class="form-control">
                        <label class="label"> <span class="label-text">Osobna iskaznica (kopija)</span> </label> 
                        <div id="id-upload-container" class="bg-base-200 rounded-lg p-4 flex items-center justify-center border-2 border-dashed border-base-300 cursor-pointer hover:bg-base-300 transition-colors">
                           <input type="file" id="id-upload" name="documents[id_card]" class="hidden" accept=".pdf,.jpg,.jpeg,.png" /> 
                           <div id="id-upload-empty" class="text-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-base-content/50 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                              </svg>
                              <p class="text-base-content/70">Kliknite za dodavanje ili povucite dokument ovdje<br><span class="text-xs">PDF, JPG, JPEG ili PNG (max 5MB)</span></p>
                           </div>
                           <div id="id-upload-complete" class="text-center hidden">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-success mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              <p id="id-filename" class="text-base-content font-medium"></p>
                              <p class="text-xs text-base-content/70 mt-1">Kliknite za promjenu dokumenta</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Step 7: Final Review and Submit --> 
               <div id="step-submit" class="form-step hidden">
                  <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"> <span class="w-8 h-8 rounded-full bg-primary text-primary-content flex items-center justify-center font-bold">7</span> Pregled i slanje prijave </h2>
                  <div class="space-y-6">
                     <div class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Uspješno ste ispunili sve korake prijave. Molimo pregledajte informacije prije konačne potvrde.</span> 
                     </div>
                     <!-- Personal Information Review --> 
                     <div class="bg-base-200 p-4 rounded-lg">
                        <h3 class="font-bold text-lg mb-2 flex items-center gap-2"> <span class="w-6 h-6 rounded-full bg-primary text-primary-content flex items-center justify-center text-xs font-bold">1</span> Osobne informacije </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                           <div>
                              <p class="text-sm text-base-content/70">Ime i prezime:</p>
                              <p id="review-name" class="font-medium"></p>
                           </div>
                           <div>
                              <p class="text-sm text-base-content/70">Kontakt:</p>
                              <p id="review-email" class="font-medium"></p>
                              <p id="review-phone" class="font-medium"></p>
                           </div>
                           <div class="md:col-span-2">
                              <p class="text-sm text-base-content/70">Lokacija:</p>
                              <p id="review-location" class="font-medium"></p>
                           </div>
                        </div>
                        <button type="button" class="btn btn-ghost btn-xs mt-2 edit-step" data-step="personal">Uredi</button> 
                     </div>
                     <!-- Subjects Review --> 
                     <div class="bg-base-200 p-4 rounded-lg">
                        <h3 class="font-bold text-lg mb-2 flex items-center gap-2"> <span class="w-6 h-6 rounded-full bg-primary text-primary-content flex items-center justify-center text-xs font-bold">3</span> Odabrani predmeti </h3>
                        <div id="review-subjects" class="flex flex-wrap gap-2 mt-2">
                           <!-- Subjects will be added here by jQuery --> 
                        </div>
                        <button type="button" class="btn btn-ghost btn-xs mt-4 edit-step" data-step="subjects">Uredi</button> 
                     </div>
                     <!-- Teaching Methods Review --> 
                     <div class="bg-base-200 p-4 rounded-lg">
                        <h3 class="font-bold text-lg mb-2 flex items-center gap-2"> <span class="w-6 h-6 rounded-full bg-primary text-primary-content flex items-center justify-center text-xs font-bold">5</span> Način podučavanja </h3>
                        <div id="review-teaching-methods" class="flex flex-wrap gap-2">
                           <!-- Teaching methods will be added here by jQuery --> 
                        </div>
                        <div class="mt-3">
                           <p class="text-sm text-base-content/70">Dostupnost:</p>
                           <p id="review-hours" class="font-medium"></p>
                           <div id="review-days" class="flex flex-wrap gap-1 mt-1">
                              <!-- Availability days will be added here by jQuery --> 
                           </div>
                        </div>
                        <button type="button" class="btn btn-ghost btn-xs mt-2 edit-step" data-step="availability">Uredi</button> 
                     </div>
                     <!-- Documents Review --> 
                     <div class="bg-base-200 p-4 rounded-lg">
                        <h3 class="font-bold text-lg mb-2 flex items-center gap-2"> <span class="w-6 h-6 rounded-full bg-primary text-primary-content flex items-center justify-center text-xs font-bold">6</span> Dokumenti </h3>
                        <ul id="review-documents" class="list-disc list-inside">
                           <!-- Documents will be added here by jQuery --> 
                        </ul>
                        <button type="button" class="btn btn-ghost btn-xs mt-2 edit-step" data-step="documents">Uredi</button> 
                     </div>
                     <!-- Terms and Conditions --> 
                     <div class="form-control border border-base-300 rounded-lg p-4">
                        <label class="label cursor-pointer justify-start gap-3">
                           <input type="checkbox" id="terms-accepted" name="terms_accepted" class="checkbox checkbox-primary" required /> 
                           <div>
                              <span class="label-text">Pročitao/la sam i prihvaćam <a href="#" class="text-primary hover:underline">Uvjete korištenja</a> i <a href="#" class="text-primary hover:underline">Politiku privatnosti</a> platforme.</span> 
                              <p id="terms-error" class="text-xs text-error mt-1 hidden">Morate prihvatiti uvjete korištenja.</p>
                           </div>
                        </label>
                     </div>
                  </div>
               </div>
               <!-- Navigation Buttons --> 
               <div class="flex justify-between mt-8">
                  <button type="button" id="prev-step" class="btn btn-outline hidden">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                     </svg>
                     Natrag 
                  </button>
                  <div></div>
                  <button type="button" id="next-step" class="btn btn-primary">
                     Nastavi 
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                     </svg>
                  </button>
                  <button type="button" id="submit-application" class="btn btn-primary hidden"> Pošalji prijavu </button> 
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
<script src = "https://code.jquery.com/jquery-3.6.0.min.js" > </script>
<script>
    $(document).ready(function() { 
        const availableSubjects = [{
            id: 1,
            name: 'Matematika',
            levels: ['Osnovna škola', 'Srednja škola', 'Fakultet']
        }, {
            id: 2,
            name: 'Fizika',
            levels: ['Osnovna škola', 'Srednja škola', 'Fakultet']
        }, {
            id: 3,
            name: 'Kemija',
            levels: ['Osnovna škola', 'Srednja škola', 'Fakultet']
        }, {
            id: 4,
            name: 'Biologija',
            levels: ['Osnovna škola', 'Srednja škola', 'Fakultet']
        }, {
            id: 5,
            name: 'Hrvatski jezik',
            levels: ['Osnovna škola', 'Srednja škola']
        }, {
            id: 6,
            name: 'Engleski jezik',
            levels: ['Osnovna škola', 'Srednja škola', 'Fakultet']
        }, {
            id: 7,
            name: 'Programiranje',
            levels: ['Osnovna škola', 'Srednja škola', 'Fakultet']
        }, {
            id: 8,
            name: 'Statistika',
            levels: ['Srednja škola', 'Fakultet']
        }];
        let currentStep = 'personal';
        const steps = ['personal', 'education', 'subjects', 'experience', 'availability', 'documents', 'submit'];
        let selectedSubjects = [];
        let formData = {
            personal: {
                first_name: '{{ auth()->user()->first_name ?? "" }}',
                last_name: '{{ auth()->user()->last_name ?? "" }}',
                email: '{{ auth()->user()->email ?? "" }}',
                phone: '',
                location: '',
                bio: ''
            },
            education: [{
                institution: '',
                degree: '',
                field: '',
                start_year: '',
                end_year: '',
                current: false
            }],
            subjects: [],
            experience: {
                years: '',
                description: '',
                has_online_experience: false
            },
            availability: {
                hours_per_week: '',
                weekdays: [],
                weekends: false,
                online: true,
                in_person: false,
                group_sessions: false
            },
            documents: {
                cv: null,
                certificate: null,
                id_card: null
            }
        };
        
        function loadSubjects() {
            const subjectsContainer = $('#subjects-container');
            subjectsContainer.empty();
            availableSubjects.forEach(subject => {
                const subjectItem = $(` <div class="bg-base-200 p-4 rounded-lg"> <h3 class="font-bold text-lg mb-3">${subject.name}</h3> <div class="flex flex-wrap gap-3 subject-levels" data-subject-id="${subject.id}" data-subject-name="${subject.name}"> ${subject.levels.map(level => ` <div class="badge badge-lg p-4 cursor-pointer hover:opacity-80 transition-opacity subject-level ${isSubjectSelected(subject.id, level) ? 'badge-primary' : 'badge-outline'}" data-level="${level}"> ${level} ${isSubjectSelected(subject.id, level) ? '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>' : ''} </div> `).join('')} </div> </div> `);
                subjectsContainer.append(subjectItem);
            });
            updateSelectedSubjectsDisplay();
        }
        
        function isSubjectSelected(subjectId, level) {
            return selectedSubjects.some(s => s.id === subjectId && s.level === level);
        }
        
        function updateSelectedSubjectsDisplay() {
            const selectedSubjectsDisplay = $('#selected-subjects-display');
            const selectedSubjectsList = $('#selected-subjects-list');
            if (selectedSubjects.length > 0) {
                selectedSubjectsDisplay.removeClass('hidden');
                selectedSubjectsList.empty();
                selectedSubjects.forEach(sub => {
                    const badge = $(` <div class="badge badge-primary gap-1"> ${sub.name} (${sub.level}) <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 cursor-pointer remove-subject" data-id="${sub.id}" data-level="${sub.level}" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /> </svg> </div> `);
                    selectedSubjectsList.append(badge);
                });
            } else {
                selectedSubjectsDisplay.addClass('hidden');
            }
        }
        let educationCounter = 1;
        $('#add-education').click(function() {
            educationCounter++;
            const newEducation = $(` <div class="education-item bg-base-200 p-4 rounded-lg"> <div class="flex justify-between items-center mb-4"> <h3 class="font-bold text-lg">Obrazovanje ${educationCounter}</h3> <button type="button" class="btn btn-sm btn-circle btn-ghost remove-education"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /> </svg> </button> </div> <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> <div class="form-control"> <label class="label"> <span class="label-text">Obrazovna institucija</span> </label> <input type="text" name="education[${educationCounter - 1}][institution]" class="input input-bordered" required placeholder="Sveučilište, Fakultet, Škola..." /> </div> <div class="form-control"> <label class="label"> <span class="label-text">Stupanj obrazovanja</span> </label> <select name="education[${educationCounter - 1}][degree]" class="select select-bordered w-full" required> <option value="">Odaberite...</option> <option value="high_school">Srednja škola</option> <option value="bachelor">Preddiplomski studij</option> <option value="master">Diplomski studij</option> <option value="phd">Doktorat</option> <option value="other">Ostalo</option> </select> </div> <div class="form-control"> <label class="label"> <span class="label-text">Područje obrazovanja</span> </label> <input type="text" name="education[${educationCounter - 1}][field]" class="input input-bordered" required placeholder="npr. Matematika, Fizika..." /> </div> <div class="grid grid-cols-2 gap-3"> <div class="form-control"> <label class="label"> <span class="label-text">Početak</span> </label> <input type="number" name="education[${educationCounter - 1}][start_year]" min="1950" max="2023" class="input input-bordered" required placeholder="Godina" /> </div> <div class="form-control"> <label class="label"> <span class="label-text">Završetak</span> </label> <input type="number" name="education[${educationCounter - 1}][end_year]" min="1950" max="2030" class="input input-bordered end-year" placeholder="Godina" /> </div> </div> <div class="form-control"> <label class="label cursor-pointer justify-start gap-3"> <input type="checkbox" name="education[${educationCounter - 1}][current]" class="checkbox checkbox-primary current-education" /> <span class="label-text">Trenutno studiram</span> </label> </div> </div> </div> `);
            $('#education-container').append(newEducation);
        });
        $(document).on('click', '.remove-education', function() {
            if ($('.education-item').length > 1) {
                $(this).closest('.education-item').remove();
                $('.education-item').each(function(index) {
                    $(this).find('h3').text(`Obrazovanje ${index + 1}`);
                    $(this).find('input, select').each(function() {
                        const name = $(this).attr('name');
                        if (name) {
                            $(this).attr('name', name.replace(/education\[\d+\]/, `education[${index}]`));
                        }
                    });
                });
                educationCounter = $('.education-item').length;
            }
        });
        $(document).on('change', '.current-education', function() {
            const endYearField = $(this).closest('.education-item').find('.end-year');
            if ($(this).is(':checked')) {
                endYearField.prop('disabled', true).val('');
            } else {
                endYearField.prop('disabled', false);
            }
        });
        $(document).on('click', '.subject-level', function() {
            const subjectId = parseInt($(this).parent().data('subject-id'));
            const subjectName = $(this).parent().data('subject-name');
            const level = $(this).data('level');
            const existingIndex = selectedSubjects.findIndex(s => s.id === subjectId && s.level === level);
            if (existingIndex >= 0) {
                selectedSubjects.splice(existingIndex, 1);
                $(this).removeClass('badge-primary').addClass('badge-outline');
                $(this).find('svg').remove();
            } else {
                selectedSubjects.push({
                    id: subjectId,
                    name: subjectName,
                    level: level
                });
                $(this).removeClass('badge-outline').addClass('badge-primary');
                $(this).append('<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>');
            }
            updateSelectedSubjectsDisplay();
        });
        $(document).on('click', '.remove-subject', function() {
            const subjectId = parseInt($(this).data('id'));
            const level = $(this).data('level');
            const existingIndex = selectedSubjects.findIndex(s => s.id === subjectId && s.level === level);
            if (existingIndex >= 0) {
                selectedSubjects.splice(existingIndex, 1);
            }
            $(this).parent().remove();
            $(`.subject-level[data-level="${level}"]`).each(function() {
                if (parseInt($(this).parent().data('subject-id')) === subjectId) {
                    $(this).removeClass('badge-primary').addClass('badge-outline');
                    $(this).find('svg').remove();
                }
            });
            updateSelectedSubjectsDisplay();
        });
        
        // Fixed file upload handlers
        $('#cv-upload-container').on('click', function(e) {
            if (e.target === this || !$(e.target).closest('input[type="file"]').length) {
                $('#cv-upload').trigger('click');
            }
        });
        
        $('#certificate-upload-container').on('click', function(e) {
            if (e.target === this || !$(e.target).closest('input[type="file"]').length) {
                $('#certificate-upload').trigger('click');
            }
        });
        
        $('#id-upload-container').on('click', function(e) {
            if (e.target === this || !$(e.target).closest('input[type="file"]').length) {
                $('#id-upload').trigger('click');
            }
        });
        
        $('#cv-upload').on('change', function() {
            handleFileUpload(this, 'cv', '#cv-filename', '#cv-upload-empty', '#cv-upload-complete');
        });
        
        $('#certificate-upload').on('change', function() {
            handleFileUpload(this, 'certificate', '#certificate-filename', '#certificate-upload-empty', '#certificate-upload-complete');
        });
        
        $('#id-upload').on('change', function() {
            handleFileUpload(this, 'id_card', '#id-filename', '#id-upload-empty', '#id-upload-complete');
        });
        
        function handleFileUpload(inputElement, fileType, filenameSelector, emptySelector, completeSelector) {
            if (inputElement.files && inputElement.files.length > 0) {
                const file = inputElement.files[0];
                formData.documents[fileType] = file;
                //File upload
                $(filenameSelector).text(file.name);
                $(emptySelector).addClass('hidden');
                $(completeSelector).removeClass('hidden');
            }
        }
        
        $('#next-step').click(function() {
            // if (!isStepValid(currentStep)) {
            //     showValidationError();
            //     return;
            // }
            collectFormData();
            const currentIndex = steps.indexOf(currentStep);
            if (currentIndex < steps.length - 1) {
                goToStep(steps[currentIndex + 1]);
            }
        });
        $('#prev-step').click(function() {
            const currentIndex = steps.indexOf(currentStep);
            if (currentIndex > 0) {
                goToStep(steps[currentIndex - 1]);
            }
        });
        $(document).on('click', '.edit-step', function() {
            const stepToEdit = $(this).data('step');
            if (steps.includes(stepToEdit)) {
                goToStep(stepToEdit);
            }
        });
        $('#submit-application').click(function() {
            if (!$('#terms-accepted').is(':checked')) {
                $('#terms-error').removeClass('hidden');
                return;
            }
            submitApplication();
        });
        
        function collectFormData() {
            if (currentStep === 'personal') {
                formData.personal = {
                    first_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    location: $('#location').val(),
                    bio: $('#bio').val()
                };
            } else if (currentStep === 'education') {
                formData.education = [];
                $('.education-item').each(function(index) {
                    formData.education.push({
                        institution: $(this).find(`input[name="education[${index}][institution]"]`).val(),
                        degree: $(this).find(`select[name="education[${index}][degree]"]`).val(),
                        field: $(this).find(`input[name="education[${index}][field]"]`).val(),
                        start_year: $(this).find(`input[name="education[${index}][start_year]"]`).val(),
                        end_year: $(this).find(`input[name="education[${index}][end_year]"]`).val(),
                        current: $(this).find(`input[name="education[${index}][current]"]`).is(':checked')
                    });
                });
            } else if (currentStep === 'subjects') {
                formData.subjects = selectedSubjects;
            } else if (currentStep === 'experience') {
                formData.experience = {
                    years: $('#years').val(),
                    description: $('#experience-description').val(),
                    has_online_experience: $('#has-online-experience').is(':checked')
                };
            } else if (currentStep === 'availability') {
                const weekdays = [];
                $('input[name="availability[weekdays][]"]:checked').each(function() {
                    weekdays.push($(this).val());
                });
                formData.availability = {
                    hours_per_week: $('#hours-per-week').val(),
                    weekdays: weekdays,
                    weekends: $('#weekends').is(':checked'),
                    online: $('#online').is(':checked'),
                    in_person: $('#in-person').is(':checked'),
                    group_sessions: $('#group-sessions').is(':checked')
                };
            }
        }
        
        function updateReviewStep() {
            $('#review-name').text(`${formData.personal.first_name} ${formData.personal.last_name}`);
            $('#review-email').text(formData.personal.email);
            $('#review-phone').text(formData.personal.phone);
            $('#review-location').text(formData.personal.location);
            $('#review-subjects').empty();
            formData.subjects.forEach(sub => {
                $('#review-subjects').append(` <div class="badge badge-primary p-3"> ${sub.name} (${sub.level}) </div> `);
            });
            $('#review-teaching-methods').empty();
            if (formData.availability.online) {
                $('#review-teaching-methods').append('<div class="badge badge-accent p-3">Online instrukcije</div>');
            }
            if (formData.availability.in_person) {
                $('#review-teaching-methods').append('<div class="badge badge-accent p-3">Instrukcije uživo</div>');
            }
            if (formData.availability.group_sessions) {
                $('#review-teaching-methods').append('<div class="badge badge-accent p-3">Grupne instrukcije</div>');
            }
            $('#review-hours').text(`${formData.availability.hours_per_week} sati tjedno`);
            $('#review-days').empty();
            formData.availability.weekdays.forEach(day => {
                $('#review-days').append(`<div class="badge badge-outline">${day}</div>`);
            });
            if (formData.availability.weekends) {
                $('#review-days').append('<div class="badge badge-outline">Vikend</div>');
            }
            $('#review-documents').empty();
            if (formData.documents.cv) {
                $('#review-documents').append(` <li class="flex items-center gap-2"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /> </svg> <span>Životopis (CV)</span> </li> `);
            }
            if (formData.documents.certificate) {
                $('#review-documents').append(` <li class="flex items-center gap-2"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /> </svg> <span>Diploma ili certifikat</span> </li> `);
            }
            if (formData.documents.id_card) {
                $('#review-documents').append(` <li class="flex items-center gap-2"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /> </svg> <span>Osobna iskaznica</span> </li> `);
            }
        }
        
        // Function to update timeline based on current step
        function updateTimeline(step) {
            // Determine which part of the process we're in
            const stepIndex = steps.indexOf(step);
            
            // Reset all steps
            $('.steps .step').removeClass('step-primary');
            
            // Always mark first step as active
            $('.steps .step:first-child').addClass('step-primary');
            
            // Form submission steps correspond to timeline steps
            if (stepIndex >= 6) { // At submit step
                $('#step-verification').addClass('step-primary');
                $('#step-interview').addClass('step-primary');
                $('#step-onboarding').addClass('step-primary');
            } else if (stepIndex >= 5) { // At documents step
                $('#step-verification').addClass('step-primary');
                $('#step-interview').addClass('step-primary');
            } else if (stepIndex >= 1) { // At education step or beyond
                $('#step-verification').addClass('step-primary');
            }
        }
        
        function goToStep(step) {
            $('.form-step').addClass('hidden');
            $(`#step-${step}`).removeClass('hidden');
            currentStep = step;
            updateNavigationButtons();
            updateTimeline(step); // Update timeline when changing steps
            initializeStep(step);
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        function initializeStep(step) {
            if (step === 'subjects') {
                loadSubjects();
            } else if (step === 'submit') {
                updateReviewStep();
            }
        }
        
        function updateNavigationButtons() {
            if (currentStep === 'personal') {
                $('#prev-step').addClass('hidden');
            } else {
                $('#prev-step').removeClass('hidden');
            }
            if (currentStep === 'submit') {
                $('#next-step').addClass('hidden');
                $('#submit-application').removeClass('hidden');
            } else {
                $('#next-step').removeClass('hidden');
                $('#submit-application').addClass('hidden');
            }
        }
        
        function isStepValid(step) {
            if (step === 'personal') {
                return $('#first_name').val() && $('#last_name').val() && $('#email').val() && $('#phone').val() && $('#location').val();
            } else if (step === 'education') {
                let valid = true;
                $('.education-item').each(function() {
                    const institution = $(this).find('input[name$="[institution]"]').val();
                    const degree = $(this).find('select[name$="[degree]"]').val();
                    const field = $(this).find('input[name$="[field]"]').val();
                    const startYear = $(this).find('input[name$="[start_year]"]').val();
                    if (!institution || !degree || !field || !startYear) {
                        valid = false;
                    }
                });
                return valid;
            } else if (step === 'subjects') {
                return selectedSubjects.length > 0;
            } else if (step === 'experience') {
                return $('#years').val() && $('#experience-description').val();
            } else if (step === 'availability') {
                const hoursPerWeek = $('#hours-per-week').val();
                const weekdaysSelected = $('input[name="availability[weekdays][]"]:checked').length > 0;
                const teachingMethod = $('#online').is(':checked') || $('#in-person').is(':checked');
                return hoursPerWeek && weekdaysSelected && teachingMethod;
            } else if (step === 'documents') {
                return formData.documents.cv && formData.documents.id_card;
            } else if (step === 'submit') {
                return true;
            }
            return false;
        }
        
        function showValidationError() {
            $('#validation-message').removeClass('hidden');
            setTimeout(function() {
                $('#validation-message').addClass('hidden');
            }, 3000);
        }
        
        function submitApplication() {
            alert('Vaša prijava je uspješno poslana! Uskoro ćemo vas kontaktirati.');
            $('#step-verification').addClass('step-primary');
        }
        
        // Start at the first step and initialize the timeline
        goToStep('personal');
        updateTimeline('personal');
    }); 
    </script>
    
@endsection