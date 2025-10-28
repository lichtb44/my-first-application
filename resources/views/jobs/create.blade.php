<x-layout>
    <x-slot:heading>
        Create Job
        <!-- Create Job Button (links to same page just for demonstration) -->
        <a href="{{ route('jobs.create') }}" 
           class="ml-4 rounded-md bg-indigo-600 px-3 py-2 text-white text-sm font-semibold hover:bg-indigo-500">
            Create Job
        </a>
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm text-gray-600">We just need a handful of details.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- Job Title -->
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" placeholder="Shift Leader" required
                                class="block w-full border py-1.5 px-3 rounded-md shadow-sm focus:ring-indigo-600 sm:text-sm"
                                value="{{ old('title') }}">
                        </div>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input type="text" name="salary" id="salary" placeholder="$50,000 Per Year" required
                                class="block w-full border py-1.5 px-3 rounded-md shadow-sm focus:ring-indigo-600 sm:text-sm"
                                value="{{ old('salary') }}">
                        </div>
                        @error('salary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex justify-end gap-x-6">
            <a href="{{ route('jobs.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-white text-sm font-semibold hover:bg-indigo-500">
                Save
            </button>
        </div>
    </form>
</x-layout>
