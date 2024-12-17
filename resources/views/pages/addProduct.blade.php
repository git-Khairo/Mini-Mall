<x-adminLayout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Add Product</h2>
        <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">product Name</label>
                <input type="text" id="name" name="name"class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="text" id="price" name="price" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Stock Amount</label>
                <input type="text" id="amount" name="amount" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Choose Category</label>
                <select name="categoryOption" id="categoryOption" class="w-full px-4 py-2 border rounded">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->type }}</option>
                    @endforeach()
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Product Image</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add</button>
            </div>
        </form>
    </div>
</x-adminLayout>