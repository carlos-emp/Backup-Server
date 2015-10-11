<?php
$useremail="rogerio2@digitalweb.com.br";
$userpass = "online2";
$serverid="0";
$roomid="00476001000107";
$username="ROGERIO TEST";


// fixed information for connection
$db="ALLFOODPAY";
$user="sa";
$password="on-line76";
$dbhost="208.109.100.67";



$conninfo = array("Database" => $db, "UID" => $user, "PWD" => $password);
$conn = sqlsrv_connect($dbhost, $conninfo);


if(!$conn )
{
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}


// SQL QUERY INSERT
$tsql = "select * from CHAT where roomid='rs9b804f98592a'";



$stmt = sqlsrv_query( $conn, $tsql);
if( $stmt === false )
{
     echo "Error in executing query.</br>";
     die( print_r( sqlsrv_errors(), true));
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['message'].", ".$row['date']."<br />AA";
}
/* Close the connection. */
sqlsrv_close( $conn);



echo("OK");

 ?>