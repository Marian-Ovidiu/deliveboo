<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Business;
use App\Type;

class ApiController extends Controller
{
    public function getBusinessesApi()
    {
        $businesses = Business::where('id', '<=', 8)->get();
        return response()->json([
            'data' => [
                'businesses' => $businesses
            ]
        ]);
    }

    public function getTypesApi()
    {
        $types = Type::all();
        return response()->json([
            'data' => [
                'types' => $types
            ]
        ]);
    }

    public function filterBusinessesByName ($query)
    {

        $toLowerQuery = strtolower($query);
        $businessName = Business::where("name", 'LIKE', "%$toLowerQuery%")->get();

        return response()->json($businessName);

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
