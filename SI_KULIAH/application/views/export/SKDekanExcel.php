<?php 
   
   header("Content-type: application/x-msdownload");
   header("Content-Disposition: attachment; filename=Lamp SK Dekan $semester $thn_ajar.xls");
   header("Pragma: no-cache");
   header("Expires: 0");
   echo $hasil_table;
?>