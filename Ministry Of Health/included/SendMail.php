<?php
try{
     if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }

    $id= $_SESSION["ID"];
    include("config.php");
    $query="SELECT user.F_name,user.Email,messages.Subject,messages.sendDate,messages.isRead FROM `messages`
            inner join `user` on user.id=messages.Reciver_Id
            WHERE messages.Sender_Id = '$id'";

        $rs= $db->prepare($query);
        
        $results= $db->query($query);
        while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
     //$m=$m+'
     //<tr><td>'+$dr["F_name"]+'('+$dr["Email"]+') </td>
     // <td>'+$dr["sendDate"]+'</td>
     // <td>'+$dr["Subject"]+'</td></tr>';
?>
<tr  >
    <td>
        <?php echo $row["F_name"]."(".$row["Email"].")"; ?>
    </td>
    <td>
        <?php echo $row["sendDate"]; ?>
    </td>
    <td>
        <?php echo $row["Subject"]; ?>
    </td>
</tr>
<?php
}
 
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
	//echo 'Message: Error Saving' ;
}

?>