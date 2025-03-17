@extends('layouts.auth')

@section('main-content')


<section class="bg-base-100">
    <div class="flex justify-center min-h-screen">
        <div class="hidden bg-cover lg:block lg:w-3/6" style="background-image: url('{{ asset('assets/images/students1.jpg') }}')">
        </div>

        <div class="flex  items-center w-full max-w-2xl p-8 mx-auto lg:px-12 lg:w-3/6">
          
            <div class="w-full">
                
                <div class="mb-3 text-left">
                    <a href="{{ config('app.url') }}" class="text-7xl  font-bold  mb-8 bg-gradient-to-r from-[#7360DF] to-[#8472E5] text-transparent bg-clip-text">Šalabahter</a>
                </div>

                <p class="mt-4 text-gray-500 dark:text-gray-400 text-xl">
                   {{ __('Dobrodošli, molimo Vas registrirajte se!') }}
                </p>

                <form id="register-form" method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
                      <x-forms.input type="text" id="first_name" name="first_name" placeholder="{{ __('Ime') }}" label="{{ __('Ime') }}" value="{{ old('first_name') }}"/>
                      <x-forms.input type="text" id="last_name" name="last_name" placeholder="{{ __('Prezime') }}" label="{{ __('Prezime') }}" value="{{ old('last_name') }}" />
                  </div>
              
                  <x-forms.input type="email" id="email" name="email" placeholder="Email" label="Email" value="{{ old('email') }}" />
              
                  <div class="grid grid-cols-1 gap-6 mt-1 md:grid-cols-2">
                      <x-forms.input type="password" id="password" name="password" placeholder="{{ __('Lozinka') }}" label="{{ __('Lozinka') }}" />
                      <x-forms.input type="password" id="password_confirmation" name="password_confirmation" placeholder="{{ __('Ponovi lozinku') }}" label="{{ __('Ponovi lozinku') }}" />
                  </div>

                    @if ($errors->any())
                        <div class="alert alert-error mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> 
                                    {{-- NEED FOR DEBUGGING --}}
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                  <div class="mt-8">
                      <x-buttons.primary class="w-full text-lg" type="submit" id="submit" buttonText="{{ __('Registriraj se') }}" />
                  </div>
                </form>

                
                <div class="divider">{{ __('ILI') }}</div>

                <a href="{{ route('auth.google') }}" class="btn bg-white text-black border-[#e5e5e5] hover:bg-base-100 w-full mb-4">
                    <svg aria-label="Google logo" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><g><path fill="#34a853" d="M153 292c30 82 118 95 171 60h62v48A192 192 0 0190 341"></path><path fill="#4285f4" d="m386 400a140 175 0 0053-179H260v74h102q-7 37-38 57"></path><path fill="#fbbc02" d="m90 341a208 200 0 010-171l63 49q-12 37 0 73"></path><path fill="#ea4335" d="m153 219c22-69 116-109 179-50l55-54c-78-75-230-72-297 55"></path></g></svg>
                    {{ __('Prijavite se sa Google računom') }}
                  </a>
  
                  <a href="{{ route('auth.google') }}" class="btn bg-white  text-black border-[#e5e5e5] hover:bg-gray-100  w-full mb-4">
                      <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 50 25" width="50px" height="40px">
                        <!-- Generator: Adobe Illustrator 29.3.1, SVG Export Plug-In . SVG Version: 2.1.0 Build 151)  -->
                        <defs>
                          <style>
                            .st0 {
                              fill: #92a6bd;
                            }
  
                            .st1 {
                              fill: #cfd2db;
                            }
  
                            .st2 {
                              fill: #adbdcd;
                            }
                          </style>
                        </defs>
                        <g id="g8">
                          <g id="g10">
                            <path id="path12" class="st0" d="M18.4,4l4.2,8.8c.4.7.1,1.6-.5,1.9-.6.3-1.5,0-1.8-.8l-2.5-5.2-3.3,5.6h2.8c.8,0,1.5.6,1.5,1.3s-.7,1.3-1.5,1.3h-4.3l-2.4,4.1c-1.2,2-3.8,2.7-5.8,1.6-2-1.1-2.6-3.7-1.4-5.7L11,3.9c1.2-2,3.8-2.7,5.8-1.6.7.4,1.2.9,1.5,1.6,0,0,0,.1,0,.2"/>
                            <path id="path16" class="st2" d="M29.9,14.2h2.9c.8,0,1.5.6,1.5,1.3s-.7,1.3-1.5,1.3h-4.4l-2.4,4.1c-1.2,2-3.8,2.7-5.8,1.6-2-1.1-2.6-3.7-1.4-5.7l7.6-12.9c1.2-2,3.8-2.7,5.8-1.6.7.4,1.2.9,1.5,1.6,0,0,0,.1,0,.2l4.2,8.8c.4.7.1,1.6-.5,1.9-.6.3-1.5,0-1.8-.8l-2.5-5.2-3.3,5.6"/>
                            <path id="path20" class="st1" d="M41.6,20.9c-1.2,2-3.8,2.7-5.8,1.6h0c-2-1.1-2.6-3.7-1.4-5.7l7.6-12.9c1.2-2,3.8-2.7,5.8-1.6,2,1.1,2.6,3.7,1.4,5.7l-7.6,12.9"/>
                            <path id="path24" class="st0" d="M47.9,1c1.5.6,2.6,1.9,3.1,3.5.2.8.2,1.7,0,2.4-.4-2.4-1.5-4.5-3.2-6ZM41.3,2.6c.5-.7,1.2-1.2,2-1.6.9.1,1.7.4,2.5.9,2.5,1.4,3.9,4.2,4.2,7.4-.4.5-.9.9-1.5,1.2-.1-3.1-1.4-5.8-3.8-7.1-1-.6-2.2-.9-3.4-.9h0ZM43.7,11c-1.3-.5-2.4-1.4-3-2.6.3.1.6.2.9.4.9.5,1.6,1.3,2.1,2.2ZM40.1,6.2c0-.6,0-1.2.2-1.7,1.2,0,2.3.3,3.3.8,2,1.1,3.2,3.2,3.5,5.8h0c-.5.1-.9.2-1.4.2-.5-1.9-1.6-3.4-3.2-4.3-.7-.4-1.5-.7-2.4-.8"/>
                          </g>
                        </g>
                      </svg>
                     {{ __('Prijavite se sa AAI@Edu računom') }}
                  </a>
  
                  <a href="{{ route('auth.google') }}" class="btn bg-black text-white border-black w-full hover:bg-gray-800 mb-4">
                    <svg aria-label="Apple logo" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1195 1195"><path fill="white" d="M1006.933 812.8c-32 153.6-115.2 211.2-147.2 249.6-32 25.6-121.6 25.6-153.6 6.4-38.4-25.6-134.4-25.6-166.4 0-44.8 32-115.2 19.2-128 12.8-256-179.2-352-716.8 12.8-774.4 64-12.8 134.4 32 134.4 32 51.2 25.6 70.4 12.8 115.2-6.4 96-44.8 243.2-44.8 313.6 76.8-147.2 96-153.6 294.4 19.2 403.2zM802.133 64c12.8 70.4-64 224-204.8 230.4-12.8-38.4 32-217.6 204.8-230.4z"></path></svg>
                     {{ __('Prijavite se sa Apple računom') }}
                  </a>
             
                <div class="text-center mt-4 font-regular bg-base-100 text-base-content">
                    {{ __('Već imate račun?') }}
                    <a href="{{ config('app.url') }}/login" class="text-primary font-bold">{{ __('Prijavite se') }}</a>
                </div>
                  
                
            </div>
        </div>  
    </div>
