<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Racer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RacerController extends Controller
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

    public function add(Request $request)
    {
        if($request->action == "add")
        {
            return $this->addRacer($request);
        }else if($request->action == "update")
        {
            return $this->updateRacer($request);
        }else
            return json_encode(["rs" => "fail, incorrect action"]);
    }

    private function addRacer($request)
    {
        $isRepeatData = $this->checkRepeatCardNumber($request);

        if (!isset($isRepeatData)) {
            return $this->saveRacer(new Racer, $request);
        } else
            return json_encode(["rs" => $isRepeatData]);
    }

    private function updateRacer($request)
    {
        $model = Racer::where('p1_card_number', $request->p1_card_number)->first();

        if($model != null && isset($model))
        {
            if($model->pay_status == "未支付")
                return $this->saveRacer($model, $request);
            else
                return json_encode(["rs" => "fail, can't to change racer information when pay status is \"已支付\"."]);
        }
        else
            return $this->addRacer($request);
    }

    private function saveRacer($model, $request)
    {
        //wechat information
        $model->openid = $request->openid;
        $model->nickname = $request->nickname;
        $model->headimgurl = $request->headimgurl;
        $model->sex = $request->sex;
        $model->city = $request->city;
        $model->country = $request->country;
        $model->province = $request->province;
        $model->subscribe_time = $request->subscribe_time;

        // form
        $model->grouptype = $request->grouptype; // 0:5km, 1:10km, 2:家庭跑
        $model->p1_tag = $request->p1_tag;

        // p1
        $model->p1_name = $request->p1_name;
        $model->p1_sex = $request->p1_sex;
        $model->p1_birthday = $request->p1_birthday;
        $model->p1_teesize = $request->p1_teesize;

        $model->p1_card_type = $request->p1_card_type;
        $model->p1_card_number = $request->p1_card_number;
        $model->p1_phone = $request->p1_phone;

        $model->p1_emergency_name = $request->p1_emergency_name;
        $model->p1_emergency_phone = $request->p1_emergency_phone;

        // p2
        $model->p2_name = $request->p2_name;
        $model->p2_sex = $request->p2_sex;
        $model->p2_birthday = $request->p2_birthday;
        $model->p2_teesize = $request->p2_teesize;

        $model->p2_card_type = $request->p2_card_type;
        $model->p2_card_number = $request->p2_card_number;
        $model->p2_phone = $request->p2_phone;

        $model->p2_emergency_name = $request->p2_emergency_name;
        $model->p2_emergency_phone = $request->p2_emergency_phone;

        // kids
        $model->kids_name = $request->kids_name;
        $model->kids_sex = $request->kids_sex;
        $model->kids_birthday = $request->kids_birthday;
        $model->kids_teesize = $request->kids_teesize;

        $model->kids_card_type = $request->kids_card_type;
        $model->kids_card_number = $request->kids_card_number;
        $model->kids_guardian_name = $request->kids_guardian_name;
        $model->kids_guardian_phone = $request->kids_guardian_phone;

        $model->kids_emergency_name = $request->kids_emergency_name;
        $model->kids_emergency_phone = $request->kids_emergency_phone;

        // package
        $model->pakcage_get_way = $request->pakcage_get_way;
        $model->pakcage_get_name = $request->pakcage_get_name;
        $model->pakcage_get_phone = $request->pakcage_get_phone;
        $model->pakcage_get_address = $request->pakcage_get_address;

        // payment
        $model->out_trade_no = $request->out_trade_no;
        $model->pay_status = "未支付";
//            $model->transaction_id = $request->transaction_id;
//            $model->transaction_date = $request->transaction_date;
//
//            // race result
//            $model->p1_race_number = $request->p1_race_number;
//            $model->p2_race_number = $request->p2_race_number;
//            $model->kids_race_number = $request->kids_race_number;
//            $model->race_time = $request->race_time;


        if ($model->save())
            return json_encode(["rs" => "success"]);
        else
            return json_encode(["rs" => "fail"]);
    }

    protected function checkRepeatCardNumber(Request $request)
    {
        $p1_card_number = $request->p1_card_number;
        $p2_card_number = $request->p2_card_number != null ? $request->p2_card_number : "unknown1";
        $kids_card_number = $request->kids_card_number != null ? $request->kids_card_number : "unknown2";

        if($p1_card_number != $p2_card_number
            && $p1_card_number != $kids_card_number
            && $p2_card_number != $kids_card_number)
        {
            $models = Racer::where('p1_card_number', $p1_card_number)
                            ->orWhere('p2_card_number', $p2_card_number)
                            ->orWhere('kids_card_number', $kids_card_number)
                            ->get();

            if(count($models) > 0)
            {
                $message = "";

                foreach ($models as $model)
                {
                    if($model->p1_card_number == $p1_card_number && strrpos($message, $p1_card_number) == false)
                        $message .= "证件号码: ".$p1_card_number." 已报名, " + $model->pay_status;

                    if($model->p2_card_number == $p2_card_number && strrpos($message, $p2_card_number) == false)
                    {
                        $message .= ($message == "" ? "": ", ")."证件号码: ".$p2_card_number." 已报名, " + $model->pay_status;;
                    }

                    if($model->kids_card_number == $kids_card_number && strrpos($message, $kids_card_number) == false)
                    {
                        $message .= ($message == "" ? "": ", ")."证件号码: ".$kids_card_number." 已报名, " + $model->pay_status;;;
                    }
                }

                return $message;

            }else
                return null;
        }else
        {
            $message = "";


            if($p1_card_number == $p2_card_number)
                $message .= "提交报名信息中, 成年参赛者(证件号码: ".$p1_card_number.") 与 成年参赛者2(证件号码: ".$p2_card_number.") 的证件号码相同!";
            if($p1_card_number == $kids_card_number)
                $message .= "提交报名信息中, 成年参赛者(证件号码: ".$p1_card_number.") 与 未成年参赛者(证件号码: ".$kids_card_number.") 的证件号码相同!";
            if($p2_card_number == $kids_card_number)
                $message .= "提交报名信息中, 成年参赛者2(证件号码: ".$p1_card_number.") 与 未成年参赛者(证件号码: ".$kids_card_number.") 的证件号码相同!";

            if($p1_card_number == $p2_card_number
                && $p1_card_number ==  $kids_card_number
                    && $p2_card_number == $kids_card_number)
            {
                $message = "提交报名信息中, 成年参赛者(证件号码: ".$p1_card_number.") 与 成年参赛者2(证件号码: ".$p2_card_number.") 与 未成年参赛者(证件号码: ".$p2_card_number.") 的证件号码相同!";
            }

            return $message;
        }
    }

    public function getByCardNumber($card_number)
    {
        $model = Racer::orWhere('p1_card_number', $card_number)
            ->orWhere('p2_card_number', $card_number)
            ->orWhere('kids_card_number', $card_number)
            ->get();

        return json_encode($model);
    }
    
}
