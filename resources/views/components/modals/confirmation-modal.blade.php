@props([
    'modalId', 
    'title' => 'Confirm Action', 
    'message' => 'Are you sure you want to proceed?', 
    'confirmText' => 'Confirm', 
    'cancelText' => 'Cancel', 
    'confirmAction' => '#', 
    'confirmMethod' => 'POST'
])

<dialog id="{{ $modalId }}" class="modal">
    <div class="modal-box max-w-md p-6">
        <h3 class="font-bold text-lg mb-4">{{ $title }}</h3>
        <p class="mb-6">{{ $message }}</p>
        <div class="modal-action">
            <!-- Confirm button: sends a form request -->
            <form id="{{ $modalId }}-form" action="{{ $confirmAction }}" method="POST" class="inline">
                @csrf
                @if(strtoupper($confirmMethod) !== 'POST')
                    @method($confirmMethod)
                @endif
                <button type="submit" class="btn btn-primary btn-sm">{{ $confirmText }}</button>
            </form>
            <button type="button" class="btn btn-ghost btn-sm" onclick="document.getElementById('{{ $modalId }}').close()">
                {{ $cancelText }}
            </button>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
