@props(['id', 'type', 'name', 'placeholder', 'label', 'class' => '', 'value' => ''])

<div class="form-control w-full {{ $class }}">
    <div class="label">
        <span class="label-text">{{ $label }}</span>
    </div>
    <div class="relative">
        <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}" class="input input-bordered w-full" />
        <!-- Validation Icon Container -->
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none validation-icon">
            <!-- Icons will be dynamically inserted here -->
        </div>
    </div>
    <!-- Error Message Container -->
    <p class="text-red-500 text-sm mt-1 error-message hidden"></p>
</div>