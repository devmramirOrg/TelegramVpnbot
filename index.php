<?php

// Telegram Channel : @AlaCode

// ------- Telegram -------
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
    ];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok=false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    if(!$ok){
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec){
    $ok=true;
    }}}
    if(!$ok){
    exit(header("location: https://coffemizban.com"));
    }

error_reporting(0);
// ------- include -------
include("config.php");
$date = date('Y/m/d');
// ------- Telegram -------
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$text = $update->message->text;
$first = $update->message->from->first_name;
$message_id = $update->message->message_id;
$captio = $update->message->caption;
$video = $update->message->video;
$file_id = $update->message->video->file_id;
$photo = $update->message->photo;
$file_id1 = $photo[count($photo)-1]->file_id;
$document = $update->message->document;
$file_id2 = $update->message->document->file_id;
$phoneid = $update->message->contact->user_id;
}
if (isset($update->callback_query)){
$chat_id = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
}
function ran($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
// Anti Code
if($chat_id != $admin){
    if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
        if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | از ارسال کد مخرب خودداری کنید",
            'parse_mode'=>"HTML",
            ]);
        exit;
        }
    }

    if($text == "/start"){
    
        $sql    = "SELECT `id` FROM `users` WHERE `id`='$chat_id'";
        $result = mysqli_query($conn,$sql);
        
        $res = mysqli_fetch_assoc($result);
        
        if(!$res){
            $sql234    = "INSERT INTO `users` (`id`, `step`, `time`, `account`, `coin`, `serves`, `phone`, `ref`, `codeM`, `name`, `bez`, `test`) VALUES ($chat_id, 'none', '$date', 'user', '0', '0', '0', '0', 'none', '0', '0', 'no')";
            $result234 = mysqli_query($conn,$sql234);
        }
        }

        if($channel_bot !="on"){
            $forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$chanel&user_id=".$chat_id));
            $tch = $forchaneel->result->status;
            
                    if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
            
            bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"تست",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"🖥 کانال",'url'=>"https://t.me/$chanel?start"]],
            ]
            ])
            ]);
            exit();
            }}

            $sql_on_off    = "SELECT `bot` FROM `Settings`";
            $result_on_off = mysqli_query($conn,$sql_on_off);
            $res_on_off = mysqli_fetch_assoc($result_on_off);
            $trsrul_on_off  = $res_on_off['bot'];
            
            if($trsrul_on_off == "off" and $chat_id != $admin){
                
                bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ ربات از طرف مدیریت خاموش میباشد",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [['text'=>"🖥 کانال",'url'=>"https://t.me/$channel?start"]],
            ]
            ])
            ]);
            exit;
            }

            $account     = '👤 اکانت کاربری';
            $help        = '❓ رهنما';
            $wallet      = '🏦 کیف پول';
            $Condition   = '🌎 وضعیت سرورها';
            $inquiry     = '🎗 استعلام سریع';
            $creat       = '🛒 ساخت اکانت';
            $setingAC    = '🤖 مدیریت اکانت';
            $support     = '🖥 پشتیبانی';
    
            $reply_keyboard = [
                                    [$account] ,
                                    [$help , $wallet] ,
                                    [$Condition] ,
                                    [$support , $inquiry] ,
                                    [$creat , $setingAC] ,
            
                                  ];
    
                                  $reply_kb_options = [
                                    'keyboard'          => $reply_keyboard ,
                                    'resize_keyboard'   => true ,
                                    'one_time_keyboard' => false ,
                                ];
    
                                $key11          = '📊 امار ربات';
                                $key21          = '📨 پیام همگانی';
                                $key51          = '📨 فوروارد همگانی';
                                $sharjH         = '💳 شارژ همگانی';
                                $listN          = '📖 لیست نمایندگان';
                                $seting_S       = '⚙️ تنظمیات سرور ها';
                                $suppprt_result = '📮 پیام به کاربر';
                                $setingB        = '👤 مدیریت بسته ها';
                                $payA           = '👤 خرید های اخیر';
                                $offT           = '❌ خاموش کردن اکانت های تست';
                                $OnT            = '✅ فعال کردن اکانت های تست';
                                $setingGR       = '♻️ تنظیم قیمت ریست';
                                $SeenN          = '👀 مشاهده نماینده';
                                $creatCode      = '🪪 ساخت کد نمایندگی';
                                $onBot          = '✅ روشن کردن ربات';
                                $offBot         = '❌ خاموش کردن ربات';
                                $creatCodeH     = '🏷 ساخت کد هدیه';
                
                                $reply_keyboard_panel = [
                                                        [$key11] ,
                                                        [$key21 , $key51] ,
                                                        [$sharjH , $listN] ,
                                                        [$seting_S , $suppprt_result] ,
                                                        [$setingB , $payA] ,
                                                        [$offT , $OnT] ,
                                                        [$setingGR , $SeenN] ,
                                                        [$creatCode , $creatCodeH] ,
                                                        [$onBot , $offBot]
                                                        ];
                                 
                                    $reply_kb_options_panel = [
                                                                                                'keyboard'          => $reply_keyboard_panel ,
                                                                                                'resize_keyboard'   => true ,
                                                                                                'one_time_keyboard' => false ,
                                                                                            ];
    
                                                        $back = '◀️ بازگشت';
    
                                                                $reply_keyboard_back = [
                                                                                            [$back] ,
                                                                                            
                                                                                        ];
                                                                                             
    $reply_kb_options_back = [
                                                                                                'keyboard'          => $reply_keyboard_back ,
                                                                                                'resize_keyboard'   => true ,
                                                                                                'one_time_keyboard' => false ,
                                                                                            ];
                                                                                        
    $enterKey       = '🔑 ورود کد';
    $acuntTest      = '📍 اکانت تست';
                        
                                $reply_keyboard_seting = [
                                                        [$enterKey] ,
                                                        [$acuntTest , $support] ,
                                                      ];
                                                      
    $reply_kb_options_seting = [
                                                                                                'keyboard'          => $reply_keyboard_seting ,
                                                                                                'resize_keyboard'   => true ,
                                                                                                'one_time_keyboard' => false ,
                                                                                            ];
                                                      $adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `step` FROM `users` WHERE `id`=$from_id LIMIT 1"));
                                                      if($adminstep['step'] == "support" and $text != $back){
    
                                                        bot('sendMessage',[
                                                    'chat_id'=>$chat_id,
                                                    'text'=>"✅ پیام با موفقیت ارسال شد",
                                                    'parse_mode'=>"HTML",
                                                    ]);
                                                    
                                                    bot('sendMessage',[
                                                    'chat_id'=>$admin,
                                                    'text'=>"👨‍💻 سلام ادمین یک پیام برات امده 
                                                    
                                                    📝 متن پیام : $text
                                                    👤 ارسال کننده : $chat_id",
                                                    'parse_mode'=>"HTML",
                                                    ]);
                                                    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
                                                    }
                                                    if($adminstep['step'] == "suppprt_result" and $text != $back){
    
                                                        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
                                                        
                                                        $text_admin = explode(",",$text);
                                                        $user_id = $text_admin['0'];
                                                        $text_admin = $text_admin['1'];
                                                        
                                                        
                                                        bot('sendmessage',[
                                                    'chat_id'=>$user_id,
                                                    'text'=>"👨‍💻 یک پیام از طرف مدیریت براتون امد 
                                                    
                                                    📝 : $text_admin",
                                                    ]);
                                                    
                                                    bot('sendmessage',[
                                                    'chat_id'=>$chat_id,
                                                    'text'=>"✅ انجام شد",
                                                    'reply_markup'=>json_encode($reply_kb_options_panel),
                                                    ]);
                                                    }

if($adminstep['step'] == "enterKey" and $text != $back){

$sql23    = "SELECT `code` FROM `code` WHERE `code`='$text'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$code  = $res23['code'];

if($code != NULL){

    mysqli_query($conn,"UPDATE `users` SET `account`='Agent' WHERE id='$chat_id' LIMIT 1");
    mysqli_query($conn,"DELETE FROM code WHERE code='$text'");

    mysqli_query($conn,"UPDATE `users` SET `step`='enterKey2' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لطفا نام خود و نام فروشگاه خود را به صورت زیر بنویسید
name,shop

مثال : 
علی,وی پی ان",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}
}
if($adminstep['step'] == "enterKey2" and $text != $back){

    $text_admin = explode(",",$text);
    $nameU = $text_admin['0'];
    $shopU = $text_admin['1'];

    mysqli_query($conn,"UPDATE `users` SET `name`='$nameU' WHERE id='$chat_id' LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `bez`='$shopU' WHERE id='$chat_id' LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 با موفقیت وارد شدید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);
}
if($adminstep['step'] == "key_hmgani" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    bot('sendMessage',[
'chat_id'=>$row['id'],
'text'=>"$text",
'parse_mode'=>"HTML",
]);
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}

if($adminstep['step'] == "key_forvard" and $text != $back){
                                                        
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    bot('ForwardMessage',[
'chat_id'=>$row['id'],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
    }
 
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}


if($data == "offBot"){
    
    $sql2    = "SELECT `bot` FROM `Settings`";
    $result2 = mysqli_query($conn,$sql2);
    $res2 = mysqli_fetch_assoc($result2);
    $trsrul2  = $res2['bot'];
    
    if($trsrul2 == "on"){
        
        mysqli_query($conn,"UPDATE `Settings` SET `bot`='off'");
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
]);
    }
    else{
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ ربات از قبل خاموش میباشد",
'parse_mode'=>"HTML",
]);
    }
}

