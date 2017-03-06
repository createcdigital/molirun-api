<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function get()
    {
        $model = Stock::get();

        return json_encode($model);
    }
    
}
