<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image',
            'website' => 'nullable',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')
                ->store('partners', 'public');
        }

        Partner::create($data);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return back();
    }
}