if($data == "onBot"){
    
    $sql2    = "SELECT `bot` FROM `Settings`";
    $result2 = mysqli_query($conn,$sql2);
    $res2 = mysqli_fetch_assoc($result2);
    $trsrul2  = $res2['bot'];
    
    if($trsrul2 == "off"){
        
        mysqli_query($conn,"UPDATE `Settings` SET `bot`='on'");
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
]);
    }
    else{
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ ربات ازقبل روشن میباشد",
'parse_mode'=>"HTML",
]);
    }
}

if($adminstep['step'] == "creatCode" and $text != $back){

    $sql2    = "INSERT INTO `code` (`code`) VALUES ('$text')";
    $result2 = mysqli_query($conn,$sql2);

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ - اضافه شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($data == "codeHedeh"){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🛍 کد هدیه را وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='codeHedeh' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "codeHedeh" and $text != $back){

    $sql2_a    = "SELECT `coin` FROM `codeH` WHERE `code`='$text'";
    $result2_a = mysqli_query($conn,$sql2_a);
    $res2_a = mysqli_fetch_assoc($result2_a);
    $trsrul2_a  = $res2_a['coin'];

    if($trsrul2_a != NULL){

    $sql2_a1    = "SELECT `coin` FROM `users` WHERE `id`='$chat_id'";
    $result2_a1 = mysqli_query($conn,$sql2_a1);
    $res2_a1 = mysqli_fetch_assoc($result2_a1);
    $trsrul2_a1  = $res2_a1['coin'];

    $coinC = $trsrul2_a1 + $trsrul2_a;

    mysqli_query($conn,"UPDATE `users` SET `coin`='$coinC' WHERE id='$chat_id' LIMIT 1");
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"✅ - کد با موفقیت انجام شد و مبلغ $trsrul2_a به حساب شما واریز شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);

        mysqli_query($conn,"DELETE FROM codeH WHERE code='$text'");
    }
    else{

        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"❌ - کد اشتباه میباشد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);
    }

}

if($adminstep['step'] == "creatCodeH" and $text != $back){

    $text_admin = explode(",",$text);
    $codeT = $text_admin['0'];
    $coinT = $text_admin['1'];

    $sql2    = "INSERT INTO `codeH` (`code`, `coin`) VALUES ('$codeT', '$coinT')";
    $result2 = mysqli_query($conn,$sql2);

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"✅ - اضافه شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);
    }

if($data == "serchID"){

    mysqli_query($conn,"UPDATE `users` SET `step`='serchID' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤 ایدی عددی را وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
    }

if($adminstep['step'] == "serchID" and $text != $back){

    $sql2_a1    = "SELECT id FROM users WHERE id='$text'";
    $result2_a1 = mysqli_query($conn,$sql2_a1);
    $res2_a1    = mysqli_fetch_assoc($result2_a1);
    $trsrul2_a1 = $res2_a1['id'];

    if($trsrul2_a1 != NULL){

    $sql2_a2    = "SELECT time FROM users WHERE id='$text'";
    $result2_a2 = mysqli_query($conn,$sql2_a2);
    $res2_a2    = mysqli_fetch_assoc($result2_a2);
    $trsrul2_a2 = $res2_a2['time'];

    $sql2_a3    = "SELECT name FROM users WHERE id='$text'";
    $result2_a3 = mysqli_query($conn,$sql2_a3);
    $res2_a3    = mysqli_fetch_assoc($result2_a3);
    $trsrul2_a3 = $res2_a3['name'];

    $sql2_a5    = "SELECT bez FROM users WHERE id='$text'";
    $result2_a5 = mysqli_query($conn,$sql2_a5);
    $res2_a5    = mysqli_fetch_assoc($result2_a5);
    $trsrul2_a5 = $res2_a5['bez'];

    $sql2_a4    = "SELECT coin FROM users WHERE id='$text'";
    $result2_a4 = mysqli_query($conn,$sql2_a4);
    $res2_a4    = mysqli_fetch_assoc($result2_a4);
    $trsrul2_a4 = $res2_a4['coin'];

    $sql2_a6    = "SELECT serves FROM users WHERE id='$text'";
    $result2_a6 = mysqli_query($conn,$sql2_a6);
    $res2_a6    = mysqli_fetch_assoc($result2_a6);
    $trsrul2_a6 = $res2_a6['serves'];

    $sql2_a7    = "SELECT account FROM users WHERE id='$text'";
    $result2_a7 = mysqli_query($conn,$sql2_a7);
    $res2_a7    = mysqli_fetch_assoc($result2_a7);
    $trsrul2_a7 = $res2_a7['account'];

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤 مشخصات کاربر شما : 

🆔 : $text

💰 موجودی : $trsrul2_a4
👤 نوع حساب : $trsrul2_a7
🛍 تعداد سرویس های خریداری شده : $trsrul2_a6
📅 تاریخ عضویت : $trsrul2_a2

👨‍🔧 نام ثبت شده : $trsrul2_a3
👨‍🔧 نام شرکت : $trsrul2_a5",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
                ['text'=>"➕ افزودن موجودی",'callback_data'=>"$text"],
            ],
            ]
            ])
            ]);

            bot('sendMessage',[
                'chat_id'=>$chat_id,
        'text'=>"👤 جستجو انجام شد",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options_panel),
                ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
    else{
        bot('sendMessage',[
            'chat_id'=>$chat_id,
    'text'=>"👤 کاربر مورد نظر وجود ندارد",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_panel),
            ]);
            mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
}

if($adminstep['step'] == "setingGR" and $text != $back){

    mysqli_query($conn,"UPDATE `coin` SET `reset`='$text' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤 انجام شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($data == "offT"){

    $sql2    = "SELECT `test` FROM `Settings`";
    $result2 = mysqli_query($conn,$sql2);
    $res2 = mysqli_fetch_assoc($result2);
    $trsrul2  = $res2['test'];
    
    if($trsrul2 == "on"){
        
        mysqli_query($conn,"UPDATE `Settings` SET `test`='off'");
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
]);
    }
    else{
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ خرید اکانت تست از قبل خاموش بوده است",
'parse_mode'=>"HTML",
]);
    }
}

if($data == "onT"){

    $sql2    = "SELECT `test` FROM `Settings`";
    $result2 = mysqli_query($conn,$sql2);
    $res2 = mysqli_fetch_assoc($result2);
    $trsrul2  = $res2['test'];
    
    if($trsrul2 == "off"){
        
        mysqli_query($conn,"UPDATE `Settings` SET `test`='on'");
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
]);
    }
    else{
        
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ خرید اکانت تست ازقبل روشن بوده است",
'parse_mode'=>"HTML",
]);
    }
}

if($data == "AddPanel"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 به بخش اضافه کردن پنل خوش امدید در این قسمت پنلتونو به ربات اد کنید برای ساخت اشتراک خودکار

👈 لطفا طبق دستور پایین بقیه کار را انجام دهید

ip,username,password,port

ip : ایپی سرور
username : یوزرنیم پنل
password : پسورد
port : پورت سرور",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='add_panel' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "add_panel" and $text != $back){
    
    $text_admin = explode(",",$text);
    $ip = $text_admin['0'];
    $user = $text_admin['1'];
    $passwS = $text_admin['2'];
    $port = $text_admin['3'];
    
    
    
        
    $sql256    = "SELECT * FROM `server` WHERE `ip`='$ip'";
    $result256 = mysqli_query($conn,$sql256);
    $res256 = mysqli_fetch_assoc($result256);
    $trsrul256  = $res256['ip'];
        
        if($trsrul256 == NULL){
            
    $sql33332    = "INSERT INTO `server` (`ip`, `port`, `username`, `password`) VALUES ('$ip', '$port', '$user', '$passwS')";
    $result3332 = mysqli_query($conn,$sql33332);
    
    if($result3332 == true){
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

else{

bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ انجام نشد دوباره امتحان کنید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='add_panel' WHERE id='$chat_id' LIMIT 1");
}
        
    }
    else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ ایپی سرور وارد شده قبلا ثبت شده است لطفا ایپی جدید وارد کنید
",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='add_panel' WHERE id='$chat_id' LIMIT 1");
    }
}
if($data == "KasrPanel"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لطفا ایپی سرور را برای حذف ارسال فرمایید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='KasrPanel' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "KasrPanel" and $text != $back){
    
    
    $sql2www    = "SELECT `ip` FROM `panel` WHERE `ip`=$text";
    $result2www = mysqli_query($conn,$sql2www);
    $res2www = mysqli_fetch_assoc($result2www);
    $trsrul2www  = $res2www['ip'];
        
        if($trsrul2www == NULL){
            
            $delet = mysqli_query($conn,"DELETE FROM `server` WHERE ip='$text'");
            
            if($delet == true){
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}


else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ انجام نشد دوباره امتحان کنید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='KasrPanel' WHERE id='$chat_id' LIMIT 1");
    
}
            
        }
    else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ ایپی سرور وارد شده وجودندارد لطفا ایپی دیگر بدید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='KasrPanel' WHERE id='$chat_id' LIMIT 1");
    }
}

