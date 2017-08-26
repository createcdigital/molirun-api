<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example Code</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <!-- highlight.js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
</head>
<body>

<h1>Api example code:</h1>

<pre>
    <code class="js">
        &lt;script&gt;
        // ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(5km)
        var fivekm_user = {};
        fivekm_user.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        fivekm_user.nickname = "coton_chen";
        fivekm_user.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        fivekm_user.sex = "1";
        fivekm_user.city = "静安";
        fivekm_user.country = "中国";
        fivekm_user.province = "上海";
        fivekm_user.subscribe_time = "";

        // form
        fivekm_user.grouptype = "5km"; // ("5km", "10km", "family")
        fivekm_user.p1_tag = "#极限运动";

        // p1
        fivekm_user.p1_name = "中文姓名";
        fivekm_user.p1_sex = "男"; //("男", "女")
        fivekm_user.p1_birthday = "1991-01-09";
        fivekm_user.p1_teesize = "M(170/88A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        fivekm_user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        fivekm_user.p1_card_number = "2806821991010900044";
        fivekm_user.p1_phone = "13564137185";

        fivekm_user.p1_emergency_name = "紧急联系人";
        fivekm_user.p1_emergency_phone = "13564137186";

        // p2
        fivekm_user.p2_name = "";
        fivekm_user.p2_sex = ""; //("男", "女")
        fivekm_user.p2_birthday = "";
        fivekm_user.p2_teesize = ""; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        fivekm_user.p2_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        fivekm_user.p2_card_number = "";
        fivekm_user.p2_phone = "";

        fivekm_user.p2_emergency_name = "";
        fivekm_user.p2_emergency_phone = "";

        // kids
        fivekm_user.kids_name = "";
        fivekm_user.kids_sex = ""; //("男", "女")
        fivekm_user.kids_birthday = "";
        fivekm_user.kids_teesize = ""; //("110以下"), "110-130")

        fivekm_user.kids_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        fivekm_user.kids_card_number = "";
        fivekm_user.kids_guardian_name = "";
        fivekm_user.kids_guardian_phone = "";

        fivekm_user.kids_emergency_name = "";
        fivekm_user.kids_emergency_phone = "";

        // package
        fivekm_user.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        fivekm_user.pakcage_get_name = "成人参赛者姓名";
        fivekm_user.pakcage_get_phone = "13564137185";
        fivekm_user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        fivekm_user.out_trade_no = md5(fivekm_user.p1_card_number + fivekm_user.p2_card_number + fivekm_user.kids_card_number); // md5(fivekm_user.p1_card_number + fivekm_user.p2_card_number + fivekm_user.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
        //        fivekm_user.pay_status = "";
        //        fivekm_user.transaction_id = "";
        //        fivekm_user.transaction_date = "";
        //
        //        // race result
        //        fivekm_user.p1_race_number = "";
        //        fivekm_user.p2_race_number = "";
        //        fivekm_user.kids_race_number = "";
        //        fivekm_user.race_time = "";

        // action
        fivekm_user.action = "add"; // ("add", "update")

        $.post('/user/add', fivekm_user, function(data){
        var data = typeof data == "object" ? data : JSON.parse(data);
        console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(5km)");
        console.log(data.rs);
        });





        //  ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(亲子跑)
        var user = {};
        user.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        user.nickname = "coton_chen";
        user.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        user.sex = "1";
        user.city = "静安";
        user.country = "中国";
        user.province = "上海";
        user.subscribe_time = "";

        // form
        user.grouptype = "亲子跑"; // ("5km", "10km", "family")
        user.p1_tag = "#极限运动";

        // p1
        user.p1_name = "成人参赛者姓名";
        user.p1_sex = "男"; //("男", "女")
        user.p1_birthday = "1991-01-09";
        user.p1_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.p1_card_number = "2806821991010900024";
        user.p1_phone = "13564137185";

        user.p1_emergency_name = "紧急联系人";
        user.p1_emergency_phone = "13564137186";

        // p2
        user.p2_name = "成人参赛者2姓名";
        user.p2_sex = "女"; //("男", "女")
        user.p2_birthday = "1991-01-11";
        user.p2_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        user.p2_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.p2_card_number = "2806821991010900025";
        user.p2_phone = "13816954340";

        user.p2_emergency_name = "紧急联系人";
        user.p2_emergency_phone = "13564137187";

        // kids
        user.kids_name = "未成年参赛者姓名";
        user.kids_sex = "女"; //("男", "女")
        user.kids_birthday = "2000-01-11";
        user.kids_teesize = "110以下"; //("110以下"), "110-130")

        user.kids_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.kids_card_number = "2806821991010900026";
        user.kids_guardian_name = "法定监护人姓名";
        user.kids_guardian_phone = "13564137188";

        user.kids_emergency_name = "紧急联系人";
        user.kids_emergency_phone = "13564137189";

        // package
        user.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        user.pakcage_get_name = "成人参赛者姓名";
        user.pakcage_get_phone = "13564137185";
        user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        user.out_trade_no = md5(user.p1_card_number + user.p2_card_number + user.kids_card_number); // md5(user.p1_card_number + user.p2_card_number + user.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
        //        user.pay_status = "";
        //        user.transaction_id = "";
        //        user.transaction_date = "";
        //
        //        // race result
        //        user.p1_race_number = "";
        //        user.p2_race_number = "";
        //        user.kids_race_number = "";
        //        user.race_time = "";

        // action
        user.action = "add"; // ("add", "update")

        $.post('/user/add', user, function(data){
        var data = typeof data == "object" ? data : JSON.parse(data);
        console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(亲子跑)");
        console.log(data.rs);
        }, "JSON");






        //  ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作
        var update_user = {};
        update_user.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        update_user.nickname = "coton_chen";
        update_user.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        update_user.sex = "1";
        update_user.city = "静安";
        update_user.country = "中国";
        update_user.province = "上海";
        update_user.subscribe_time = "";

        // form
        update_user.grouptype = "5km"; // ("5km", "10km", "family")
        update_user.p1_tag = "#极限运动";

        // p1
        update_user.p1_name = "更新的名字2";
        update_user.p1_sex = "男"; //("男", "女")
        update_user.p1_birthday = "1991-01-09";
        update_user.p1_teesize = "M(170/88A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_user.p1_card_number = "2806821991010900044";
        update_user.p1_phone = "13564137185";

        update_user.p1_emergency_name = "紧急联系人";
        update_user.p1_emergency_phone = "13564137186";

        // p2
        update_user.p2_name = "";
        update_user.p2_sex = ""; //("男", "女")
        update_user.p2_birthday = "";
        update_user.p2_teesize = ""; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_user.p2_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_user.p2_card_number = "";
        update_user.p2_phone = "";

        update_user.p2_emergency_name = "";
        update_user.p2_emergency_phone = "";

        // kids
        update_user.kids_name = "";
        update_user.kids_sex = ""; //("男", "女")
        update_user.kids_birthday = "";
        update_user.kids_teesize = ""; //("110以下"), "110-130")

        update_user.kids_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_user.kids_card_number = "";
        update_user.kids_guardian_name = "";
        update_user.kids_guardian_phone = "";

        update_user.kids_emergency_name = "";
        update_user.kids_emergency_phone = "";

        // package
        update_user.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        update_user.pakcage_get_name = "成人参赛者姓名";
        update_user.pakcage_get_phone = "13564137185";
        update_user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        update_user.out_trade_no = md5(update_user.p1_card_number + update_user.p2_card_number + update_user.kids_card_number); // md5(update_user.p1_card_number + update_user.p2_card_number + update_user.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
        //        update_user.pay_status = "";
        //        update_user.transaction_id = "";
        //        update_user.transaction_date = "";
        //
        //        // race result
        //        update_user.p1_race_number = "";
        //        update_user.p2_race_number = "";
        //        update_user.kids_race_number = "";
        //        update_user.race_time = "";

        // action
        update_user.action = "update"; // ("add", "update")

        $.post('/user/add', update_user, function(data){
        var data = typeof data == "object" ? data : JSON.parse(data);
        console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作");
        console.log(data.rs);
        });





        //  ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作(亲子跑)
        var update_faimly = {};
        update_faimly.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        update_faimly.nickname = "coton_chen";
        update_faimly.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        update_faimly.sex = "1";
        update_faimly.city = "静安";
        update_faimly.country = "中国";
        update_faimly.province = "上海";
        update_faimly.subscribe_time = "";

        // form
        update_faimly.grouptype = "亲子跑"; // ("5km", "10km", "family")
        update_faimly.p1_tag = "#极限运动";

        // p1
        update_faimly.p1_name = "成人更新姓名";
        update_faimly.p1_sex = "男"; //("男", "女")
        update_faimly.p1_birthday = "1991-01-09";
        update_faimly.p1_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_faimly.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_faimly.p1_card_number = "2806821991010900024";
        update_faimly.p1_phone = "13564137185";

        update_faimly.p1_emergency_name = "紧急联系人";
        update_faimly.p1_emergency_phone = "13564137186";

        // p2
        update_faimly.p2_name = "成人参赛者2更新姓名";
        update_faimly.p2_sex = "女"; //("男", "女")
        update_faimly.p2_birthday = "1991-01-11";
        update_faimly.p2_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_faimly.p2_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_faimly.p2_card_number = "2806821991010900025";
        update_faimly.p2_phone = "13816954340";

        update_faimly.p2_emergency_name = "紧急联系人";
        update_faimly.p2_emergency_phone = "13564137187";

        // kids
        update_faimly.kids_name = "未成年参赛者更新姓名";
        update_faimly.kids_sex = "女"; //("男", "女")
        update_faimly.kids_birthday = "2000-01-11";
        update_faimly.kids_teesize = "110以下"; //("110以下"), "110-130")

        update_faimly.kids_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_faimly.kids_card_number = "2806821991010900026";
        update_faimly.kids_guardian_name = "法定监护人姓名";
        update_faimly.kids_guardian_phone = "13564137188";

        update_faimly.kids_emergency_name = "紧急联系人";
        update_faimly.kids_emergency_phone = "13564137189";

        // package
        update_faimly.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        update_faimly.pakcage_get_name = "成人参赛者姓名";
        update_faimly.pakcage_get_phone = "13564137185";
        update_faimly.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        update_faimly.out_trade_no = md5(update_faimly.p1_card_number + update_faimly.p2_card_number + update_faimly.kids_card_number); // md5(update_faimly.p1_card_number + update_faimly.p2_card_number + update_faimly.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
        //        update_faimly.pay_status = "";
        //        update_faimly.transaction_id = "";
        //        update_faimly.transaction_date = "";
        //
        //        // race result
        //        update_faimly.p1_race_number = "";
        //        update_faimly.p2_race_number = "";
        //        update_faimly.kids_race_number = "";
        //        update_faimly.race_time = "";

        // action
        update_faimly.action = "update"; // ("update", "update")

        $.post('/user/add', update_faimly, function(data){
        var data = typeof data == "object" ? data : JSON.parse(data);
        console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作(亲子跑)");
        console.log(data.rs);
        }, "JSON");




        //  ===============================接口:查询参赛信息
        var card_number = "2806821991010900024"; // 如果是亲子跑，输入家庭中任意一个人的证件号码均可
        $.getJSON('/user/id/' + card_number, function(data){
        var data = typeof data == "object" ? data : JSON.parse(data);
        console.log("=========接口:查询参赛信息");
        if(data.length > 0)
        console.log(data[0]);
        });





        //  ===============================接口:查询库存信息
        $.getJSON('/stock/get', function(data){
        var data = typeof data == "object" ? data : JSON.parse(data);
        console.log("=========接口:查询库存信息");
        if(data.length > 0)
        console.log(data[0]);
        });







        //  ===============================支付回调接口
        var notify = {"appid":"wxc6d26827fed8ccc6",
        "attach":"100\u5143\u4e00\u822c\u8dd1",
        "bank_type":"CFT",
        "cash_fee":"1",
        "device_info":"WEB",
        "fee_type":"CNY",
        "is_subscribe":"Y",
        "mch_id":"1315072801",
        "nonce_str":"nhm4039bbl1tye3ph24qe5o9p2d3yboj",
        "openid":"onlckwtzdvnbeVhpTDJ7C-J103bc",
        "out_trade_no":"5d8e051a08816761979999b12a48b030",
        "result_code":"SUCCESS",
        "return_code":"SUCCESS",
        "sign":"CE223801CEEB186A43C76FEE613B464A",
        "time_end":"20170322193126",
        "total_fee":"1",
        "trade_type":"JSAPI",
        "transaction_id":"4008672001201703224280767558"
        };
        $.post('/wxpay/callback', notify, function(data){
        var data = typeof data == "object" ? data : JSON.parse(data);
        console.log("=========接口:支付回调接口");
        console.log(data.rs);
        }, "JSON");
        &lt;/script&gt;
    </code>
