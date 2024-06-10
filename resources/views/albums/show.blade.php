<x-app-layout>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Album Details</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <p><span class="font-semibold">Title:</span> {{ $album->title }}</p>
                            <p><span class="font-semibold">Artist:</span> {{ $album->artist->name }}</p>
                            <p><span class="font-semibold">Genre:</span> {{ $album->genre->name }}</p>
                            <p><span class="font-semibold">Release Year:</span> {{ $album->release_year }}</p>
                            <p><span class="font-semibold">Number of Tracks:</span> {{ $album->number_of_tracks }}</p>

                            <!-- Slider for rating -->
                            <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rating:</label>
                            <input type="range" id="rating" name="rating" min="1" max="10" value="5" class="block w-full mt-1">

                            <!-- Display selected value -->
                            <div class="flex items-center mt-2">
                                <span class="inline-block text-lg font-semibold mr-2">Selected Value:</span>
                                <span id="selectedRating" class="inline-block text-lg font-semibold">5</span>
                            </div>

                            <!-- Button to save rating -->
                            <div class="mt-4">
                                <button type="button" onclick="saveRating()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Save Rating</button>
                            </div>

                            <!-- Edit and Delete buttons -->
                            <div class="mt-4">
                                <a href="{{ route('albums.edit', $album) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 mr-2">Edit</a>
                                <form action="{{ route('albums.destroy', $album) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this album?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const ratingSlider = document.getElementById('rating');
    const selectedRating = document.getElementById('selectedRating');

    ratingSlider.addEventListener('input', function() {
        selectedRating.textContent = this.value;
    });

    function saveRating() {
        const rating = ratingSlider.value;
        alert('Rating saved: ' + rating);
    }
</script>
