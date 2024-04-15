<?php
$admin = "1724126484";
$token = "7097391194:AAFI9XhNc3dGa4bTo55fdCqo7C9M69gaRUE";
 function bot($method,$datas=[]){
    $yhya = http_build_query($datas);
        $url = "https://api.telegram.org/bot".$GLOBALS['token']."/".$method."?$yhya";
        $yhya_Sy = file_get_contents($url);
        return json_decode($yhya_Sy);
}
function delTree($dir) {
   $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
  }
//---//
$update = json_decode(file_get_contents('php://input'));
if($update->message){
	$message = $update->message;
$message_id = $update->message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$title = $message->chat->title;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
}
if($update->callback_query){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$title = $update->callback_query->message->chat->title;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $update->callback_query->from->id;
}
if($update->edited_message){
	$message = $update->edited_message;
	$message_id = $message->message_id;
$username = $message->from->username;
$chat_id = $message->chat->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
	}
	if($update->channel_post){
	$message = $update->channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$title = $message->chat->title;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->edited_channel_post){
	$message = $update->edited_channel_post;
	$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->chat->username;
$name = $message->author_signature;
$from_id = $message->chat->id;
	}
	if($update->inline_query){
		$inline = $update->inline_query;
		$message = $inline;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$query = $message->query;
$text = $query;
		}
	if($update->chosen_inline_result){
		$message = $update->chosen_inline_result;
		$user = $message->from->username;
$name = $message->from->first_name;
$from_id = $message->from->id;
$inline_message_id = $message->inline_message_id;
$message_id = $inline_message_id;
$text = $message->query;
$query = $text;
		}
		$tc = $update->message->chat->type;
		$re = $update->message->reply_to_message;
		$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_messagid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$photo = $message->photo;
$video = $message->video;
$sticker = $message->sticker;
$file = $message->document;
$audio = $message->audio;
$voice = $message->voice;
$caption = $message->caption;
$photo_id = $message->photo[0]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
$voice_id = $message->voice->file_id;
$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$title = $message->chat->title;
if($re){
	$forward_type = $re->forward_from->type;
$forward_name = $re->forward_from->first_name;
$forward_user = $re->forward_from->username;
	}else{
$forward_type = $message->forward_from->type;
$forward_name = $message->forward_from->first_name;
$forward_user = $message->forward_from->username;
$forward_id = $message->forward_from->id;
if($forward_name == null){
	$forward = $message->forward_from_chat;
$forward_id = $message->forward_from_chat->id;
$forward_title = $message->forward_from_chat->title;
	}
}
mkdir("bots");
$title = $message->chat->title;

$saiko2 = json_decode(file_get_contents("saiko2.json"),1);
///
$saiko = json_decode(file_get_contents("saiko.json"),1);
if($saiko['gch'] == null){
$saiko['gch'] = "❎";
file_put_contents("saiko.json",json_encode($saiko));
}
if($saiko['hk'] == null){
$saiko['hk'] = "❎";
file_put_contents("saiko.json",json_encode($saiko));
}
$xch = $saiko['ch'];
///
$members = explode("\n",file_get_contents("members.txt"));
$count = count($members) -1;
if($tc == 'private' and !in_array($from_id,$members)){
file_put_contents('members.txt',$from_id."\n",FILE_APPEND);
}
///
$oop = $xch;
$join = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$oop&user_id=".$from_id);
$zr = str_replace("@","",$oop);
if($saiko['ch'] != null){
if($saiko['gch'] == "✅"){
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
عذراً يجب عليك الاشتراك في القناه لتستطيع استخدام البوت ⚠️
⏺ :  $oop
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اضغط هنا ✅' ,'url'=>"t.me/$zr"]],
]])
]);return false;
}
}
}
///
if($saiko['start'] == null){
$start = "
أهلاً بك في مصنع بوتات تحميل تيك توك 👋
يمكنك صنع بوتك الان خالي من الاعلانات 💯
";
}elseif($saiko['start'] != null){
$start = $saiko['start'];
}

