@props(['disabled' => false])

<label>
    <input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-grey-500 file:mr-5 file:py-2 file:px-6 file:rounded-full file:border-0 file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:cursor-pointer hover:file:bg-amber-50 hover:file:text-amber-700']) !!} />
</label>
