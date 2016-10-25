<h4>AK PROSIDING SEMESTER GANJIL</h4>
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
		<th>Jurnal</th>
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
						//$anggota = explode('//',$data)					
											
						$tbl = $this->m_report->get_Prosiding_by_NIP_semester1($data['nip']);
						$tb = $this->m_ak->get_ak_prosiding();
						//print_r($tbl);
						$judul = "";
						$status = "";
						$nilai = 0;
						$ak1 = 0;
						$ak2 = 0;
						$ak3 = 0;
						foreach($tb as $row2){
							$ak1 = $ak1 . $row2['internasional'] . "<br><br>";
							$ak2 = $ak2 . $row2['nasional'] . "<br><br>";
						}
						
						foreach($tbl as $row){
							$judul = $judul . $row['judul'] . "<br><br>";
							$status = $status . $row['kategori'] . "<br><br>";
							
							
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + $ak1;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai = $nilai + $ak2;
								}
							} else {
								//ketua
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + ((60/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai = $nilai + ((60/100)*$ak2);
								}
							}						 	
							
						}	
						
						
						$tbl2 = $this->m_report->get_Prosiding2_by_NIP_semester1($data['nip']);
						//anggota
						$anggota=explode("//",'anggota');
						//for($i=0;$i<count($anggota);$i++){
							//$pecah[$i]=explode('--',$anggota[$i]);
						//}
						//$jum = count($pecah[$i]);
						//print_r(".count($anggota).");

						$judul2 = "";
						$status2 = "";
						$nilai2 = 0;
						foreach($tbl2 as $row){
							$judul2 = $judul2 . $row['judul'] . "<br><br>";
							$status2 = $status2 . $row['kategori'] . "<br><br>";
				
							//1 anggota
							if (count($anggota) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((40/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 + ((40/100)*$ak2);
								}
							} else if (count($anggota) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((20/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 + ((20/100)*$ak2);
								}
							} else if (count($anggota) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((13.3/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 + ((13.3/100)*$ak2);
								}
							} 
							
						}
					
						echo $judul;
						echo $judul2;
					echo "</td>";
	
					
					echo "<td>";
						echo $status;
						echo $status2;
					echo "</td>";

						
					echo "<td>";
						foreach($tbl as $row){
						$nilai3 = 0;
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + $ak1;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + $ak2;
								}
								//echo $nilai3;
								
							} else {
								//ketua
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + ((60/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + ((60/100)*$ak2);
								}
								//echo $nilai3;
							}
							echo $nilai3;
							echo "<br><br>";
						}
						
						foreach($tbl2 as $row){
						$nilai4 = 0;
							//1 anggota
							if (count($anggota) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((40/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((40/100)*$ak2);
								}
								//echo $nilai4;
								
							} else if (count($anggota) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((20/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((20/100)*$ak2);
								}
								//echo $nilai4;
								
							} else if (count($anggota) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((13.3/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((13.3/100)*$ak2);
								}
							} 
							echo $nilai4;
							echo "<br><br>";
							
						}
					echo "</td>";
					
					
					echo "<td>";
						 $total = $nilai + $nilai2;
						 echo $total;
					ECHO "</td>";
			}
			?>  
			
		</tbody>

</table>
<br>


<h4>AK PROSIDING SEMESTER GENAP</h4>
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
		<th>Jurnal</th>
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
						//$anggota = explode('//',$data)					
											
						$tbl = $this->m_report->get_Prosiding_by_NIP_semester2($data['nip']);
						$tb = $this->m_ak->get_ak_prosiding();
						//print_r($tbl);
						$judul = "";
						$status = "";
						$nilai = 0;
						$ak1 = 0;
						$ak2 = 0;
						$ak3 = 0;
						foreach($tb as $row2){
							$ak1 = $ak1 . $row2['internasional'] . "<br><br>";
							$ak2 = $ak2 . $row2['nasional'] . "<br><br>";
						}
						
						foreach($tbl as $row){
							$judul = $judul . $row['judul'] . "<br><br>";
							$status = $status . $row['kategori'] . "<br><br>";
							
							
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + $ak1;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai = $nilai + $ak2;
								}
							} else {
								//ketua
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + ((60/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai = $nilai + ((60/100)*$ak2);
								}
							}						 	
							
						}	
						
						
						$tbl2 = $this->m_report->get_Prosiding2_by_NIP_semester2($data['nip']);
						//anggota
						$anggota=explode("//",'anggota');
						//for($i=0;$i<count($anggota);$i++){
							//$pecah[$i]=explode('--',$anggota[$i]);
						//}
						//$jum = count($pecah[$i]);
						//print_r(".count($anggota).");

						$judul2 = "";
						$status2 = "";
						$nilai2 = 0;
						foreach($tbl2 as $row){
							$judul2 = $judul2 . $row['judul'] . "<br><br>";
							$status2 = $status2 . $row['kategori'] . "<br><br>";
				
							//1 anggota
							if (count($anggota) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((40/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 +((40/100)*$ak2);
								}
							} else if (count($anggota) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((20/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 + ((20/100)*$ak2);
								}
							} else if (count($anggota) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((13.3/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai2 = $nilai2 + ((13.3/100)*$ak2);
								}
							} 
							
						}
					
						echo $judul;
						echo $judul2;
					echo "</td>";
	
					
					echo "<td>";
						echo $status;
						echo $status2;
					echo "</td>";

						
					echo "<td>";
						foreach($tbl as $row){
						$nilai3 = 0;
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + $ak1;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + $ak2;
								}
								//echo $nilai3;
								
							} else {
								//ketua
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + ((60/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + ((60/100)*$ak2);
								}

								//echo $nilai3;
							}
							echo $nilai3;
							echo "<br><br>";
						}
						
						foreach($tbl2 as $row){
						$nilai4 = 0;
							//1 anggota
							if (count($anggota) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((40/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 +((40/100)*$ak2);
								}
								//echo $nilai4;
								
							} else if (count($anggota) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((20/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((20/100)*$ak2);
								}
								//echo $nilai4;
								
							} else if (count($anggota) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((13.3/100)*$ak1);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((13.3/100)*$ak2);
								}
							} 
							echo $nilai4;
							echo "<br><br>";
							
						}
					echo "</td>";
					
					
					echo "<td>";
						 $total = $nilai + $nilai2;
						 echo $total;
					ECHO "</td>";
			}
			?> 
			
		</tbody>

</table>