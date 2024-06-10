<x-app-layout>
    <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">Edit {{ $artist->name }}</h2>
                    <form method="POST" action="{{ route('artists.update', $artist->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $artist->name) }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                            <textarea name="bio" id="bio" class="mt-1 block w-full" rows="4" required>{{ old('bio', $artist->bio) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                            <input type="text" name="genre" id="genre" value="{{ old('genre', $artist->genre) }}" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="url" name="website" id="website" value="{{ old('website', $artist->website) }}" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="awards" class="block text-sm font-medium text-gray-700">Awards</label>
                            <textarea name="awards" id="awards" class="mt-1 block w-full" rows="2">{{ old('awards', $artist->awards) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
                            <input type="url" name="facebook" id="facebook" value="{{ old('facebook', $artist->facebook) }}" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
                            <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $artist->twitter) }}" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
                            <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $artist->instagram) }}" class="mt-1 block w-full">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
