<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distillery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DistilleryController extends Controller
{
    public function index()
    {
        $distilleries = Distillery::paginate(10);
        return view('admin.distilleries.index', compact('distilleries'));
    }

    public function create()
    {
        return view('admin.distilleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'website' => 'nullable|url'
        ]);

        Distillery::create($validated);
        return redirect()->route('admin.distilleries.index')
            ->with('success', 'Destilerija uspešno kreirana');
    }

    public function edit(Distillery $distillery)
    {
        return view('admin.distilleries.edit', compact('distillery'));
    }

    public function update(Request $request, Distillery $distillery)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'website' => 'nullable|url'
        ]);

        $distillery->update($validated);
        return redirect()->route('admin.distilleries.index')
            ->with('success', 'Destilerija uspešno ažurirana');
    }

    public function destroy(Distillery $distillery)
    {
        // Provera da li destilerija ima proizvode
        if ($distillery->products()->exists()) {
            return back()->with('error', 'Ne možete obrisati destileriju koja ima proizvode');
        }

        $distillery->delete();
        return redirect()->route('admin.distilleries.index')
            ->with('success', 'Destilerija uspešno obrisana');
    }
}
