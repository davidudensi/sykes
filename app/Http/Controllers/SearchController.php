<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Property;
use DB;

class SearchController extends Controller
{
    public function index() {
        $locations = DB::table('locations')
            ->leftJoin('properties', 'properties._fk_location', '=', 'locations.__pk')
            ->leftJoin('bookings', 'bookings._fk_property', '=', 'properties.__pk')
            ->select()
            ->paginate(3);
            // var_dump($locations);
        return view('search',
            [
                'locations' => $locations
            ]
        );
    }

    public function search(Request $request){
        // var_dump($request->request);
        $locations = Location::where('location_name', 'like', '%' . $request->keyword . '%')
            ->leftJoin('properties', 'properties._fk_location', '=', 'locations.__pk')
            ->leftJoin('bookings', 'bookings._fk_property', '=', 'properties.__pk')
            ->select()
            ->paginate(3);
        $count = 0;
        foreach ($locations as $location) {
            if($request->beds != null && $request->beds > 0 
                && $location->beds >= $request->beds){
            }else if($request->sleeps != null && $request->sleeps > 0 
                && $location->sleeps >= $request->sleeps){
            }else if($request->pets === "yes" && $location->accepts_pets === 1){
            }else if($request->beach === "yes" && $location->near_beach === 1){
            }else if($request->start_date != null 
                && $location->start_date <= $request->start_date){
            }else{
                unset($locations[$count]);
                $count++;
            }
        }
        return view('search',
            [
                'locations' => $locations
            ]
        );
    }
}
