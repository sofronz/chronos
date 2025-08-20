<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chronos Landing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 min-h-screen flex flex-col items-center justify-center px-4">

    <header class="text-center mb-20">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">Welcome to Chronos</h1>
        <p class="text-gray-400 text-lg md:text-xl">Select your panel to continue</p>
    </header>

    <main class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl w-full">
        <!-- User Card -->
        <a href="/user"
            class="bg-gray-800 text-white rounded-2xl shadow-2xl flex flex-col items-center justify-center p-12 cursor-pointer transform transition-transform hover:scale-105 hover:shadow-[0_20px_40px_rgba(20,94,252,0.4)] text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mb-6 text-blue-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A9 9 0 1118.879 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <h2 class="text-3xl font-bold mb-2">User Panel</h2>
            <p class="text-gray-400">Access the booking system as a user.</p>
        </a>

        <!-- Admin Card -->
        <a href="/admin"
            class="bg-gray-800 text-white rounded-2xl shadow-2xl flex flex-col items-center justify-center p-12 cursor-pointer transform transition-transform hover:scale-105 hover:shadow-[0_20px_40px_rgba(20,94,252,0.4)] text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mb-6 text-blue-500" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 11c0 1.105-.895 2-2 2s-2-.895-2-2 .895-2 2-2 2 .895 2 2zm0 0c0 1.105.895 2 2 2s2-.895 2-2-.895-2-2-2-2 .895-2 2z" />
            </svg>
            <h2 class="text-3xl font-bold mb-2">Admin Panel</h2>
            <p class="text-gray-400">Manage rooms, users, and bookings.</p>
        </a>
    </main>

    <footer class="mt-20 text-gray-500 text-center">
        &copy; 2025 Chronos Mini Project. All rights reserved. <br>
        sofronzz.
    </footer>

</body>

</html>
