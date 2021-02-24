<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="orders/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        + New Order
                    </button></a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- <style>
                        table {
                            width: 100%;
                        }
                        td, th {
                            border: 2px solid #e9e9e9;
                            padding: 5px 10px;
                        }
                    </style>


                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Combo Meal Number</th>
                        </tr>
                        @foreach ($allOrders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->meal_combo_number }}</td>
                        </tr>
                        @endforeach
                    </table> -->



                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
