<?php
$token = "6075452535:AAEq1PDQKcEz3JU-iLjJxiEzOiiyQnZBdUg";
define('API_KEY',$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
            function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function SendChatAction($chat_id, $action)
{
    return bot('sendChatAction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}
function SendMessage($chat_id, $text, $parse_mode = "MARKDOWN", $disable_web_page_preview = true, $reply_to_message_id = null, $reply_markup = null)
{
    return bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => $parse_mode,
        'disable_web_page_preview' => $disable_web_page_preview,
        'disable_notification' => false,
        'reply_to_message_id' => $reply_to_message_id,
        'reply_markup' => $reply_markup
    ]);
}
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
$photo_id = $message->photo[back]->file_id;
$video_id= $message->video->file_id;
$sticker_id = $message->sticker->file_id;
$file_id = $message->document->file_id;
$music_id = $message->audio->file_id;
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
$title = $message->chat->title;
$admin = "1493063364";
///
$saiko = json_decode(file_get_contents("saiko.json"),1);
if($saiko['gch'] == null){
$saiko['gch'] = "❎";
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
المعذره عليك الاشتراك في قناة البوت 🌹
📢┇  $oop
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
$start = "WELCOME!!";
}elseif($saiko['start'] != null){
$start = $saiko['start'];
}
if($text == "/start" and $from_id != $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>$start,
'reply_to_message_id'=>$message->message_id,
]);
}
///
if($text == "/start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
اهلا بـك عزيـزي الادمن
تحكم في البوت من الاسفل🔐
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌯عدد الاعضاء⌯' ,'callback_data'=>"1"],['text'=>'⌯تغير رسالة الترحيب⌯' ,'callback_data'=>"4"]],
[['text'=>'⌯قناة الاشتراك⌯' ,'callback_data'=>"2"]],
[['text'=>'⌯الرسـائل⌯' ,'callback_data'=>"6"],['text'=>'⌯المشرفـين⌯' ,'callback_data'=>"5"]],
[['text'=>'⌯اذاعـه⌯' ,'callback_data'=>"10"]],
[['text'=>'اعدادات البوت' ,'callback_data'=>"backs"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "backs"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
اهلا بـك عزيـزي الادمن
تحكم في البوت من الاسفل🔐
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'⌯عدد الاعضاء⌯' ,'callback_data'=>"1"],['text'=>'⌯تغير رسالة الترحيب⌯' ,'callback_data'=>"4"]],
[['text'=>'⌯قناة الاشتراك⌯' ,'callback_data'=>"2"]],
[['text'=>'⌯الرسـائل⌯' ,'callback_data'=>"6"],['text'=>'⌯المشرفـين⌯' ,'callback_data'=>"5"]],
[['text'=>'⌯اذاعـه⌯' ,'callback_data'=>"10"]],
[['text'=>'اعدادات البوت' ,'callback_data'=>"backs"]],
]])
]);
$saiko['ok'] = "no";
file_put_contents("saiko.json",json_encode($saiko));
}
if($data == "1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
▱▱▱▱▱▱▱▱▱▱▱▱▱▱▱▱
الاعـضاء : *$count*
▱▱▱▱▱▱▱▱▱▱▱▱▱▱▱▱
",
'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'الغاء ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'الغاء ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
$key[inline_keyboard][]=[[text=>"رجوع ↪️",callback_data=>"backs"]];
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
[['text'=>'الغاء ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'رجوع ↪️' ,'callback_data'=>"backs"]],
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
[['text'=>'الغاء ↪️' ,'callback_data'=>"backs"]],
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


$update = json_decode(file_get_contents('php://input'));
$message= $update->message;
$text = $message->text;
$chat_id= $message->chat->id;
$name = $message->from->first_name;
$user = $message->from->username;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$a = strtolower($text);
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$tc = $message->chat->type  ;
$name = $message->from->first_name;


	$nmbr = "076788" ; #رقمك اسيا
$admin = 1493063364;
$chnl = "@msyassine" ;


$sudo = "$admin";

if($update->message->group_chat_created or $update->message->new_chat_member->username == bot('getme','bot')->result->username) {
	bot('sendMessage',[
       'chat_id'=>$chat_id ,
        'text'=>"ماشتغل بكروبات انا ✅" ,
    ]);
    bot('leaveChat',[ 
'chat_id'=>$chat_id, 
]);
 
	exit;
	} 
if($text and $from_id != $sudo){
bot('forwardMessage',[
'chat_id'=>$sudo,
'from_chat_id'=>$chat_id,
  'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
if($message->reply_to_message->forward_from->id and $from_id == $sudo){
    bot('sendMessage',[
       'chat_id'=>$message->reply_to_message->forward_from->id,
        'text'=>$text,
    ]);
    bot('sendmessage',[
       'chat_id'=>$sudo,
        'text'=>"
تم ارسال لرساله
",
]);
}

$ckl = $chnl; # معرف لقناة ويه @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$ckl."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$ckl))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$ckl);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
*
📣 ⁞ عليك الأشتراك في قناة البوت.
*
📢 ⁞ قناة البوت : [$ckl] 
*
📡 ⁞ اشترك بلقناة بعدها ارسل /start .
*
", 
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}

$hui = "@botatiiii" ; # معرف لقناة ويه @
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=".$hui."&user_id=".$from_id);
$getch2 = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=".$hui))->result;
$Namech2 = $getch2->title;
$getch2li = str_replace("@","",$hui);
if($message && (strpos($ch2,'"status":"left"') or strpos($ch2,'"Bad Request: USER_ID_INVALID"') or strpos($ch2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"
*
📣 ⁞ عليك الأشتراك في قناة البوت.
*
📢 ⁞ قناة البوت : [$hui] 
*
📡 ⁞ اشترك بلقناة بعدها ارسل /start .
*
", 
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>$Namech2,'url'=>"https://t.me/$getch2li"]],
]])
]);return false;}
$Api_Tok = "5af810b074797772ad17871f6424f8bf" ;#توكن لموقع
if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
$tc = $up->chat->type ;
}

$rshq = json_decode(file_get_contents("rshq.json"),true);


$rsedi = json_decode(file_get_contents("https://wiq.ru/api/v2?key=$Api_Tok&action=balance"));
$flos = $rsedi->balance; 
$treqa = $rsedi->currency; 

if($text == "همس") {
	if($chat_id == $admin ) {
	bot('sendMessage',[
'chat_id'=>$chat_id,

'text'=>"
*
◉︙قسم الرشق 
يمنك اضافه او خصم نقاط
يمكن قفل استقبال الرشق وفتحها
يمكنك صنع هدايا 
*

رصيدك في الموقع : *$flos$*
العمله : *$treqa*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
     [['text'=>"اضافه او خصم نقاط",'callback_data'=>"coins" ]],
     [['text'=>"صنع كود هديه",'callback_data'=>"hdiamk" ]],
     [['text'=>"فتح استقبال الرشق",'callback_data'=>"onrshq" ], ['text'=>"قفل استقبال الرشق",'callback_data'=>"ofrshq" ]], 
     

]
])
]);
$rshq['mode'][$from_id]  = null;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
}
}


if($data == "back") {
	if($chat_id == $admin ) {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
◉︙قسم الرشق 
يمنك اضافه او خصم نقاط
يمكن قفل استقبال الرشق وفتحها
يمكنك صنع هدايا 
*

رصيدك في الموقع : *$flos$*
العمله : *$treqa*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
     [['text'=>"اضافه او خصم نقاط",'callback_data'=>"coins" ]],
     [['text'=>"صنع كود هديه",'callback_data'=>"hdiamk" ]],
     [['text'=>"فتح استقبال الرشق",'callback_data'=>"onrshq" ], ['text'=>"قفل استقبال الرشق",'callback_data'=>"ofrshq" ]], 
     
]
])
]);
$rshq['mode'][$from_id]  = null;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
}
}

if($data == "hdiamk" and $chat_id == $admin ) {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
ارسل عدد النقاط داخل الهديه 

*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]],
       
      ]
    ])
]);
    $rshq['mode'][$from_id]  = "hdiMk";
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 

# - الملف كتابه بيرو @KT8TK 
$rnd=rand(999,99999);
if($text and $rshq['mode'][$from_id] == "hdiMk") {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   
  تم اضافة كود هدية جديد
 - - - - - - - - - - - - - - - - - - 
 الكود : `Bero". $rnd."`
 عدد النقاط : $text
 - - - - - - - - - - - - - - - - - - 
 بوت الرشق المجاني : [@".bot('getme','bot')->result->username. "] 
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"admin" ]],
       
      ]
    ])
]);
$rshq["Bero".$rnd]  = "on|$text";
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 
if($data == "onrshq") {
	if($chat_id == $admin ) {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
تم فتح استقبال الرشق
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"rshaq" ]], 
]
])
]);
$rshq['rshaq']  = "on";
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
}
}


if($data == "ofrshq") {
	if($chat_id == $admin ) {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
تم قفل استقبال الرشق
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"rshaq" ]], 
]
])
]);

$rshq['rshaq']  = "of";
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
}
}

if($data == "coins" and $chat_id == $admin ) {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
ارسل ايدي الشخص الان

*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]],
       
      ]
    ])
]);
    $rshq['mode'][$from_id]  = "coins";
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 

if($text and $rshq['mode'][$from_id] == "coins") {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   
   ارسل عدد النقاط لاضافته للشخص
   
اذا تريد تخصم كتب ويا - 
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"admin" ]],
       
      ]
    ])
]);
$rshq['mode'][$from_id]  = "coins2";
$rshq['id'][$from_id]  = "$text";
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 

if($text and $rshq['mode'][$from_id] == "coins2") {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   
  تم اضافه $text ل". $rshq['id'][$from_id]. "
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"admin" ]],
       
      ]
    ])
]);
$rshq['mode'][$from_id]  = null;
$rshq["coin"][$rshq['id'][$from_id]] += $text;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 

$rshq = json_decode(file_get_contents("rshq.json"),true);
if(!$rshq){
	bot('sendMessage',[
   'chat_id'=>$admin,
   'text'=>"
   *
~ تم ضبط الاعدادات تلقائيا ✨
*
  ", 
  'parse_mode'=>"markdown",
]);
	$rshq['rshaq'] = "✅" ;
	$rshq= json_encode($rshq,32|128|265);
    file_put_contents("rshq.json",$rshq); 
	} 
