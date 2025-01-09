<x-adminLayout>
    <div class="mx-auto max-w-5xl mb-8">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Shops</h1>
        <div class="grid grid-cols-2 gap-6 w-full my-4">
            @foreach ($shops as $shop)
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-56 md:rounded-none md:rounded-s-lg" src="{{ asset($shop->logo) }}" alt="shop image">
                <div class="flex flex-col justify-between p-3 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $shop->name }}</h5>
                    <p class="mb-3 font-normal text-gray-700">Address: {{ $shop->address }}</p>
                    <p class="mb-3 font-normal text-gray-700">Phone: {{ $shop->phonenumber }}</p>
                    <form action="{{ route('deleteShop', ['id' => $shop->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="w-36 px-4 py-1 text-sm text-red-600 font-semibold rounded-full border border-red-600 hover:text-white hover:bg-red-600 hover:border-transparent">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-adminLayout>