if($data == "EditPanel"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لطفا ایپی سرور را برای ادیت وارد کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='EditPanel' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "EditPanel" and $text != $back){
    
    $sql2www    = "SELECT * FROM `server` WHERE `ip`='$text'";
    $result2www = mysqli_query($conn,$sql2www);
    $res2www = mysqli_fetch_assoc($result2www);
    $user = $res2www['username'];
    $passp = $res2www['password'];
    $port = $res2www['port'];
    
    if($res2www != NULL){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"⚙️ تنظیمات سرور

📱 ip : $text
👤 UserName : $user
🔑 PassWord : $passp
📍 port : $port",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"✏️ ادیت ایپی",'callback_data'=>"editIp"],
        ],
        [
            ['text'=>"✏️ ادیت پورت",'callback_data'=>"editPort"],
        ],
        [
            ['text'=>"✏️ ادیت یوزرنیم",'callback_data'=>"editUser"],
        ],
        [
            ['text'=>"✏️ ادیت پسورد",'callback_data'=>"editPass"],
        ],
        ]
        ])
        ]);
        
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

    else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ ایپی سرور وارد شده وجود ندارد لطفا ایپی دیگر بدید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='EditPanel' WHERE id='$chat_id' LIMIT 1");
    }
}

if($data == "editIp"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لطفا برای ادیت ایپی متن را مثل زیر وارد کنید

ip,newIp",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='editIp' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "editIp" and $text != $back){
    
    $text_admin = explode(",",$text);
    $ip = $text_admin['0'];
    $newIp = $text_admin['1'];
    
    $sql2www    = "SELECT `ip` FROM `server` WHERE `ip`='$ip'";
    $result2www = mysqli_query($conn,$sql2www);
    $res2www = mysqli_fetch_assoc($result2www);
    $trsrul2www  = $res2www['ip'];
        
        if($trsrul2www != NULL){
            
            $up = mysqli_query($conn,"UPDATE `server` SET `ip`='$newIp' WHERE ip='$ip' LIMIT 1");
            
            if($up == true){
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}


else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ انجام نشد دوباره امتحان کنید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editIp' WHERE id='$chat_id' LIMIT 1");
    
}
            
        }
    else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ ایپی سرور وارد شده وجود ندارد لطفا ایپی دیگر بدید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editIp' WHERE id='$chat_id' LIMIT 1");
    }
    
}

if($data == "editPort"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لطفا برای ادیت ایپی پورت را مثل زیر وارد کنید

ip,newport",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='editPort' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "editPort" and $text != $back){
    
    $text_admin = explode(",",$text);
    $ip = $text_admin['0'];
    $newPort = $text_admin['1'];
    
    $sql2www    = "SELECT `port` FROM `server` WHERE `ip`='$ip' LIMIT 1";
    $result2www = mysqli_query($conn,$sql2www);
    $res2www = mysqli_fetch_assoc($result2www);
    $trsrul2www  = $res2www['port'];
        
        if($trsrul2www != NULL){
            
           $up = mysqli_query($conn,"UPDATE `server` SET `port`='$newPort' WHERE `ip`='$ip' LIMIT 1");
            
            if($up == true){
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}


else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ انجام نشد دوباره امتحان کنید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editPort' WHERE id='$chat_id' LIMIT 1");
    
}
            
        }
    else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ پورت سرور وارد شده وجود ندارد لطفا پورت دیگر بدید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editPort' WHERE id='$chat_id' LIMIT 1");
    }
    
}

if($data == "editUser"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لطفا برای ادیت یوزر پیام را به صورت زیر بفرستید

ip,newuser",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='editUser' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "editUser" and $text != $back){
    
    $text_admin = explode(",",$text);
    $ip = $text_admin['0'];
    $newUser = $text_admin['1'];
    
    $sql2www    = "SELECT `username` FROM `server` WHERE `ip`='$ip' LIMIT 1";
    $result2www = mysqli_query($conn,$sql2www);
    $res2www = mysqli_fetch_assoc($result2www);
    $trsrul2www  = $res2www['username'];
        
        if($trsrul2www != NULL){
            
           $up = mysqli_query($conn,"UPDATE `server` SET `username`='$newUser' WHERE `ip`='$ip' LIMIT 1");
            
            if($up == true){
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}


else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ انجام نشد دوباره امتحان کنید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editUser' WHERE id='$chat_id' LIMIT 1");
    
}
            
        }
    else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ یوزر سرور وارد شده وجود ندارد لطفا یوزر دیگر بدید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editUser' WHERE id='$chat_id' LIMIT 1");
    }
    
}

if($data == "editPass"){
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 لطفا برای ادیت پسورد متن رابهصورت زیر بفرستید

ip,newuser",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='editPass' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "editPass" and $text != $back){
    
    $text_admin = explode(",",$text);
    $ip = $text_admin['0'];
    $newpass = $text_admin['1'];
    
    $sql2www    = "SELECT `password` FROM `server` WHERE `ip`='$ip' LIMIT 1";
    $result2www = mysqli_query($conn,$sql2www);
    $res2www = mysqli_fetch_assoc($result2www);
    $trsrul2www  = $res2www['password'];
        
        if($trsrul2www != NULL){
            
           $up = mysqli_query($conn,"UPDATE `server` SET `password`='$newpass' WHERE `ip`='$ip' LIMIT 1");
            
            if($up == true){
    
    bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}


else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ انجام نشد دوباره امتحان کنید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editPass' WHERE id='$chat_id' LIMIT 1");
    
}
            
        }
    else{
        bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"❌ پسورد وارد شده سرور اشتباه میباشد لطفا دوباره تلاش کنید",
'parse_mode'=>"HTML",
]);
mysqli_query($conn,"UPDATE `users` SET `step`='editPass' WHERE id='$chat_id' LIMIT 1");
    }
    
}
if($adminstep['step'] == "sharjH" and $text != $back){

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
    $idU    =  $row['id'];
    $coinU  = $row['coin'];
    $coinEn = $coinU + $text;
    mysqli_query($conn,"UPDATE `users` SET `coin`='$coinEn' WHERE id='$idU' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$idU,
        'text'=>"💴 از طرف مدیریت مبلغ $text به عنوان شارژ همگانی برای همه واریز شد",
        'parse_mode'=>"HTML",
        ]);
    }
 
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ انجام شد",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_panel),
]);
}

if(isset($data)){

    $sql2www2    = "SELECT `coin` FROM `users` WHERE `id`='$data' LIMIT 1";
    $result2www2 = mysqli_query($conn,$sql2www2);
    $res2www2    = mysqli_fetch_assoc($result2www2);
    $trsrul2www2 = $res2www2['coin'];

    if($trsrul2www2 != NULL){

        mysqli_query($conn,"UPDATE `users` SET `step`='$data' WHERE id='$chat_id' LIMIT 1");

        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"💰 مبلغ را وارد کنید",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_back),
            ]);
    }
}

$userAddCoin = $adminstep['step'];

$sql2www3    = "SELECT `coin` FROM `users` WHERE `id`='$userAddCoin' LIMIT 1";
$result2www3 = mysqli_query($conn,$sql2www3);
$res2www3    = mysqli_fetch_assoc($result2www3);
$trsrul2www3 = $res2www3['coin'];
if($trsrul2www3 != NULL){

    $sql2www2    = "SELECT `coin` FROM `users` WHERE `id`='$userAddCoin' LIMIT 1";
    $result2www2 = mysqli_query($conn,$sql2www2);
    $res2www2    = mysqli_fetch_assoc($result2www2);
    $trsrul2www2 = $res2www2['coin'];

    $coinAdd = $trsrul2www2 + $text;

    mysqli_query($conn,"UPDATE `users` SET `coin`='$coinAdd' WHERE id='$userAddCoin' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$userAddCoin,
        'text'=>"💴 از طرف مدیریت مبلغ $text به عنوان شارژ هدیه برای شما واریز شد",
        'parse_mode'=>"HTML",
        ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"✅ انجام شد",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_panel),
            ]);
        }