</pre>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- highlight.js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
<!-- md5.js -->
<script src="//blueimp.github.io/JavaScript-MD5/js/md5.min.js"></script>

<script>
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });

        // ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(5km)
        var fivekm_user = {};
        fivekm_user.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        fivekm_user.nickname = "coton_chen";
        fivekm_user.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        fivekm_user.sex = "1";
        fivekm_user.city = "静安";
        fivekm_user.country = "中国";
        fivekm_user.province = "上海";
        fivekm_user.subscribe_time = "";

        // form
        fivekm_user.grouptype = "5km"; // ("5km", "10km", "family")
        fivekm_user.p1_tag = "#极限运动";

        // p1
        fivekm_user.p1_name = "中文姓名";
        fivekm_user.p1_sex = "男"; //("男", "女")
        fivekm_user.p1_birthday = "1991-01-09";
        fivekm_user.p1_teesize = "M(170/88A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        fivekm_user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        fivekm_user.p1_card_number = "2806821991010900044";
        fivekm_user.p1_phone = "13564137185";

        fivekm_user.p1_emergency_name = "紧急联系人";
        fivekm_user.p1_emergency_phone = "13564137186";

        // p2
        fivekm_user.p2_name = "";
        fivekm_user.p2_sex = ""; //("男", "女")
        fivekm_user.p2_birthday = "";
        fivekm_user.p2_teesize = ""; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        fivekm_user.p2_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        fivekm_user.p2_card_number = "";
        fivekm_user.p2_phone = "";

        fivekm_user.p2_emergency_name = "";
        fivekm_user.p2_emergency_phone = "";

        // kids
        fivekm_user.kids_name = "";
        fivekm_user.kids_sex = ""; //("男", "女")
        fivekm_user.kids_birthday = "";
        fivekm_user.kids_teesize = ""; //("110以下"), "110-130")

        fivekm_user.kids_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        fivekm_user.kids_card_number = "";
        fivekm_user.kids_guardian_name = "";
        fivekm_user.kids_guardian_phone = "";

        fivekm_user.kids_emergency_name = "";
        fivekm_user.kids_emergency_phone = "";

        // package
        fivekm_user.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        fivekm_user.pakcage_get_name = "成人参赛者姓名";
        fivekm_user.pakcage_get_phone = "13564137185";
        fivekm_user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        fivekm_user.out_trade_no = md5(fivekm_user.p1_card_number + fivekm_user.p2_card_number + fivekm_user.kids_card_number); // md5(fivekm_user.p1_card_number + fivekm_user.p2_card_number + fivekm_user.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