$rshaq = $rshq['rshaq'];
if($rshaq == "on") {
	$rshaq = "✅" ;
	} else {
		$rshaq = "❌" ;
		} 
$coin = $rshq["coin"][$from_id];
$bot_tlb = $rshq['bot_tlb'];
$mytl = $rshq["cointlb"][$from_id];
$share = $rshq["mshark"][$from_id] ;
$coinss = $rshq["coinss"][$from_id];
$tlby =$rshq["tlby"][$from_id];
if($rshq["coin"][$from_id] == null) {
	$coin = 0;
	}
	if($rshq["tlby"][$from_id] == null) {
	$tlby = 0;
	}
	if($rshq["coinss"][$from_id] == null) {
	$coinss = 0;
	}
	if($rshq["mshark"][$from_id] == null) {
	$share = 0;
	}
	if($rshq["cointlb"][$from_id] == null) {
	$mytl = 0;
	}
	if($rshq['bot_tlb'] == null) {
	$bot_tlb = 0;
	}

$e=explode("|", $data) ;
$e1=str_replace("/start",null,$text); 
if($text == "/start$e1" and is_numeric($e1) and !preg_match($text,"#Bero#")) {
	if(!in_array($e1, $rshq["3thu"])){
		if($e1 != $from_id) {
			if(!in_array($from_id , $rshq["3thu"])){
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
لقد دخلت لرابط الدعوه الخاص بصديقك وحصل علي *5* نقاط

  ", 
  'parse_mode'=>"markdown",
]);
bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"*
☆︙اهلا بك عزيزي $name 🤵

☆︙في بوت الرشق الافضل في التليجرام 🚀

☆︙يمكنك رشق جميع المنصات مجاناً بسهولة ⚡

☆︙تنفيذ تلقائي بأرخص الأسعار 🌍

☆︙ للمساعده : /help

≪━━━━━━━معلوماتك━━━━━━≫
⌯ الايدي :  $chat_id 🆔
⌯ عدد »رصيدك فالبوت💸 : $coin 💎
≪━━━━━اختر من الازرار👇━━━━≫
👥] الطلبات: $bot_tlb طلب
  *", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
   [['text'=>"»رصيدك فالبوت💸 ".$coin."",'callback_data'=>"coin" ]],
     [['text'=>"»قسم الخدمات🛒",'callback_data'=>"service" ],['text'=>"»معلومات حسابك📱",'callback_data'=>"acc" ]], [['text'=>"⌯تجميع نقاط⌯",'callback_data'=>"pluss" ]],
 [['text'=>"»كود قسيمة🎟️",'callback_data'=>"hdia" ],['text'=>"شراء النقاط 🎉",'callback_data'=>"buy" ]],
 [['text'=>"ا»عروض اليوم🥂",'callback_data'=>"sales" ]],
       
      ]
    ])
]);
$rshq["3thu"][] = $from_id ;
$rshq["coin"][str_replace(" ", null, $e1)] += 5;
$rshq["mshark"][str_replace(" ", null, $e1)] += 1;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq); 
} else {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"*
☆︙اهلا بك عزيزي $name 🎖

☆︙في بوت الرشق الافضل في التليجرام 🚀

☆︙يمكنك رشق جميع المنصات مجاناً بسهولة 🐳

☆︙تنفيذ تلقائي بأرخص الأسعار 🤯

☆︙ للمساعده : /help

≪━━━━━━━معلوماتك━━━━━━≫
⌯ الايدي :  $chat_id 🆔
⌯ عدد »رصيدك فالبوت💸 : $coin 💎
≪━━━━━اختر من الازرار👇━━━━≫
👥] الطلبات: $bot_tlb طلب
 * ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
   [['text'=>"»رصيدك فالبوت💸 ".$coin."",'callback_data'=>"coin" ]],
     [['text'=>"»قسم الخدمات🛒",'callback_data'=>"service" ],['text'=>"»معلومات حسابك📱",'callback_data'=>"acc" ]], [['text'=>"⌯تجميع نقاط⌯",'callback_data'=>"pluss" ]],
 [['text'=>"»كود قسيمة🎟️",'callback_data'=>"hdia" ],['text'=>"شراء النقاط 🎉",'callback_data'=>"buy" ]],
 [['text'=>"ا»عروض اليوم🥂",'callback_data'=>"sales" ]],
      ]
    ])
]);
} 
} else {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
لايمكنك الدخول لرابط الدعوه الخاص بك✅
  ", 

]);
bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"*
☆︙اهلا بك عزيزي $name 🎖

☆︙في بوت الرشق الافضل في التليجرام 🚀

☆︙يمكنك رشق جميع المنصات مجاناً بسهولة 🐳

☆︙تنفيذ تلقائي بأرخص الأسعار 🤯

☆︙ للمساعده : /help

≪━━━━━━━معلوماتك━━━━━━≫
⌯ الايدي :  $chat_id 🆔
⌯ عدد »رصيدك فالبوت💸 : $coin 💎
≪━━━━━اختر من الازرار👇━━━━≫
👥] الطلبات: $bot_tlb طلب
 * ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
   [['text'=>"»رصيدك فالبوت💸 ".$coin."",'callback_data'=>"coin" ]],
     [['text'=>"»قسم الخدمات🛒",'callback_data'=>"service" ],['text'=>"»معلومات حسابك📱",'callback_data'=>"acc" ]], [['text'=>"⌯تجميع نقاط⌯",'callback_data'=>"pluss" ]],
 [['text'=>"»كود قسيمة🎟️",'callback_data'=>"hdia" ],['text'=>"شراء النقاط 🎉",'callback_data'=>"buy" ]],
 [['text'=>"ا»عروض اليوم🥂",'callback_data'=>"sales" ]],
       
      ]
    ])
]);
} 
} else {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"*
☆︙اهلا بك عزيزي $name 🎖

☆︙في بوت الرشق الافضل في التليجرام 🚀

☆︙يمكنك رشق جميع المنصات مجاناً بسهولة 🐳

☆︙تنفيذ تلقائي بأرخص الأسعار 🤯

☆︙ للمساعده : /help

≪━━━━━━━معلوماتك━━━━━━≫
⌯ الايدي :  $chat_id 🆔
⌯ عدد »رصيدك فالبوت💸 : $coin 💎
≪━━━━━اختر من الازرار👇━━━━≫
👥] الطلبات: $bot_tlb طلب
  *", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
   [['text'=>"»رصيدك فالبوت💸 ".$coin."",'callback_data'=>"coin" ]],
     [['text'=>"»قسم الخدمات🛒",'callback_data'=>"service" ],['text'=>"»معلومات حسابك📱",'callback_data'=>"acc" ]], [['text'=>"⌯تجميع نقاط⌯",'callback_data'=>"pluss" ]],
 [['text'=>"»كود قسيمة🎟️",'callback_data'=>"hdia" ],['text'=>"شراء النقاط 🎉",'callback_data'=>"buy" ]],
 [['text'=>"ا»عروض اليوم🥂",'callback_data'=>"sales" ]],
       
      ]
    ])
]);
} 
} 

# - الملف كتابه بيرو B_BB_N! #

if($text == "/start") {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"*
☆︙اهلا بك عزيزي $name 🎖

☆︙في بوت الرشق الافضل في التليجرام 🚀

☆︙يمكنك رشق جميع المنصات مجاناً بسهولة 🐳

☆︙تنفيذ تلقائي بأرخص الأسعار 🤯

☆︙ للمساعده : /help

≪━━━━━━━معلوماتك━━━━━━≫
⌯ الايدي :  $chat_id 🆔
⌯ عدد »رصيدك فالبوت💸 : $coin 💎
≪━━━━━اختر من الازرار👇━━━━≫
👥] الطلبات: $bot_tlb طلب
*  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
   [['text'=>"»رصيدك فالبوت💸 ".$coin."",'callback_data'=>"coin" ]],
     [['text'=>"»قسم الخدمات🛒",'callback_data'=>"service" ],['text'=>"»معلومات حسابك📱",'callback_data'=>"acc" ]], [['text'=>"⌯تجميع نقاط⌯",'callback_data'=>"pluss" ]],
 [['text'=>"»كود قسيمة🎟️",'callback_data'=>"hdia" ],['text'=>"شراء النقاط 🎉",'callback_data'=>"buy" ]],
 [['text'=>"ا»عروض اليوم🥂",'callback_data'=>"sales" ]],
       
      ]
    ])
]);
 }
 
 if($data == "buy") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
⌁ لشراء نقاط من بوت رشق 𝙷𝙼𝚂 𓆩˹ 𝙷𝙼𝚂𓃠 ˼𓆪💲↫ ⤈ 

⌁︰1$ ↬ 1000 نقطة في البوت
⌁︰5$ ↬ 5000 نقطة في البوت
⌁︰10$ ↬ 11000 نقطة في البوت
- - - - - - - - - - - - - - -
• ⋯ • ⋯ • ⋯ • ⋯ • ⋯ •• ⋯ • ⋯ • ⋯ • ⋯ • 
⌁ للتواصل 
⌁︰@msyassine , @ZQTBOT
- - - - - - - - - - - - - - -
⌁︙طرق الدفع 
⌁︰سبأفون , يمن موبايل , كريمي , النجم .
⌁︰سوا , موبايلي , راجحي , فودافون كاش .
⌁︰زين كاش , آسيا , رايزر , مدار , ليبيانا .
⌁︰بتك, بايير , USDT , ستيم , ايتونز .
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
} 


if($data == "tobot") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*
☆︙اهلا بك عزيزي $name 🎖

☆︙في بوت الرشق الافضل في التليجرام 🚀

☆︙يمكنك رشق جميع المنصات مجاناً بسهولة 🐳

☆︙تنفيذ تلقائي بأرخص الأسعار 🤯

☆︙ للمساعده : /help

