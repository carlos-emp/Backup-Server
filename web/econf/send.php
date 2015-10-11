<?php 
$roomid = "rs9b804f98592a";
$server_ip="174.122.236.154";
$text_chat_port="82";
$username="client";
$mytext="MESSAGE TEXT";
$a = file_get_contents("http://$server_ip:$text_chat_port/sendchat.asp?roomid=$roomid&username=$username&mytext=$message");
echo $a;
?>