//        fivekm_user.pay_status = "";
//        fivekm_user.transaction_id = "";
//        fivekm_user.transaction_date = "";
//
//        // race result
//        fivekm_user.p1_race_number = "";
//        fivekm_user.p2_race_number = "";
//        fivekm_user.kids_race_number = "";
//        fivekm_user.race_time = "";

        // action
        fivekm_user.action = "add"; // ("add", "update")

        $.post('/user/add', fivekm_user, function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(5km)");
            console.log(data.rs);
        });





        //  ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(亲子跑)
        var user = {};
        user.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        user.nickname = "coton_chen";
        user.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        user.sex = "1";
        user.city = "静安";
        user.country = "中国";
        user.province = "上海";
        user.subscribe_time = "";

        // form
        user.grouptype = "亲子跑"; // ("5km", "10km", "family")
        user.p1_tag = "#极限运动";

        // p1
        user.p1_name = "成人参赛者姓名";
        user.p1_sex = "男"; //("男", "女")
        user.p1_birthday = "1991-01-09";
        user.p1_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.p1_card_number = "2806821991010900024";
        user.p1_phone = "13564137185";

        user.p1_emergency_name = "紧急联系人";
        user.p1_emergency_phone = "13564137186";

        // p2
        user.p2_name = "成人参赛者2姓名";
        user.p2_sex = "女"; //("男", "女")
        user.p2_birthday = "1991-01-11";
        user.p2_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        user.p2_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.p2_card_number = "2806821991010900025";
        user.p2_phone = "13816954340";

        user.p2_emergency_name = "紧急联系人";
        user.p2_emergency_phone = "13564137187";

        // kids
        user.kids_name = "未成年参赛者姓名";
        user.kids_sex = "女"; //("男", "女")
        user.kids_birthday = "2000-01-11";
        user.kids_teesize = "110以下"; //("110以下"), "110-130")

        user.kids_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.kids_card_number = "2806821991010900026";
        user.kids_guardian_name = "法定监护人姓名";
        user.kids_guardian_phone = "13564137188";

        user.kids_emergency_name = "紧急联系人";
        user.kids_emergency_phone = "13564137189";

        // package
        user.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        user.pakcage_get_name = "成人参赛者姓名";
        user.pakcage_get_phone = "13564137185";
        user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        user.out_trade_no = md5(user.p1_card_number + user.p2_card_number + user.kids_card_number); // md5(user.p1_card_number + user.p2_card_number + user.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
