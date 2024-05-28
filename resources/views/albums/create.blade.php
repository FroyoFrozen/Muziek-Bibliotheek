<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">Nieuw Album Toevoegen</h2>
                    <form id="albumForm" method="POST" action="{{ route('albums.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="titel" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Titel</label>
                            <input type="text" name="titel" id="titel" class="form-input w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="artiest_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Artiest</label>
                            <select name="artiest_id" id="artiest_id" class="form-select w-full" required>
                                @foreach(App\Models\Artiest::all() as $artiest)
                                    <option value="{{ $artiest->id }}">{{ $artiest->naam }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="genre_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Genre</label>
                            <select name="genre_id" id="genre_id" class="form-select w-full" required>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->naam }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jaar_van_uitgave" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jaar van uitgave</label>
                            <div class="flex items-center">
                                <input type="range" name="jaar_van_uitgave" id="jaar_van_uitgave" class="form-range rounded-md shadow-sm w-full mr-2" min="1900" max="{{ date('Y') }}" value="{{ date('Y') }}">
                                <input type="number" name="jaar_van_uitgave_input" id="jaar_van_uitgave_input" class="form-input w-20 text-center" min="1900" max="{{ date('Y') }}" value="{{ date('Y') }}">
                            </div>
                            <p id="jaar_van_uitgave_error" class="text-red-500 text-xs hidden">Voer een geldig jaartal in (1900 - {{ date('Y') }}).</p>

                        </div>
                        <div class="mb-4">
                            <label for="aantal_nummers" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Aantal nummers</label>
                            <input type="number" name="aantal_nummers" id="aantal_nummers" class="form-input w-full" min="0">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Album Toevoegen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const albumForm = document.getElementById('albumForm');
    const jaarVanUitgaveSlider = document.getElementById('jaar_van_uitgave');
    const jaarVanUitgaveInput = document.getElementById('jaar_van_uitgave_input');
    const jaarVanUitgaveError = document.getElementById('jaar_van_uitgave_error');

    jaarVanUitgaveInput.addEventListener('input', function() {
        jaarVanUitgaveSlider.value = this.value;
        validateJaarVanUitgave(this.value);
    });

    jaarVanUitgaveSlider.addEventListener('input', function() {
        jaarVanUitgaveInput.value = this.value;
        validateJaarVanUitgave(this.value);
    });

    albumForm.addEventListener('submit', function(event) {
        const jaarVanUitgaveValue = jaarVanUitgaveSlider.value;
        if (!validateJaarVanUitgave(jaarVanUitgaveValue)) {
            event.preventDefault();
        }
    });

    function validateJaarVanUitgave(value) {
        if (value < 1900 || value > new Date().getFullYear()) {
            jaarVanUitgaveError.classList.remove('hidden');
            return false;
        } else {
            jaarVanUitgaveError.classList.add('hidden');
            return true;
        }
    }
</script>
