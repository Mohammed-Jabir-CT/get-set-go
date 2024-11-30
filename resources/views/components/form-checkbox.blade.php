@props(['name', 'label'])

<div class="form-control">
    <label class="label cursor-pointer">
        <input type="checkbox" name="{{ $name }}" id="{{ $name }}" checked="checked"
            class="checkbox checkbox-xs rounded-md mr-1" />
        <span class="label-text">{{ $label }}</span>
    </label>
</div>
