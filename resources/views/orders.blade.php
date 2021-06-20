<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Orders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="orders/create"><button class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
                        + New Order
                    </button></a>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope='col'>Ticket</th>
                                <th scope='col'>Customer Name</th>
                                <th scope='col'>Brand</th>
                                <th scope='col'>Stock Number</th>
                                <th scope='col'>Product Name</th>
                                <th scope='col'>Order Status</th>
                                <th scope='col'>Price</th>
                                <th scope='col'>Deposit</th>
                                <th scope='col'>Paid</th>
                                <th scope='col'>Initials</th>
                                <th scope='col'>Comment</th>
                            </tr>
                        </thead>
                        @foreach ($allOrders as $order)
                        <tr>
                            <td>{{ $order->ticket }}</td>
                            <td>{{ $order->customer->name }}</td>
                            @foreach($order->products as $product)
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->stock_number }}</td>  <!-- stock number should have own table for product? -->
                                <td>{{ $product->name }}</td> <!-- ssame with product name? -->
                            @endforeach
                            <td>{{ $order->orderStatus->name }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->deposit }}</td>
                            <td>{{ $order->paid_at }}</td>
                            <td>{{ $order->initial }}</td>
                            <td>{{ Str::of($order->comment)->limit(50) }}</td>

                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
