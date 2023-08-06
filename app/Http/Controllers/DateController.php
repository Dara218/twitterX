<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function getMonths()
    {
        $months = collect([]);

        for ($i = 1; $i <= 12; $i++) {
            $month = Carbon::create(null, $i, 1)->format('F');
            $months->push($month);
        }

        return response()->json($months);
    }
}
