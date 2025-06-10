<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json([
            'count' => $items->count(),
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'found_date' => 'required|date',
            'category' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
            'status' => 'required|string',
            'returned_date' => 'nullable|date',
            'returned_to' => 'nullable|string|max:255',
        ]);

        $item = Item::create($validated);

        return response()->json($item, 201);
    }

    public function show(Item $item)
    {
        return response()->json($item);
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'found_date' => 'required|date',
            'category' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
            'status' => 'required|string',
            'returned_date' => 'nullable|date',
            'returned_to' => 'nullable|string|max:255',
        ]);

        $item->update($validated);

        return response()->json($item);
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(['message' => 'Item deletado com sucesso']);
    }
}
