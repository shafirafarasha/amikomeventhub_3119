<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white flex items-center justify-center h-screen">

    <div class="text-center p-10 border rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">
            Selamat Datang di AmikomEventHub
        </h1>


        <h4>pilih menu yang tersedia dibawah ini</h4>

        <br>

        <div class="space-x-4">
            <a href="/profil" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Profil</a>
            <a href="/katalog" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 transition">Katalog</a>
            <a href="/bantuan" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700 transition">Bantuan</a>
        </div>
    </div>

<section class="py-16">
    <div class="container mx-auto px-4">

        <h2 class="text-3xl font-bold text-center mb-10">
            Partner Kami
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($partners as $partner)
                <div class="bg-white shadow rounded-lg p-4 text-center">

                    @if($partner->logo)
                        <img src="{{ asset('storage/' . $partner->logo) }}"
                             alt="{{ $partner->name }}"
                             class="h-24 mx-auto object-contain">
                    @else
                        <div class="h-24 flex items-center justify-center text-gray-400">
                            No Logo
                        </div>
                    @endif

                    <h3 class="mt-3 font-semibold">
                        {{ $partner->name }}
                    </h3>

                </div>
            @endforeach
        </div>

    </div>
</section>

</body>
</html>