≪━━━━━━━معلوماتك━━━━━━≫
⌯ الايدي :  $chat_id 🆔
⌯ عدد »رصيدك فالبوت💸 : $coin 💎
≪━━━━━اختر من الازرار👇━━━━≫
👥] الطلبات: $bot_tlb طلب
*",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
   [['text'=>"»رصيدك فالبوت💸 ".$coin."",'callback_data'=>"coin" ]],
     [['text'=>"»قسم الخدمات🛒",'callback_data'=>"service" ],['text'=>"»معلومات حسابك📱",'callback_data'=>"acc" ]], [['text'=>"⌯تجميع نقاط⌯",'callback_data'=>"pluss" ]],
 [['text'=>"»كود قسيمة🎟️",'callback_data'=>"hdia" ],['text'=>"شراء النقاط 🎉",'callback_data'=>"buy" ]],
 [['text'=>"ا»عروض اليوم🥂",'callback_data'=>"sales" ]],
       
      ]
    ])
]);
} 

$rshq = json_decode(file_get_contents("rshq.json"),true);
if($data == "hdia") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ارسل رمز الهدية الان
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
    $rshq['mode'][$from_id]  = "hdia";
   
    
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 


if($data == "transer") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ارسل عدد النقاط لتحويله 🎉
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
    $rshq['mode'][$from_id]  = $data;
   
    
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 


$MakLink = substr(str_shuffle('AbCdEfGhIjKlMnOpQrStU12345689807'),1,13);
if(is_numeric($text) and $rshq['mode'][$from_id] == "transer") {
	if($rshq["coin"][$from_id] >= $text) {
		if(!preg_match('/+/',$text) or !preg_match('/-/',$text) ){
			if($text >= 20) {
		bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
تم صنع رابط تحويل بقيمه $text نقاط 💲
- وتم استقطاع *$text* من »رصيدك فالبوت💸 ➖

الرابط : https://t.me/". bot('getme','bot')->result->username. "?start=Bero$MakLink

ايدي وصل التحويل : `". base64_encode($MakLink). "`

صار عدد »رصيدك فالبوت💸 : *". $rshq["coin"][$from_id]. "*
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
$rshq["coin"][$from_id] -= $text;
$rshq['mode'][$from_id]  = null;
$rshq['thoiler'][$MakLink]["coin"] = $text;
$rshq['thoiler'][$MakLink]["to"] = $from_id;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 
else 
{
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
يمكنك تحويل نقاط اكثر من 20 فقط
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
} 

 } 
else
 {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
لاتحاول استخدام الكلجات سيتم حظرك عام؟ 👎
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
	} 
	} else {
		bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
»رصيدك فالبوت💸 غير كافيه ❌🗣️
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
} 
		} 
	
if($text and $rshq['mode'][$from_id] == "hdia") {
	if(explode("|", $rshq[$text])[0] == "on") {
		if($rshq['mehdia'][$from_id][$text] !="on" ) {
		bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
~ لقد حصلت علي". explode("|", $rshq[$text])[1]. " نقطه من كود الهديه
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
bot('sendMessage',[
   'chat_id'=>$admin,
   'text'=>"
هذا اخذ كود الهديه بقيمه".explode("|", $rshq[$text])[1]."
 
 ~ [$name](tg://user?id=$chat_id) 
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
$rshq['mode'][$from_id] = null;
$rshq['mehdia'][$from_id][$text] = "on" ;
$rshq["coin"][$from_id] += explode("|", $rshq[$text])[1];
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} else {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   انت مستخدم الكود من قبل
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
	} 
	} else {
		bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
كود الهدية خطأ
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
       
      ]
    ])
]);
$rshq['mode'][$from_id]  = null;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
		} 
	} 
if($data == "plus") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
💻 ┇ البوت الرشق الاول في التلجرام
⌯ يمكنك الخصول علي 5 نقاط من كل شخص يدخل رابط الدعوع
⌯ التحكم الكامل في البوت
⌯ جميع الاقسام مجانيه
⌯⌯⌯⌯⌯⌯⌯⌯⌯⌯⌯ الـرابــط ⌯⌯⌯⌯⌯⌯⌯⌯⌯⌯⌯
    
https://t.me/". bot('getme','bot')->result->username. "?start=$from_id
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>"⌯انـشاء اعـلان⌯",'callback_data'=>"ilan" ]],
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
} 

if($data == "info") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
البوت الاول في التليجرام لزيادة متابعين الانستقرام بشكل فوري و سريع و بنسبة ثبات 99% 

    كل ماعليك هو دعوة اصدقائك من خلال الرابط الخاص بك وستحصل على متابعين مقابل كل شخص تحصل تدعوه تحصل على 10 نقاط
    
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
} 


if($data == "mstqbll") {
	if($rshq['rshaq'] == "on") {
	$ster = "مفتوح ✅" ;
	$wsfer = "يمكنك الرشق ✅" ;
	} else {
		$ster = "مقفل ❌" ;
		$wsfer = "لايمكنك الرشق حاليا اجمع نقاط لحد ما ينفتح ❌" ;
		} 
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
استقبال الرشق $ster
- $wsfer
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);

} 

# - الملف كتابه بيرو @PvPPPP) #
# بـيــرو @PvPPPP - @JJJNTJ 

$e1=str_replace("/start Bero",null,$text); 
if(preg_match('/start Bero/',$text)){
	if($rshq['thoiler'][$e1]["to"] != null) {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
  لقد حصلت علي *". $rshq['thoiler'][$e1]["coin"]. "* نقاط من رابط التحويل
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
bot('sendMessage',[
   'chat_id'=>$rshq['thoiler'][$e1]["to"],
   'text'=>"
   تحويل مكتمل 💯
   
   معلومات الي دخل للرابط ✅
 اسمه : [$name](tg://user?id=$chat_id)
 ايديه : `$from_id`
 
 وتم تحويل". $rshq['thoiler'][$e1]["coin"]." نقاط لحسابه
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
$rshq['thoiler'][$e1]["to"] = null;
$rshq["coin"][$from_id] += $rshq['thoiler'][$e1]["coin"];
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} else {
	bot('sendMessage',[
   'chat_id'=>$from_id, 
   'text'=>"
   رابط التحويل هذا غير صالح ❌
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
	} 
} 
if($data == "acc") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

*معلومات حسابك هي👇*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>":نقاطـك ",'callback_data'=>"coin" ],['text'=>"".$coin."",'callback_data'=>"coin" ]],
      [['text'=>":مـشاركة الرابط ",'callback_data'=>"coin" ],['text'=>"".$share."",'callback_data'=>"coin" ]],
            [['text'=>":النقاط المصروفة ",'callback_data'=>"coin" ],['text'=>"".$mytl."",'callback_data'=>"coin" ]],
        [['text'=>":الايدي ",'callback_data'=>"coin" ],['text'=>"".$from_id."",'callback_data'=>"coin" ]],
              [['text'=>"مـعلوماتـك ".$user."",'callback_data'=>"coin" ]],
     [['text'=>":اموالك المسترجعه جزئيا ",'callback_data'=>"coin" ],['text'=>"".$coinss."",'callback_data'=>"coin" ]],
   [['text'=>":الطلبات في البوت",'callback_data'=>"coin" ],['text'=>"". $tlby."",'callback_data'=>"coin" ]],
           [['text'=>":الطلبات المكتمله ",'callback_data'=>"coin" ],['text'=>"".$tlby."",'callback_data'=>"coin" ]],
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
} 

 if($data == "service") {
 	if($rshaq == "✅") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
اختر البرنامج  المطلوب
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'قسـم رشـق تلجرام Telegram 🤖🔥' ,'callback_data'=>"tele"]], 
[['text'=>'قـسم رشـق انسـتجرام inistgram🚀🤩' ,'callback_data'=>"ini"]],
[['text'=>'قـسم رشـق تيـك توك tiktok 🏆🌹' ,'callback_data'=>"tik"]],
[['text'=>'قـسم رشـق فيـس بوك facebook🌎👨‍✈️' ,'callback_data'=>"face"]],
[['text'=>'قـسم رشـق تويـتر twitter🎁💻' ,'callback_data'=>"twi"]], 
[['text'=>'قـسم رشـق يـوتيـوب youtube 📢🔊' ,'callback_data'=>"yot"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
]])
]);
} else {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
تم قفل استقبال الرشق عزيزي

اجمع نقاط الان علماينفتح الرشق
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[

[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
]])
]);
	} 
} 


if($data == "infotlb") {
 	
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
ارسل ايدي الطلب الان
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
]])
]);
    $rshq['mode'][$from_id]  = $data;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
}

