<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Business;
use App\Type;

class ApiController extends Controller
{
    public function getBusinessesApi()
    {
        $arrayIdBusinesses = [];
        $allIdBusinesses = Business::all();
        foreach($allIdBusinesses as $business) {
            $arrayIdBusinesses[] = $business->id;
        }

        shuffle($arrayIdBusinesses);

        $shuffledId = array_slice($arrayIdBusinesses, 0, 8);

        $randomSearchDB = [];
        $finalArray = [];

        foreach($shuffledId as $id ) {
            $randomSearchDB[] = Business::where('id', '=', $id)->get();
        }

        for ($i=0; $i < count($randomSearchDB); $i++) {
            $finalArray[] = $randomSearchDB[$i]['0'];
        }

        return response()->json($finalArray);
    }

    public function getTypesApi()
    {
        $types = Type::all();
        return response()->json($types);
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
