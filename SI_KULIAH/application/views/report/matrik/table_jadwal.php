				
				
				<b>FAKULTAS SAINS DAN MATEMATIKA<br />
				<u>UNIVERSITAS DIPONEGORO</u></b><br /><br />
 
            <h4 align='center'>JADWAL KULIAH </h4>
            <h4 align='center'>SEMESTER <?php echo strtoupper($semester);?> TAHUN AKADEMIK <?php echo $thn_ajar;?></h4>
            <h4 align='center'>JURUSAN ILMU KOMPUTER / INFORMATIKA</h4>
            <br />
               <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-condensed" id="dataTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Hari</th>
								<th>Jam</th>
								<th>Ruang</th>
								<th>Mata Kuliah</th>
								<th>KLS</th>
								<th>sama</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$no = 1;
								
								for($i=0;$i<count($tabel_hari['id_hari']);$i++):
								$id_hari = $tabel_hari['id_hari'][$i];
								$rowspan = count($jadwal[$id_hari]['id_jadwal']);
							?>
							<tr>
								<td rowspan='<?php echo $rowspan?>'> <?php echo $no; ?> </td>
								<td rowspan='<?php echo $rowspan?>'> <?php echo $tabel_hari['nama_hari'][$i]; ?> </td>
								<td> <?php $mulai=$jadwal[$id_hari]['jammulai'][0];
											  $selesai=$jadwal[$id_hari]['jamselesai'][0];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo $jadwal[$id_hari]['ruang'][0]['nama_ruang']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][0]['nama_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['kelas'][0]; ?> </td>
								<td> 
								<?php
									if($sama[$id_hari]['jammulai'][0]==true && $sama[$id_hari]['ruang'][0]==true){
										echo 'jam mulai,ruang';
									}
									if($sama[$id_hari]['jammulai'][0]==true && $sama[$id_hari]['ruang'][0]==false){
										echo 'jam mulai';
									}
									if($sama[$id_hari]['jammulai'][0]==false && $sama[$id_hari]['ruang'][0]==true){
										echo 'ruang';
									}
									if($sama[$id_hari]['jammulai'][0]==false && $sama[$id_hari]['ruang'][0]==false){
										echo '-';
									}
									
								?>
								
								</td>
								
							</tr>
							<?php for($j=1;$j<$rowspan;$j++): ?>
							<tr>
								<td> <?php $mulai=$jadwal[$id_hari]['jammulai'][$j];
											  $selesai=$jadwal[$id_hari]['jamselesai'][$j];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo $jadwal[$id_hari]['ruang'][$j]['nama_ruang']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][$j]['nama_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['kelas'][$j]; ?> </td>
								<td> 
								<?php
									if($sama[$id_hari]['jammulai'][$j]==true && $sama[$id_hari]['ruang'][$j]==true){
										echo 'jam mulai,ruang';
									}
									if($sama[$id_hari]['jammulai'][$j]==true && $sama[$id_hari]['ruang'][$j]==false){
										echo 'jam mulai';
									}
									if($sama[$id_hari]['jammulai'][$j]==false && $sama[$id_hari]['ruang'][$j]==true){
										echo 'ruang';
									}
									if($sama[$id_hari]['jammulai'][$j]==false && $sama[$id_hari]['ruang'][$j]==false){
										echo '-';
									}
									
								?>
								
								</td>
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