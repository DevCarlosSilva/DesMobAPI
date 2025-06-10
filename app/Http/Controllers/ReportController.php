<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return response()->json([
            'count' => $reports->count(),
            'reports' => $reports
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'report_date' => 'required|date',
            'reporter_name' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
        ]);

        $report = Report::create($validated);

        return response()->json($report, 201);
    }

    public function show(Report $report)
    {
        return response()->json($report);
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'report_date' => 'required|date',
            'reporter_name' => 'required|string|max:255',
            'category' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'condition' => 'required|string|max:50',
        ]);

        $report->update($validated);

        return response()->json($report);
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return response()->json(['message' => 'Relato deletado com sucesso']);
    }
}
