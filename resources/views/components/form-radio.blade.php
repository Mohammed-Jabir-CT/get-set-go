@props(['name', 'label', 'checked' => false])

<div class="form-control">
    <label class="label cursor-pointer flex justify-start gap-2">
        <span class="label-text text-xs">{{ $label }}</span>
        <input type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $checked && 'checked'}}
            class="toggle toggle-sm rounded-md mr-1" />
    </label>
</div>
