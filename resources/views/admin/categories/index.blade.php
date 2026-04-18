@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-black">Manajemen Kategori</h1>
        <p class="text-slate-500">Kelola kategori event</p>
    </div>
    <button class="bg-indigo-600 text-white px-5 py-3 rounded-xl font-bold hover:bg-indigo-700">
        + Tambah Kategori
    </button>
</div>

<div class="bg-white rounded-3xl border shadow-sm overflow-hidden">
    <div class="p-6 border-b">
        <h2 class="font-bold text-lg">Daftar Kategori</h2>
    </div>

    <table class="w-full text-left">
        <thead class="bg-slate-50 text-slate-400 text-xs uppercase">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Nama Kategori</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            <tr>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4 font-medium">Seminar</td>
                <td class="px-6 py-4 text-center space-x-2">
                    <button class="bg-yellow-400 px-3 py-1 rounded-lg text-white text-sm">Edit</button>
                    <button class="bg-red-500 px-3 py-1 rounded-lg text-white text-sm">Hapus</button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4">2</td>
                <td class="px-6 py-4 font-medium">Workshop</td>
                <td class="px-6 py-4 text-center space-x-2">
                    <button class="bg-yellow-400 px-3 py-1 rounded-lg text-white text-sm">Edit</button>
                    <button class="bg-red-500 px-3 py-1 rounded-lg text-white text-sm">Hapus</button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4">3</td>
                <td class="px-6 py-4 font-medium">Konser</td>
                <td class="px-6 py-4 text-center space-x-2">
                    <button class="bg-yellow-400 px-3 py-1 rounded-lg text-white text-sm">Edit</button>
                    <button class="bg-red-500 px-3 py-1 rounded-lg text-white text-sm">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
