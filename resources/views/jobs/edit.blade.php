<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <!-- Edit Form -->
    <form method="POST" action="{{ route('jobs.update', $job->id) }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Job</h2>
                <p class="mt-1 text-sm text-gray-600">Update the job details below.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- Job Title -->
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" placeholder="Shift Leader" required
                                class="block w-full border py-1.5 px-3 rounded-md shadow-sm focus:ring-indigo-600 sm:text-sm"
                                value="{{ old('title', $job->title) }}">
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
                                value="{{ old('salary', $job->salary) }}">
                        </div>
                        @error('salary')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <!-- Buttons: Cancel, Delete, Update -->
        <div class="mt-6 flex justify-end gap-3 items-center">

            <!-- Cancel -->
            <a href="{{ route('jobs.show', $job->id) }}" class="text-sm font-semibold text-gray-900">
                Cancel
            </a>

            <!-- Delete -->
            <button type="submit" form="delete-form"
                class="text-red-500 text-sm font-semibold hover:underline">
                Delete
            </button>

            <!-- Update -->
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-white text-sm font-semibold hover:bg-indigo-500">
                Update
            </button>

        </div>
    </form>

    <!-- Hidden Delete Form -->
    <form method="POST" action="{{ route('jobs.destroy', $job->id) }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
