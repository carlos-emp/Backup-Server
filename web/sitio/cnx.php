<?php
function connecta(){
        $server="localhost";
        $user="root";
        $pass="19Alex90";
        $db="upam_fisio";
           $link = mysql_connect($server, $user, $pass)
            or die('No se pudo conectar: ' . mysql_error());
            mysql_select_db($db) or die('No se pudo seleccionar la base de datos');

           return $link;
        }
?>