if($data == "AddServes"){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 لطفا برای اضافه کردن سرویس اطلاعات مثل زیر وارد کنید
        
        name,coin,hajm,time",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='AddServes' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "AddServes" and $text != $back){

    $text_admin = explode(",",$text);
    $nameS = $text_admin['0'];
    $coins = $text_admin['1'];
    $hajms = $text_admin['2'];
    $times = $text_admin['3'];

    $sql2    = "INSERT INTO `shoper` (`name`, `coin`, `time`, `hajm`) VALUES ('$nameS', '$coins', '$hajms', '$times')";
    $result2 = mysqli_query($conn,$sql2);

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"✅ انجام شد",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_panel),
            ]);
        }
if($data == "KasrServes"){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 لطفا برای حذف سرویس نام سرویس را ارسال کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='KasrServes' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "KasrServes" and $text != $back){

    mysqli_query($conn,"DELETE FROM `shoper` WHERE `name`='$text'");

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"✅ انجام شد",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_panel),
            ]);
}

if($data == "walet"){

$sql23    = "SELECT `coin` FROM `users` WHERE `id`='$chat_id'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$check_user  = $res23['coin'];

bot('sendMessage',[
            'chat_id'=>$chat_id,
'text'=>"👤 اطلاعات کیف پول شما : 

💴 : $check_user تومان",
            'parse_mode'=>"HTML",
            ]);
}

if($data == "sharJ"){
    
    bot('sendMessage',[
            'chat_id'=>$chat_id,
'text'=>"👤 تست",
            'parse_mode'=>"HTML",
            ]);
}

if($data == "seChNameB"){

    mysqli_query($conn,"UPDATE `users` SET `step`='seChNameB' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤 نام و نام شرکت را به صورت زیر بفرستید
name,shop",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
    }

if($adminstep['step'] == "seChNameB" and $text != $back){

    $text_admin = explode(",",$text);
    $nameS = $text_admin['0'];
    $biz = $text_admin['1'];

    $sql2_a1    = "SELECT `id` FROM `users` WHERE `name`='$nameS' and `bez`='$biz'";
    $result2_a1 = mysqli_query($conn,$sql2_a1);
    $res2_a1    = mysqli_fetch_assoc($result2_a1);
    $trsrul2_a1 = $res2_a1['id'];

    if($trsrul2_a1 != NULL){

    $sql2_a2    = "SELECT `time` FROM `users` WHERE id='$trsrul2_a1'";
    $result2_a2 = mysqli_query($conn,$sql2_a2);
    $res2_a2    = mysqli_fetch_assoc($result2_a2);
    $trsrul2_a2 = $res2_a2['time'];

    $sql2_a3    = "SELECT name FROM users WHERE id='$trsrul2_a1'";
    $result2_a3 = mysqli_query($conn,$sql2_a3);
    $res2_a3    = mysqli_fetch_assoc($result2_a3);
    $trsrul2_a3 = $res2_a3['name'];

    $sql2_a5    = "SELECT bez FROM users WHERE id='$trsrul2_a1'";
    $result2_a5 = mysqli_query($conn,$sql2_a5);
    $res2_a5    = mysqli_fetch_assoc($result2_a5);
    $trsrul2_a5 = $res2_a5['bez'];

    $sql2_a4    = "SELECT coin FROM users WHERE id='$trsrul2_a1'";
    $result2_a4 = mysqli_query($conn,$sql2_a4);
    $res2_a4    = mysqli_fetch_assoc($result2_a4);
    $trsrul2_a4 = $res2_a4['coin'];

    $sql2_a6    = "SELECT serves FROM users WHERE id='$trsrul2_a1'";
    $result2_a6 = mysqli_query($conn,$sql2_a6);
    $res2_a6    = mysqli_fetch_assoc($result2_a6);
    $trsrul2_a6 = $res2_a6['serves'];

    $sql2_a7    = "SELECT account FROM users WHERE id='$trsrul2_a1'";
    $result2_a7 = mysqli_query($conn,$sql2_a7);
    $res2_a7    = mysqli_fetch_assoc($result2_a7);
    $trsrul2_a7 = $res2_a7['account'];

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤 مشخصات کاربر شما : 

🆔 : <code>$trsrul2_a1</code>

💰 موجودی : $trsrul2_a4
👤 نوع حساب : $trsrul2_a7
🛍 تعداد سرویس های خریداری شده : $trsrul2_a6
📅 تاریخ عضویت : $trsrul2_a2

👨‍🔧 نام ثبت شده : $trsrul2_a3
👨‍🔧 نام شرکت : $trsrul2_a5",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
                ['text'=>"➕ افزودن موجودی",'callback_data'=>"$trsrul2_a1"],
            ],
            ]
            ])
            ]);

            bot('sendMessage',[
                'chat_id'=>$chat_id,
        'text'=>"👤 جستجو انجام شد",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options_panel),
                ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
    else{
        bot('sendMessage',[
            'chat_id'=>$chat_id,
    'text'=>"👤 کاربر مورد نظر وجود ندارد",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_panel),
            ]);
            mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
}

