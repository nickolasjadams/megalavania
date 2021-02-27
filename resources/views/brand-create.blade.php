
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Brand - Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hello world
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="/dashboard/brands">
                        @csrf

                        <div class="form-input">
                            <label>Category</label>
                            <select name="category_id"> 
                                <option value="1">dirt</option>
                                <option value="2">rocks</option>
                            </select>
                        </div>

                        <div class="form-input">
                            <label>Name</label> <input type="text" name="name">
                        </div>

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" type="submit">Submit</button>
                    </form>

                    
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