</section>


<script>
    $(document).ready(function() {
    $('#register-form').validate({
        focusInvalid: false,
        rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            first_name: "Molimo unesite vaše ime.",
            last_name: "Molimo unesite vaše prezime.",
            email: {
                required: "Molimo unesite vaš email.",
                email: "Unesite ispravan format email adrese."
            },
            password: {
                required: "Molimo unesite lozinku.",
                minlength: "Lozinka mora imati najmanje 8 znakova."
            },
            password_confirmation: {
                required: "Molimo potvrdite lozinku.",
                equalTo: "Lozinke se ne podudaraju."
            }
        },
        errorClass: "text-red-500 text-sm mt-1",
        errorElement: "p",
        errorPlacement: function(error, element) {
          const errorContainer = element.closest('.form-control').find('.error-message');
          errorContainer.removeClass('hidden');
          error.appendTo(errorContainer);
        },
        highlight: function(element) {
            $(element)
                .removeClass('input-bordered border-green-500 focus:border-green-500')
                .addClass('border-red-500 focus:border-red-500');
            $(element).closest('.form-control').find('.validation-icon').html(
                '<svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>' +
                '</svg>'
            );
        },
        unhighlight: function(element) {
            $(element)
                .removeClass('border-red-500 focus:border-red-500')
                .addClass('border-green-500 focus:border-green-500');
            $(element).closest('.form-control').find('.validation-icon').html(
                '<svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>' +
                '</svg>'
            );
        },
        submitHandler: function(form) {
            var $btn = $('#submit');
            $btn.prop('disabled', true);
            $btn.html(
                '<svg class="animate-spin h-5 w-5 mr-3 inline-block text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">' +
                    '<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>' +
                    '<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>' +
                '</svg> Slanje...'
            );
            form.submit();
        }
    });
});
</script>
    
    

@endsection