if(is_numeric($text) and $rshq['mode'][$from_id] == "infotlb"){
	if($rshq["order"][$text] != null){
		$req = json_decode(file_get_contents("https://kd1s.com/api/v2?key=$Api_Tok&action=status&order=".$rshq["order"][$text]));
$startcc = $req->start_count; //224
$status = $req->remains; 
if($status == "0"){
	$s= "طلب مكتمل 🟢";
	}else{
		$s="قيد الانتضار ....";
		}
		bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
معلومات الطلب ،
حاله الطلب : $s
العدد قبل الرشق : $startcc
  ", 
 'parse_mode'=>"markdown",
 'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>'تحديث' ,'callback_data'=>"updates|".$rshq["order"][$text]]],
     [['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
$rshq['mode'][$from_id]  = null;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
}
}

if($e[0] == "updates"){
	$req = json_decode(file_get_contents("https://kd1s.com/api/v2?key=$Api_Tok&action=status&order=".$e[1]));
$startcc = $req->start_count; 
$status = $req->remains; 
if($status == "0"){
	$sberero= "طلب مكتمل 🟢";
	}else{
		$sberero="قيد الانتضار ....";
		}
		bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تحديث رقم (".rand(9999,999999).")
معلومات الطلب ،
حاله الطلب : $sberero
العدد قبل الرشق : $startcc
  ", 
 'parse_mode'=>"markdown",
 'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>'تحديث' ,'callback_data'=>"updates|".$e[1]]],
     [['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
	}
if($e[0] == "type"){
	
	if($e[1] == "thbt" or $e[1] == "mthbt" or $e[1] == "hq" ) {
		$typee = "متابعين" ;
		} elseif($e[1] == "view"){
			$typee = "مشاهدات";
			}elseif($e[1] == "like"){
				$typee = "لايكات";
				}
		
		if($e[1] == "thbt") {
			$s3r = 1;
			}
			if($e[1] == "mthbt") {
			$s3r = 2;
			}
			if($e[1] == "hq") {
			$s3r = 0.2;
			}
			if($e[1] == "view") {
			$s3r = 25;
			}
			
			if($e[1] == "like") {
			$s3r = 18;
			}
			if($e[1] == "likrels") {
			$s3r = 3;
			}
			if($e[1] == "vuerils") {
			$s3r = 10;
			}
			if($e[1] == "foloarb") {
			$s3r = 0.3;
			}
			if($e[1] == "likkal") {
			$s3r = 1;
			}
			if($e[1] == "commlik") {
			$s3r = 0.8;
			}
			if($e[1] == "realkil") {
			$s3r = 3;
			}
			if($e[1] == "mixfla") {
			$s3r = 2;
			}
			if($e[1] == "ralvew") {
			$s3r = 3;
			}
			if($e[1] == "spefom") {
			$s3r = 3;
			}
			if($e[1] == "qwaty") {
			$s3r = 4;
			}
			if($e[1] == "livty") {
			$s3r = 5;
			}
			if($e[1] == "peptri") {
			$s3r = 2.1;
			}
			if($e[1] == "peobsvh") {
			$s3r = 1;
			}
			if($e[1] == "pelbxsvc") {
			$s3r = 0.8;
			}
			if($e[1] == "vionew") {
			$s3r = 25;
			}
			if($e[1] == "viwefiv") {
			$s3r = 19;
			}
			if($e[1] == "commionb") {
			$s3r = 0.5;
			}
			if($e[1] == "indiaco") {
			$s3r = 0.4;
			}
			if($e[1] == "taswet") {
			$s3r = 3;
			}
			if($e[1] == "thya") {
			$s3r = 6;
			}
			if($e[1] == "nothya") {
			$s3r = 6;
			}
			if($e[1] == "hartthu") {
			$s3r = 6;
			}
			if($e[1] == "firerak") {
			$s3r = 6;
			}
			if($e[1] == "starreak") {
			$s3r = 6;
			}
			if($e[1] == "surarek") {
			$s3r = 6;
			}
			if($e[1] == "demareak") {
			$s3r = 6;
			}
			if($e[1] == "sorkre") {
			$s3r = 6;
			}
			if($e[1] == "smirseb") {
			$s3r = 6;
			}
			if($e[1] == "kakarekt") {
			$s3r = 6;
			}
			if($e[1] == "targrekt") {
			$s3r = 6;
			}
			if($e[1] == "fackyourect") {
			$s3r = 6;
			}
			if($e[1] == "facepeb") {
			$s3r = 1;
			}
			if($e[1] == "favelik") {
			$s3r = 2;
			}
			if($e[1] == "faceegbo") {
			$s3r = 2.5;
			}
			if($e[1] == "facflk") {
			$s3r = 2.5;
			}
			if($e[1] == "facharch") {
			$s3r = 4;
			}
			if($e[1] == "sminshfacwc") {
			$s3r = 2.5;
			}
			if($e[1] == "wowrafv") {
			$s3r = 2.5;
			}
			if($e[1] == "sadface") {
			$s3r = 2.5;
			}
			if($e[1] == "angrefaceb") {
			$s3r = 2.5;
			}
			if($e[1] == "carefacec") {
			$s3r = 2.5;
			}
			if($e[1] == "comlikfav") {
			$s3r = 3;
			}
			if($e[1] == "viewvidfa") {
			$s3r = 5;
			}
			if($e[1] == "actoreface") {
			$s3r = 5;
			}
			if($e[1] == "viewyoutube") {
			$s3r = 0.6;
			}
			if($e[1] == "viewralyou") {
			$s3r = 1;
			}
			if($e[1] == "vierahfyou") {
			$s3r = 0.5;
			}
			if($e[1] == "likecomyo") {
			$s3r = 3;
			}
			if($e[1] == "likeyoufa") {
			$s3r = 1;
			}
			if($e[1] == "peopltik") {
			$s3r = 0.3;
			}
			if($e[1] == "liketikbr") {
			$s3r = 3;
			}
			if($e[1] == "tikviesto") {
			$s3r = 6;
			}
			if($e[1] == "freeviewtik") {
			$s3r = 18;
			}
			if($e[1] == "livliktk") {
			$s3r = 6;
			}
			if($e[1] == "sahretik") {
			$s3r = 5;
			}
			if($e[1] == "pepltwi") {
			$s3r = 0.3;
			}
			if($e[1] == "taswttwi") {
			$s3r = 1;
			}
			if($e[1] == "vidvitwi") {
			$s3r = 6;
			}
			if($e[1] == "menhtwi") {
			$s3r = 0.8;
			}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
🙋‍♂️︙رشق 𝙷𝙼𝚂

🎬︙يرجى إختيار نوع الرشق من الأسفل. 👇
⌯ »رصيدك فالبوت💸 ➧ $coin
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>$nm.$s3r*100,'callback_data'=>"to|100|$e[1]"], ['text'=>'➧','callback_data'=>"to|100|$e[1]"], ['text'=>'100 نقطه','callback_data'=>"to|100|$e[1]"]], 
[['text'=>$nm.$s3r*200,'callback_data'=>"to|200|$e[1]"], ['text'=>'➧','callback_data'=>"to|200|$e[1]"], ['text'=>'200 نقطه' ,'callback_data'=>"to|200|$e[1]"]],
[['text'=>$nm.$s3r*300,'callback_data'=>"to|300|$e[1]"], ['text'=>'➧','callback_data'=>"to|300|$e[1]"], ['text'=>'300 نقطه' ,'callback_data'=>"to|300|$e[1]"]],
[['text'=>$nm.$s3r*400,'callback_data'=>"to|400|$e[1]"], ['text'=>'➧','callback_data'=>"to|400|$e[1]"], 
['text'=>'400 نقطه' ,'callback_data'=>"to|400|$e[1]"]],
[['text'=>'كميات كبيره' ,'callback_data'=>"kmiat|".$e[1]]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
]])
]);
} 

if($e[0] == "kmiat"){
	
	if($e[1] == "thbt" or $e[1] == "mthbt" or $e[1] == "hq" ) {
		$typee = "متابعين" ;
		} elseif($e[1] == "view"){
			$typee = "مشاهدات";
			}elseif($e[1] == "like"){
				$typee = "لايكات";
				}
		
		if($e[1] == "thbt") {
			$s3r = 1;
			}
			if($e[1] == "mthbt") {
			$s3r = 2;
			}
			if($e[1] == "hq") {
			$s3r = 0.2;
			}
			if($e[1] == "view") {
			$s3r = 25;
			}
			
			if($e[1] == "like") {
			$s3r = 18;
			}
			if($e[1] == "likrels") {
			$s3r = 3;
			}
				if($e[1] == "vuerils") {
			$s3r = 10;
			}
			if($e[1] == "foloarb") {
			$s3r = 0.3;
			}
			if($e[1] == "likkal") {
			$s3r = 1;
			}
			if($e[1] == "commlik") {
			$s3r = 0.8;
			}
			if($e[1] == "realkil") {
			$s3r = 3;
			}
			if($e[1] == "mixfla") {
			$s3r = 2;
			}
			if($e[1] == "ralvew") {
			$s3r = 3;
			}
			if($e[1] == "spefom") {
			$s3r = 3;
			}
			if($e[1] == "qwaty") {
			$s3r = 4;
			}
			if($e[1] == "livty") {
			$s3r = 5;
			}
			if($e[1] == "peptri") {
			$s3r = 2.1;
			}
			if($e[1] == "peobsvh") {
			$s3r = 1;
			}
			if($e[1] == "pelbxsvc") {
			$s3r = 0.8;
			}
			if($e[1] == "vionew") {
			$s3r = 25;
			}
			if($e[1] == "viwefiv") {
			$s3r = 19;
			}
			if($e[1] == "commionb") {
			$s3r = 0.5;
			}
			if($e[1] == "indiaco") {
			$s3r = 0.4;
			}
			if($e[1] == "taswet") {
			$s3r = 3;
			}
			if($e[1] == "thya") {
			$s3r = 6;
			}
			if($e[1] == "nothya") {
			$s3r = 6;
			}
			if($e[1] == "hartthu") {
			$s3r = 6;
			}
			if($e[1] == "firerak") {
			$s3r = 6;
			}
			if($e[1] == "starreak") {
			$s3r = 6;
			}
			if($e[1] == "surarek") {
			$s3r = 6;
			}
			if($e[1] == "demareak") {
			$s3r = 6;
			}
			if($e[1] == "sorkre") {
			$s3r = 6;
			}
			if($e[1] == "smirseb") {
			$s3r = 6;
			}
			if($e[1] == "kakarekt") {
			$s3r = 6;
			}
			if($e[1] == "targrekt") {
			$s3r = 6;
			}
			if($e[1] == "fackyourect") {
			$s3r = 6;
			}
			if($e[1] == "facepeb") {
			$s3r = 1;
			}
			if($e[1] == "favelik") {
			$s3r = 2;
			}
			if($e[1] == "faceegbo") {
			$s3r = 2.5;
			}
			if($e[1] == "facflk") {
			$s3r = 2.5;
			}
			if($e[1] == "facharch") {
			$s3r = 3;
			}
			if($e[1] == "sminshfacwc") {
			$s3r = 2.5;
			}
			if($e[1] == "wowrafv") {
			$s3r = 2.5;
			}
			if($e[1] == "sadface") {
			$s3r = 2.5;
			}
			if($e[1] == "angrefaceb") {
			$s3r = 2.5;
			}
			if($e[1] == "carefacec") {
			$s3r = 2.5;
			}
			if($e[1] == "comlikfav") {
			$s3r = 3;
			}
			if($e[1] == "viewvidfa") {
			$s3r = 5;
			}
			if($e[1] == "actoreface") {
			$s3r = 5;
			}
			if($e[1] == "viewyoutube") {
			$s3r = 0.6;
			}
			if($e[1] == "viewralyou") {
			$s3r =1;
			}
			if($e[1] == "vierahfyou") {
			$s3r =0.5;
			}
			if($e[1] == "likecomyo") {
			$s3r =2;
			}
			if($e[1] == "likeyoufa") {
			$s3r =1;
			}
			if($e[1] == "peopltik") {
			$s3r =0.3;
			}
			if($e[1] == "liketikbr") {
			$s3r =3;
			}
			if($e[1] == "tikviesto") {
			$s3r =5;
			}
			if($e[1] == "freeviewtik") {
			$s3r =18;
			}
			if($e[1] == "livliktk") {
			$s3r =6;
			}
			if($e[1] == "sahretik") {
			$s3r =5;
			}
			if($e[1] == "pepltwi") {
			$s3r =0.3;
			}
			if($e[1] == "taswttwi") {
			$s3r =1;
			}
			if($e[1] == "vidvitwi") {
			$s3r =6;
			}
			if($e[1] == "menhtwi") {
			$s3r =0.8;
			}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
🙋‍♂️︙رشق 𝙷𝙼𝚂

🎬︙يرجى إختيار نوع الرشق من الأسفل. 👇
⌯ »رصيدك فالبوت💸 ➧ $coin
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>$nm.$s3r*1000,'callback_data'=>"to|1000|$e[1]"],['text'=>'➧','callback_data'=>"to|1000|$e[1]"], ['text'=>'1000 نقطه' ,'callback_data'=>"to|1000|$e[1]"]],
[['text'=>$nm.$s3r*2000,'callback_data'=>"to|2000|$e[1]"], ['text'=>'➧','callback_data'=>"to|2000|$e[1]"], ['text'=>'2000 نقطه' ,'callback_data'=>"to|2000|$e[1]"]],
[['text'=>$nm.$s3r*4000,'callback_data'=>"to|4000|$e[1]"], 
['text'=>'➧','callback_data'=>"to|4000|$e[1]"], 
['text'=>'4000 نقطه' ,'callback_data'=>"to|4000|$e[1]"]],
[['text'=>$nm.$s3r*8000,'callback_data'=>"to|8000|$e[1]"], ['text'=>'➧','callback_data'=>"to|8000|$e[1]"], 
['text'=>'8000 نقطه' ,'callback_data'=>"to|8000|$e[1]"]],
[['text'=>$nm.$s3r*10000,'callback_data'=>"to|10000|$e[1]"], ['text'=>'➧','callback_data'=>"to|10000|$e[1]"],
['text'=>'10000 نقطه' ,'callback_data'=>"to|10000|$e[1]"]],
[['text'=>$nm.$s3r*20000,'callback_data'=>"to|20000|$e[1]"], ['text'=>'➧','callback_data'=>"to|20000|$e[1]"], 
['text'=>'20000 نقطه' ,'callback_data'=>"to|400|$e[1]"]],

