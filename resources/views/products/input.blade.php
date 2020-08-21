<div class="w-full {{ $value !== 'text' ? 'md:w-1/2' : '' }} px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
    {{ implode(' ', explode('_', $key) ) }}
    </label>

    <!-- <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error($key) border-red-500 @else border-gray-200 @enderror" type="text" value="{{ old($key) ?? ''}}"> -->
    <x-input :key="$key" type="{{ $value }}" min="1" step="any"></x-input>

    @error($key)
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror

</div>