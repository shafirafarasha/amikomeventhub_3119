@extends('layouts.admin')

@section('content')
    <!-- Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-3xl font-black">Manajemen Partner</h1>
            <p class="text-slate-500">Kelola partner pendukung event</p>
        </div>

        <!-- Tombol Tambah -->
        <button onclick="document.getElementById('addModal').classList.remove('hidden')"
            class="bg-indigo-600 text-white px-5 py-3 rounded-xl font-bold hover:bg-indigo-700">
            + Tambah Partner
        </button>
    </div>

    <!-- Search -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden mb-8">
        <div class="px-8 py-6 bg-slate-50/50 border-b flex flex-wrap gap-4 items-center">

            <form action="{{ route('admin.partners.index') }}" method="GET" class="flex-1 min-w-[300px] flex gap-2">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama Partner..."
                    class="flex-1 px-5 py-3 rounded-xl border-slate-200 border bg-white
                       focus:ring-2 focus:ring-indigo-500 outline-none transition
                       uppercase text-sm font-medium tracking-wide">

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl
                       font-bold transition">
                    Search
                </button>
            </form>
        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error -->
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white rounded-3xl border shadow-sm overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="font-bold text-lg">Daftar Partner</h2>
        </div>

        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-400 text-xs uppercase">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Logo</th>
                    <th class="px-6 py-4">Nama Partner</th>
                    <th class="px-6 py-4">Created At</th>
                    <th class="px-6 py-4">Updated At</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($partners as $partner)
                    <tr>
                        <td class="px-6 py-4">{{ $partner->id }}</td>

                        <td class="px-6 py-4">
                            @if ($partner->logo_url)
                                <img src="{{ asset('storage/' . $partner->logo_url) }}" alt="{{ $partner->name }}"
                                    class="h-14 w-auto rounded-xl border p-2 bg-white">
                            @else
                                <span class="text-slate-400 text-sm">No Logo</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 font-medium">{{ $partner->name }}</td>
                        <td class="px-6 py-4">{{ $partner->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4">{{ $partner->updated_at->format('d M Y H:i') }}</td>

                        <td class="px-6 py-4 text-center space-x-2">

                            <!-- Edit -->
                            <button
                                onclick="document.getElementById('editModal{{ $partner->id }}').classList.remove('hidden')"
                                class="bg-yellow-400 px-3 py-1 rounded-lg text-white text-sm hover:bg-yellow-500">
                                Edit
                            </button>

                            <!-- Delete -->
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Yakin ingin menghapus partner ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-red-500 px-3 py-1 rounded-lg text-white text-sm hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div id="editModal{{ $partner->id }}"
                        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white rounded-2xl p-8 w-full max-w-md">

                            <h2 class="text-2xl font-bold mb-6">Edit Partner</h2>

                            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium">Nama Partner</label>
                                    <input type="text" name="name" value="{{ $partner->name }}"
                                        class="w-full border rounded-xl px-4 py-3" required>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium">upload Logo</label>

                                    <input type="text" name="logo_url" value="{{ $partner->logo_url }}"
                                        class="w-full border rounded-xl px-4 py-3">
                                </div>

                                <div class="flex justify-end space-x-3">
                                    <button type="button"
                                        onclick="document.getElementById('editModal{{ $partner->id }}').classList.add('hidden')"
                                        class="px-4 py-2 rounded-xl border">
                                        Batal
                                    </button>

                                    <button type="submit"
                                        class="bg-indigo-600 text-white px-5 py-2 rounded-xl hover:bg-indigo-700">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-slate-500">
                            Belum ada partner
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-8 w-full max-w-md">

            <h2 class="text-2xl font-bold mb-6">Tambah Partner</h2>

            <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block mb-2 font-medium">Nama Partner</label>
                    <input type="text" name="name" class="w-full border rounded-xl px-4 py-3"
                        placeholder="Masukkan nama partner" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-2 font-medium">upload Logo</label>
                    <input type="file" name="logo" accept="image/*" class="w-full border rounded-xl px-4 py-3"
                        placeholder="Masukkan logo">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('addModal').classList.add('hidden')"
                        class="px-4 py-2 rounded-xl border">
                        Batal
                    </button>

                    <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-xl hover:bg-indigo-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