[['text'=>'رجوع' ,'callback_data'=>"type|". $e[1]]],
]])
]);
} 


if($e[0] == "to") {
	if($coin >= $e[1]){
		if($rshaq == "✅") {
			
	if($e[2] == "thbt") {
		$tlbia = "متابعين ثابتين 📌👤" ;
			$nm = "يوزر حسابك بدون @" ;
			$s3r = $e[1]*1;
			}
			if($e[2] == "mthbt") {
			$nm = "يوزر حسابك بدون @" ;
			$tlbia = "متابعين غير ثابتين ⭐" ;
			$s3r = $e[1]*2;
			}
			if($e[2] == "hq") {
				$tlbia = "متابعين حقيقيين 👤" ;
			$nm = "يوزر حسابك بدون @" ;
			$s3r = $e[1]*0.5;
			}
			if($e[2] == "view") {
				$tlbia = "مشاهدات 👁️" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*25;
			}
			if($e[2] == "like") {
				$tlbia = "لايكات ❤️" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*15;
			}
			if($e[2] == "likrels") {
				$tlbia = "لايكات ريلز" ;
			$nm = "رابط الريلز" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "vuerils") {
				$tlbia = "مشاهدات ريلز" ;
			$nm = "رابط الريلز" ;
			$s3r = $e[1]*10;
			}
			if($e[2] == "foloarb") {
				$tlbia = "متابيعن عربي" ;
			$nm = "رابط الحساب" ;
			$s3r = $e[1]*0.5;
			}
			if($e[2] == "commlik") {
				$tlbia = "لايكات تعليقات" ;
			$nm = "رابط الكومنت" ;
			$s3r = $e[1]*0.8;
			}
			if($e[2] == "realkil") {
				$tlbia = "لايكات انستجرام صاروخ" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "mixfla") {
				$tlbia = "متابعين انستجرام مكس حقيقي" ;
			$nm = "رابط الحساب" ;
			$s3r = $e[1]*2;
			}
			if($e[2] == "ralvew") {
				$tlbia = "مشاهدات حقيقي" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "spefom") {
				$tlbia = "متابعين من نوع خاص" ;
			$nm = "رابط الحساب" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "qwaty") {
				$tlbia = "متابعين انستقرام جودة عالية | فوري 🚀" ;
			$nm = "رابط الحساب" ;
			$s3r = $e[1]*4;
			}
			if($e[2] == "livty") {
				$tlbia = "لايكات بث مباشر" ;
			$nm = "رابط البث" ;
			$s3r = $e[1]*5;
			}
			if($e[2] == "peptri") {
				$tlbia = "اعضاء قنوات" ;
			$nm = "رابط القناه" ;
			$s3r = $e[1]*2.1;
			}
			if($e[2] == "peobsvh") {
				$tlbia = "اعضاء قنوات مع ضمان" ;
			$nm = "رابط القناه" ;
			$s3r = $e[1]*1;
			}
			if($e[2] == "pelbxsvc") {
				$tlbia = "اعضاء قنوات فارسي بدون ضمان" ;
			$nm = "رابط القناه" ;
			$s3r = $e[1]*0.8;
			}
			if($e[2] == "vionew") {
				$tlbia = "مشاهدات 1 بوست" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*25;
			}
			if($e[2] == "viwefiv") {
				$tlbia = "مشاهدات 5 اخر بوست" ;
			$nm = "رابط القناه" ;
			$s3r = $e[1]*19;
			}
			if($e[2] == "commionb") {
				$tlbia = "تعليقات عربي" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*0.5;
			}
			if($e[2] == "indiaco") {
				$tlbia = "تعليقات هندي" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*0.4;
			}
			if($e[2] == "taswet") {
				$tlbia = "تصويتات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "thya") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "nothya") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "hartthu") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "firerak") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "starreak") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "surarek") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "demareak") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "sorkre") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "smirseb") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "kakarekt") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "targrekt") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "fackyourect") {
				$tlbia = "تفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "facepeb") {
				$tlbia = "متابعين" ;
			$nm = "رابط الحساب" ;
			$s3r = $e[1]*1;
			}
			if($e[2] == "favelik") {
				$tlbia = "لايكات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2;
			}
			if($e[2] == "faceegbo") {
				$tlbia = "لايكات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2.5;
			}
			if($e[2] == "facflk") {
				$tlbia = "لايكات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2.5;
			}
			if($e[2] == "facharch") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "sminshfacwc") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2.5;
			}
			if($e[2] == "wowrafv") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2.5;
			}
			if($e[2] == "sadface") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2.5;
			}
			if($e[2] == "angrefaceb") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2.5;
			}
			if($e[2] == "carefacec") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*2.5;
			}
			if($e[2] == "comlikfav") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "viewvidfa") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*5;
			}
			if($e[2] == "actoreface") {
				$tlbia = "نفاعلات" ;
			$nm = "رابط المنشور" ;
			$s3r = $e[1]*5;
			}
			if($e[2] == "tikviesto") {
				$tlbia = "مشاهدات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "viewyoutube") {
				$tlbia = "مشاهدات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*0.6;
			}
			if($e[2] == "viewralyou") {
				$tlbia = "مشاهدات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*1;
			}
			if($e[2] == "vierahfyou") {
				$tlbia = "مشاهدات" ;
			$nm = "رابط البث" ;
			$s3r = $e[1]*0.5;
			}
			if($e[2] == "likecomyo") {
				$tlbia = "لايكات" ;
			$nm = "رابط التعليق" ;
			$s3r = $e[1]*2;
			}
			if($e[2] == "likeyoufa") {
				$tlbia = "لايكات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*1;
			}
			if($e[2] == "peopltik") {
				$tlbia = "متابعين" ;
			$nm = "رابط الحساب" ;
			$s3r = $e[1]*0.3;
			}
			if($e[2] == "liketikbr") {
				$tlbia = "لايكات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*3;
			}
			if($e[2] == "freeviewtik") {
				$tlbia = "مشاهدات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*18;
			}
			if($e[2] == "livliktk") {
				$tlbia = "لايكات" ;
			$nm = "رابط البث" ;
			$s3r = $e[1]*18;
			}
			if($e[2] == "sahretik") {
				$tlbia = "مشاركات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*5;
			}
			if($e[2] == "pepltwi") {
				$tlbia = "متابعين" ;
			$nm = "رابط الحساب" ;
			$s3r = $e[1]*0.3;
			}
			if($e[2] == "taswttwi") {
				$tlbia = "تصويت" ;
			$nm = "رابط التصويت" ;
			$s3r = $e[1]*1;
			}
			if($e[2] == "vidvitwi") {
				$tlbia = "مشاهدات" ;
			$nm = "رابط الفديو" ;
			$s3r = $e[1]*6;
			}
			if($e[2] == "menhtwi") {
				$tlbia = "منشن" ;
			$nm = "رابط المنشن" ;
			$s3r = $e[1]*0.8;
			}
			
			bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
 ~ تم استقطاع *$e[1]* من »رصيدك فالبوت💸. 
*
ارسل $nm
*
",
'parse_mode'=>"markdown",
]);
$rshq['3dd'][$from_id][$from_id]  = $s3r;
    $rshq['mode'][$from_id]  = "to";
    $rshq["coin"][$from_id] -= $e[1];
    $rshq["tlbia"][$from_id] = $tlbia;
    $rshq["cointlb"][$from_id] += $e[1];
    $rshq["s3rltlb"][$from_id] = $e[1];
    $rshq['tp'][$from_id] = $e[2];
    $rshq['coinn'] = $s3r;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} else {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
تم قفل استقبال الرشق عزيزي

اجمع نقاط الان علماينفتح الرشق
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[

[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
]])
]);
} 

} else {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
»رصيدك فالبوت💸 غير كافية
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"جمع النقاط",'callback_data'=>"plus" ]],
       
      ]
    ])
]);
} 
} 

