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

                <a href="#" class="flex items-center justify-center mt-4 transition-colors duration-300 transform border border-base-300 rounded-lg bg-base-100 text-base-content hover:bg-base-200">
                    <div class="px-4 py-2">
                        <svg class="w-6 h-6" viewBox="0 0 40 40">
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107" />
                        <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00" />
                        <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50" />
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2" />
                        </svg>
                    </div>
                    <span class="flex-1 px-4 py-3 text-center font-normal">
                        {{ __('Registrirajte se preko Google računa') }}
                    </span>
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