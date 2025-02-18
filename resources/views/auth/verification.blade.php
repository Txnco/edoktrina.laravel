@extends('layouts.auth')

@section('main-content')

<div class="max-w-md mx-auto my-8 p-6 bg-white rounded-lg shadow-lg ">
    <div class="mb-3 text-center">
        <a href="{{ config('app.url') }}"
            class="text-7xl  font-bold text-center mb-8 bg-gradient-to-r from-[#7360DF] to-[#8472E5] text-transparent bg-clip-text">Šalabahter</a>
    </div>
    <h4
        class="text-3xl font-bold text-center mb-6 bg-gradient-to-r from-[#33186B] to-[#3F2A78] text-transparent bg-clip-text">
        Potvrdite svoj racun</h4>

        @if($errors->has('email'))
            <div class="alert alert-error mb-2">{{ $errors->first('email') }}</div>
        @endif
       
        <form id="verification-form" method="POST" action="{{ route('verifyUser') }}">
            @csrf
            <input type="hidden" name="public_id" value="{{ $public_id }}">
            <input type="hidden" name="code" id="hidden-code" />
        
            <!-- Verification Code Fields -->
            <div class="flex justify-center gap-2 mb-6">
                @for ($i = 0; $i < 6; $i++)
                    <input type="text" maxlength="1"
                        class="w-12 h-12 text-center text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none verification-code"
                        data-index="{{ $i }}" />
                @endfor
            </div>
        
            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-center bg-gradient-to-r from-[#7360DF] to-[#8472E5] text-white font-bold py-2 px-6 rounded shadow-lg hover:scale-105 hover:shadow-xl transition-transform transition-colors duration-300 ease-in-out ">
                Potvrdi
            </button>
        </form>

</div>


<!-- Success Modal -->
<x-modals.success-modal-link id="success-modal" heading="" text="" link="" action=""/>

<!-- Add JavaScript to handle form submission and display modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('verification-form').addEventListener('submit', function(event) {
        event.preventDefault();
    
        const form = event.target;
        const formData = new FormData(form);
    
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.status === 'success') {
                // Show success modal
                document.getElementById('success-modal-heading').innerText = 'Verification Successful';
                document.getElementById('success-modal-text').innerText = 'Your account has been successfully verified.';
                document.getElementById('success-modal-link').innerText = 'Log in';
                document.getElementById('success-modal-link').href = '{{ config('app.url') }}';
                
                document.getElementById('success-modal').classList.add('modal-open');
            } else if (data.status === 'wrong_code') {
                alert('Wrong verification code. Please try again.');
            } else if (data.status === 'code_expired') {
                alert('Verification code has expired. Please request a new one.');
            } else {
                alert('An error occurred. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
});

$(document).ready(function () {
    $(".verification-code").on("input", function () {
        let index = $(this).data("index");
        let value = $(this).val();

        // Move focus to next input if a number is entered
        if (value.length === 1 && index < 5) {
            $(".verification-code").eq(index + 1).focus();
        }

        updateHiddenCode();
    });

    $(".verification-code").on("keydown", function (e) {
        let index = $(this).data("index");

        // Move back on backspace if empty
        if (e.key === "Backspace" && index > 0 && $(this).val() === "") {
            $(".verification-code").eq(index - 1).focus();
        }

        updateHiddenCode();
    });

    function updateHiddenCode() {
        let code = "";
        $(".verification-code").each(function () {
            code += $(this).val();
        });
        $("#hidden-code").val(code);
    }
});
    </script>

@endsection