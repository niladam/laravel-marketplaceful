@props(['disabled' => false, 'options' => []])

<select
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'form-multiselect rounded-md shadow-sm']) !!}
>
    @foreach ($options as $key => $option)
        <option value="{{ $key }}">{{ $option }}</option>
    @endforeach
</select>
