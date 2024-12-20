<x-adminLayout>
    <div class="mx-auto max-w-5xl mb-8">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Admins</h1>
        <div class="grid grid-cols-3 gap-6 w-full my-4">
        @foreach ($users['admins'] as $admin)
            <div class="py-8 px-2 max-w-sm mx-auto bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
            <img class="block mx-auto h-20 rounded-full sm:mx-0 sm:shrink-0" src="{{ asset('storage/images/' . $admin->image) }}" alt="Woman's Face">
            <div class="text-center space-y-2 sm:text-left">
                <div class="space-y-0.5">
                    <p class="text-lg text-black font-semibold">
                        {{ $admin->firstName." ".$admin->lastName }}
                    </p>
                    <p class="text-black font-medium text-sm">
                        {{ $admin->email }}
                    </p>
                </div>
                <form action="{{ route('deleteAdmin', ['id' => $admin->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-1 text-sm text-red-600 font-semibold rounded-full border border-red-600 hover:text-white hover:bg-red-600 hover:border-transparent">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
        </div>
    </div>



    <div class="w-auto bg-slate-400 h-0.5 rounded-lg mx-14"></div>



    <div class="mx-auto max-w-5xl my-6">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Users</h1>
        <div class="grid grid-cols-3 gap-6 w-full my-4">
        @foreach ($users['users'] as $user)
            <div class="py-8 px-2 max-w-sm mx-auto bg-white rounded-xl shadow-lg space-y-2 sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6">
            <img class="block mx-auto h-20 rounded-full sm:mx-0 sm:shrink-0" src="{{ asset('storage/images/' . $user->image) }}" alt="Woman's Face">
            <div class="text-center space-y-2 sm:text-left">
                <div class="space-y-0.5">
                    <p class="text-lg text-black font-semibold">
                        {{ $user->firstName." ".$user->lastName }}
                    </p>
                    <p class="text-black font-medium text-sm">
                        {{ $user->email }}
                    </p>
                </div>
                <button class="px-4 py-1 text-sm text-red-400 font-semibold rounded-full border border-red-400 hover:text-white hover:bg-red-400 hover:border-transparent">Block</button>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</x-adminLayout>