$rshqaft =$rshq['bot_tlb']+1;
$rnd = rand(9999999,9999999999);
if($text and $rshq['mode'][$from_id]  == "to") {
	
	if($rshq['tp'][$from_id] == "thbt") {
			$nm = "يوزر حسابك" ;
			$tp = "متابع" ;
			$inid =9650;
			}
			if($rshq['tp'][$from_id] == "mthbt") {
			$nm = "يوزر حسابك" ;
			$tp = "متابع" ;
			$inid =9650;
			}
			if($rshq['tp'][$from_id] == "hq") {
			$nm = "يوزر حسابك" ;
			$tp = "متابع" ;
			$inid =9650;
			}
			if($rshq['tp'][$from_id] == "view") {
			$nm = "رابط المنشور" ;
			$tp = "مشاهد" ;
			$inid =5132;
			}
			if($rshq['tp'][$from_id] == "like") {
			$nm = "رابط المنشور" ;
			$tp = "لايك" ;
			$inid =9168;
			}
			if($rshq['tp'][$from_id] == "likrels") {
			$nm = "رابط الريلز" ;
			$tp = "لايك" ;
			$inid =8303;
			}
				if($rshq['tp'][$from_id] == "vuerils") {
			$nm = "رابط الريلز" ;
			$tp = "مشاهدات" ;
			$inid =7921;
			}
if($rshq['tp'][$from_id] == "foloarb") {
			$nm = "رابط الحساب" ;
			$tp = "متابيعن" ;
			$inid =5166;
			}
if($rshq['tp'][$from_id] == "commlik") {
			$nm = "رابط الكومنت" ;
			$tp = "لايكات" ;
			$inid =5788;
			}
if($rshq['tp'][$from_id] == "realkil") {
			$nm = "رابط المنشور" ;
			$tp = "لايكات" ;
			$inid =5087;
			}			
if($rshq['tp'][$from_id] == "mixfla") {
			$nm = "رابط الحساب" ;
			$tp = "متابعين" ;
			$inid =5081;
			}					
if($rshq['tp'][$from_id] == "ralvew") {
			$nm = "رابط المنشور" ;
			$tp = "مشاهدات" ;
			$inid =5198;
			}						
if($rshq['tp'][$from_id] == "spefom") {
			$nm = "رابط الحساب" ;
			$tp = "متابعين" ;
			$inid =7871;
			}	
if($rshq['tp'][$from_id] == "qwaty") {
			$nm = "رابط الحساب" ;
			$tp = "متابعين" ;
			$inid =9042;
			}				
if($rshq['tp'][$from_id] == "livty") {
			$nm = "رابط البث" ;
			$tp = "لايكات" ;
			$inid =5919;
			}						if($rshq['tp'][$from_id] == "peptri") {
			$nm = "رابط القناه" ;
			$tp = "متابعين" ;
			$inid =8504;
			}				        
if($rshq['tp'][$from_id] == "peobsvh") {
			$nm = "رابط القناه" ;
			$tp = "متابعين" ;
			$inid =10266;
			}	
if($rshq['tp'][$from_id] == "pelbxsvc") {
			$nm = "رابط القناه" ;
			$tp = "متابعين" ;
			$inid =10316;
			}	
				if($rshq['tp'][$from_id] == "vionew") {
			$nm = "رابط المشور" ;
			$tp = "مشاهدات" ;
			$inid =10401;
			}	
if($rshq['tp'][$from_id] == "viwefiv") {
			$nm = "رابط القناه" ;
			$tp = "مشاهدات" ;
			$inid =10402;
			}
if($rshq['tp'][$from_id] == "commionb") {
			$nm = "رابط المنشور" ;
			$tp = "تعليقات" ;
			$inid =8584;
			}					if($rshq['tp'][$from_id] == "indiaco") {
			$nm = "رابط المنشور" ;
			$tp = "تعليقات" ;
			$inid =8587;
			}				
if($rshq['tp'][$from_id] == "taswet") {
			$nm = "رابط المنشور" ;
			$tp = "تصويتات" ;
			$inid =9481;
			}						if($rshq['tp'][$from_id] == "thya") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8593;
			}		
if($rshq['tp'][$from_id] == "nothya") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8594;
			}				
if($rshq['tp'][$from_id] == "hartthu") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8595;
			}				
if($rshq['tp'][$from_id] == "firerak") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8596;
			}			
if($rshq['tp'][$from_id] == "starreak") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8598;
			}		
if($rshq['tp'][$from_id] == "surarek") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8597;
			}		
if($rshq['tp'][$from_id] == "demareak") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8599;
			}					
if($rshq['tp'][$from_id] == "sorkre") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8600;
			}	
if($rshq['tp'][$from_id] == "smirseb") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8601;
			}		
if($rshq['tp'][$from_id] == "kakarekt") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8602;
			}		
if($rshq['tp'][$from_id] == "targrekt") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =8603;
			}		
if($rshq['tp'][$from_id] == "fackyourect") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =10559;
			}						if($rshq['tp'][$from_id] == "facepeb") {
			$nm = "رابط الحساب" ;
			$tp = "متابعين" ;
			$inid =10540;
			}			
if($rshq['tp'][$from_id] == "favelik") {
			$nm = "رابط المنشور" ;
			$tp = "لايكات" ;
			$inid =6020;
			}			
if($rshq['tp'][$from_id] == "faceegbo") {
			$nm = "رابط المنشور" ;
			$tp = "لايكات" ;
			$inid =6043;
			}					
if($rshq['tp'][$from_id] == "facflk") {
			$nm = "رابط المنشور" ;
			$tp = "لايكات" ;
			$inid =6046;
			}						if($rshq['tp'][$from_id] == "facharch") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =7094;
			}			
if($rshq['tp'][$from_id] == "sminshfacwc") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =7095;
			}			
if($rshq['tp'][$from_id] == "wowrafv") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =7098;
			}			
if($rshq['tp'][$from_id] == "sadface") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =7096;
			}						if($rshq['tp'][$from_id] == "angrefaceb") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =7097;
			}		
if($rshq['tp'][$from_id] == "carefacec") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =7099;
			}				
if($rshq['tp'][$from_id] == "comlikfav") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =6053;
			}			
if($rshq['tp'][$from_id] == "viewvidfa") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =6057;
			}					
if($rshq['tp'][$from_id] == "actoreface") {
			$nm = "رابط المنشور" ;
			$tp = "تفاعلات" ;
			$inid =10383;
			}		
if($rshq['tp'][$from_id] == "viewyoutube") {
			$nm = "رابط الفديو" ;
			$tp = "مشاهدات" ;
			$inid =6128;
			}						if($rshq['tp'][$from_id] == "viewralyou") {
			$nm = "رابط الفديو" ;
			$tp = "مشاهدات" ;
			$inid =6088;
			}				
if($rshq['tp'][$from_id] == "vierahfyou") {
			$nm = "رابط البث" ;
			$tp = "مشاهدات" ;
			$inid =6139;
			}						if($rshq['tp'][$from_id] == "likecomyo") {
			$nm = "رابط التعليق" ;
			$tp = "لايكات" ;
			$inid =8372;
			}	
if($rshq['tp'][$from_id] == "likeyoufa") {
			$nm = "رابط الفديو" ;
			$tp = "لايكات" ;
			$inid =6180;
			}						
if($rshq['tp'][$from_id] == "peopltik") {
			$nm = "رابط الحساب" ;
			$tp = "متابعين" ;
			$inid =10498;
			}			
if($rshq['tp'][$from_id] == "liketikbr") {
			$nm = "رابط الفديو" ;
			$tp = "لايكات" ;
			$inid =6267;
			}			
if($rshq['tp'][$from_id] == "tikviesto") {
			$nm = "رابط الفديو" ;
			$tp = "مشاهدات" ;
			$inid =10451;
			}						if($rshq['tp'][$from_id] == "freeviewtik") {
			$nm = "رابط الفديو" ;
			$tp = "مشاهدات" ;
			$inid =9308;
			}				
if($rshq['tp'][$from_id] == "livliktk") {
			$nm = "رابط البث" ;
			$tp = "لايكات" ;
			$inid =9619;
			}						
if($rshq['tp'][$from_id] == "sahretik") {
			$nm = "رابط الفديو" ;
			$tp = "مشاركات" ;
			$inid =6285;
			}				
if($rshq['tp'][$from_id] == "pepltwi") {
			$nm = "رابط الحساب" ;
			$tp = "متابعين" ;
			$inid =6307;
			}				
if($rshq['tp'][$from_id] == "taswttwii") {
			$nm = "رابط التصويت" ;
			$tp = "تصويتات" ;
			$inid =6336;
			}			
if($rshq['tp'][$from_id] == "vidvitwi") {
			$nm = "رابط الفديو" ;
			$tp = "مشاهدات" ;
			$inid =6349;
			}				
if($rshq['tp'][$from_id] == "menhtwi") {
			$nm = "رابط المنشن" ;
			$tp = "منشنات" ;
			$inid =8634;
			}					
			
			
			$requst = json_decode(file_get_contents("https://kd1s.com/api/v2?key=$Api_Tok&action=add&service=$inid&link=$text&quantity=". $rshq['3dd'][$from_id][$from_id]));
