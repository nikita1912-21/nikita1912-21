<?php 

if (!isset($_REQUEST)) { 
return; 
} 
$confirmation_token = 'aa221221ghhryywhaa';  
$token = 'ed36c198e5309d51d17218c6fded06c5753f4a963b33f525425d4d8b2e37670c46866710fdcfa1d1b03f1'; 
 
$data = json_decode(file_get_contents('php://input'));  
switch ($data->type) { 
case 'confirmation':  
echo $confirmation_token; 
break;  
case 'message_new': 
$user_id = $data->object->user_id;  
$user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&access_token={$token}&v=5.0")); 
$user_name = $user_info->response[0]->first_name; 
$request_params = array( 
'message' => "Привет, {$user_name}!", 
'user_id' => $user_id, 
'access_token' => $token, 
'v' => '6.0' ) 

