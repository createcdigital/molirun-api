<?php

namespace App\Http\Controllers;

use App\Models\Racer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WXPayController extends Controller
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


    public function notify(Request $request)
    {
        $return_code =  $request->return_code;
        if($return_code == "SUCCESS")
        {
            $result_code = $request->result_code;
            $transaction_id = $request->transaction_id;
            $out_trade_no = $request->out_trade_no;
            $openid = $request->openid;
            $time_end = $request->time_end;
            $attach = $request->attach;

            Log::info("===notify, transaction_id:".$transaction_id.", out_trade_no:" .$out_trade_no.", result_code:".$result_code.", result_code:".$result_code.", openid:".$openid.", time_end:".$time_end.", attach:".$attach);

            $models = Racer::where('out_trade_no', $out_trade_no)->first();
            if(isset($models) && $models -> transaction_id == "" && $models -> pay_status == "" && $models -> transaction_date  == "")
            {
                $models -> pay_status = "已支付";
                $models -> transaction_id = $transaction_id;
                $models -> transaction_date = $time_end;
                if($models -> save())
                    return json_encode(["rs" => "success"]);
                else
                    return json_encode(["rs" => "fail"]);
            }else
                return json_encode(["rs" => "already updated payment status."]);
        }
    }
    
}
