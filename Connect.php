<?php
      $host = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "student";

      $link_id = mysql_connect($host, $dbusername, $dbpassword);
      if(!$link_id){
	      die(mysql_error("Can`t Connect To database"));
      }
      else{
	      $db = mysql_select_db($dbname, $link_id);

      }
      if(!$db){
	      die(mysql_error("Can`t select database"));
      }
      return;
?>