<x-adminLayout>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Add Admin</h2>
        <form action="{{ route('addAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="firstName" class="block text-gray-700">Admin First Name</label>
                <input type="text" id="firstName" name="firstName"class="w-full px-4 py-2 border rounded">
                @error('firstName')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="lastName" class="block text-gray-700">Admin Last Name</label>
                <input type="text" id="lastName" name="lastName"class="w-full px-4 py-2 border rounded">
                @error('lastName')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Admin email</label>
                <input type="text" id="email" name="email" class="w-full px-4 py-2 border rounded">
                @error('email')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded">
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="passwordConfirm" class="block text-gray-700">Confirm Password</label>
                <input type="password" id="passwordConfirm" name="password_confirmation" class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-2 border rounded">
                @error('address')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Phone Number</label>
                <input type="text" id="phone" name="phone" class="w-full px-4 py-2 border rounded">
                @error('phone')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Product Image</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded">
                @error('image')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add</button>
            </div>
        </form>
    </div>
</x-adminLayout>