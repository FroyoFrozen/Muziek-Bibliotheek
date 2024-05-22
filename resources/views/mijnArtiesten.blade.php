<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">Mijn Artiesten</h2>

                    <!-- Formulier voor het toevoegen van een nieuwe artiest -->
                    <form method="POST" action="{{ route('artiesten.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="naam" class="block text-sm font-medium text-gray-700">Naam</label>
                            <input type="text" name="naam" id="naam" class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                            Voeg Artiest Toe
                        </button>
                    </form>

                    <!-- Lijst met artiesten -->
                    <!-- Lijst met artiesten -->
                    <div class="mt-8">
                        <h3 class="text-lg font-medium mb-4">Mijn Artiestenlijst</h3>
                        @if (empty($artiesten))
                            <p>Je hebt nog geen artiesten toegevoegd.</p>
                        @else
                            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($artiesten as $artiest)
                                    <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                                        <div class="w-full flex items-center justify-between p-6 space-x-6">
                                            <div class="flex-1 truncate">
                                                <div class="flex items-center space-x-3">
                                                    <h3 class="text-sm font-medium text-gray-900 truncate">{{ $artiest->naam }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
