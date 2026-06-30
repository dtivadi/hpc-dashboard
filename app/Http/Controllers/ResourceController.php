<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        Gate::authorize('admin-only');
        return view('resources.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('admin-only');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:0',
            'unit' => 'required|string|max:20',
        ]);

        Resource::create($validated);

        return redirect()->route('resources.index')->with('success', 'Resource added successfully.');
    }

    public function edit(Resource $resource)
    {
        Gate::authorize('admin-only');
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        Gate::authorize('admin-only');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:0',
            'unit' => 'required|string|max:20',
        ]);

        $resource->update($validated);

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy(Resource $resource)
    {
        Gate::authorize('admin-only');
        $resource->delete();
        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
    }
}
