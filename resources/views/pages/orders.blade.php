<x-adminLayout>
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mx-auto max-w-5xl">
            <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">My orders</h2>
        
                <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
                  <div>
                    <form action="{{ route('orderSort') }}" method="post">
                      @csrf
                      <select onchange="this.form.submit()" id="order-type" name="orderType" class="block w-full min-w-[8rem] rounded-lg border border-gray-300 bg-gray-50 py-3 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500">
                        <option value="all" {{ $option == 'all' ? 'selected' : '' }}>All orders</option>
                        <option value="pending" {{ $option == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $option == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ $option == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                      </select>
                    </form>
                  </div>
                </div>
              </div>
            <div class="mt-6 flow-root sm:mt-8">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($orders as $order)
                <div class="flex flex-wrap items-center gap-y-4 py-6">
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-800 dark:text-gray-800">Order ID:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-gray-800">
                        <a href="" class="hover:underline">#{{ $order->id }}</a>
                        </dd>
                    </dl>
        
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-800 dark:text-gray-800">Date:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-gray-800">{{ $order->created_at->format('d-m-Y') }}</dd>
                    </dl>
        
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-800 dark:text-gray-800">Price:</dt>
                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-gray-800">${{ $order->total }}</dd>
                    </dl>
        
                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                        <dt class="text-base font-medium text-gray-800 dark:text-gray-800">Status:</dt>
                        <dd class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-base font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                        <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                        </svg>
                        {{ $order->status }}
                        </dd>
                    </dl>
        
                    @if ($order->status == 'pending')
                        <div class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
                            <form action="{{ route('orderConfirmation', ['id' => $order->id]) }}" method="post">
                                @csrf
                                <input type="text" hidden name="status" value="cancelled">
                                <button type="submit" class="w-full rounded-lg border border-red-700 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900 lg:w-auto">Cancel order</button>
                            </form>
                            <form action="{{ route('orderConfirmation', ['id' => $order->id]) }}" method="post">
                                @csrf
                                <input type="text" hidden name="status" value="confirmed">
                                <button type="submit" class="w-full rounded-lg border border-green-500 px-3 py-2 text-center text-sm font-medium text-green-500 hover:bg-green-600 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 lg:w-auto">Confirm order</button>
                            </form>
                        </div>
                    @else
                    <div class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
                        <form action="{{ route('orderDelete', ['id' => $order->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="this.form.submit()" class="w-full rounded-lg border border-red-700 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900 lg:w-auto">Delete Order</button>
                        </form>
                    </div>
                    @endif
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>