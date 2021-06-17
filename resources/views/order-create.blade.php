
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Orders - Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hello world
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form method="POST" action="/dashboard/orders">
                        @csrf
                        <div class="form-input">
                            <label>Name</label> <input type="text" name="name">
                        </div>

                        <div class="form-input">
                            <label>Email</label> <input type="text" name="name">
                        </div>

                        <div class="form-input">
                            <label>Phone</label> <input type="text" name="name">
                        </div>
                        <!-- if email and phone exist, autofill address below -->
                        <div class="form-input">
                            <label>Street</label> <input type="text" name="name">
                        </div>

                        <div class="form-input">
                            <label>Suite</label> <input type="text" name="name">
                        </div>

                        <div class="form-input">
                            <label>State</label> <input type="text" name="name">
                        </div>

                        <div class="form-input">
                            <label>Zip</label> <input type="text" name="name">
                        </div>
                        <!-- end address-->

                        <div class="form-input">
                            <label>SMS</label> <input type="text" name="name"> <!-- change to checkbox -->
                        </div>



                        <div class="form-input">
                            <label>Meal Combo Number</label> <input type="number" name="meal_combo_number">
                        </div>

                        <div class="form-input">
                            <label>Size</label>
                            <select name="size">
                                <option value="small" default>Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                                <option value="biggie">Biggie</option>
                            </select>
                        </div>



                        <button class="px-4 py-2 mt-5 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" type="submit">Submit</button>
                    </form>



                </div>
            </div>
        </div>
    </div>

</x-app-layout>
