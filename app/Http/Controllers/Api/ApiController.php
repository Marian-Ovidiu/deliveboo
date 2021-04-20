<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;
use App\Type;

class ApiController extends Controller
{
    public function getBusinessesApi(Request $request)
    {
        $businesses = Business::all();
        return response()->json([
            'data' => [
                'businesses' => $businesses
            ]
        ]);
    }

    public function getTypesApi(Request $request)
    {
        $types = Type::all();
        return response()->json([
            'data' => [
                'types' => $types
            ]
        ]);
    }

    public function filterBusinessesByTypes($name)
    {
        $businessType = Business::with(['types'])
            ->whereHas('types', function($query) use($name) {
                $query->where('name', $name);
            })->get();
        return response()->json($businessType);
    }
}
