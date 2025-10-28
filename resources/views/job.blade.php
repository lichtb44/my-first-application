<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>This job pays {{ $job['salary'] }} per year.</p>

    <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">← Back to Jobs</a>
</x-layout>
