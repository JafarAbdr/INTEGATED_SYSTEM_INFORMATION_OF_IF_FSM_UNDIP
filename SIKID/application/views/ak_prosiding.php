<h4>AK PROSIDING</h4>
<table class="table table-striped table-bordered example">
<!--<a class='btn btn-minier  btn-info').'>Export to Excel</a>
<input type="button" value="EXPORT EXCEL" class="btn btn-minier  btn-info" onclick="window.location.href='<?php echo site_url('c_excel1/export')?>'">
-->
<br></br>
<thead>
	<tr>
		<th>NO</th>
		<th>Nama Dosen</th>
		<th>NIP</th>
		<th>Prosiding</th>
		<th>Kategori</th>
		<th>Nilai AK</th>
		<th>Total AK</th>
	</tr>
</thead>


<tbody>
			<?php
			//error_reporting(E_ALL^(E_NOTICE | E_WARNING));
			
			$jumlah = count($query);
			for ($i=0;  $i<$jumlah; $i++){
				$data = $query[$i];
				
				echo "<tr>
					 <td>".($i+1)."</td>
					 <td>$data[nama]</td>
					 <td>$data[nip]</td>";
					 
					echo "<td>";	
						$tbl3 = $this->m_report->get_Prosiding_by_NIP($data['nip']);
						$tb = $this->m_ak->get_ak_prosiding();
						
						$judul3 = "";
						$status3 = "";
						$nilai3 = 0;
						$ak1 = 0;
						$ak2 = 0;
						foreach($tb as $row2){
							$ak1 = $ak1 . $row2['internasional'] . "<br><br>";
							$ak2 = $ak2 . $row2['nasional'] . "<br><br>";
						}
						
						foreach($tbl3 as $row){
							$judul3 = $judul3 . $row['judul'] . "<br><br>";
							$status3 = $status3 . $row['kategori'] . "<br><br>";
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + $ak1;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + $ak2;
								}
							} else {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + ((60/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + ((60/100)*$ak2);
								}
							}
						}
						$tbl4 = $this->m_report->get_Prosiding2_by_NIP($data['nip']);
						$anggota2=explode("//",'anggota');
						//for($i=0;$i<count($anggota);$i++){
							//$pecah[$i]=explode('--',$anggota[$i]);
						//}
						//$jum = count($pecah[$i]);
						//print_r(".count($anggota).");

						$judul4 = "";
						$status4 = "";
						$nilai4 = 0;
						foreach($tbl4 as $row){
							$judul4 = $judul4 . $row['judul'] . "<br><br>";
							$status4 = $status4 . $row['kategori'] . "<br><br>";
							//$jum = mysql_num_row('anggota');
							//if ($jum== ""){
							
							//1 anggota
							if (count($anggota2) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((40/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((40/100)*$ak2);
								}
							} else if (count($anggota2) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((20/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((20/100)*$ak2);
								}
							} else if (count($anggota2) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((13.3/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((13.3/100)*$ak2);
								}
							}
						}
						
						echo $judul3;
						echo $judul4;
						
					echo "</td>";
					
					
					
					echo "<td>";
						echo $status3;
						echo $status4;
					echo "</td>";

						
					echo "<td>";
						foreach($tbl3 as $row){
							$nilai = 0;
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + $ak1;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai = $nilai + $ak2;
								}
							} else {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + ((60/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai = $nilai + ((60/100)*$ak2);
								}
							}
							echo $nilai;
							echo "<br><br>";
						}
						
						foreach($tbl4 as $row){
							$nilai2 = 0;
							
							//1 anggota
							if (count($anggota2) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((40/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 +((40/100)*$ak2);
								}
							} else if (count($anggota2) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((20/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((20/100)*$ak2);
								}
							} else if (count($anggota2) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((13.3/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 + ((13.3/100)*$ak2);
								}
							}
							echo $nilai2;
							echo "<br><br>";
						}
					echo "</td>";
					
					
					
					echo "<td>";
						 $total = $nilai3 + $nilai4;
						 echo $total;
					echo " </td>";

						
				
			}
			?> 
			
		</tbody>

</table>
<br>
