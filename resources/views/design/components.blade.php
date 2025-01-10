@extends('layouts.admin')

@section('content')

<div class="container mx-auto p-5 mt-5 max-w-5xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h1 class="text-3xl font-bold mb-5">Buttons</h1>
            <x-buttons.primary class="m-2" id="button1" buttonText="Primary"/>
            <x-buttons.secondary class="m-2" id="button2" buttonText="Secondary"/>
            <x-buttons.info class="m-2" id="button3" buttonText="Info"/>
            <x-buttons.success class="m-2" id="button4" buttonText="Success"/>
            <x-buttons.warning class="m-2" id="button5" buttonText="Warning"/>
            <x-buttons.error class="m-2" id="button6" buttonText="Error"/>
        </div>
        <div>
            <h1 class="text-3xl font-bold mb-5">Squared buttons</h1>
            <x-buttons.square class="m-2" id="button5" buttonText="Warning"/>
            <x-buttons.squareOutline class="m-2" id="button6" buttonText="Error"/>
        </div>
    </div>
</div>

@endsection