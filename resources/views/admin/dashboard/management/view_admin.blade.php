<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-2xl">

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-2xl p-10 relative overflow-hidden">

            <!-- Decorative Circle -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100 rounded-full opacity-40"></div>

            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Detail Admin
                    </h1>
                    <p class="text-sm text-gray-400">
                        Informasi lengkap akun administrator
                    </p>
                </div>

                <a href="{{ route('admin.management') }}"
                   class="bg-gray-100 text-gray-600 px-5 py-2 rounded-xl text-sm font-semibold hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                    ← Back
                </a>
            </div>

            <!-- Profile Section -->
            <div class="flex items-center gap-6 mb-10">

                <div class="w-24 h-24 rounded-full bg-blue-600 text-white flex items-center justify-center text-4xl font-bold shadow-lg">
                    {{ strtoupper(substr($admin->username, 0, 1)) }}
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ $admin->nama }}
                    </h2>
                    <p class="text-gray-500">
                        Username: <span class="font-semibold text-gray-700">{{ $admin->username }}</span>
                    </p>
                </div>

            </div>

            <!-- Divider -->
            <div class="border-t border-gray-200 mb-8"></div>

            <!-- Detail Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-gray-50 p-5 rounded-2xl hover:shadow-md transition">
                    <p class="text-xs uppercase text-gray-400 tracking-wide">
                        ID Admin
                    </p>
                    <p class="text-lg font-bold text-gray-800 mt-1">
                        {{ $admin->id_log }}
                    </p>
                </div>

                <div class="bg-gray-50 p-5 rounded-2xl hover:shadow-md transition">
                    <p class="text-xs uppercase text-gray-400 tracking-wide">
                        Nama Lengkap
                    </p>
                    <p class="text-lg font-bold text-gray-800 mt-1">
                        {{ $admin->nama }}
                    </p>
                </div>

                <div class="bg-gray-50 p-5 rounded-2xl hover:shadow-md transition md:col-span-2">
                    <p class="text-xs uppercase text-gray-400 tracking-wide">
                        Username
                    </p>
                    <p class="text-lg font-bold text-gray-800 mt-1">
                        {{ $admin->username }}
                    </p>
                </div>

            </div>

        </div>
    </div>

</body>
</html>