//        user.pay_status = "";
//        user.transaction_id = "";
//        user.transaction_date = "";
//
//        // race result
//        user.p1_race_number = "";
//        user.p2_race_number = "";
//        user.kids_race_number = "";
//        user.race_time = "";

        // action
        user.action = "add"; // ("add", "update")

        $.post('/user/add', user, function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 新增操作(亲子跑)");
            console.log(data.rs);
        }, "JSON");






        //  ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作
        var update_user = {};
        update_user.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        update_user.nickname = "coton_chen";
        update_user.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        update_user.sex = "1";
        update_user.city = "静安";
        update_user.country = "中国";
        update_user.province = "上海";
        update_user.subscribe_time = "";

        // form
        update_user.grouptype = "5km"; // ("5km", "10km", "family")
        update_user.p1_tag = "#极限运动";

        // p1
        update_user.p1_name = "更新的名字2";
        update_user.p1_sex = "男"; //("男", "女")
        update_user.p1_birthday = "1991-01-09";
        update_user.p1_teesize = "M(170/88A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_user.p1_card_number = "2806821991010900044";
        update_user.p1_phone = "13564137185";

        update_user.p1_emergency_name = "紧急联系人";
        update_user.p1_emergency_phone = "13564137186";

        // p2
        update_user.p2_name = "";
        update_user.p2_sex = ""; //("男", "女")
        update_user.p2_birthday = "";
        update_user.p2_teesize = ""; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_user.p2_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_user.p2_card_number = "";
        update_user.p2_phone = "";

        update_user.p2_emergency_name = "";
        update_user.p2_emergency_phone = "";

        // kids
        update_user.kids_name = "";
        update_user.kids_sex = ""; //("男", "女")
        update_user.kids_birthday = "";
        update_user.kids_teesize = ""; //("110以下"), "110-130")

        update_user.kids_card_type = ""; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_user.kids_card_number = "";
        update_user.kids_guardian_name = "";
        update_user.kids_guardian_phone = "";

        update_user.kids_emergency_name = "";
        update_user.kids_emergency_phone = "";

        // package
        update_user.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        update_user.pakcage_get_name = "成人参赛者姓名";
        update_user.pakcage_get_phone = "13564137185";
        update_user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        update_user.out_trade_no = md5(update_user.p1_card_number + update_user.p2_card_number + update_user.kids_card_number); // md5(update_user.p1_card_number + update_user.p2_card_number + update_user.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
