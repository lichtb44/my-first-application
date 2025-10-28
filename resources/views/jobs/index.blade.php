<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <!-- Create Job Button -->
    <div class="mb-4">
        <a href="{{ route('jobs.create') }}" 
           class="inline-block rounded-md bg-indigo-600 px-3 py-2 text-white text-sm font-semibold hover:bg-indigo-500">
            Create Job
        </a>
    </div>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <li class="border p-4 rounded-lg">
                <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-500 hover:underline">
                    <strong class="text-laracasts">{{ $job->employer->name }}:</strong>
                    {{ $job->title }} pays {{ $job->salary }} per year.
                </a>

                <!-- Edit/Delete Buttons -->
                <div class="mt-2 space-x-2">
                    <a href="{{ route('jobs.edit', $job->id) }}" 
                       class="text-white bg-yellow-500 px-2 py-1 rounded hover:bg-yellow-400 text-sm">
                        Edit
                    </a>

                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 px-2 py-1 rounded hover:bg-red-400 text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>
