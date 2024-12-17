<x-adminLayout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Add Shop</h2>
        <form action="{{ route('addShop') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Shop Name</label>
                <input type="text" id="name" name="name"class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="phonenumber" class="block text-gray-700">Phone Number</label>
                <input type="text" id="phonenumber" name="phonenumber" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="adminOption" class="block text-gray-700">Choose Admin</label>
                <select name="adminOption" id="adminOption" class="w-full px-4 py-2 border rounded">
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach()
                </select>
            </div>
            <div class="mb-4">
                <label for="logo" class="block text-gray-700">Shop Logo</label>
                <input type="file" id="logo" name="logo" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add</button>
            </div>
        </form>
    </div>
</x-adminLayout>