//        update_user.pay_status = "";
//        update_user.transaction_id = "";
//        update_user.transaction_date = "";
//
//        // race result
//        update_user.p1_race_number = "";
//        update_user.p2_race_number = "";
//        update_user.kids_race_number = "";
//        update_user.race_time = "";

        // action
        update_user.action = "update"; // ("add", "update")

        $.post('/user/add', update_user, function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作");
            console.log(data.rs);
        });





        //  ===============================接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作(亲子跑)
        var update_faimly = {};
        update_faimly.openid = "onlckwtzdvnbeVhpTDJ7C-J103bc";
        update_faimly.nickname = "coton_chen";
        update_faimly.headimgurl = "http://wx.qlogo.cn/mmopen/ajNVdqHZLLAl8Csrib0RvAPsK0YwMOouWuDShovxNhP70BJVTzed0CQsUicYxHwgjbfiaoqTtScPwZVXqr1KEWn1A/0";
        update_faimly.sex = "1";
        update_faimly.city = "静安";
        update_faimly.country = "中国";
        update_faimly.province = "上海";
        update_faimly.subscribe_time = "";

        // form
        update_faimly.grouptype = "亲子跑"; // ("5km", "10km", "family")
        update_faimly.p1_tag = "#极限运动";

        // p1
        update_faimly.p1_name = "成人更新姓名";
        update_faimly.p1_sex = "男"; //("男", "女")
        update_faimly.p1_birthday = "1991-01-09";
        update_faimly.p1_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_faimly.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_faimly.p1_card_number = "2806821991010900024";
        update_faimly.p1_phone = "13564137185";

        update_faimly.p1_emergency_name = "紧急联系人";
        update_faimly.p1_emergency_phone = "13564137186";

        // p2
        update_faimly.p2_name = "成人参赛者2更新姓名";
        update_faimly.p2_sex = "女"; //("男", "女")
        update_faimly.p2_birthday = "1991-01-11";
        update_faimly.p2_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        update_faimly.p2_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_faimly.p2_card_number = "2806821991010900025";
        update_faimly.p2_phone = "13816954340";

        update_faimly.p2_emergency_name = "紧急联系人";
        update_faimly.p2_emergency_phone = "13564137187";

        // kids
        update_faimly.kids_name = "未成年参赛者更新姓名";
        update_faimly.kids_sex = "女"; //("男", "女")
        update_faimly.kids_birthday = "2000-01-11";
        update_faimly.kids_teesize = "110以下"; //("110以下"), "110-130")

        update_faimly.kids_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        update_faimly.kids_card_number = "2806821991010900026";
        update_faimly.kids_guardian_name = "法定监护人姓名";
        update_faimly.kids_guardian_phone = "13564137188";

        update_faimly.kids_emergency_name = "紧急联系人";
        update_faimly.kids_emergency_phone = "13564137189";

        // package
        update_faimly.pakcage_get_way = "顺丰到付";//("顺丰到付"), "现场领取")
        update_faimly.pakcage_get_name = "成人参赛者姓名";
        update_faimly.pakcage_get_phone = "13564137185";
        update_faimly.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        // payment
        update_faimly.out_trade_no = md5(update_faimly.p1_card_number + update_faimly.p2_card_number + update_faimly.kids_card_number); // md5(update_faimly.p1_card_number + update_faimly.p2_card_number + update_faimly.kids_card_number), see:https://github.com/blueimp/JavaScript-MD5
