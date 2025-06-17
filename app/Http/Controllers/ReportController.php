<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::All();
        $count = Report::count();
        return response()->json([
            'reports' => $reports,
            'count' => $count
        ]);
    }

    public function store(Request $request)
    {
        $report = Report::create($request->all());
        return response()->json($report, 201);
    }

    public function show($id)
    {
        return Report::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->update($request->all());
        return response()->json($report, 200);
    }

    public function destroy($id)
    {
        Report::destroy($id);
        return response()->json(null, 204);
    }
}
