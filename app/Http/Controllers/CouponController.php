<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CouponController extends Controller
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


    public function getCouponByCode($code)
    {
        $model = Coupon::select('code', 'number_of_use')->where('code', $code)->get();

        return json_encode($model);
    }
    
}
