<x-app-layout>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">My Artists</h2>

                    <!-- Form for adding a new artist -->
                    <form method="POST" action="{{ route('artists.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md shadow-sm border-gray-300">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">
                            Add Artist
                        </button>
                    </form>

                    <!-- List of artists -->
                    <div class="mt-8">
                        <h3 class="text-lg font-medium mb-4">My Artist List</h3>
                        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($artists as $artist)
                                <a href="{{ route('artists.show', $artist->id) }}">
                                    <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200 hover:bg-gray-100 transition duration-300 ease-in-out">
                                        <div class="w-full flex items-center justify-between p-6 space-x-6">
                                            <div class="flex-1 truncate">
                                                <div class="flex items-center space-x-3">
                                                    <span class="text-sm font-medium text-gray-900 truncate">{{ $artist->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
