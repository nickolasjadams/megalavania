<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Your Brands
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="brands/create"><button class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
                        + New Brand
                    </button></a>
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
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
                            <td>{{ $brand->category->name }}</td>
                            <td>{{ $brand->name }}</td>

                        </tr>

                        @endforeach
                        <tr>

                        <tr>
                    </table>




                </div>
            </div>
        </div>
    </div>

</x-app-layout>
