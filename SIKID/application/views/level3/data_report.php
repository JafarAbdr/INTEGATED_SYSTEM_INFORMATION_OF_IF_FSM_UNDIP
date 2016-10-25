
<table class="table table-striped table-bordered example">
<!--<a class='btn btn-minier  btn-info').'>Export to Excel</a>-->
<input type="button" value="EXPORT EXCEL" class="btn btn-minier  btn-info" onclick="window.location.href='<?php echo site_url('c_excel1/export')?>'">
<br></br>
<thead>
	<tr>
		<th>NO</th>
		<th>Nama Dosen</th>
		<th>NIP</th>
		<th>Jurnal</th>
		<th>Prosiding</th>
		<th>AK</th>
	</tr>
</thead>


<tbody>
			<?php
			error_reporting(E_ALL^(E_NOTICE | E_WARNING));
			
			$jumlah = count($query);
			for ($i=0;  $i<$jumlah; $i++){
				$data = $query[$i];
				
				echo "<tr>
					 <td>".($i+1)."</td>
					 <td>$data[nama]</td>
					 <td>$data[nip]</td>
					 
					 <td>";
						//$anggota = explode('//',$data)					
											
						$tbl = $this->m_report->get_Jurnal_by_NIP($data['nip']);
						//print_r($tbl);
						$judul = "";
						$nilai = 0;
						foreach($tbl as $row){
							$judul = $judul . $row['judul'] . "<br><br>";
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + 25;
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai = $nilai + 15;
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai = $nilai + 10;
								}
							} else {
								//ketua
								if(strtolower($row['kategori']) == "internasional"){
									$nilai = $nilai + ((60/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai = $nilai + ((60/100)*15);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai = $nilai + ((60/100)*10);
								}
							}
							
						}	
						
						$tbl2 = $this->m_report->get_Jurnal2_by_NIP($data['nip']);
						//anggota
						$anggota=explode("//",$tbl2['anggota']);
						//for($i=0;$i<count($anggota);$i++){
							//$pecah[$i]=explode('--',$anggota[$i]);
						//}
						//$jum = count($pecah[$i]);
						//print_r(".count($anggota).");

						$judul2 = "";
						$nilai2 = 0;
						foreach($tbl2 as $row){
							$judul2 = $judul2 . $row['judul'] . "<br><br>";
							//$jum = mysql_num_row('anggota');
							//if ($jum== ""){
							
							//1 anggota
							if (count($anggota) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((40/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((40/100)*15);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((40/100)*10);
								}
							} else if (count($anggota) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((20/100)*25);
								}
							} else if (count($anggota) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}else if (strtolower($row['kategori']) == "nasional terakreditasi"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}else if (strtolower($row['kategori']) == "nasional tidak terakreditasi"){
									$nilai2 = $nilai2 + ((13.3/100)*25);
								}
							} 
							
						}
					
						echo $judul;
						echo $judul2;
					echo "</td>";
					
					echo "<td>";
					
						
						$tbl3 = $this->m_report->get_Prosiding_by_NIP($data['nip']);
						$judul3 = "";
						$nilai3 = 0;
						foreach($tbl3 as $row){
							$judul3 = $judul3 . $row['judul'] . "<br><br>";
							if ($row['anggota'] == ""){
							//mandiri
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + 25;
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + 10;
								}
							} else {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai3 = $nilai3 + ((60/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai3 = $nilai3 + ((60/100)*10);
								}
							}
						}
						$tbl4 = $this->m_report->get_Prosiding2_by_NIP($data['nip']);
						$anggota2=explode("//",$tbl4['anggota']);
						//for($i=0;$i<count($anggota);$i++){
							//$pecah[$i]=explode('--',$anggota[$i]);
						//}
						//$jum = count($pecah[$i]);
						//print_r(".count($anggota).");

						$judul4 = "";
						$nilai4 = 0;
						foreach($tbl4 as $row){
							$judul4 = $judul4 . $row['judul'] . "<br><br>";
							//$jum = mysql_num_row('anggota');
							//if ($jum== ""){
							
							//1 anggota
							if (count($anggota2) == 1) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((40/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((40/100)*10);
								}
							} else if (count($anggota2) == 2) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((20/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((20/100)*10);
								}
							} else if (count($anggota2) == 3) {
								if(strtolower($row['kategori']) == "internasional"){
									$nilai4 = $nilai4 + ((13.3/100)*25);
								}else if (strtolower($row['kategori']) == "nasional"){
									$nilai4 = $nilai4 + ((13.3/100)*10);
								}
							}
						}
						
						echo $judul3;
						echo $judul4;
						
					echo "</td>
					
						 <td>";
						 $total = $nilai + $nilai2 + $nilai3 + $nilai4;
						 echo $total;
					//echo " </td>

						// <td>";					 
							//<a class='btn btn-minier  btn-info' href='".site_url('c_jurusan/detail_prosiding/'.$data['nip'])."'>Detail</a>
					//echo  "</td>
						// </tr>
					//";
				
			}
			?> 
			
		</tbody>

</table>
<br>
