@props(['message', 'success' => false])
@php
    $toastClass = $success ? 'alert-success' : 'alert-error';
@endphp

<script>
    $(document).ready(function() {
        // Create a custom toast element with DaisyUI styling and a close button
        var $toast = $(`
            <div class="toast toast-top toast-center w-80" style="top: 4rem; display: none;">
                <div class="alert {{ $toastClass }} flex justify-between items-center">
                    <span>{{ $message }}</span>
                    <button class="btn btn-sm btn-circle btn-ghost toast-close">&times;</button>
                </div>
            </div>
        `);
        
        // Append and fade in the toast
        $('body').append($toast);
        $toast.fadeIn(400);
        
        // Set automatic removal after 3 seconds with a smooth fade-out
        var toastTimer = setTimeout(function() {
            $toast.fadeOut(600, function() { $(this).remove(); });
        }, 3000);
        
        // Clicking the close button manually dismisses the toast with smooth fade out
        $toast.find('.toast-close').on('click', function() {
            clearTimeout(toastTimer);
            $toast.fadeOut(600, function() { $(this).remove(); });
        });
    });
</script>