<div class="form-control w-full mt-4">
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-2">
            {!! $svg !!}
        </div>
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" required
            class="input input-bordered peer w-full text-sm text-gray-900 dark:text-white bg-transparent border-2 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-0 placeholder-transparent pl-10"
            placeholder="{{ $placeholder }}" />
        <label for="{{ $id }}"
            class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-85 top-1 left-10 z-10 origin-left bg-base-100 px-3 
               peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2
               peer-focus:top-0 peer-focus:scale-75">
            {{ $labelText }}
        </label>
        <span class="validation-icon absolute right-2 top-1/2 transform -translate-y-1/2"></span>
    </div>
    <p class="mt-1 text-red-500 text-xs error-message"></p>
</div>