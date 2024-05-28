<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welkom") }}, {{ auth()->user()->name }}!
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Mijn Albums</h2>
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-50">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="overflow-x-auto">
                        <a href="{{ route('albums.create') }}" class="CreateButton mb-4">Nieuw Album Toevoegen</a>
                        <table class="min-w-full bg-white dark:bg-gray-800 shadow rounded-lg">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Titel</th>
                                <th class="py-2 px-4 border-b text-left">Artiest</th>
                                <th class="py-2 px-4 border-b text-left">Genre</th>
                                <th class="py-2 px-4 border-b text-left">Jaar van uitgave</th>
                                <th class="py-2 px-4 border-b text-left">Aantal nummers</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($albums as $album)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="py-2 px-4 border-b text-left">{{ $album->titel }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->artiest->naam }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->genre->naam }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->jaar_van_uitgave }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->aantal_nummers }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
