<x-app-layout>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">{{ __("Welcome") }}, {{ auth()->user()->name }}!</h2>
                    <div class="overflow-x-auto">
                        @if(session('success'))
                            <div class="bg-green-500 text-white p-4 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{ route('albums.create') }}" class="CreateButton mb-4">Add New Album</a>
                        <table class="min-w-full bg-white dark:bg-gray-800 shadow rounded-lg">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Title</th>
                                <th class="py-2 px-4 border-b text-left">Artist</th>
                                <th class="py-2 px-4 border-b text-left">Genre</th>
                                <th class="py-2 px-4 border-b text-left">Release Year</th>
                                <th class="py-2 px-4 border-b text-left">Number of Tracks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($albums as $album)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" onclick="window.location='{{ route('albums.show', $album) }}';" style="cursor: pointer;">
                                    <td class="py-2 px-4 border-b text-left">{{ $album->title }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->artist->name }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->genre->name }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->release_year }}</td>
                                    <td class="py-2 px-4 border-b text-left">{{ $album->number_of_tracks }}</td>
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
