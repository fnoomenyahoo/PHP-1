<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(isset($_COOKIE["member_username"])){
 setcookie ("member_username","",time()- (10 * 365 * 24 * 60 * 60));
 setcookie ("member_password","",time()- (10 * 365 * 24 * 60 * 60));
 }

 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
session_destroy(); 

?>