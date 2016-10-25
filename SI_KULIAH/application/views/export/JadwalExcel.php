<?php 
   
   header("Content-type: application/x-msdownload");
   header("Content-Disposition: attachment; filename=Jadwal Kuliah $semester $thn_ajar.xls");
   header("Pragma: no-cache");
   header("Expires: 0");
   echo $table_jadwal;
?>