<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Job Application Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">

  <!-- Navigation -->
  <nav class="bg-white shadow-sm">
    <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
      <a href="/" class="text-xl font-semibold text-gray-900" rel="home">JobPortal</a>
      <div class="space-x-4 flex items-center">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/jobs" :active="request()->is('jobs*')">Jobs</x-nav-link>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow flex items-center justify-center py-10 px-4">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-2xl w-full">
      {{ $slot }}
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t mt-auto">
    <div class="max-w-6xl mx-auto px-4 py-4 text-center text-sm text-gray-500">
      © {{ date('Y') }} JobPortal. All rights reserved.
    </div>
  </footer>

</body>
</html>