if($adminstep['step'] == "inquiry" and $text != $back){
    
    $sql2_a7    = "SELECT `server` FROM `serves` WHERE `name`='$text'";
    $result2_a7 = mysqli_query($conn,$sql2_a7);
    $res2_a7    = mysqli_fetch_assoc($result2_a7);
    $trsrul2_a7 = $res2_a7['server'];
    
    $sql2_a8    = "SELECT `server` FROM `serves` WHERE `key`='$text'";
    $result2_a8 = mysqli_query($conn,$sql2_a8);
    $res2_a8    = mysqli_fetch_assoc($result2_a8);
    $trsrul2_a8 = $res2_a8['server'];
    
    if($trsrul2_a7 != NULL or $trsrul2_a8 != NULL){
        
        if($trsrul2_a7 != NULL){
            
    $sql2323       = "SELECT `username` FROM `server` WHERE `ip`='$trsrul2_a7'";
    $result2323    = mysqli_query($conn,$sql2323);
    $res2323       = mysqli_fetch_assoc($result2323);
    $check_user23  = $res2323['username'];
    
    $sql2324       = "SELECT `port` FROM `server` WHERE `ip`='$trsrul2_a7'";
    $result2324    = mysqli_query($conn,$sql2324);
    $res2324       = mysqli_fetch_assoc($result2324);
    $check_user24  = $res2324['port'];
    
    $sql2325       = "SELECT `password` FROM `server` WHERE `ip`='$trsrul2_a7'";
    $result2325    = mysqli_query($conn,$sql2325);
    $res2325       = mysqli_fetch_assoc($result2325);
    $check_user25  = $res2325['password'];
    
    $sql2326       = "SELECT `time` FROM `serves` WHERE `name`='$text'";
    $result2326    = mysqli_query($conn,$sql2326);
    $res2326       = mysqli_fetch_assoc($result2326);
    $check_user26  = $res2326['time'];
        
        $link = json_decode(file_get_contents("https://galexynet.work/PA/create.php?step=find&ip=$trsrul2_a7&port=$check_user24&username=$check_user23&pass=$check_user25&find=$text"));
        
        $up    = $link->up;
        $down  = $link->down;
        $total = $link->total;
        
        bot('sendMessage',[
            'chat_id'=>$chat_id,
    'text'=>"🏷 اطلاعات سرویس شما : 

حجم  اپلود شده 🖥 : $up
حجم دانلود شده 🖥 : $down
حجم کل 🖥 : $total
🧭 تاریخ انقضا : $check_user26",
            'parse_mode'=>"HTML",
            ]);
            
            bot('sendMessage',[
                'chat_id'=>$chat_id,
        'text'=>"👤 جستجو انجام شد",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options),
                ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
    else{
        $sql2323       = "SELECT `username` FROM `server` WHERE `ip`='$trsrul2_a8'";
    $result2323    = mysqli_query($conn,$sql2323);
    $res2323       = mysqli_fetch_assoc($result2323);
    $check_user23  = $res2323['username'];
    
    $sql2324       = "SELECT `port` FROM `server` WHERE `ip`='$trsrul2_a8'";
    $result2324    = mysqli_query($conn,$sql2324);
    $res2324       = mysqli_fetch_assoc($result2324);
    $check_user24  = $res2324['port'];
    
    $sql2325       = "SELECT `password` FROM `server` WHERE `ip`='$trsrul2_a8'";
    $result2325    = mysqli_query($conn,$sql2325);
    $res2325       = mysqli_fetch_assoc($result2325);
    $check_user25  = $res2325['password'];
    
    $sql2326       = "SELECT `time` FROM `serves` WHERE `key`='$text'";
    $result2326    = mysqli_query($conn,$sql2326);
    $res2326       = mysqli_fetch_assoc($result2326);
    $check_user26  = $res2326['time'];
        
        $link = json_decode(file_get_contents("https://galexynet.work/PA/create.php?step=find&ip=$trsrul2_a8&port=$check_user24&username=$check_user23&pass=$check_user25&find=$text"));
        
        $up    = $link->up;
        $down  = $link->down;
        $total = $link->total;
        
        bot('sendMessage',[
            'chat_id'=>$chat_id,
    'text'=>"🏷 اطلاعات سرویس شما : 

حجم  اپلود شده 🖥 : $up
حجم دانلود شده 🖥 : $down
حجم کل 🖥 : $total
🧭 تاریخ انقضا : $check_user26",
            'parse_mode'=>"HTML",
            ]);
            
            bot('sendMessage',[
                'chat_id'=>$chat_id,
        'text'=>"👤 جستجو انجام شد",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options),
                ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
        
    }
    else{
        bot('sendMessage',[
                'chat_id'=>$chat_id,
        'text'=>"👤 اطلاعات در ربات وجود ندارد",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options),
                ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
}

if(isset($data)){
    
$sql2326A       = "SELECT `name` FROM `shoper` WHERE `name`='$data'";
$result2326A    = mysqli_query($conn,$sql2326A);
$res2326A       = mysqli_fetch_assoc($result2326A);
$check_user26A  = $res2326A['name'];

$sql2326A3      = "SELECT `coin` FROM `shoper` WHERE `name`='$data'";
$result2326A3    = mysqli_query($conn,$sql2326A3);
$res2326A3       = mysqli_fetch_assoc($result2326A3);
$check_user26A3  = $res2326A3['coin'];

$sql2326A1       = "SELECT `coin` FROM `users` WHERE `id`='$chat_id'";
$result2326A1    = mysqli_query($conn,$sql2326A1);
$res2326A1       = mysqli_fetch_assoc($result2326A1);
$check_user26A1  = $res2326A1['coin'];

if($check_user26A != NULL){
    
    if($check_user26A1 > $check_user26A3){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"jsj",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    ['text'=>"پروتکل دلخواه",'callback_data'=>"Del_$data"],
                    ['text'=>"پروتکل عادی",'callback_data'=>"adi_$data"],
                ],
                [
                    ['text'=>"بازگشت",'callback_data'=>"back_shop"],
                ],
                ]
                ])
                ]);
}
else{
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"موجودی نداری",
        'parse_mode'=>"HTML",
                ]);
}
}
}
if(isset($data)){
    
    $text_admin = explode(",",$data);
    $delkha     = $text_admin['0'];
    $adipro     = $text_admin['1'];
    
    if($delkha == "Del"){
        
        bot('sendMessage',[
                'chat_id'=>$chat_id,
'text'=>"لطفا یوزر نیم و پسورد و پروتکل نتورک را به صورت زیر بفرستید
username,password,pro,net",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options_back),
                ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='Del_$adipro' WHERE id='$chat_id' LIMIT 1");
    }
    
    if($delkha == "adi"){
        
bot('sendMessage',[
                'chat_id'=>$chat_id,
'text'=>"لطفا یوزر نیم و پسورد را به صورت زیر بفرستید
username,password",
                'parse_mode'=>"HTML",
                'reply_markup'=>json_encode($reply_kb_options_back),
                ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='adi_$adipro' WHERE id='$chat_id' LIMIT 1");
    
}}

$step_u = $adminstep['step'];

$text_admin2 = explode(",",$step_u);
$delkhaa     = $text_admin2['0'];
$adiproo     = $text_admin2['1'];

$sql2326A14       = "SELECT `hajm` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A14    = mysqli_query($conn,$sql2326A14);
$res2326A14       = mysqli_fetch_assoc($result2326A14);
$check_user26A14  = $res2326A14['hajm'];

if($check_user26A14 != NULL and $delkhaa == "adi"){
    
$sql2326A143       = "SELECT `time` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A143    = mysqli_query($conn,$sql2326A143);
$res2326A143       = mysqli_fetch_assoc($result2326A143);
$check_user26A143  = $res2326A143['time'];

$sql2322       = "SELECT `ip` FROM `server` ORDER BY RAND() LIMIT 1";
    $result2322    = mysqli_query($conn,$sql2322);
    $res2322       = mysqli_fetch_assoc($result2322);
    $check_user22  = $res2322['ip'];
    
    $sql2323       = "SELECT `username` FROM `server` WHERE `ip`='$check_user22'";
    $result2323    = mysqli_query($conn,$sql2323);
    $res2323       = mysqli_fetch_assoc($result2323);
    $check_user23  = $res2323['username'];
    
    $sql2324       = "SELECT `port` FROM `server` WHERE `ip`='$check_user22'";
    $result2324    = mysqli_query($conn,$sql2324);
    $res2324       = mysqli_fetch_assoc($result2324);
    $check_user24  = $res2324['port'];
    
    $sql2325       = "SELECT `password` FROM `server` WHERE `ip`='$check_user22'";
    $result2325    = mysqli_query($conn,$sql2325);
    $res2325       = mysqli_fetch_assoc($result2325);
    $check_user25  = $res2325['password'];
    
$sql2326A3       = "SELECT `coin` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A3    = mysqli_query($conn,$sql2326A3);
$res2326A3       = mysqli_fetch_assoc($result2326A3);
$check_user26A3  = $res2326A3['coin'];

$sql2326A32       = "SELECT `hajm` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A32    = mysqli_query($conn,$sql2326A32);
$res2326A32       = mysqli_fetch_assoc($result2326A32);
$check_user26A32  = $res2326A32['hajm'];

$sql2326A322       = "SELECT `time` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A322    = mysqli_query($conn,$sql2326A322);
$res2326A322       = mysqli_fetch_assoc($result2326A322);
$check_user26A322  = $res2326A322['time'];

$sql2326A1       = "SELECT `coin` FROM `users` WHERE `id`='$chat_id'";
$result2326A1    = mysqli_query($conn,$sql2326A1);
$res2326A1       = mysqli_fetch_assoc($result2326A1);
$check_user26A1  = $res2326A1['coin'];

$coinresult = $check_user26A1 - $check_user26A3;
mysqli_query($conn,"UPDATE `users` SET `coin`='$coinresult' WHERE id='$chat_id' LIMIT 1");

        
$sql43    = "SELECT * FROM `serves`";
$result43 = mysqli_query($conn,$sql43);
$res43    = mysqli_num_rows($result43);

$name = $res43 + 1;
$next = date('Y/m/d',strtotime("+1 day"));
    
    $link = json_decode(file_get_contents("https://galexynet.work/PA/create.php?step=buy&name=$name&traific=$check_user26A14&date=$check_user26A143&ip=$check_user22&port=$check_user24&username=$check_user23&pass=$check_user25&pro=vless&net=ws"),true)["server"];
    if(isset($link)){
        
$text_admin22 = explode(",",$text);
$delkhaa2     = $text_admin22['0'];
$adiproo2     = $text_admin22['1'];
        
    $qr = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$link";
    $sql234    = "INSERT INTO `serves` (`name`, `coin`, `time`, `hajm`, `key`, `server`) VALUES ('$name', '0', '$next', '1', '$link', '$check_user22')";
    $result234 = mysqli_query($conn,$sql234); 
    $sql23434    = "INSERT INTO `servesPay` (`id`, `key`, `username`, `password`,) VALUES ('$chat_id', '$link', '$delkhaa2', '$adiproo2')";
    $result23434 = mysqli_query($conn,$sql23434); 
    bot("sendPhoto",[
                        'chat_id'=>$chat_id,
                        "caption"=>"*اکانت با موفقیت ساخته شد✅*
    📁*حجم:* `$check_user26A32 GB`
    🕔*مدت اشتراک:* `$check_user26A322 روز`
    👤*نوع اشتراک:* `تک کاربره`
    ⚜️*اسم اکانت:* `$name`
    🔑*کد کاربری:* `
    
    🔗*لینک اتصال:* `$link`",
                        "photo"=>"$qr",
                        'parse_mode'=>"markdown",
                        'reply_markup'=>json_encode([
                            'inline_keyboard'=>[
                                [
                                    ['text'=>"🦕اشتراک گذاری","url"=>"tg://msg_url?url=$link&text= کانفیگ تست ساخته شده با ربات عرفان پراکسی"]
                                ],
                            ]
                        ])
                
                    ]);
                    mysqli_query($conn,"UPDATE `users` SET `test`='yes' WHERE id='$chat_id' LIMIT 1");

                    bot('sendMessage',[
                        'chat_id'=>$chanSef,
                        'text'=>"✅ #اکانت_جدید

                        اکانت جدید خریداری شد 👇
                        
                        🏷 : $link
                        👤 : $chat_id",
                        'parse_mode'=>"HTML",
                        ]);
}}


$step_u2 = $adminstep['step'];

$text_admin24 = explode(",",$step_u2);
$delkhaa3     = $text_admin24['0'];
$adiproo3     = $text_admin24['1'];

$sql2326A142       = "SELECT `hajm` FROM `shoper` WHERE `name`='$adiproo3'";
$result2326A142    = mysqli_query($conn,$sql2326A142);
$res2326A142       = mysqli_fetch_assoc($result2326A142);
$check_user26A142  = $res2326A142['hajm'];

if($check_user26A142 != NULL and $delkhaa3 == "Del"){
    
$sql2326A143       = "SELECT `time` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A143    = mysqli_query($conn,$sql2326A143);
$res2326A143       = mysqli_fetch_assoc($result2326A143);
$check_user26A143  = $res2326A143['time'];

$sql2322       = "SELECT `ip` FROM `server` ORDER BY RAND() LIMIT 1";
    $result2322    = mysqli_query($conn,$sql2322);
    $res2322       = mysqli_fetch_assoc($result2322);
    $check_user22  = $res2322['ip'];
    
    $sql2323       = "SELECT `username` FROM `server` WHERE `ip`='$check_user22'";
    $result2323    = mysqli_query($conn,$sql2323);
    $res2323       = mysqli_fetch_assoc($result2323);
    $check_user23  = $res2323['username'];
    
    $sql2324       = "SELECT `port` FROM `server` WHERE `ip`='$check_user22'";
    $result2324    = mysqli_query($conn,$sql2324);
    $res2324       = mysqli_fetch_assoc($result2324);
    $check_user24  = $res2324['port'];
    
    $sql2325       = "SELECT `password` FROM `server` WHERE `ip`='$check_user22'";
    $result2325    = mysqli_query($conn,$sql2325);
    $res2325       = mysqli_fetch_assoc($result2325);
    $check_user25  = $res2325['password'];
    
$sql2326A3       = "SELECT `coin` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A3    = mysqli_query($conn,$sql2326A3);
$res2326A3       = mysqli_fetch_assoc($result2326A3);
$check_user26A3  = $res2326A3['coin'];

$sql2326A32       = "SELECT `hajm` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A32    = mysqli_query($conn,$sql2326A32);
$res2326A32       = mysqli_fetch_assoc($result2326A32);
$check_user26A32  = $res2326A32['hajm'];

$sql2326A322       = "SELECT `time` FROM `shoper` WHERE `name`='$adiproo'";
$result2326A322    = mysqli_query($conn,$sql2326A322);
$res2326A322       = mysqli_fetch_assoc($result2326A322);
$check_user26A322  = $res2326A322['time'];

$sql2326A1       = "SELECT `coin` FROM `users` WHERE `id`='$chat_id'";
$result2326A1    = mysqli_query($conn,$sql2326A1);
$res2326A1       = mysqli_fetch_assoc($result2326A1);
$check_user26A1  = $res2326A1['coin'];

$coinresult = $check_user26A1 - $check_user26A3;
mysqli_query($conn,"UPDATE `users` SET `coin`='$coinresult' WHERE id='$chat_id' LIMIT 1");

        
$sql43    = "SELECT * FROM `serves`";
$result43 = mysqli_query($conn,$sql43);
$res43    = mysqli_num_rows($result43);

$name = $res43 + 1;
$next = date('Y/m/d',strtotime("+1 day"));

$text_admin22 = explode(",",$text);
$delkhaa2     = $text_admin22['0'];
$adiproo2     = $text_admin22['1'];
$peo_del      = $text_admin22['2'];
$net_del      = $text_admin22['3'];
    
    $link = json_decode(file_get_contents("https://galexynet.work/PA/create.php?step=buy&name=$name&traific=$check_user26A14&date=$check_user26A143&ip=$check_user22&port=$check_user24&username=$check_user23&pass=$check_user25&pro=$peo_del&net=$net_del"),true)["server"];
    if(isset($link)){
        
    $qr = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$link";
    $sql234    = "INSERT INTO `serves` (`name`, `coin`, `time`, `hajm`, `key`, `server`) VALUES ('$name', '0', '$next', '1', '$link', '$check_user22')";
    $result234 = mysqli_query($conn,$sql234); 
    $sql23434    = "INSERT INTO `servesPay` (`id`, `key`, `username`, `password`,) VALUES ('$chat_id', '$link', '$delkhaa2', '$adiproo2')";
    $result23434 = mysqli_query($conn,$sql23434); 
    bot("sendPhoto",[
                        'chat_id'=>$chat_id,
                        "caption"=>"*اکانت با موفقیت ساخته شد✅*
    📁*حجم:* `$check_user26A32 GB`
    🕔*مدت اشتراک:* `$check_user26A322 روز`
    👤*نوع اشتراک:* `تک کاربره`
    ⚜️*اسم اکانت:* `$name`
    🔑*کد کاربری:* `
    
    🔗*لینک اتصال:* `$link`",
                        "photo"=>"$qr",
                        'parse_mode'=>"markdown",
                        'reply_markup'=>json_encode([
                            'inline_keyboard'=>[
                                [
                                    ['text'=>"🦕اشتراک گذاری","url"=>"tg://msg_url?url=$link&text= کانفیگ تست ساخته شده با ربات عرفان پراکسی"]
                                ],
                            ]
                        ])
                
                    ]);
                    mysqli_query($conn,"UPDATE `users` SET `test`='yes' WHERE id='$chat_id' LIMIT 1");

                    bot('sendMessage',[
                        'chat_id'=>$chanSef,
                        'text'=>"✅ #اکانت_جدید

                        اکانت جدید خریداری شد 👇
                        
                        🏷 : $link
                        👤 : $chat_id",
                        'parse_mode'=>"HTML",
                        ]);
}}

if($adminstep['step'] == "setingAC" and $text != $back){
    
$sql2326A15       = "SELECT `key` FROM `servesPay` WHERE `key`='$text'";
$result2326A15    = mysqli_query($conn,$sql2326A15);
$res2326A15       = mysqli_fetch_assoc($result2326A15);
$check_user26A15  = $res2326A15['key'];

$sql2326A152       = "SELECT `id` FROM `servesPay` WHERE `key`='$text'";
$result2326A152    = mysqli_query($conn,$sql2326A152);
$res2326A152       = mysqli_fetch_assoc($result2326A152);
$check_user26A152  = $res2326A152['id'];

if($check_user26A15 != NULL and $chat_id == $check_user26A152){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='$text' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"مدیریت اکانت",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    ['text'=>"🗑 حذف",'callback_data'=>"deletAsh"],
                    ['text'=>"🔄 ریست",'callback_data'=>"reset"],
                ],
                [
                    ['text'=>"🔑 جزئیات",'callback_data'=>"jozyat"],
                    ['text'=>"🔧 ارتقا",'callback_data'=>"artgha"],
                ],
                [
                    ['text'=>"✏️ ویرایش",'callback_data'=>"editesh"],
                ],
                ]
                ])
                ]);
}
else{
    
    bot('sendMessage',[
                        'chat_id'=>$chanSef,
                        'text'=>"اشتراک وجود ندارد",
                        'parse_mode'=>"HTML",
                        ]);
}
}

