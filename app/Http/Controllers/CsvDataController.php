<?php

namespace App\Http\Controllers;

use App\Models\CsvData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as SearchRequest;

class CsvDataController extends Controller
{
    public function index()
    {

        if (!SearchRequest::has('search')) {
            return response()->json(CsvData::all());
        }

        $data = CsvData::query()
            ->filterSearchQuery()
            ->get();

        return response()->json($data);
    }
}
