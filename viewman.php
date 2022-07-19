<?php
//,`Description`,`AvailableTickets__`,`Pic`
session_start();
include('connection.php'); 
$conn=OpenCon();
$sqlfortable="SELECT `EventID` FROM `edit_event` WHERE `MangerID`='" .$_SESSION['MangerID'] ."';";
if ($resultsqlfortable = mysqli_query($conn, $sqlfortable))  
 {
  while($rowfortable =mysqli_fetch_array($resultsqlfortable))
  {
    $_SESSION['EventID']=$rowfortable["EventID"];
 $sqlforview = "SELECT `Title`,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic` FROM `events` WHERE `EventID`= ".$_SESSION['EventID']." ;";  
 if ($result = mysqli_query($conn, $sqlforview))  
 {
  //images\ab.jbg
 while($rowforview =mysqli_fetch_array($result)) 
   { 
    echo "<div class='ViewAllEvents'>";
    $Title = $rowforview['Title'];
    $Time= $rowforview['Time'];
    $Date = $rowforview['Date'];
    $Description= $rowforview['Description'];
    $AvailableTickets__= $rowforview['AvailableTickets__'];
    $Pic= $rowforview['Pic'];
    // <div class="PicOfEvent">pic</div>
    // <div class='NameOfEvent'>name</div>
    // <div class='Desc'>description</div>
    // <div class='Date&Time'>Dtae and time </div>
    // <div class='NumOfTikContainer'>
    //   <div class='NumOfTikText'>Number</div>
    //   <div class='NumOfTikNum'>6</div>
    // </div>
    echo "<div ><img src='".$Pic."' height='100px' width='120px' class='PicOfEvent'></div>";

    echo "<div class='TextOfEvent'>";

    echo "<div class='NameOfEvent'>".$Title."</div>";

    echo "<div class='Desc'>".$Description."</div>";
    echo "</div>";

    echo "<div class='Date-Time'><i class='far fa-clock'></i>&ensp;"
    .date('H:i',strtotime($Time)).
    "&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<i class='far fa-calendar-alt'></i>&ensp;&ensp;"
    .$Date."</div>";

    echo" <div class='NumOfTikContainer'> 
    <div class='NumOfTikNum'>"
    .$AvailableTickets__.
    "</div><br><div class='NumOfTikText'>Available Tickets</div></div>";
   echo "<button type='button' class='editbutton' onclick=' header('Location:EditManger.php') ;'> Edit</button>";
    echo "</div>";

   } 
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}}}

?>