if($data == "deletAsh"){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"انجام شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);
        
        mysqli_query($conn,"UPDATE `servesPay` SET `id`='0' WHERE id='$step_u2' LIMIT 1");
}

if($data == "jozyat"){
    
$sql2326A152       = "SELECT `username` FROM `servesPay` WHERE `key`='$step_u2'";
$result2326A152    = mysqli_query($conn,$sql2326A152);
$res2326A152       = mysqli_fetch_assoc($result2326A152);
$check_user26A152  = $res2326A152['username'];

$sql2326A1521       = "SELECT `password` FROM `servesPay` WHERE `key`='$step_u2'";
$result2326A1521    = mysqli_query($conn,$sql2326A1521);
$res2326A1521       = mysqli_fetch_assoc($result2326A1521);
$check_user26A1521  = $res2326A1521['password'];
    
    $qr = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$step_u2";
    
    bot("sendPhoto",[
                        'chat_id'=>$chat_id,
                        "caption"=>"*اکانت تست با موفقیت ساخته شد✅*
    👤*یوزر نیم:* `$check_user26A152`
    🔑* پسورد : `$check_user26A1521`
    
    🔗*لینک اتصال:* `$step_u2`",
                        "photo"=>"$qr",
                        'parse_mode'=>"markdown",
                        'reply_markup'=>json_encode([
                            'inline_keyboard'=>[
                                [
                                    ['text'=>"🦕اشتراک گذاری","url"=>"tg://msg_url?url=$step_u2&text= کانفیگ تست ساخته شده با ربات عرفان پراکسی"]
                                ],
                            ]
                        ])
                
                    ]);
}

                                                      switch($text) {
 
                                                        case "/start"              : show_menu();       break;
                                                        case $help                 : help();            break;
                                                        case $account              : account();         break;
                                                        case $wallet               : wallet();          break;
                                                        case $Condition            : Condition();       break;
                                                        case $support              : support();         break;
                                                        case $inquiry              : inquiry();         break;
                                                        case $back                 : back();            break;
                                                        case $creat                : creat();           break;
                                                        case $setingAC             : setingAC();        break;
                                                        case $acuntTest            : acuntTest();       break;
                                                        case $enterKey             : enterKey();        break;
                                                        
                                                        
}

