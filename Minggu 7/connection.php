<?php

  $db = 'D:\Kuliah\Tugas\Semester 2\Pemrograman Web\Minggu 7\kontak.accdb';
  
  $db_username = '';
  $db_password = '';

  if(!file_exists($db)){
    die("Error finding access database");
  }
  
  $db_conn = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$db; Uid=$db_username; Pwd=$db_password;");

?>