if($text == "/start" and $from_id != $admin){
bot('sendmessage',['chat_id'=>$chat_id,
'text'=>"$start
⎯ ⎯ ⎯ ⎯
[كيفية صنع بوت تليكرام](http://telegra.ph/كيفية-صنع-بوت-تليكرام-12-10-3)
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"انشاء بوت 🆕" ,'callback_data'=>"new_bot"],['text'=>"بوتاتي 📃" ,'callback_data'=>"del_bot"]],
[['text'=>"حول ❗" ,'callback_data'=>"hol"]],
]])]);}
if($data == "back_r"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"$start
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"انشاء بوت 🆕" ,'callback_data'=>"new_bot"],['text'=>"بوتاتي 📃" ,'callback_data'=>"del_bot"]],
[['text'=>"حول ❗" ,'callback_data'=>"hol"]],
]])
]);
$saiko2['ok'][$from_id] = "0";
file_put_contents("saiko2.json",json_encode($saiko2));
}
///
if($text == "/start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
قائمة الادمن 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الاحصائيات 📈' ,'callback_data'=>"1"]],
[['text'=>'تغير الـstart 📮' ,'callback_data'=>"4"],['text'=>'قناة الاشتراك 📊' ,'callback_data'=>"2"]],
[['text'=>'الاشعارات ℹ️' ,'callback_data'=>"6"],['text'=>'الادمنية 👨🏼‍💼' ,'callback_data'=>"5"]],
[['text'=>'اذاعة 📨' ,'callback_data'=>"10"]],
[['text'=>'تحكم المصنع ⚙️' ,'callback_data'=>"15"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "back" and $from_id == $admin){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
قائمة الادمن 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الاحصائيات 📈' ,'callback_data'=>"1"]],
[['text'=>'تغير الـstart 📮' ,'callback_data'=>"4"],['text'=>'قناة الاشتراك 📊' ,'callback_data'=>"2"]],
[['text'=>'الاشعارات ℹ️' ,'callback_data'=>"6"],['text'=>'الادمنية 👨🏼‍💼' ,'callback_data'=>"5"]],
[['text'=>'اذاعة 📨' ,'callback_data'=>"10"]],
[['text'=>'تحكم المصنع ⚙️' ,'callback_data'=>"15"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
$hk = $saiko['hk'];
if($data == "15"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
قائمة تحكم المصنع ⚙️
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'تحديث البوتات المصنوعة 📤' ,'callback_data'=>"update"],['text'=>'ارسال اشعار 📃' ,'callback_data'=>"vvv"]],
[['text'=>'ارسال تصفية ⏺️' ,'callback_data'=>"send_t"]],
[['text'=>'حقوق المصنع : '.$hk.' ' ,'callback_data'=>"hk"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "hk" ){
if($saiko['hk']!="✅"){
$iu = "✅";
}else{
$iu = "❎";
}
$saiko['hk'] = $iu;
file_put_contents("saiko.json",json_encode($saiko));
$hk = $saiko['hk'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'تحديث البوتات المصنوعة 📤' ,'callback_data'=>"update"],['text'=>'ارسال اشعار 📃' ,'callback_data'=>"vvv"]],
[['text'=>'ارسال تصفية ⏺️' ,'callback_data'=>"send_t"]],
[['text'=>'حقوق المصنع : '.$hk.' ' ,'callback_data'=>"hk"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($data == "send_t"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"تم ارسال اشعار تصفية ✅", 
'show_alert'=>true,
]);
foreach($members as $ASEEL){
$url_info = file_get_contents("https://api.telegram.org/bot$saiko2[$ASEEL]/getMe");
$json_info = json_decode($url_info);
$userr = $json_info->result->username;
if($userr != null){
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"
اهلًا بك عزيزي 👋
هل انت بحاجه الئ بوتك @$userr ؟
⎯ ⎯ ⎯ ⎯
اذا كنت بحاجه اليه اضغط نعم .
اذا كنت لا تحتاجه اضغط لا من فضلك .
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'نعم' ,'callback_data'=>"back_r"],['text'=>'لا ، حذف البوت' ,'callback_data'=>"yes_d"]],
]])
]);
}
}
}
if($data == "vvv"){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"تم ارسال اشعار للمستخدمين بان تم تحديث البوتات 💬", 
'show_alert'=>true,
]);
foreach($members as $ASEEL){
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"*
أهلاً بك عزيزي 👋
لقد تم تحديث البوتات المصنوعة بنجاح ⏺
⎯ ⎯ ⎯ ⎯
اكتشف الجديد بنفسك ❗
*
",
'parse_mode'=>"MARKDOWN",
]);
}
}
if($data == "update"){
foreach(scandir('bots/') as $f2){
if($f2 != '.' and $f2 != '..'){
unlink("bots/$f2/saiko.php");
$abo = file_get_contents('in.php');
file_put_contents("bots/$f2/saiko.php", $abo); 
}
}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم تحديث جميع البوتات المصنوعة 🆕
",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
عدد الاعضاء : *$count*
  ⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($saiko['ch'] == null){
$ch = "لا توجد قناة حاليا";
}elseif($saiko['ch'] != null){
$ch = $saiko['ch'];
}
$nch = $saiko['gch'];
if($data == "2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
قنوات الاشتراك الاجباري 🔽
🔢 القناة : $ch
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حذف القناة 🗑️' ,'callback_data'=>"del_ch"],['text'=>'اضف قناة ➕' ,'callback_data'=>"add_ch"]],
[['text'=>'الاشتراك الاجباري '.$nch.'' ,'callback_data'=>"3"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "3" ){
if($saiko['gch']!="✅"){
$iu = "✅";
}else{
$iu ="❎";
}
$saiko['gch'] = $iu;
file_put_contents("saiko.json",json_encode($saiko));
$nch = $saiko['gch'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حذف القناة 🗑️' ,'callback_data'=>"del_ch"],['text'=>'اضف قناة ➕' ,'callback_data'=>"add_ch"]],
[['text'=>'الاشتراك الاجباري '.$nch.'' ,'callback_data'=>"3"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($data == "add_ch"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ارفعني ادمن في القناه وارسل معرف القناه مع @ ⏳
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ok'] = "ok_ch";
file_put_contents("saiko.json",json_encode($saiko));
exit();
}
if(preg_match("/@/",$text) and $saiko['ok'] == "ok_ch" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تم اضافه القناة الى الاشتراك الاجباري",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ok'] = "no";
$saiko['ch'] = $text;
file_put_contents("saiko.json",json_encode($saiko));
}
if(!preg_match("/@/",$text) and $saiko['ok'] == "ok_ch" and !$data and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حدث خطاء تاكد من معرف القناة ⚠️",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "del_ch" and $ch != "لا توجد قناة حاليا"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم حذف القناة $ch ✅
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
$saiko['ch'] = null;
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "del_ch" and $ch == "لا توجد قناة حاليا"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
لا توجد قناة ليتم حذفها ⚠️
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"2"]],
]])
]);
}
if($data == "4"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
يمكنك الان ارسال رسالة الـstart ⏳
رسالة الـstart الحالية : $start
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "ok_start";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text and $saiko['ok'] == "ok_start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم تغير رسالة الـstart الى ℹ️:
$text
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
$saiko['start'] = $text;
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "5"){
$key=[];
foreach ($saiko['admin'] as $ad){
$key[inline_keyboard][]=[[text=>"$ad",callback_data=>"del#$ad"]];
}
$key[inline_keyboard][]=[[text=>"اضف ادمن ➕",callback_data=>"add_admin"]];
$key[inline_keyboard][]=[[text=>"رجوع ↪️",callback_data=>"back"]];
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
يمكنك رفع ادمن وحذف ادمن عن طريق الازرار 🔽
⎯ ⎯ ⎯ ⎯
يمكن للادمن التحقق من الاحصائيات فقط ⚠️
",
reply_markup=>json_encode($key)
]);
}
$ex = explode("#", $data);
if($ex[0] == "del"){
$ser = array_search($ex[1],$saiko["admin"]);
unset($saiko["admin"][$ser]);
file_put_contents("saiko.json",json_encode($saiko));
$key=[];
foreach ($saiko['admin'] as $ad){
$key[inline_keyboard][]=[[text=>"$ad",callback_data=>"del#$ad"]];
}
$key[inline_keyboard][]=[[text=>"اضف ادمن ➕",callback_data=>"add_admin"]];
$key[inline_keyboard][]=[[text=>"رجوع ↪️",callback_data=>"back"]];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
reply_markup=>json_encode($key)
]);
}
if($data == "add_admin"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
الان ارسل ايدي الشخص ℹ️
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "ok_admin";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text  and $from_id == $admin and $saiko['ok'] == "ok_admin" and !in_array($text,$members)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
$text ليس عضو بالبوت ⚠️
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
$test = $saiko['admin'];
if($text and $from_id == $admin and $saiko['ok'] == "ok_admin" and in_array($text,$test)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
العضو مرفوع ادمن ⚠️
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
exit();
}
if($text and $from_id == $admin and $saiko['ok'] == "ok_admin" and in_array($text,$members)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم اضافه $text ادمن ✅
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['admin'][] = $text;
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($text== "/start" and in_array($from_id,$saiko['admin'])){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
عدد الاعضاء : *$count*
  ⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}
$d6 = $saiko['d6'];
$d7 = $saiko['d7'];
if($data == "6"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
اضغط لتعديل على القفل و الفتح 🔽
⎯ ⎯ ⎯ ⎯
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);
}
if($data == "d6" ){
if($saiko['d6']!="✅"){
$dp = "✅";
}else{
$dp ="❎";
}
$saiko['d6'] = $dp;
file_put_contents("saiko.json",json_encode($saiko));
$d6 = $saiko['d6'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($data == "d7" ){
if($saiko['d7']!="✅"){
$as = "✅";
}else{
$as ="❎";
}
$saiko['d7'] = $as;
file_put_contents("saiko.json",json_encode($saiko));
$d7 = $saiko['d7'];
bot('editMessageReplyMarkup',[
'chat_id'=>$update->callback_query->message->chat->id,
'message_id'=>$update->callback_query->message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'اشعارات الدخول '.$d6.'' ,'callback_data'=>"d6"]],
[['text'=>'اشعارات الاستخدام '.$d7.'' ,'callback_data'=>"d7"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back"]],
]])
]);}
if($message and $text != "/start" and $from_id != $admin and $d7 == "✅" and !$data){
bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
 'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
if($user == null){
$user = "None";
}elseif($user != null){
$user = $user;
}
if($text == "/start" and $from_id != $admin and $d6 == "✅" and !in_array($from_id,$members)){
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
تم دخول عضو جديد الى البوت ℹ️ :
الاسم : [$name]
المعرف : [@$user]
الايدي : [$from_id](tg://user?id=$from_id)
⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
]);
}
if($data == "10"){
			            bot('EditMessageText',[
	'chat_id'=>$chat_id, 
	'message_id'=>$message_id,
'text'=>"
ارسل الرساله التي تريد اذاعتها يمكن ان تكون (نص، صوره ، فديو، الخ) ⏳
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back"]],
]])
]);
$saiko['ok'] = "send";
file_put_contents("saiko.json",json_encode($saiko));
}
if(!$data and $saiko['ok'] == 'send' and $from_id == $admin){
				foreach($members as $ASEEL){
					if($text)
bot('sendMessage', [
'chat_id'=>$ASEEL,
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($photo)
bot('sendphoto', [
'chat_id'=>$ASEEL,
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video)
bot('Sendvideo',[
'chat_id'=>$ASEEL,
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($video_note)
bot('Sendvideonote',[
'chat_id'=>$ASEEL,
'video_note'=>$video_note_id,
]);
if($sticker)
bot('Sendsticker',[
'chat_id'=>$ASEEL,
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($file)
bot('SendDocument',[
'chat_id'=>$ASEEL,
'document'=>$file_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($music)
bot('Sendaudio',[
'chat_id'=>$ASEEL,
'audio'=>$music_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
if($voice)
bot('Sendvoice',[
'chat_id'=>$ASEEL,
'voice'=>$voice_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
					}
	             for($i=0;$i<count($members); $i++){
$ok = bot('sendChatAction' , ['chat_id' =>$members[$i],
'action' => 'typing' ,])->ok;
if($members[$i] != "" and $ok != 1){
file_put_contents("A5.txt","$members[$i]
",FILE_APPEND);
}}
$ooo = explode("\n",file_get_contents("A5.txt"));
$iii = count($ooo) - 1;
$mmm = $count - $iii;
					bot('sendmessage',[
	'chat_id'=>$chat_id, 
'text'=>"
تم الانتهاء من الاذاعة ✅
⎯ ⎯ ⎯ ⎯
تم ارسالها الى $mmm
لم ترسل الى $iii
⎯ ⎯ ⎯ ⎯
",
'parse_mode'=>"Markdown",
	'reply_to_meesage_id'=>$message_id,
]);
$saiko['ok'] = "no";
unlink("A5.txt");
file_put_contents("saiko.json",json_encode($saiko));
}
///
if($data == "new_bot" and $saiko2[$from_id] == null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل التوكن الان ⏳",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back_r"]],
]])
]);
$saiko2['ok'][$from_id] = "1";
file_put_contents("saiko2.json",json_encode($saiko2));
}
if($data == "new_bot" and $saiko2[$from_id] != null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"لديك بوت مصنوع ⚠️",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back_r"]],
]])
]);
}
preg_match("/\d{5,15}:[a-zA-Z_0-9-]{30,40}/i",$text,$ma_get_token);
$bmw = $ma_get_token[0];
$url_info = file_get_contents("https://api.telegram.org/bot$bmw/getMe");
$json_info = json_decode($url_info);
$userr = $json_info->result->username;
$idd =  $json_info->result->id;
$namee =  $json_info->result->first_name;
$get_tw = file_get_contents("in.php");
$get_api = file_get_contents("api.php");
$infoo = json_decode(file_get_contents("bots/$from_id/alll.json"),1);
if($bmw != null){
if($idd != null){
if($saiko2['ok'][$from_id] == "1"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
تم انشاء البوت : @$userr
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back_r"]],
]])
]);
mkdir("bots/$from_id");
mkdir("bots/$from_id/dir");
file_put_contents("bots/$from_id/saiko.php",$get_tw);
file_put_contents("bots/$from_id/api.php",$get_api);
file_get_contents("https://api.telegram.org/bot$bmw/setwebhook?url=https://www.dedo.cf/mybots/tws/bots/$from_id/saiko.php");
$saiko2['ok'][$from_id] = "0";
$saiko2[$from_id] = $bmw;
file_put_contents("saiko2.json",json_encode($saiko2));
$infoo['token'] = $text;
$infoo['id'] = $from_id;
file_put_contents("bots/$from_id/alll.json",json_encode($infoo));
}
}
}
if($bmw != null){
if($idd == null){
if($saiko2['ok'][$from_id] == "1"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
التوكن خطاء ، حاول مجدداً 🔄
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"back_r"]],
]])
]);
}
}
}
if($data == "del_bot" and $saiko2[$from_id] == null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"القائمة فارغة 📭",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back_r"]],
]])
]);
}
$url_info = file_get_contents("https://api.telegram.org/bot$saiko2[$from_id]/getMe");
$json_info = json_decode($url_info);
$userr = $json_info->result->username;
if($data == "del_bot" and $saiko2[$from_id] != null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"قائمة البوتات المصنوعة 📃
اضغط على البوت للحذف
⎯ ⎯ ⎯ ⎯",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'@'.$userr.' ' ,'callback_data'=>"clock"]],
[['text'=>'رجوع ↪️' ,'callback_data'=>"back_r"]],
]])
]);
}
if($data == "clock" and $saiko2[$from_id] != null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"هل انت متاكد ؟
عنده مسح البوت سيتم حذف جميع الداتا الخاصه بالبوت ⚠️",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'نعم' ,'callback_data'=>"yes_d"],['text'=>'لا' ,'callback_data'=>"del_bot"]],
]])
]);
}
if($data == "yes_d" and $saiko2[$from_id] != null){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"القائمة فارغة 📭
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back_r"]],
]])
]);
delTree("bots/$from_id");
unset($saiko2[$from_id]);
file_put_contents("saiko2.json",json_encode($saiko2));
}
if($data == "hol"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
حول :

قناة البوت : @ifiiiii 
اصدار البوت : 1.0
",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع ↪️' ,'callback_data'=>"back_r"]],
]])
]);
}