if($chat_id == $admin){
                                                    
                                                    switch($text) {
                                                 
                                                        case $key11     : statistics();               break;
                                                        case "/admin"   : panel();                    break;
                                                        case $key21     : key_hmgani();               break;
                                                        case $key51     : key_forvard();              break;
                                                        case $sharjH    : sharjH();                   break;
                                                        case $listN     : listN();                    break;
                                                        case $seting_S  : seting_S();                 break;
                                                        case $setingB   : setingB();                  break;
                                                        case $payA      : payA();                     break;
                                                        case $offT      : offT();                     break;
                                                        case $OnT       : OnT();                      break;
                                                        case $setingGR  : setingGR();                 break;
                                                        case $SeenN     : SeenN();                    break;
                                                        case $offBot    : offBot();                   break;
                                                        case $onBot     : onBot();                    break;
                                                        case $suppprt_result : suppprt_result();      break;
                                                        case $creatCode      : creatCode();           break;
                                                        case $creatCodeH : creatCodeH();              break;
                                                    }
}


function show_menu(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_seting;
    global $reply_kb_options;
    global $date;

$sql23    = "SELECT `account` FROM `users` WHERE `id`='$chat_id'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$check_user  = $res23['account'];

if($check_user == 'user'){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"تست",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_seting),
        ]);
}
else{

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"تست
$date",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);
}
}

function help(){

    global $chat_id;
    global $conn;

    $sql23    = "SELECT `account` FROM `users` WHERE `id`='$chat_id'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$check_user  = $res23['account'];

if($check_user != 'user'){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"تست",
        'parse_mode'=>"HTML",
        ]);
}
}

function account(){

    global $conn;
    global $chat_id;
    global $first;

$sql23    = "SELECT `account` FROM `users` WHERE `id`='$chat_id'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$check_user  = $res23['account'];

if($check_user != 'user'){

$sql232    = "SELECT `time` FROM `users` WHERE `id`='$chat_id'";
$result232 = mysqli_query($conn,$sql232);
$res232 = mysqli_fetch_assoc($result232);
$check_user2  = $res232['time'];

$sql233    = "SELECT `coin` FROM `users` WHERE `id`='$chat_id'";
$result233 = mysqli_query($conn,$sql233);
$res233 = mysqli_fetch_assoc($result233);
$check_user3  = $res233['coin'];

$sql234    = "SELECT `serves` FROM `users` WHERE `id`='$chat_id'";
$result234 = mysqli_query($conn,$sql234);
$res234 = mysqli_fetch_assoc($result234);
$check_user4  = $res234['serves'];

$sql235    = "SELECT `ref` FROM `users` WHERE `id`='$chat_id'";
$result235 = mysqli_query($conn,$sql235);
$res235 = mysqli_fetch_assoc($result235);
$check_user5  = $res235['ref'];

$sql236    = "SELECT `codeM` FROM `users` WHERE `id`='$chat_id'";
$result236 = mysqli_query($conn,$sql236);
$res236 = mysqli_fetch_assoc($result236);
$check_user6  = $res236['codeM'];

$sql237    = "SELECT `coin` FROM `users` WHERE `id`='$chat_id'";
$result237 = mysqli_query($conn,$sql237);
$res237 = mysqli_fetch_assoc($result237);
$check_user7  = $res237['coin'];

if($check_user4 >= 20){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤مشخصات اکانت کاربری شما:
    
👤نام اکانت: <code>$first</code>
📅تاریخ عضویت: <code>$check_user2</code>
⚙️نوع اکانت: <code>نمایندگی عادی</code>
🧑🏼‍💻کد نمایندگی: <code>$check_user6</code>
💴 موجودی : <code>$check_user7</code>",
        'parse_mode'=>"HTML",
        ]);
}
else{

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤مشخصات اکانت کاربری شما:
    
👤نام اکانت: <code>$first</code>
📅تاریخ عضویت: <code>$check_user2</code>
⚙️نوع اکانت: <code>نمایندگی ویژه</code>
🧑🏼‍💻کد نمایندگی: <code>$check_user6</code>
💴 موجودی : <code>$check_user7</code>",
        'parse_mode'=>"HTML",
        ]);
}
}
}

function wallet(){

    global $chat_id;
    global $conn;

    $sql23    = "SELECT `account` FROM `users` WHERE `id`='$chat_id'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$check_user  = $res23['account'];

if($check_user != 'user'){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"به بخش مدیریت کیف پول خوش آمدید🙌🏻
        جهت ادامه لطفا یکی از گزینه های زیر را انتخاب کنید👇🏼",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                [
                    ['text'=>"🎁کد هدیه",'callback_data'=>"codeHedeh"],
                    ['text'=>"💳موجودی کیف پول",'callback_data'=>"walet"],
                    ['text'=>"💰 شارژ کیف پول",'callback_data'=>"sharJ"],
                ],
                ]
                ])
                ]);
}}

function Condition(){

    global $chat_id;
    global $conn;

    $sql23    = "SELECT `account` FROM `users` WHERE `id`='$chat_id'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$check_user  = $res23['account'];

if($check_user != 'user'){

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"در حال ساخت",
        'parse_mode'=>"HTML",
        ]);
}}

function support(){

    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='support' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📬 پیام خود را ارسال کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}

function suppprt_result(){
    
    global $chat_id;
    global $reply_kb_options_back;
    global $conn;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='suppprt_result' WHERE id='$chat_id' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"👤 کاربری که میخای براش پیام بفرستی پیام را به صورت زیر بنویس",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}

function back(){

    global $reply_kb_options;
    global $chat_id;
    global $conn;
    global $reply_kb_options_seting;

    $sql23    = "SELECT `account` FROM `users` WHERE `id`='$chat_id'";
$result23 = mysqli_query($conn,$sql23);
$res23 = mysqli_fetch_assoc($result23);
$check_user  = $res23['account'];

if($check_user != 'user'){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"↩️ به منو اصلی برگشتیم",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
else{

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"↩️ به منو اصلی برگشتیم",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_seting),
        ]);
}
}

