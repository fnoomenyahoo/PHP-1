<?php
 if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(!isset($_SESSION["type"]) || $_SESSION["type"]!="Patient")
{   header('location:login.php');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Minestry Of Health</title> 
</head>

<body style="padding-top: 70px">
    <?php include("navbar.php") ; 
?>
    <div class="container ">
        <form method="post">
            <span id="imessage" style="color: red;"><?php include("included/Appointment.php") ?></span>
            <div class="form-group">
                <label for="pHospitalID">Hospital</label>
                <select class="form-control" id="pHospitalID" name="pHospitalID" placeholder="Enter Hospital" onchange="getval(this);"  required>
                    <?php include("included/HospitalCombo.php") ?>
                </select>
            </div>
       
            <div class="form-group">
                <label for="pPDate">Date </label>
                <!--<input type="hidden" id="poffDay" name="poffDay" value=""/>-->
                <input type="date" class="form-control" id="pPDate" name="pPDate" placeholder="Enter Date " min="<?php echo date('Y-m-d', strtotime(' +1 day')) ?>" required />

            </div>

            <div class="form-group" id="timeContaint">
                <label for="pPTimen">Time</label>
             
                 <input type="time" class="form-control" id="pPTimen" name="pPTimen" placeholder="Enter Time " required>
                    
                     <!--<option value="0">00:00</option>
                    <option value="1">01:00</option>
                    <option value="2">02:00</option>
                    <option value="3">03:00</option>
                    <option value="4">04:00</option>
                    <option value="5">05:00</option>
                    <option value="6">06:00</option>
                    <option value="7">07:00</option>
                    <option value="8">08:00</option>
                    <option value="9">09:00</option>
                    <option value="10">10:00</option>
                    <option value="11">11:00</option>
                    <option value="12">12:00</option>
                    <option value="13">13:00</option>
                    <option value="14">14:00</option>
                    <option value="15">15:00</option>
                    <option value="16">16:00</option>
                    <option value="17">17:00</option>
                    <option value="18">18:00</option>
                    <option value="19">19:00</option>
                    <option value="20">20:00</option>
                    <option value="21">21:00</option>
                    <option value="22">22:00</option>
                    <option value="23">23:00</option>--> 
         <!--       </select> -->
                <!--<input type="time" class="form-control" id="pPTimen" name="pPTimen" min="" max="" placeholder="Enter Time " required />-->
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        $('#pPDate').datepicker({
            beforeShowDay: function (date) {
                var weekDay = parseInt($('#poffDay').val(), 10);
                if (weekDay === date.getDay()) {
                    return [true, '', ''];
                }
                return [false, '', ''];
            }
        });
      //  $("#pHospitalID").change(function () {
      //  var str = "";
      //  $( "select option:selected" ).each(function() {
      //          str += $(this).text() + " ";
      //      });
      //  $( "div" ).text( str );
      //})
      //.change();
      
     //   $("#pHospitalID").on("changed")
        function getval(sel) {
           // alert('included/HospitalValue.php?hID=' + sel.value);
          
            $.ajax({
                url: 'included/HospitalValue.php?hID=' + sel.value  ,
                type: 'GET',  
                success: function (response) {
                  
                    $('#pPTimen')
                        .find('option')
                        .remove()
                        .end()
                        .append(response);
                }
            });
            //alert("hi");
            //$.ajax({
            //    url: 'included/HospitalValue.php',
            //    data: "hID": sel.value
            //},
            //    dataType: 'json',
            //    type: 'post',
            //    success: function (output) {
            //        $('#pPTimen').attr({
            //            "max": output["minVal"],
            //            "min": output["minVal"]
            //        });
            //        alert(output["minVal"]);
            //        alert(output["minVal"]);
            //    });
     } 
    </script>
</body>
</html>