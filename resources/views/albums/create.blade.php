<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Nieuw Album Toevoegen</h2>
                    <form method="POST" action="{{ route('albums.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="titel" class="form-label">Titel</label>
                            <input type="text" name="titel" id="titel" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="artiest_id" class="form-label">Artiest</label>
                            <select name="artiest_id" id="artiest_id" class="form-control" required>
                                @foreach(App\Models\Artiest::all() as $artiest)
                                    <option value="{{ $artiest->id }}">{{ $artiest->naam }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="genre_id" class="form-label">Genre</label>
                            <select name="genre_id" id="genre_id" class="form-control" required>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->naam }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jaar_van_uitgave" class="form-label">Jaar van uitgave</label>
                            <input type="number" name="jaar_van_uitgave" id="jaar_van_uitgave" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="aantal_nummers" class="form-label">Aantal nummers</label>
                            <input type="number" name="aantal_nummers" id="aantal_nummers" class="form-control">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Album Toevoegen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
