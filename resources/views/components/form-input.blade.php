@props(['type' => 'text', 'name', 'placeholder', 'label', 'autocomplete', 'value' => old($name)])

<label class="form-control w-80">
    <div class="label">
        <span class="label-text text-xs">{{ $label }}</span>
    </div>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}"
        class="input input-bordered"
        @isset($autocomplete) autocomplete="{{ $autocomplete }}" @endisset required />
    <div className="label">
        @error($name)
            <span class="label-text-alt text-xs text-error">{{ $message }}</span>
        @enderror
    </div>
</label>
