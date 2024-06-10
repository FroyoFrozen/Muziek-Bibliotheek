<x-app-layout>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">{{ $artist->name }}</h2>
                    <p class="mt-10"><strong>Bio:</strong> {{ $artist->bio }}</p>
                    <p class="mt-10"><strong>Genre:</strong> {{ $artist->genre }}</p>
                    <p class="mt-10"><strong>Website:</strong> <a href="{{ $artist->website }}" target="_blank" class="text-blue-500">{{ $artist->website }}</a></p>
                    <p class="mt-10"><strong>Awards:</strong> {{ $artist->awards }}</p>
                    <p class="mt-10"><strong>Discography:</strong></p>
                    <ul class="list-disc ml-6">
                        @foreach($artist->albums as $album)
                            <li>{{ $album->title }} ({{ $album->release_year }})</li>
                        @endforeach
                    </ul>
                    <p class="mt-10"><strong>Social Media:</strong></p>
                    <ul class="list-disc ml-6">
                        <li><a href="{{ $artist->facebook }}" target="_blank" class="text-blue-500">Facebook</a></li>
                        <li><a href="{{ $artist->twitter }}" target="_blank" class="text-blue-500">Twitter</a></li>
                        <li><a href="{{ $artist->instagram }}" target="_blank" class="text-blue-500">Instagram</a></li>
                    </ul>
                    <a href="{{ route('artists.edit', $artist->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 mt-10">Edit Artist</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
