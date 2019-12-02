<?php
try{
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(!isset($_SESSION["ID"]))
    {
        header('location:login.php');
    }

    if(isset($_POST["oID"])){

        include("config.php");

        $msg="";
        if(!isset($_POST["oID"]) || $_POST["oID"]=="")
            $msg="Prospection Not Valid";

        if(!isset($_POST["pMedecineId"]) || $_POST["pMedecineId"]=="")
            $msg="Medecine Not Valid";

        if(!isset($_POST["pDose"]) || $_POST["pDose"]=="")
            $msg="Dose Not Valid";

        if(!isset($_POST["ppDays"]) || $_POST["ppDays"]=="")
            $msg="Days Not Valid";

        if(!isset($_POST["pqty"]) || $_POST["pqty"]=="")
            $msg="Qty Not Valid";
        $rq="";
        if(isset($_POST["premarq"])){
            $rq=$_POST["premarq"];
        }

        $pStatus=1;
        if(isset($_POST["pStatus"]))
            $pStatus=$_POST["pStatus"];
        if($msg==""){
            include("config.php");
            $query="INSERT INTO `prospectiontran`( `prospectionId`, `MedecineId`, `Dose`, `pDays`, `qty`, `remarq`, `Recived`)  VALUES (?,?,?,?,?,?,0)";

            $rs= $db->prepare($query);
            if($rs->execute( array($_POST["oID"],$_POST["pMedecineId"],$_POST["pDose"],$_POST["ppDays"],$_POST["pqty"],$rq)))
            {
                header('location:ProspectionDetails.php?oID='.$_POST["oID"]);
            }else{
                echo "Prospection Not Inserted" ;
            }
        }else{
            echo $msg;
        }
    }else{
        if(isset($_GET["oID"])){
            include("config.php");
            $id=$_GET["oID"];

            $results= $db->query("SELECT   prospectionhd.`Status`  FROM `prospectionhd` WHERE    id='$id'");
            $pHD=$results->fetchColumn();

            $query="SELECT prospectiontran.id, `prospectionId`, `MedecineId`, `Dose`, `pDays`, `qty`, `remarq`, `Recived`,medecine.Description,prospectionhd.Status FROM `prospectiontran`
inner join prospectionhd on prospectiontran.prospectionId=prospectionhd.id
inner join medecine on medecine.id=prospectiontran.MedecineId WHERE prospectionId='$id'";

            if($_SESSION["type"]=="Patient")
            {

                $query="SELECT prospectiontran.id, `prospectionId`, `MedecineId`, `Dose`, `pDays`, `qty`, `remarq`, `Recived`,medecine.Description FROM `prospectiontran`
inner join prospectionhd on prospectiontran.prospectionId=prospectionhd.id
inner join medecine on medecine.id=prospectiontran.MedecineId
where prospectionhd.Status=2  and prospectionId='$id'";
            }

            $tb='';
            $results= $db->query($query);
            while ($row = $results->fetch(PDO::FETCH_ASSOC))
            {
                $t=' class="bg-light"';

                if($row["Recived"]=="1")
                {
                    $t=' class="bg-danger"';

                }
                $bt='';

                if($_SESSION["type"]!="Patient") {
                    if($pHD =='1' && $row["Recived"]=="0")
                        if($_SESSION["type"]=="Hospital") {
                            $bt='<a class="btn btn-sm" href="included/ProspectionDelailsD.php?oID='.$id.'&pID='.$row["id"].'">Delete</a>';
                        }else{
                             
                                $bt='<a class="btn btn-sm" href="included/ProspectionDelailsD.php?oID='.$id.'&pID='.$row["id"].'">Recived</a>';
                            
                        }

                    $tb= $tb.'<tr>
    <td scope="col">
        '. $row["Description"].'
    </td>
    <td scope="col">'. $row["Dose"].'</td>
    <td scope="col">'.$row["pDays"].'
    </td >
    <td scope="col">'.$row["qty"].'
    </td >
    <td scope="col">'.$row["remarq"].' </td>

    <td scope="col">'.$bt.'    </td>
</tr>';
                }else{
                    $tb= $tb.'<tr>
    <td scope="col">
        '. $row["Description"].'
    </td>
    <td scope="col">'. $row["Dose"].'</td>
    <td scope="col">'.$row["pDays"].'
    </td >
    <td scope="col">'.$row["qty"].'
    </td >
    <td scope="col">'.$row["remarq"].' </td>
</tr>';
                }


            }
        }
    }
}
catch(Exception $e) {

    echo 'Message: ' .$e->getMessage();
    //	echo 'Message: Error Saving' ;
}

?>