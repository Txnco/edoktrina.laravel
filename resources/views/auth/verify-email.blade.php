@extends('layouts.auth')

@section('main-content')

<div class="max-w-md mx-auto my-8 p-6 bg-white rounded-lg shadow-lg ">
    <div class="mb-3 text-center">
        <a href="{{ config('app.url') }}"
            class="text-7xl  font-bold text-center mb-8 bg-gradient-to-r from-[#7360DF] to-[#8472E5] text-transparent bg-clip-text">Šalabahter</a>
    </div>
    <p class="text-center text-gray-600">Molimo Vas provjerite Vašu e-poštu i kliknite na link kako bi ste potvrdili svoju e-poštu.</p>

    <form method="POST" action="{{ route('verification.send') }}" id="resend-form">
        @csrf
        <x-buttons.primary class='w-full text-lg text-white mt-5' type="submit" id='submit' buttonText="Ponovno pošalji email" />
    </form>

    @if($errors->has('email'))
        <div class="alert alert-error mt-2">{{ $errors->first('email') }}</div>
    @endif
</div>

<x-modals.success-modal-link id='successModal' heading='Uspješno poslana verifikacija' text="Molimo Vas provjerite Vašu e-poštu za verifikacijskom porukom" link='' action='' />


<script>
     $(document).ready(function() {
        $('#resend-form').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = $(this);
            var button = $('#submit');
            button.prop('disabled', true);

            
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                dataType: 'json', // Expect a JSON response
                success: function(response) {
                    // If the response is successful, start the countdown
                    $('#successModal').addClass('modal-open');
                    var countdown = 60;
                    button.text('Ponovno pošalji email (' + countdown + 's)');
                    
                    var interval = setInterval(function() {
                        countdown--;
                        button.text('Ponovno pošalji email (' + countdown + 's)');
                        if (countdown <= 0) {
                            clearInterval(interval);
                            button.prop('disabled', false);
                            button.text('Ponovno pošalji email');
                        }
                    }, 1000); // 1 second interval
                },
                error: function(xhr, status, error) {
                    console.error('Submission failed:', error);
                    // Optionally, handle the error: show a message to the user, etc.
                }
            });
        });
    });

</script>

@endsection