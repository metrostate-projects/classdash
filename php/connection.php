<?php
         $dbhost = 'mysql.developertony.com';
         $dbuser = 'ics370root';
         $dbpass = 'metrostate';
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         echo 'Connected successfully';
         mysql_close($conn);
      ?>