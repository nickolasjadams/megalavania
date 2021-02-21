
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orders - Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    A man stands at the front counter. His nametag says 'Jerry'.<br>
                    "Welcome to <?php echo request()->getHost(); ?>. May I take your orrrder?"
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <form method="POST" action="/dashboard/orders">
                        @csrf
                        <h1 class="mb-5">What would you like bro?</h1>

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

                        <div class="form-input">
                            <label>Name</label> <input type="text" name="name">
                        </div>

                        <div class="form-input">
                            <label>SSN</label> <input type="password" name="ssn">
                        </div>

                        <div style="visibility: hidden; position: absolute; left: -10000px;"> <!---->
                            <input type="text" name="deserves_spit" id="deserves_spit">
                        </div>

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" type="submit">Submit</button>
                    </form>

                    
                    
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    var decision = Math.floor(Math.random() * 2);
    if (decision == 1) {
        console.log("jerry whispers under his breath. \"what a jerk.\"");
    }
    document.querySelector("#deserves_spit").value = decision;
</script>
@endpush

</x-app-layout>