//        update_faimly.pay_status = "";
//        update_faimly.transaction_id = "";
//        update_faimly.transaction_date = "";
//
//        // race result
//        update_faimly.p1_race_number = "";
//        update_faimly.p2_race_number = "";
//        update_faimly.kids_race_number = "";
//        update_faimly.race_time = "";

        // action
        update_faimly.action = "update"; // ("update", "update")

        $.post('/user/add', update_faimly, function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:新增参赛信息(接收到微信成功付款后自动更新库存) 更新操作(亲子跑)");
            console.log(data.rs);
        }, "JSON");




        //  ===============================接口:查询参赛信息
        var card_number = "2806821991010900024"; // 如果是亲子跑，输入家庭中任意一个人的证件号码均可
        $.getJSON('/user/id/' + card_number, function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:查询参赛信息");
            if(data.length > 0)
                console.log(data[0]);
        });





        //  ===============================接口:查询库存信息
        $.getJSON('/stock/get', function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:查询库存信息");
            if(data.length > 0)
                console.log(data[0]);
        });







        //  ===============================支付回调接口
        var notify = {"appid":"wxc6d26827fed8ccc6",
                        "attach":"100\u5143\u4e00\u822c\u8dd1",
                        "bank_type":"CFT",
                        "cash_fee":"1",
                        "device_info":"WEB",
                        "fee_type":"CNY",
                        "is_subscribe":"Y",
                        "mch_id":"1315072801",
                        "nonce_str":"nhm4039bbl1tye3ph24qe5o9p2d3yboj",
                        "openid":"onlckwtzdvnbeVhpTDJ7C-J103bc",
                        "out_trade_no":"5d8e051a08816761979999b12a48b030",
                        "result_code":"SUCCESS",
                        "return_code":"SUCCESS",
                        "sign":"CE223801CEEB186A43C76FEE613B464A",
                        "time_end":"20170322193126",
                        "total_fee":"1",
                        "trade_type":"JSAPI",
                        "transaction_id":"4008672001201703224280767558"
                    };
        $.post('/wxpay/callback', notify, function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:支付回调接口");
            console.log(data.rs);
        }, "JSON");







        //  ==============================邀请码验证接口
        var coupon_code = "CN2002001";
        $.getJSON('/coupon/verify/' + coupon_code, function(data){
            var data = typeof data == "object" ? data : JSON.parse(data);
            console.log("=========接口:邀请码验证接口");
            if(data.length > 0)
                console.log(data[0]);
            else
                console.log("邀请码无效");
        });

    });
</script>
</body>
</html>