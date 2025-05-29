<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public readonly Item $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function index()
    {
        $countLostItems = Item::where('status', 'Perdido')->count();
        $countReturnedItems = Item::where('status', 'Devolvido')->count();

        $currentMonth = Carbon::now()->month;
        $monthName = Carbon::now()->translatedFormat('F');
        $foundItemsThisMonth = Item::whereMonth('found_date', $currentMonth)->count();

        $recentItems = Item::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'countLostItems',
            'countReturnedItems',
            'countReports',
            'foundItemsThisMonth',
            'monthName',
            'recentItems'
        ));
    }
}
