<?php
//,`Description`,`AvailableTickets__`,`Pic`
session_start();
include('connection.php'); 
$conn=OpenCon();
 $sqlforview = "SELECT `Title`,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic` FROM `events` WHERE `EventID`=  (SELECT `EventID` FROM `edit_event` WHERE `MangerID`='" .$_SESSION['MangerID'] ."');";  
 if ($result = mysqli_query($conn, $sqlforview))  
 {
 while($rowforview =mysqli_fetch_array($result)) 
   { 
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
    echo "<div class='PicOfEvent'>".$Pic."</div>";

    echo "<div class='NameOfEvent'>".$Title."</div>";

    echo "<div class='Desc'>".$Description."</div>";
    
    echo "<div class='Date-Time'><i class='far fa-clock'></i>&ensp;"
    .date('H:i',strtotime($Time)).
    "&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<i class='far fa-calendar-alt'></i>&ensp;&ensp;"
    .$Date."</div>";

    echo" <div class='NumOfTikContainer'> 
    <div class='NumOfTikNum'>"
    .$AvailableTickets__.
    "</div><br><div class='NumOfTikText'>Available Tickets</div></div>";
    
    

   } 
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
?>