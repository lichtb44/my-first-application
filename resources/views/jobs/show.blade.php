<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <!-- Employer Name -->
    <p class="text-sm text-gray-500">{{ $job->employer->name }}</p>

    <!-- Job Title -->
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>

    <!-- Salary -->
    <p>This job pays {{ $job['salary'] }} per year.</p>

    <!-- Buttons -->
    <div class="mt-4 flex gap-2">

        <!-- Back to Jobs -->
        <a href="/jobs" class="text-blue-500 hover:underline inline-block">
    ← Back to Jobs
</a>


        <!-- Edit Job -->
        <a href="/jobs/{{ $job->id }}/edit" class="bg-blue-500 text-white px-3 py-1 rounded">
            Edit Job
        </a>

    </div>
</x-layout>
