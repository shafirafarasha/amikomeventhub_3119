<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index(Request $request)
    {


        $search = $request->search;

        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        })
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo_url' => 'nullable|max:255'
        ]);

       $path = $request->file('logo')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo_url' => $path
        ]);

          return redirect()
        ->route('admin.partners.index')
        ->with('success', 'Partner berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'logo_url' => 'nullable|max:255'
        ]);

       $data = [
    'name' => $request->name,
];

if ($request->hasFile('logo')) {
    $path = $request->file('logo')->store('partners', 'public');

    $data['logo_url'] = $path;
}

$partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus.');
    }
}
