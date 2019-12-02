<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }
    if(isset($_GET["hID"]))
    {

        $id=$_GET["hID"];
        //$min=0,$max=0,$offday=0;

        include("config.php");
        $query="select `openh1`, `openh2`, `offDay` from  `hospital`  where  `id`='$id' and `Status`=1";

        $rs= $db->query($query);
        $row=$rs->fetch();

		$min=$row["openh1"];
		$max=$row["openh2"];
		$offday=$row["offDay"];
       //   echo 'minimum='. $min;
        //header('location:../hospitals.php');
        $i=$min;
        $aa='';
        //$aa='  <input type="hidden" id="poffDay" name="poffDay"  value="'.$offday.'"/>';
        while($i<$max )
        {

            $aa=$aa.
                '<option value="'.$i.'">'.sprintf("%'.02d\n", $i).':00</option>';
            $i=$i+1;
        }
       //   echo 'test';
      echo ($aa);
        //echo'<label for="pPTimen">Time</label>
        //        <input type="time" class="form-control" id="pPTimen" min="'.$min.'" max="'.$max.'" name="pPTimen" placeholder="Enter Time " required />';

        //echo json_encode(
        //      array("minVal" => $min,
        //      "maxVal" => $max);
    }
}
catch(Exception $e) {
     echo 'Message: ' .$e->getMessage();
    //echo 'Message: Error Saving' ;
}

?>