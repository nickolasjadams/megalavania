<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chef Death's Kitchen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>

        <!-- it's a joke.  it doesn't need to be properly placed -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="position: absolute; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(0,0,0,.85); color: #f00; font-family: 'VT323', monospace; font-size: 1.5em;">
                    You walk into the back of the restaurant.<br>
                    A large lobster with human legs is holding a pair of tongs in his claws.<br>
                    He uses them to flip the fish patties in the deep fryer.<br>
                    He turns and sees you.<br>
                    You are frozen with fear.<br>
                    He steps towards you, clicking his tongs.<br>
                    You can't move.<br>
                    He lunges at you with unimaginable speed and picks you up with his fish patty tongs.<br>
                    He throws you into the fryer.<br>
                    Your screams sound ironically exactly the same as a lobsters.<br>

                    <h1 style="font-size: 5em;">You are dead.</h1>

                    <a href="/">Try again?</a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
