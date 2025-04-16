@props(['modalId' => '', 'title' => '', 'action' => '', 'method' => 'POST', 'fields' => []])

<dialog id="{{ $modalId }}" class="modal">
    <div class="modal-box max-w-xl p-6">
        <h3 id="modalTitle" class="font-bold text-lg mb-4">{{ $title }}</h3>
        <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
            @csrf
            @if($method !== 'POST')
                @method($method)
            @endif

            <!-- Row 1: public_id & name -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <!-- Public ID Field -->
                <div>
                    <label class="label font-semibold" for="public_id">
                        <span class="label-text">{{ collect($fields)->firstWhere('name', 'public_id')['label'] ?? 'Public ID' }}</span>
                    </label>
                    <input
                        type="text"
                        name="public_id"
                        id="public_id"
                        class="input input-bordered input-sm w-full"
                        value="{{ old('public_id') }}"
                        required
                    />
                </div>
                <!-- Name Field -->
                <div>
                    <label class="label font-semibold" for="name">
                        <span class="label-text">{{ collect($fields)->firstWhere('name', 'name')['label'] ?? 'Naziv' }}</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="input input-bordered input-sm w-full"
                        value="{{ old('name') }}"
                        required
                    />
                </div>
            </div>

            <!-- Row 2: description & color -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <!-- Description Field (span 2 columns) -->
                <div class="col-span-2">
                    <label class="label font-semibold" for="description">
                        <span class="label-text">{{ collect($fields)->firstWhere('name', 'description')['label'] ?? 'Opis' }}</span>
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        class="textarea textarea-bordered textarea-sm w-full h-24"
                    >{{ old('description') }}</textarea>
                </div>
                <!-- Color Picker -->
                <div class="flex flex-col gap-2">
                    <label class="label font-semibold" for="color">
                        <span class="label-text">{{ collect($fields)->firstWhere('name', 'color')['label'] ?? 'Boja' }}</span>
                    </label>
                    <input
                        type="color"
                        name="color"
                        id="color"
                        class="h-8 w-full rounded-md cursor-pointer"
                        value="{{ old('color', '#000000') }}"
                    />
                    <input
                        type="text"
                        name="color_hex"
                        id="color_hex"
                        class="input input-bordered input-sm w-full text-center"
                        value="{{ old('color_hex', '#000000') }}"
                        oninput="document.getElementById('color').value = this.value"
                    />
                </div>
            </div>

            <!-- Row 3: Image Preview and Upload -->
            <div class="mb-4">
                <label class="label font-semibold" for="image">
                    <span class="label-text">{{ collect($fields)->firstWhere('name', 'image')['label'] ?? 'Slika' }}</span>
                </label>
                <div class="grid grid-cols-2 gap-4">
                    <!-- Image Preview Area -->
                    <div class="border-2 border-dashed border-base-300 rounded-lg p-2 h-32 flex items-center justify-center">
                        <img id="image-preview" src="" alt="Preview" class="max-h-28 max-w-full hidden">
                        <span id="no-image" class="text-gray-400 text-sm">No image selected</span>
                    </div>
                    
                    <!-- Image Upload Input -->
                    <div>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="file-input file-input-bordered file-input-sm w-full"
                            accept="image/*"
                            onchange="previewImage(this)"
                        />
                        <div class="mt-2">
                            <progress id="upload-progress" class="progress w-full hidden" value="0" max="100"></progress>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-sm btn-primary">{{ __('Spremi') }}</button>
                <button type="button" class="btn btn-sm btn-outline" onclick="document.getElementById('{{ $modalId }}').close()">{{ __('Odustani') }}</button>
            </div>
        </form>
        
        <!-- Close Button in Corner -->
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
    </div>
    
    <!-- Click Outside the Modal to Close -->
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<script>
    // Image preview with simulated upload progress
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const noImage = document.getElementById('no-image');
        const progress = document.getElementById('upload-progress');
        
        // Make the progress element visible and animate
        progress.classList.remove('hidden');
        let value = 0;
        const interval = setInterval(() => {
            value += 5;
            progress.value = value;
            if (value >= 100) {
                clearInterval(interval);
                setTimeout(() => {
                    progress.classList.add('hidden');
                }, 500);
            }
        }, 50);
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                noImage.classList.add('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
            noImage.classList.remove('hidden');
            preview.src = '';
        }
    }
    
    // Synchronize color picker with hex input
    document.addEventListener('DOMContentLoaded', function() {
        const colorInput = document.getElementById('color');
        const hexInput = document.getElementById('color_hex');
        if (colorInput && hexInput) {
            colorInput.addEventListener('input', function() {
                hexInput.value = this.value;
            });
        }
    });
</script>