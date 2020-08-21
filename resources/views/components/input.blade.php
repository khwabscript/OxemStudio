<input {{ $attributes->merge(['type' => 'text']) }} name="{{ $key }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error($key) border-red-500 @else border-gray-200 @enderror" value="{{ old($key, '') }}">