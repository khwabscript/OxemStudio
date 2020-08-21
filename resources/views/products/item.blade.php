<div class="md:w-1/4 sm:w-1/3 m-2 border-2 rounded-md p-2 flex flex-col justify-between item">
    <div>
        <div class="text-xs">
            <span class="mr-4">{{ $product->id }}</span>
            <span class="text-gray-700">{{ $product->created_at }}</span>
        </div>
        <p class="font-medium my-2"><a href="/products/{{ $product->id }}" class="hover:underline">{{ $product->name }}</a></p>
        <p>{{ $product->description }}</p>
    </div>
    <div class="flex justify-between items-center mt-2">
        <span class="text-blue-500">{{ $product->price }} $</span>
        <div>
            <span class="mr-2">Qty: {{ $product->left_in_stock }}</span>
            <span>#{{ $product->external_id }}</span>
        </div>
    </div>
</div>