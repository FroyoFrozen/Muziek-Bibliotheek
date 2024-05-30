<x-app-layout>
    <div class="py-12">
        <div class="px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <h2 class="text-2xl font-semibold mb-4">Add New Album</h2>
                    <form id="albumForm" method="POST" action="{{ route('albums.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                            <input type="text" name="title" id="title" class="form-input w-full" required>
                            @error('title')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="artist_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Artist</label>
                            <select name="artist_id" id="artist_id" class="form-select w-full" required>
                                @foreach(App\Models\Artist::all() as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="genre_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Genre</label>
                            <select name="genre_id" id="genre_id" class="form-select w-full" required>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="release_year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Release Year</label>
                            <div class="flex items-center">
                                <input type="range" name="release_year" id="release_year" class="form-range rounded-md shadow-sm w-full mr-2" min="1900" max="{{ date('Y') }}" value="{{ date('Y') }}">
                                <input type="number" name="release_year_input" id="release_year_input" class="form-input w-20 text-center" min="1900" max="{{ date('Y') }}" value="{{ date('Y') }}">
                            </div>
                            <p id="release_year_error" class="text-red-500 text-xs hidden">Enter a valid year (1900 - {{ date('Y') }}).</p>
                        </div>
                        <div class="mb-4">
                            <label for="number_of_tracks" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Number of Tracks</label>
                            <input type="number" name="number_of_tracks" id="number_of_tracks" class="form-input w-full" min="0">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Add Album</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const albumForm = document.getElementById('albumForm');
    const releaseYearSlider = document.getElementById('release_year');
    const releaseYearInput = document.getElementById('release_year_input');
    const releaseYearError = document.getElementById('release_year_error');

    releaseYearInput.addEventListener('input', function () {
        releaseYearSlider.value = this.value;
        validateReleaseYear(this.value);
    });

    releaseYearSlider.addEventListener('input', function () {
        releaseYearInput.value = this.value;
        validateReleaseYear(this.value);
    });

    albumForm.addEventListener('submit', function (event) {
        const releaseYearValue = releaseYearSlider.value;
        if (!validateReleaseYear(releaseYearValue)) {
            event.preventDefault();
        }
    });

    function validateReleaseYear(value) {
        if (value < 1900 || value > new Date().getFullYear()) {
            releaseYearError.classList.remove('hidden');
            return false;
        } else {
            releaseYearError.classList.add('hidden');
            return true;
        }
    }
</script>
