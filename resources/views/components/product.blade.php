@props(['product'])

<div class="group my-10 flex w-full max-w-xs flex-col overflow-hidden border border-gray-100 bg-white rounded-lg">
    <a class="relative flex h-60 overflow-hidden m-3 rounded-md" href="#">
      <img class="absolute top-0 right-0 object-cover" src="{{ asset($product->image) }}" alt="product image" />
    </a>
    <div class="mt-4 px-5 pb-5">
      <a href="#">
        <h5 class="text-xl tracking-tight text-slate-900">{{ $product->name }}</h5>
      </a>
      <div class="mt-2 mb-5 flex items-center justify-between">
        <p>
          <span class="text-3xl font-bold text-slate-900">{{ $product->price }}</span>
        </p>
      </div>
    <div class ="flex items-center justify-end gap-4 mt-6">
    <a href="{{ route('updateProductPage', ['product' => $product]) }}" class="bg-yellow-300 hover:bg-yellow-400 text-white px-4 py-2 text-xs rounded-md">Edit</a>
        <form action="{{ route('destroyProduct', ['id' => $product->id]) }}" method="POST">
            @csrf
            @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 text-xs rounded-md">Delete</button>
        </form>
    </div>
    </div>
  </div>