$idreq = $requst->order; 
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
تم ارسال طلبك بنجاح ✅
- - - - - - - - - - - - - - - - - - 
رقم طلبك : `". $rnd."`
العدد : *". $rshq['3dd'][$from_id][$from_id] . "* $tp
$nm : [$text]
- - - - - - - - - - - - - - - - - - 
سيتم ارسال ال". $tp. "ات في غصون دقائق
  ", 
 'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"طلب مراجعه الطلب ✅",'callback_data'=>"sendrq|$idreq|$rnd|". $rshq["s3rltlb"][$from_id] ]],
       
      ]
    ])
]);
bot('sendMessage',[
   'chat_id'=>$admin,
   'text'=>"
⌯طلب جديد ⌯
▱▱▱▱▱▱▱▱▱▱▱▱▱▱▱▱
معلومات العضو 
ايديه : `$from_id`
يوزره : [@$user]
اسمه : [$name](tg://user?id=$chat_id)

معلومات الطلب ~
ايدي الطلب : `". $rnd. "`
". str_replace("يوزر حسابك", "يوزر", $nm). " : [$text]
العدد". $rshq['3dd'][$from_id][$from_id] . " $tp

نقاطه : ". $rshq["coin"][$from_id]. "
- - - - - - - - - - - - - - - - - - 
  ", 
 'parse_mode'=>"markdown",
 'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"ترجيع نقاطه",'callback_data'=>"ins|$from_id|". $rshq['coinn']]],
     [['text'=>"طلب تعويض تلقائيا",'callback_data'=>"tEwth|$idreq"]],
     [['text'=>"تصفير نقاطه",'callback_data'=>"msft|$from_id"]],
       
      ]
    ])
]);
bot('sendMessage',[
   'chat_id'=>$chnl,
   'text'=>"
✅ اكتمل طـلب الخدمة بنجاح .
- - - - - - - - - - - - - - - - - - 
ايدي الطلب : `". $rnd. "`
نوع الطلب :". $rshq["tlbia"][$from_id]. "
سعر الطلب :". $rshq["s3rltlb"][$from_id]. "
". str_replace("يوزر حسابك", "يوزر", $nm). " : [$text]
العدد ". $rshq['3dd'][$from_id][$from_id] . " $tp
حساب المشتري : [$name](tg://user?id=$chat_id)
الرقم التسلسلي للطلب : *". $rshqaft." * 
- - - - - - - - - - - - - - - - - - 
  ", 
 'parse_mode'=>"markdown",
 'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"Social Plus ➕",'url'=>"https://t.me/". bot('getme','bot')->result->username]],
       
      ]
    ])
]);
$rshq["order"][$rnd]= $idreq;
$rshq["tlby"][$from_id] += 1;
$rshq['3dd'][$from_id][$from_id]  = null;
    $rshq['mode'][$from_id]  = null;
    $rshq['bot_tlb']+= 1;
    
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 
 
if($e[0] == "msft" and $from_id == $admin) {
	$requst = json_decode(file_get_contents("https://kd1s.com/api/v2?key=$Api_Tok&action=refil&order=$e[1]"));
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

تم تصفير نقاطه ✅
ايديه : [$e[1]](tg://user?id=$e[1]])

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
$rshq["coin"][$e[1]] = 0;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq); 
	} 
	
if($e[0] == "tEwth" and $from_id == $admin) {
	$requst = json_decode(file_get_contents("https://kd1s.com/api/v2?key=$Api_Tok&action=refil&order=$e[1]"));
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

تم طلب تعويض تلقائي للطلب
ايدي الطلب `$e[1]`

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
	} 
	
	if($e[0] == "sendrq" and $from_id == $admin) {
	$requst = json_decode(file_get_contents("https://kd1s.com/api/v2?key=$Api_Tok&action=refil&order=$e[1]"));
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

تم طلب مراجعه طلبك بنجاح ✅
ايدي الطلب `$e[2]`

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);

bot('sendMessage',[
   'chat_id'=>$admin,
   'text'=>"
طلب مراجعه للطلب عزيزي المطور ✨
- - - - - - - - - - - - - - - - - - 
ايدي الطلب : `". $e[2]. "`
الي داز الطلب : [$name](tg://user?id=$chat_id)
- - - - - - - - - - - - - - - - - - 
  ", 
 'parse_mode'=>"markdown",
 'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"ترجيع نقاطه",'callback_data'=>"ins|$from_id|". $e[3]]],
       
      ]
    ])
]);
	} 

if($e[0] == "ins" and $from_id == $admin) {
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

تم ارجاع $e[2] نقاط لحساب [$e[1]](tg://user?id=$e[1])

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]],
       
      ]
    ])
]);
$rshq["coin"][$e[1]] += $e[2];

$rshq["coinss"][$e[1]] += $e[2];
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
	}
	
	if($data == "Asiacell") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
اهلا بك في قسم الشحن التلقائي ✨

يمكنك شحن »رصيدك فالبوت💸 تلقائيا من خلال هذا القسم 🔥
    
    يمكنك شحن »رصيدك فالبوت💸 من خلال (التواصل مع وكيل البوت يوجد 11طريقة دفع)
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"شحن عن طريق تحويل الرصيد",'callback_data'=>"rsedd|thoil" ], ['text'=>"شحن عن طريق كارتات",'callback_data'=>"rsedd|cart" ]],
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
} 

if($e[0] == "rsedd") {
	
	if($e[1] == "thoil") {
		$TypeShhn = "تحويل الرصيد" ;
		$ws = "
حول الرصيد الي هذا الرقم ($nmbr) 💠

في حال حولت الرصيد ارسل رقمك للبوت ليتم تأكيد طلبك ♻️
" ;
		} elseif($e[1] == "cart") {
			$TypeShhn = "كارت اسيا" ;
			$ws = "الان ارسل رقم الكارت ✴️" ;
			} 
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
  ⚡ : رائع لقد تخترت الشحن عن طريق ($TypeShhn) 
  - $ws
*

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
$rshq['shhn'][$from_id] = $e[1];
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 
 
 
 if(is_numeric($text) and $rshq['shhn'][$from_id ] != null) {
 	if($rshq['shhn'][$from_id] == "thoil") {
		$TypeShhn = "تحويل الرصيد" ;
		$ws = "
رقمك : $text


" ;
$mshkl = "مامحول الرصيد سيتم حظرك نهائيا من البوت" ;
		} elseif($rshq['shhn'][$from_id] == "cart") {
			$TypeShhn = "ارسال كارت اسيا" ;
			$ws = "رقم الكارت : `$text`" ;
			$mshkl = "ارسلت رقم الكارت غلط سيتم حظرك نهائيا من البوت" ;
			} 
 bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
  نوع طلبك : $TypeShhn
  $ws
  سيتم مراجعه طلبك خلال 24 ساعه في حال كنت $mshkl
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);

bot('sendMessage',[
   'chat_id'=>$admin,
   'text'=>"
طلب شحن تلقائي ✅

الشحن عن طريق : $TypeShhn

". str_replace("رقمك", "رقم الشخص", $ws). "
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"تأكيد طلبه ⚡",'callback_data'=>"ok|". $from_id ]],
       
      ]
    ])
]);
$rshq['shhn'][$from_id] = null;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 

if($e[0] == "ok") {
	if($chat_id == $admin) { 
	bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
  تم تأكيد طلبه بنجاح ✅
  *
  ايدي الشخص `$e[1]`
  ~ [$e[1]](tg://user?id=$e[1])
  
  الآن ارسل عدد النقاط المراد ارسال له


",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"tobot" ]],
       
      ]
    ])
]);
$rshq['mode'][$from_id]  = "shneru" ;
$rshq['coi'][$from_id]  = $e[1] ;
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 
} 

