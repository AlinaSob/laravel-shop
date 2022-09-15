<span><strong>{{ $title ?: ucfirst($name) }}</strong></span>
<select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="{{ $name }}" id="{{ $name }}" {{ $multiple ? "multiple=multiple" : '' }}>
    @if (!$multiple)
        <option disabled selected value="">Select an option</option>
    @endif
    @foreach($options as $option)
        <option value="{{ $option->id }}" {{ $isSelected($option->id) ? 'selected="selected"' : '' }}>{{ $option->getName() }}</option>
    @endforeach
</select>

@error($name)
<div class="text-red-400">{{ $message }}</div>
@enderror