function acuntTest(){

    global $chat_id;
    global $conn;
    global $chanSef;

$sql23       = "SELECT `test` FROM `Settings`";
$result23    = mysqli_query($conn,$sql23);
$res23       = mysqli_fetch_assoc($result23);
$check_user  = $res23['test'];

if($check_user == "on"){

    $sql232       = "SELECT `test` FROM `users` WHERE `id`='$chat_id'";
    $result232    = mysqli_query($conn,$sql232);
    $res232       = mysqli_fetch_assoc($result232);
    $check_user2  = $res232['test'];

    if($check_user2 != "yes"){

    $sql2322       = "SELECT `ip` FROM `server` LIMIT 1";
    $result2322    = mysqli_query($conn,$sql2322);
    $res2322       = mysqli_fetch_assoc($result2322);
    $check_user22  = $res2322['ip'];
    
    $sql2323       = "SELECT `username` FROM `server` WHERE `ip`='$check_user22'";
    $result2323    = mysqli_query($conn,$sql2323);
    $res2323       = mysqli_fetch_assoc($result2323);
    $check_user23  = $res2323['username'];
    
    $sql2324       = "SELECT `port` FROM `server` WHERE `ip`='$check_user22'";
    $result2324    = mysqli_query($conn,$sql2324);
    $res2324       = mysqli_fetch_assoc($result2324);
    $check_user24  = $res2324['port'];
    
    $sql2325       = "SELECT `password` FROM `server` WHERE `ip`='$check_user22'";
    $result2325    = mysqli_query($conn,$sql2325);
    $res2325       = mysqli_fetch_assoc($result2325);
    $check_user25  = $res2325['password'];
    
$sql43    = "SELECT * FROM `serves`";
$result43 = mysqli_query($conn,$sql43);
$res43    = mysqli_num_rows($result43);

$name = $res43 + 1;
$next = date('Y/m/d',strtotime("+1 day"));
    
    $link = json_decode(file_get_contents("https://galexynet.work/PA/create.php?step=buy&name=$name&traific=1&date=1&ip=$check_user22&port=$check_user24&username=$check_user23&pass=$check_user25&pro=vless&net=ws"),true)["server"];
    if(isset($link)){
        
    $qr = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$link";
    $sql234    = "INSERT INTO `serves` (`name`, `coin`, `time`, `hajm`, `key`, `server`) VALUES ('$name', '0', '$next', '1', '$link', '$check_user22')";
    $result234 = mysqli_query($conn,$sql234); 
    bot("sendPhoto",[
                        'chat_id'=>$chat_id,
                        "caption"=>"*اکانت تست با موفقیت ساخته شد✅*
    📁*حجم:* `1GB`
    🕔*مدت اشتراک:* `یک روزه`
    👤*نوع اشتراک:* `تک کاربره`
    ⚜️*اسم اکانت:* `$name`
    🔑*کد کاربری:* `اکانت تست شامل کد کاربری نمیشود`
    
    🔗*لینک اتصال:* `$link`",
                        "photo"=>"$qr",
                        'parse_mode'=>"markdown",
                        'reply_markup'=>json_encode([
                            'inline_keyboard'=>[
                                [
                                    ['text'=>"🦕اشتراک گذاری","url"=>"tg://msg_url?url=$link&text= کانفیگ تست ساخته شده با ربات عرفان پراکسی"]
                                ],
                            ]
                        ])
                
                    ]);
                    mysqli_query($conn,"UPDATE `users` SET `test`='yes' WHERE id='$chat_id' LIMIT 1");

                    bot('sendMessage',[
                        'chat_id'=>$chanSef,
                        'text'=>"✅ #اکانت_تست

                        اکانت تست جدید ساخته شد 👇
                        
                        🏷 : $link
                        👤 : $chat_id",
                        'parse_mode'=>"HTML",
                        ]);
    }else
    {
        bot('sendMessage',[
                        'chat_id'=>$chat_id,
                        'text'=>"مشکلی در روند ساخت به وجود امده است",
                        'parse_mode'=>"HTML",
                        ]);
    }
    }else{
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ شما قبلا اکانت تست را دریافت کرده اید",
        'parse_mode'=>"HTML",
        ]);
}}
else{
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"❌ این بخش توسط مدیریت خاموش میباشد",
    'parse_mode'=>"HTML",
    ]);
}}

function enterKey(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🔐 کلید را وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='enterKey' WHERE id='$chat_id' LIMIT 1");
}

function creat(){

    global $chat_id;
    global $conn;
    global $message_id;
    
$sql22    = "SELECT * FROM `shoper`";
$result22 = mysqli_query($conn,$sql22);
$res22    = mysqli_num_rows($result22);

if($res22 > 0){
    $categories = mysqli_query($conn, "SELECT * FROM `shoper`");
            $keyboard = [];
            while ($categorie = mysqli_fetch_assoc($categories)) {
                $categoriesid = $categorie['name'];
                $keyboard [] = ['text' => "$categoriesid", 'callback_data' => "$categoriesid"];
            }
            $back = [['text' => "✖️ لغو خرید", 'callback_data' => 'cancel']];
            $keyboard = array_merge($keyboard, $back);
            $keyboard = array_chunk($keyboard, 1);
            
                bot('sendmessage', [
                    'chat_id' => $chat_id,
                    'reply_to_message_id' => $message_id,
                    'text' => "انتخاب کنید",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => $keyboard
                    ])
                ]);
            
    
}
    else{
        bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ سرویسی برای نمایش وجود ندارد",
'parse_mode'=>"HTML",
]);
    }
}

function inquiry(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🔐 اسم اشتراک را بفرستید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='inquiry' WHERE id='$chat_id' LIMIT 1");
}

function panel(){

    global $chat_id;
    global $admin;
    global $reply_kb_options_panel;

        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"👨‍🔧 سلام ادمین خوش امدی",
            'parse_mode'=>"HTML",
            'reply_markup'=>json_encode($reply_kb_options_panel),
            ]);
    
}

function key_hmgani(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📝 پیام خود را بنویسید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_hmgani' WHERE id='$chat_id' LIMIT 1");
}

function key_forvard(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📝 پیام خود را فوروارد کنید",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options_back),
]);

mysqli_query($conn,"UPDATE `users` SET `step`='key_forvard' WHERE id='$chat_id' LIMIT 1");
}

function statistics(){
    
    global $chat_id;
    global $conn;
    global $date;

$sql43    = "SELECT * FROM `users`";
$result43 = mysqli_query($conn,$sql43);
$res43    = mysqli_num_rows($result43);

$sql4    = "SELECT `time` FROM `users` WHERE `time`='$date'";
$result4 = mysqli_query($conn,$sql4);
$res4    = mysqli_num_rows($result4);


bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"امار شما : ",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"امار کاربران",'callback_data'=>"gggggg"],
            ['text'=>"$res43",'callback_data'=>"gggggg"],
        ],
        [
            ['text'=>"جوین شده امروز",'callback_data'=>"gggggg"],
            ['text'=>"$res4",'callback_data'=>"gggggg"],
        ],
        ]
        ])
        ]);
}

function offBot(){

    global $chat_id;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👈 لطفا بخشی که میخواهید تنظیم کنید را انتخاب کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"❌ خاموش کردن ربات",'callback_data'=>"offBot"],
        ],
        [
            ['text'=>"✅ روشن کردن ربات",'callback_data'=>"onBot"],
        ],
        ]
        ])
        ]);

}

function creatCode(){

    global $conn;
    global $chat_id;
    global $reply_kb_options_back;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 کد را وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='creatCode' WHERE id='$chat_id' LIMIT 1");
}

function creatCodeH(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 کد و موجودی را وارد کنید
        code,coin",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='creatCodeH' WHERE id='$chat_id' LIMIT 1");
}

function SeenN(){

    global $chat_id;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👈 لطفا نوع جستجو را انتخاب کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"👤 جستجو با ایدی عددی",'callback_data'=>"serchID"],
        ],
        [
            ['text'=>"👤 جستجو با نام و اسم شرکت",'callback_data'=>"seChNameB"],
        ],
        ]
        ])
        ]);
}

function setingGR(){

    global $conn;
    global $chat_id;
    global $reply_kb_options_back;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 قیمت خود را بنویسید
        code,coin",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='setingGR' WHERE id='$chat_id' LIMIT 1");
}

function offT(){

    global $chat_id;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👈 لطفا بخشی که میخواهید تنظیم کنید را انتخاب کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"❌ خاموش کردن",'callback_data'=>"offT"],
        ],
        [
            ['text'=>"✅ روشن کردن",'callback_data'=>"onT"],
        ],
        ]
        ])
        ]);
}

function seting_S(){
    
    global $chat_id;
    global $conn;
    
$sql43    = "SELECT * FROM `server`";
$result43 = mysqli_query($conn,$sql43);
$res43    = mysqli_num_rows($result43);
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤 سلام به بخش مدیریت پنل ها خوش امدید

⚙️ تعداد پنل های شما : $res43

👈 جهت ادامه از گزینه های زیر انتخاب کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"➕ افزودن پنل",'callback_data'=>"AddPanel"],
        ],
        [
            ['text'=>"➖ حذف پنل",'callback_data'=>"KasrPanel"],
        ],
        [
            ['text'=>"⚙️ ویرایش کردن پنل",'callback_data'=>"EditPanel"],
        ],
        ]
        ])
        ]);
}

function sharjH(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;


bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 موجودی را ارسال کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='sharjH' WHERE id='$chat_id' LIMIT 1");

}

function setingB(){

    global $chat_id;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
'text'=>"👤 از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            ['text'=>"➕ افزودن سرویس",'callback_data'=>"AddServes"],
        ],
        [
            ['text'=>"➖ حذف سرویس",'callback_data'=>"KasrServes"],
        ],
        ]
        ])
        ]);
}
function listN(){
    
    global $chat_id;
    global $conn;
    

$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        

    $id      = $row['id'];
    $time    = $row['time'];
    $account = $row['account'];
    $coin    = $row['coin'];
    $serves  = $row['serves'];
    $codeM   = $row['codeM'];
    $name    = $row['name'];
    $bez     = $row['bez'];
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 اطلاعات حساب نماینده 

👤 : <code>$id</code>
💴 موجودی : <code>$coin</code>
👨‍🔧 تعداد خرید ها : <code>$serves</code>
🏷 کد نمایندگی : <code>$codeM</code>
👤 نوع حساب : <code>$account</code>
🧭 زمان ورود : <code>$time</code>

👤 نام ثبت شده توسط کاربر : <code>$name</code>
👤 نام کسب و کار : <code>$bez</code>",
        'parse_mode'=>"HTML",
        ]);
}
}

function setingAC(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;


bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 لینک اشتراک رو بفرستید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
        mysqli_query($conn,"UPDATE `users` SET `step`='setingAC' WHERE id='$chat_id' LIMIT 1");
}
?>