<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Brands
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="brands/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        + New Order
                    </button></a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <style>
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
                            <th>Category</th>
                            <th>Brand</th>
                        </tr>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->cName }}</td>
                            <td>{{ $brand->bName }}</td>
                            {{-- <td>
                                @foreach ($brand->users as $user)
                                    {{ $user->business_name }}, 
                                @endforeach
                            </td> --}}
                        </tr>
                        @endforeach
                    </table>



                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
