<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <ul class="space-y-2">
        @foreach ($jobs as $job)
            <li class="border p-4 rounded-lg">
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <strong class="text-laracasts">{{ $job->employer->name }}:</strong>
                    {{ $job['title'] }} pays {{ $job['salary'] }} per year.
                </a>

                <!-- Display Tags -->
                <div class="px-4 py-4">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
