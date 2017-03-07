<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example Code</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- highlight.js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
</head>
<body>

<h1>Api example code:</h1>

<pre>
    <code class="js">
        &lt;script&gt;
        // 接口:新增参赛信息(自动更新库存)
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
        user.grouptype = "2"; // ("5km", "10km", "family)
        user.p1_tag = "#极限运动";

        // p1
        user.p1_name = "成人参赛者姓名";
        user.p1_sex = "男"; //("男", "女")
        user.p1_birthday = "1991-01-09";
        user.p1_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.p1_card_number = "280682199101090015";
        user.p1_phone = "13564137185";

        user.p1_emergency_name = "紧急联系人";
        user.p1_emergency_phone = "13564137186";

        // p2
        user.p2_name = "成人参赛者2姓名";
        user.p2_sex = "女";
        user.p2_birthday = "1991-01-11";
        user.p2_teesize = "L(175/92A)";

        user.p2_card_type = "身份证";
        user.p2_card_number = "280682199101090022";
        user.p2_phone = "13816954340";

        user.p2_emergency_name = "紧急联系人";
        user.p2_emergency_phone = "13564137187";

        // kids
        user.kids_name = "未成年参赛者姓名";
        user.kids_sex = "女";
        user.kids_birthday = "2000-01-11";
        user.kids_teesize = "110以下";

        user.kids_card_type = "身份证";
        user.kids_card_number = "280682199101090023";
        user.kids_guardian_name = "法定监护人姓名";
        user.kids_guardian_phone = "13564137188";

        user.kids_emergency_name = "紧急联系人";
        user.kids_emergency_phone = "13564137189";

        // package
        user.pakcage_get_way = "顺丰到付";
        user.pakcage_get_name = "成人参赛者姓名";
        user.pakcage_get_phone = "13564137185";
        user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

        //        // payment
        //        user.pay_status = "";
        //        user.transaction_id = "";
        //        user.transaction_date = "";
        //
        //        // race result
        //        user.p1_race_number = "";
        //        user.p2_race_number = "";
        //        user.kids_race_number = "";
        //        user.race_time = "";

        $.post('http://molirun.api.createcdigital.com/user/add', user, function(data){
            console.log(data.rs);
        }, "JSON");




        // 接口:查询参赛信息
        var card_number = "280682199101090016";
        $.getJSON('http://molirun.api.createcdigital.com/user/id/' + card_number, function(data){
            console.log(data[0]);
        });



        // 接口:查询库存信息
        $.getJSON('http://molirun.api.createcdigital.com/stock/get', function(data){
            console.log(data[0]);
        });
        &lt;/script&gt;
    </code>
</pre>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- highlight.js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
<script>
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });

        // 接口:新增参赛信息(自动更新库存)
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
        user.grouptype = "2"; // ("5km", "10km", "family)
        user.p1_tag = "#极限运动";

        // p1
        user.p1_name = "成人参赛者姓名";
        user.p1_sex = "男"; //("男", "女")
        user.p1_birthday = "1991-01-09";
        user.p1_teesize = "L(175/92A)"; //("XS(160/82A)", "S(165/84A)", "M(170/88A)", "L(175/92A)", "XL(180/96A)", "XLL(185/100A)")

        user.p1_card_type = "身份证"; // ("身份证", "护照", "港澳通行证", "台胞证")
        user.p1_card_number = "280682199101090015";
        user.p1_phone = "13564137185";

        user.p1_emergency_name = "紧急联系人";
        user.p1_emergency_phone = "13564137186";

        // p2
        user.p2_name = "成人参赛者2姓名";
        user.p2_sex = "女";
        user.p2_birthday = "1991-01-11";
        user.p2_teesize = "L(175/92A)";

        user.p2_card_type = "身份证";
        user.p2_card_number = "280682199101090022";
        user.p2_phone = "13816954340";

        user.p2_emergency_name = "紧急联系人";
        user.p2_emergency_phone = "13564137187";

        // kids
        user.kids_name = "未成年参赛者姓名";
        user.kids_sex = "女";
        user.kids_birthday = "2000-01-11";
        user.kids_teesize = "110以下";

        user.kids_card_type = "身份证";
        user.kids_card_number = "280682199101090023";
        user.kids_guardian_name = "法定监护人姓名";
        user.kids_guardian_phone = "13564137188";

        user.kids_emergency_name = "紧急联系人";
        user.kids_emergency_phone = "13564137189";

        // package
        user.pakcage_get_way = "顺丰到付";
        user.pakcage_get_name = "成人参赛者姓名";
        user.pakcage_get_phone = "13564137185";
        user.pakcage_get_address = "上海市静安区江宁路631号6号楼203室";

//        // payment
//        user.pay_status = "";
//        user.transaction_id = "";
//        user.transaction_date = "";
//
//        // race result
//        user.p1_race_number = "";
//        user.p2_race_number = "";
//        user.kids_race_number = "";
//        user.race_time = "";

        $.post('/user/add', user, function(data){
            console.log(data.rs);
        }, "JSON");




        // 接口:查询参赛信息
        var card_number = "280682199101090016";
        $.getJSON('/user/id/' + card_number, function(data){
            console.log(data[0]);
        });



        // 接口:查询库存信息
        $.getJSON('/stock/get', function(data){
            console.log(data[0]);
        });
    });
</script>
</body>
</html>