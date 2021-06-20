
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
                    <div>
                        {{-- <form method="POST" action="/dashboard/orders">
                            @csrf --}}
                            {{-- <livewire:user-form /> --}}
                            <livewire:order-form />
                            {{-- <button class="px-4 py-2 mt-5 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" type="submit">Submit</button> --}}
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
