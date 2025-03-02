@props(['name'])
@error($name)
    <p {{$attributes->merge(['class' => "text-red-500 text-xs mt-1 font-semibold"])}}>{{ $message }}</p>
@enderror
