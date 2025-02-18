@props(['id', 'type', 'name', 'placeholder', 'label', 'class' => '', 'smallLalbel' => '', 'labelClass' => '', 'link' => ''])

<label class="form-control w-full {{ $class }}">
    <div class="label">
      <span class="label-text">{{ $label }}</span>
       <a href="{{ $link }}" class="{{ $labelClass }}">{{ $smallLalbel }}</a> 
    </div>
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" class="input input-bordered w-full " />
    <div class="label">
      {{-- <span class="label-text-alt">Bottom Left label</span>
      <span class="label-text-alt">Bottom Right label</span> --}}
    </div>
</label>