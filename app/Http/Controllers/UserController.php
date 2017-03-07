<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
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
        $isRepeatData = $this->checkRepeatCardNumber($request);

        if(!isset($isRepeatData)) {
            $model = new User;

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
            $model->grouptype = $request->grouptype; // 0:5km, 1:10km, 2:family
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

//            // payment
//            $model->pay_status = $request->pay_status;
//            $model->transaction_id = $request->transaction_id;
//            $model->transaction_date = $request->transaction_date;
//
//            // race result
//            $model->p1_race_number = $request->p1_race_number;
//            $model->p2_race_number = $request->p2_race_number;
//            $model->kids_race_number = $request->kids_race_number;
//            $model->race_time = $request->race_time;


            if ($model->save())
            {
                $this->updateStock($request);
                return json_encode(["rs" => "success"]);
            }
            else
                return json_encode(["rs" => "fail"]);
        }else
            return json_encode(["rs" => $isRepeatData]);
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
            $models = User::where('p1_card_number', $p1_card_number)
                            ->orWhere('p2_card_number', $p2_card_number)
                            ->orWhere('kids_card_number', $kids_card_number)
                            ->get();

            if(count($models) > 0)
            {
                $message = "";

                foreach ($models as $model)
                {
                    if($model->p1_card_number == $p1_card_number && strrpos($message, $p1_card_number) == false)
                        $message .= "成年参赛者(证件号码: ".$p1_card_number."), 已存在相同证件号码的参赛者!";

                    if($model->p2_card_number == $p2_card_number && strrpos($message, $p2_card_number) == false)
                    {
                        $message .= ($message == "" ? "": ", ")."成年参赛者2(证件号码: ".$p2_card_number."), 已存在相同证件号码的参赛者!";
                    }

                    if($model->kids_card_number == $kids_card_number && strrpos($message, $kids_card_number) == false)
                    {
                        $message .= ($message == "" ? "": ", ")."未成年参赛者(证件号码: ".$kids_card_number."), 已存在相同证件号码的参赛者!";
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
        $model = User::where('p1_card_type', $card_number)
            ->orWhere('p2_card_number', $card_number)
            ->orWhere('kids_card_number', $card_number)
            ->get();

        return json_encode($model);
    }

    protected function updateStock(Request $request)
    {
        $grouptype = $request->grouptype;
        $p1_teesize = $request->p1_teesize;
        $p2_teesize = $request->p2_teesize;
        $kids_teesize = $request->kids_teesize;

        $model = Stock::first();

        if(isset($model))
        {
            // group type
            switch($grouptype)
            {
                case "5km":
                case "10km":
                    $model->group_type_single -= 1;
                    break;
                case "family":
                    $model->group_type_family -= 1;
                    break;
            }

            if($grouptype == "family")
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
        }

        $model->save();
    }
}
