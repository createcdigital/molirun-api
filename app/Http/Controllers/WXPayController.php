<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponLog;
use App\Models\Racer;
use App\Models\Stock;
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
            $trade_type = $request->trade_type;

            Log::info("===notify, start ===transaction_id:".$transaction_id.", out_trade_no:" .$out_trade_no.", result_code:".$result_code.", result_code:".$result_code.", openid:".$openid.", time_end:".$time_end.", attach:".$attach.", trade_type:".$trade_type);

            $model = Racer::where('out_trade_no', $out_trade_no)->first();
            if(isset($model) && $model -> transaction_id == "" && $model -> pay_status == "未支付" && $model -> transaction_date  == "")
            {
                $model -> pay_status = $trade_type == "COUPON" ? "邀请码支付": "已支付";
                $model -> transaction_id = $transaction_id;
                $model -> transaction_date = $time_end;
                
                if($model -> save())
                {
                    Log::info("===notify, end   ===transaction_id:".$transaction_id.", out_trade_no:" .$out_trade_no.", 更新支付状态成功!");

                    $this->updateStock($model);

                    if($trade_type == "COUPON")
                    {
                        $this->updateCoupon($transaction_id);
                        $this->addCouponLog($transaction_id, $out_trade_no);
                    }

                    return json_encode(["rs" => "success"]);
                }
                else
                {
                    Log::info("===notify, end   ===transaction_id:".$transaction_id.", out_trade_no:" .$out_trade_no.", 更新支付状态失败!");
                    return json_encode(["rs" => "fail"]);
                }
            }else
            {
                Log::info("===notify, end   ===transaction_id:".$transaction_id.", out_trade_no:" .$out_trade_no.", 更新支付状态失败! 状态已被更新");
                return json_encode(["rs" => "already updated payment status."]);
            }
        }
    }


    protected function updateStock($racer)
    {
        $grouptype = $racer->grouptype;
        $p1_teesize = $racer->p1_teesize;
        $p2_teesize = $racer->p2_teesize;
        $kids_teesize = $racer->kids_teesize;

        // 并发锁(悲观锁)
        DB::beginTransaction();

        try
        {
            $model = Stock::lockForUpdate()->first();

            if(isset($model))
            {
                // group type
                switch($grouptype)
                {
                    case "5km":
                    case "10km":
                        $model->group_type_single -= 1;
                        break;
                    case "亲子跑":
                        $model->group_type_family -= 1;
                        break;
                }

                if($grouptype == "亲子跑")
                {
                    switch($p1_teesize)
                    {
                        case "XS(160/82A)":
                            $model->p_xs -= 1;
                            break;
                        case "S(165/84A)":
                            $model->p_s -= 1;
                            break;
                        case "M(170/88A)":
                            $model->p_m -= 1;
                            break;
                        case "L(175/92A)":
                            $model->p_l -= 1;
                            break;
                        case "XL(180/96A)":
                            $model->p_xl -= 1;
                            break;
                        case "XLL(185/100A)":
                            $model->p_xxl -= 1;
                            break;
                    }
                }else{

                    switch($p1_teesize)
                    {
                        case "XS(160/82A)":
                            $model->p_xs -= 1;
                            break;
                        case "S(165/84A)":
                            $model->p_s -= 1;
                            break;
                        case "M(170/88A)":
                            $model->p_m -= 1;
                            break;
                        case "L(175/92A)":
                            $model->p_l -= 1;
                            break;
                        case "XL(180/96A)":
                            $model->p_xl -= 1;
                            break;
                        case "XLL(185/100A)":
                            $model->p_xxl -= 1;
                            break;
                    }

                    switch($p2_teesize)
                    {
                        case "XS(160/82A)":
                            $model->p_xs -= 1;
                            break;
                        case "S(165/84A)":
                            $model->p_s -= 1;
                            break;
                        case "M(170/88A)":
                            $model->p_m -= 1;
                            break;
                        case "L(175/92A)":
                            $model->p_l -= 1;
                            break;
                        case "XL(180/96A)":
                            $model->p_xl -= 1;
                            break;
                        case "XLL(185/100A)":
                            $model->p_xxl -= 1;
                            break;
                    }

                    switch($kids_teesize)
                    {
                        case "110以下":
                            $model->kids_110 -= 1;
                            break;
                        case "110-130":
                            $model->kids_130 -= 1;
                            break;
                    }
                }

                $model->save();
            }else
                Log::info("===updateStock, [严重]无库存数据记录");

            DB::commit();

        }catch (\Exception $e) {
            DB:rollBack();

            Log::info("===updateStock, 更新库存失败, 错误信息: " .$e->getMessage());
        }

    }
    
    protected function updateCoupon($coupon_code)
    {

        // 并发锁(悲观锁)
        DB::beginTransaction();

        try
        {
            Coupon::where('code', $coupon_code)->lockForUpdate()->increment('number_of_use');

            DB::commit();

        }catch (\Exception $e) {
            DB:rollBack();

            Log::info("===updateCoupon, 更新邀请码使用次数失败, 错误信息: " .$e->getMessage());
        }
    }


    protected function addCouponLog($coupon_code, $out_trade_no)
    {
        $model = new CouponLog();
        $model->code = $coupon_code;
        $model->out_trade_no = $out_trade_no;
        $model->save();
    }
    
}
