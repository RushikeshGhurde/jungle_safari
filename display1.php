<html>
    <head>

        <title> Display Safari result</title>
        <style>

         body{
           background-image: url("./home.jpg");

         }
         table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}

        </style>
</head>
    <body><center>
        <table border=1px cellspacing=10 cellpadding=10>

         <tr>
         <!-- <th>Sr.no</th>   -->
          <th style="background-color: #04AA6D;">Name</th>
          <th style="background-color: #04AA6D;">Email</th>
          <th style="background-color: #04AA6D;">Phone</th>
          <th style="background-color: #04AA6D;">Safari</th>
          <th style="background-color: #04AA6D;">Adults</th>
          <th style="background-color: #04AA6D;">Children</th>
          <th style="background-color: #04AA6D;">Date in</th>
          <th style="background-color: #04AA6D;">Date out</th>
</tr>


<?php
include("db_conn.php");
error_reporting(0);
$query="SELECT * FROM saf";
$data= mysqli_query($conn,$query);
$total=mysqli_num_rows($data);


if($total !=0)
{
     while($result=mysqli_fetch_assoc($data)){
     echo "
        <tr>

        <td>". $result['name1'] ."</td>
        <td>". $result['email'] ."</td>
        <td>". $result['phone'] ."</td>
        <td>". $result['safari'] ."</td>
        <td>". $result['adults'] ."</td>
        <td>". $result['children'] ."</td>
        <td>". $result['date1'] ."</td>
        <td>". $result['date2'] ."</td>
        </tr>

     ";
     }
}

else{
    echo "no records found";
}
?>

</table>
</body>
</html>
