<style type="text/css">
.centered-cell {
  text-align: center;
}
</style>				
		<table align="center"> 
			<tr>
				<td colspan="9" class="centered-cell"><b>JADWAL <?php if ($uts_uas='uts'){
																		   echo "UJIAN TENGAH SEMESTER (UTS)";}
																	   else{
																	       echo "UJIAN AKHIR SEMESTER (UAS)";}
															     ?></b>
				</td>
            </tr>
			<tr>
				<td colspan="9" class="centered-cell"><b>SEMESTER <?php echo strtoupper($semester);?> TAHUN AKADEMIK <?php echo $thn_ajar;?></b></td>
            </tr>
			<tr>
				<td colspan="9" class="centered-cell"><b>JURUSAN ILMU KOMPUTER / INFORMATIKA</b></td>
				
			</tr>
			<tr>
				<td colspan="9" class="centered-cell"><b>FAKULTAS SAINS DAN MATEMATIKA</b></td>
			</tr>
		</table>
            <br />
			   <b>Koordinator Prodi: <?php echo $nama_koorprodi;?> </b>
               <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-condensed" id="dataTable">
						<thead>
							<tr>
								<th><center>Hari/Jam</center></th>
								<th><center>Ruang</center></th>
								<th><center>Kode</center></th>
								<th><center>Mata Kuliah</center></th>
								<th><center>SKS</center></th>
								<th><center>SMT</center></th>
								<th><center>KLS</center></th>
								<th><center>PST</center></th>
								<th><center>Dosen Pengampu</center></th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$no = 1;
								
								for($i=0;$i<count($tabel_tanggal);$i++):
								$id_tanggal = $tabel_tanggal[$i];
								$rowspan = count($jadwal[$id_tanggal]['id_jadwal']);
							?>
							<tr>
								<td colspan='9'> <center><b><?php 
										$tanggalan= $id_tanggal; 
										$parts = explode('-',$tanggalan);
										
										$date  = "$parts[2]";
										$date2 = "$parts[0]";
										$dayForDate = date("l", mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
										if($dayForDate=='Monday'){
											echo 'Senin';
										}elseif($dayForDate=='Tuesday'){
											echo 'Selasa';
										}elseif($dayForDate=='Wednesday'){
											echo 'Rabu';
										}elseif($dayForDate=='Thursday'){
											echo 'Kamis';
										}elseif($dayForDate=='Friday'){
											echo 'Jumat';
										}elseif($dayForDate=='Saturday'){
											echo 'Sabtu';
										}elseif($dayForDate=='Sunday'){
											echo 'Minggu';
										}
										
										echo ', '.$date; 
										if($parts[1]=='01'){
											echo " Januari ";
										}elseif($parts[1]=='02'){
											echo " Februari ";
										}elseif($parts[1]=='03'){
											echo " Maret ";
										}elseif($parts[1]=='04'){
											echo " April ";
										}elseif($parts[1]=='05'){
											echo " Mei ";
										}elseif($parts[1]=='06'){
											echo " Juni ";
										}elseif($parts[1]=='07'){
											echo " Juli ";
										}elseif($parts[1]=='08'){
											echo " Agustus ";
										}elseif($parts[1]=='09'){
											echo " September ";
										}elseif($parts[1]=='10'){
											echo " Oktober ";
										}elseif($parts[1]=='11'){
											echo " November ";
										}elseif($parts[1]=='12'){
											echo " Desember ";
										}
										echo $date2;
										?></b> </center></td>
								
								<tr>
									<td> <?php $mulai=$jadwal[$id_tanggal]['jammulai'][0];
												  $selesai=$jadwal[$id_tanggal]['jamselesai'][0];
													echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
									</td>
									<td> <?php echo "Akademik"; ?> </td>
									<td> <?php echo $jadwal[$id_tanggal]['matkul'][0]['kode_matkul']; ?> </td>
									<td> <?php echo $jadwal[$id_tanggal]['matkul'][0]['nama_matkul']; ?> </td>
									<td> <?php echo $jadwal[$id_tanggal]['matkul'][0]['sks']; ?> </td>
									<td> <?php echo $jadwal[$id_tanggal]['matkul'][0]['semesterke']; ?> </td>
									<td> <?php echo $jadwal[$id_tanggal]['kelas'][0]; ?> </td>
									<td> <?php echo $jadwal[$id_tanggal]['peserta'][0]; ?> </td>
									<td> <?php echo $jadwal[$id_tanggal]['dosen_1'][0]['nama_dosen']; echo "<br>";
											   echo $jadwal[$id_tanggal]['dosen_2'][0]['nama_dosen']; ?> </td>
								</tr>
								
							</tr>
							<?php for($j=1;$j<$rowspan;$j++): ?>
							<tr>
								<td> <?php $mulai=$jadwal[$id_tanggal]['jammulai'][$j];
											  $selesai=$jadwal[$id_tanggal]['jamselesai'][$j];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo "Akademik"; ?> </td>
								<td> <?php echo $jadwal[$id_tanggal]['matkul'][$j]['kode_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_tanggal]['matkul'][$j]['nama_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_tanggal]['matkul'][$j]['sks']; ?> </td>
								<td> <?php echo $jadwal[$id_tanggal]['matkul'][$j]['semesterke']; ?> </td>
								<td> <?php echo $jadwal[$id_tanggal]['kelas'][$j]; ?> </td>
								<td> <?php echo $jadwal[$id_tanggal]['peserta'][$j]; ?> </td>
								<td> <?php echo $jadwal[$id_tanggal]['dosen_1'][$j]['nama_dosen']; echo "<br>";
											  echo $jadwal[$id_tanggal]['dosen_2'][$j]['nama_dosen']; ?> </td>
							</tr>
							<?php
							endfor;
							?>
							
							<?php
								$no++;
								endfor;
							?>
							
						</tbody>
					</table>
					<table>
						 <tr>
							<td colspan='6' width='680px'>
							  <br><br>
							  Mengetahui,<br />
							  Pembantu Dekan I    <br />
							  <br />           
							  <br />           
							  <br />           
							  <br />
							  <?php
								  echo $nama_pd1;
								  echo '<br>';
								  echo 'NIP. '.$nip2;
							  ?>           
							</td>
							<td colspan='3'>
							  <br><br>
							  Semarang, <?php echo $tanggal;?><br />
							  Ketua Jurusan Ilmu Komputer/Informatika    <br />
							  <br />           
							  <br />           
							  <br />           
							  <br />
							  <?php
								  echo $nama_kajur;
								  echo '<br>';
								  echo 'NIP. '.$nip;
							  ?>           
							</td>
						 </tr>
					</table>