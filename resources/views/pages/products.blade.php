<x-adminLayout>
    <div class="mx-auto max-w-5xl">
        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">My Products</h2>
        <div class="grid grid-cols-3 gap-1 m-8">
            @foreach ($products as $product)
                <x-product :product="$product"></x-product>
            @endforeach
        </div>
    </div>
</x-adminLayout>