if(is_numeric($text) and $rshq['mode'][$from_id]== "shneru" ){
	if($chat_id == $admin) {
	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   تم تأكيد طلبه في الشحن التلقائي و
 تم ارسال $text نقاط ل [$name](tg://user?id=$chat_id) 
  ", 
  'parse_mode'=>"markdown",
  'reply_markup'=>json_encode([
     'inline_keyboard'=>[
     [['text'=>"رجوع",'callback_data'=>"back" ]],
       
      ]
    ])
]);
bot('sendMessage',[
   'chat_id'=>$rshq['coi'][$from_id], 
   'text'=>"
~ تم تأكيد طلبك بنجاح (شحن التلقائي) ✅

وتم ارسال $text نقاط لحسابك
  ", 
  'parse_mode'=>"markdown",
  
]);
$rshq['mode'][$from_id]  = null ;
$rshq["coin"][$rshq['coi'][$from_id]] += $text;
$rshq['coi'][$from_id] = null; 
$rshq= json_encode($rshq,32|128|265);
file_put_contents("rshq.json",$rshq);
} 
} 
if($data == "ini"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
انتظر ثانيه جاري الدخول 🤖
",
]);
}
if($data == "ini") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
✅︙خدمات (التزويد) لـ انستجرام Instagram.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'متابعين ثابتين' ,'callback_data'=>"type|thbt"],['text'=>'متابعين غير ثابتين' ,'callback_data'=>"type|mthbt"]],
[['text'=>'متابعين حقيقيين' ,'callback_data'=>"type|hq"]],
[['text'=>'لايكات' ,'callback_data'=>"type|like"], ['text'=>'مشاهدين' ,'callback_data'=>"type|view"]],
[['text'=>'لايكات ريلز' ,'callback_data'=>"type|likrels"], ['text'=>'مشاهدات ريلز' ,'callback_data'=>"type|vuerils"]],
[['text'=>'متابعين انستجرام عربي' ,'callback_data'=>"type|foloarb"], ['text'=>'لايكات انستجرام خليجي ' ,'callback_data'=>"type|likkal"]],
[['text'=>'لايكات تعليقات' ,'callback_data'=>"type|commlik"], ['text'=>'لايكات انستجرام حقيقي ' ,'callback_data'=>"type|realkil"]],
[['text'=>'متابعين انستجرام مكس حقيقي' ,'callback_data'=>"type|mixfla"]], 
[['text'=>'مشاهدات حقيقي' ,'callback_data'=>"type|ralvew"], ['text'=>'متابعين نوع خاص' ,'callback_data'=>"type|spefom"]],
[['text'=>'متابعين انستقرام جودة عالية | فوري 🚀' ,'callback_data'=>"type|qwaty"]],
[['text'=>'لايكات بث مباشر' ,'callback_data'=>"type|livty"]],
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "tele"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
انتظر ثانيه جاري الدخول 🤖
",
]);
}
if($data == "tele") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
✅︙خدمات (التزويد) لـ تيليجرام Telegram.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'اعضاء القناة العامة / المجموعة' ,'callback_data'=>"type|peptri"]],
[['text'=>'تيليجرام اعضاء [الضمان 30 يوم]' ,'callback_data'=>"type|peobsvh"]],
[['text'=>'تيليجرام اعضاء [فارسي] [بدون ضمان]' ,'callback_data'=>"type|pelbxsvc"]],
[['text'=>'مشاهدة تلي 1 بوست' ,'callback_data'=>"type|vionew"]], 
[['text'=>'مشاهدة تلي آخر 5 بوست' ,'callback_data'=>"type|viwefiv"],['text'=>'قـسم ريكشانات' ,'callback_data'=>"reakhan"]],
[['text'=>'تعليقات تيليجرام عربي عشوائية' ,'callback_data'=>"type|commionb"]], 
[['text'=>'تعليقات تلجرام هندي' ,'callback_data'=>"type|indiaco"]],
[['text'=>'تصـويت بـدون مغاديه' ,'callback_data'=>"type|taswet"]],
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "reakhan") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
اهلا بك في قسم ريكشانات (تفاعلات)
اختر الريكشان الذي تريد رشقه
ملحوظه : كل رياكشن ياتي معه رشق مشاهدات
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'👍' ,'callback_data'=>"type|thya"],['text'=>'👎' ,'callback_data'=>"type|nothya"],['text'=>'❤️' ,'callback_data'=>"type|hartthu"]],
[['text'=>'🔥' ,'callback_data'=>"type|firerak"], ['text'=>'	
🎉' ,'callback_data'=>"type|surarek"],['text'=>'🤩' ,'callback_data'=>"type|starreak"]],
[['text'=>'😢' ,'callback_data'=>"type|demareak"], ['text'=>'😱' ,'callback_data'=>"type|sorkre"],['text'=>'😁' ,'callback_data'=>"type|smirseb"]],
[['text'=>'💩' ,'callback_data'=>"type|kakarekt"], ['text'=>'🤮' ,'callback_data'=>"type|targrekt"],['text'=>' 🖕' ,'callback_data'=>"type|fackyourect"]],
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "sales") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
هذه هي كل عروض اليوم🚀
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'مشاهدة تلي 1 بوست' ,'callback_data'=>"type|vionew"]], 
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "face"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
انتظر ثانيه جاري الدخول 🤖
",
]);
}
if($data == "face") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
✅︙خدمات (التزويد) لـ فيس بوك facebook.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'متابعين بروفايل فيسبوك سريع 🚀' ,'callback_data'=>"type|facepeb"]],
[['text'=>'لايكات فيس بوك مكس حقيقي' ,'callback_data'=>"type|favelik"]],
[['text'=>'لايكات فيس بوك مصر فوري 🇪🇬' ,'callback_data'=>"type|faceegbo"]],
[['text'=>'لايكات فيس بوك الفلبين فوري ⭐' ,'callback_data'=>"type|facflk"]], 
[['text'=>'لايكات تعليقات فيسبوك ' ,'callback_data'=>"type|comlikfav"],['text'=>'قـسم تفاعلات' ,'callback_data'=>"facera"]],
[['text'=>'مشاهدات فيديو فيسبوك' ,'callback_data'=>"type|viewvidfa"]], 
[['text'=>'مشاهدات ستوري فيسبوك' ,'callback_data'=>"type|actoreface"]],
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "facera") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
اهلا بك في قسم ريكشانات (تفاعلات)
اختر الريكشان الذي تريد رشقه
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'😲' ,'callback_data'=>"type|wowrafv"],['text'=>'😍' ,'callback_data'=>"type|facharch"],['text'=>'😀' ,'callback_data'=>"type|sminshfacwc"]],
[['text'=>'😢' ,'callback_data'=>"type|sadface"], ['text'=>'	
😡' ,'callback_data'=>"type|angrefaceb"],['text'=>'🥰' ,'callback_data'=>"type|carefacec"]],
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "yot"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
انتظر ثانيه جاري الدخول 🤖
",
]);
}
if($data == "yot") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
✅︙خدمات (التزويد) لـ يوتيوب youtube.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'مشاهدات يوتيوب بالساعات [1-12 ساعة]' ,'callback_data'=>"type|viewyoutube"]],
[['text'=>'مشاهدات يتيوب حقيقي من كل العالم' ,'callback_data'=>"type|viewralyou"]],
[['text'=>'مشاهدات يوتيوب بث مباشر حقيقي 100k 👍👌' ,'callback_data'=>"type|vierahfyou"]],
[['text'=>'لايكات تعليقات يوتيوب' ,'callback_data'=>"type|likecomyo"]], 
[['text'=>'لايكات يوتيوب فوري سريع ' ,'callback_data'=>"type|likeyoufa"]],
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "tik"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
انتظر ثانيه جاري الدخول 🤖
",
]);
}
if($data == "tik") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
✅︙خدمات (التزويد) لـ تيك توك Tik Tok.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'متابعين تيك توك سريع 🚀' ,'callback_data'=>"type|peopltik"]],
[['text'=>'لايكات تيك توك حقيقي فوري البرازيل  🇧🇷' ,'callback_data'=>"type|liketikbr"]],
[['text'=>'مشاهدات تيك توك لجميع الستوريات 💩' ,'callback_data'=>"type|tikviesto"]],
[['text'=>'مشاهدات تيك توك الأرخص 🔥' ,'callback_data'=>"type|freeviewtik"]], 
[['text'=>'لايكات على بث مباشر تيك توك| سريع جداً 👍 ' ,'callback_data'=>"type|livliktk"]],
[['text'=>'تيك توك المشاركه 70k' ,'callback_data'=>"type|sahretik"]], 
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "twi"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
انتظر ثانيه جاري الدخول 🤖
",
]);
}
if($data == "twi") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
✅︙خدمات (التزويد) لـ تويتر Twitter.
🛒︙يرجى إختيار إحدى الخدمات من الأسفل.
*
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'متابعين تويتر حقيقي' ,'callback_data'=>"type|pepltwi"]],
[['text'=>'تصويت تويتر' ,'callback_data'=>"type|taswttwi"]],
[['text'=>'مشاهدات فيديو تويتر' ,'callback_data'=>"type|vidvitwi"]],
[['text'=>'منشن تويتر من متابعين حساب' ,'callback_data'=>"type|menhtwi"]], 
[['text'=>'معلومات طلب' ,'callback_data'=>"infotlb"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "ilan") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
⌯ بوت الرشق الاول في التلجرام📢
⌯ اسرع بوت في الرشق في التلجرام
⌯ اسهل جرق التجميع🚀
➧ ارخص الاسعار 🤩
⌯ رشق جميع مواقع التواصل 
➧⌯⌯⌯⌯⌯⌯⌯⌯⌯الاربط ⌯⌯⌯⌯⌯⌯⌯⌯⌯
*
https://t.me/". bot('getme','bot')->result->username. "?start=$from_id


",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[

[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($text == '/help' or $text == '/help'){ 
bot('sendphoto',['chat_id'=>$chat_id,
photo =>"https://www.google.com/imgres?imgurl=https%3A%2F%2Fswiftassess.com%2Fwp-content%2Fuploads%2F2020%2F08%2FSupport-21-e1598864796732.png&tbnid=2N2KpFSxhI2DRM&vet=1&imgrefurl=https%3A%2F%2Fswiftassess.com%2Far%2Fservices%2Fsupport-services&docid=8W2D6i7Z1DuJZM&w=600&h=525&hl=ar-EG&source=sh%2Fx%2Fim",
'caption'=>'
*
☆︙بوت رشق 𝙷𝙼𝚂 𓆩˹ 𝙷𝙼𝚂𓃠 ˼𓆪 🦈

≪━━━━━━━الشرح 🌟━━━━━━━≫
☆︙تقدر تجمع نقاط بسهوله من زر تجميع النقاط والتي تحتوي علي :
1 : دعوه الاصدقاء 🙋‍♂
2 : تسليم أرقام للبوت 📞
3 : عجله الحظ 🎡
4 : شراء نقاط من المطور 📱
≪━━━━━طريقه الرشق 👇━━━━≫
1 : اضغط على زر الخدمات
2 : اختر التطبيق 
3 : اختر الخدمة
4 : قم بإختيار العدد
5 : قم بإرسال الرابط

وسيتم الرشق تلقائياً🥱
≪━━━━━━━للتواصل━━━━━━━≫
الدعم : @msyassine

*
', 
'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>' الـمطور🥷','url'=>'t.me/S_X_B_1']],
[['text'=>'قـناة الـمطور🎠','url'=>'t.me/حط يوز قناتك بدون @']], 
]])]);}

if($data == "pluss") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
مرحبا بك في قسم تجميع النقاط 💎 .

يمكنك الحصول على نقاط بـ ثلاث طرق :

• مشاركة رابط الدعوة 🫂
• تبديل نقاط تمويل 🔄
• تسليم أرقام للمطور 📞
*

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'رابـط الـدعوه' ,'callback_data'=>"plus"],['text'=>'تسليم حسابات📲' ,'callback_data'=>"abhtext"]],
[['text'=>'شراء نقاط 💰' ,'callback_data'=>"buy"],['text'=>'تبديل نقاط 🔄' ,'callback_data'=>"tabdelni"]],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "abhtext") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
مرحـبا بـك 
 يمكنك تسلــيم رقــم يدوي مــن خــلال التواصل مع بــوت الدعــم  وسيـتم تحـديد السعر بيــن 100 نقطة الى 400 نقطة حسب نوع الـدولة و الـمنصة
*

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'⌯تواصل مع المطور⌯','url'=>'t.me/يوزك بدون@']],
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 
if($data == "tabdelni") {
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
*
مرحبا بك في قسم تبديل النقاط 🔄 .

يمكنك إستبدال نقاط تمويل بدل نقاط رشق :

• كل 2000 نقطة تمويل بدل 500 نقطة في البوت 💎
• كل 10000 نقطة تمويل بدل 2500 نقطة في البوت 💎
• كل 20000 نقطة تمويل بدل 5000 نقطة في البوت 💎

- نستقبل نقاط من بوت تمويل المليار فقط ⚜

(لتبديل نقاط يرجى التواصل مع المطور) .

~ المطـور : @msyassine
*

",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'رجوع' ,'callback_data'=>"tobot"]],
       
      ]
    ])
]);
} 

?>