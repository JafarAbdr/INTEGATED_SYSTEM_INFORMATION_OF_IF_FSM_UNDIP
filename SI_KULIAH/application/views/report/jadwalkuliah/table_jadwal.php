<style type="text/css">
.centered-cell {
  text-align: center;
}
</style>				
				
				<b>FAKULTAS SAINS DAN MATEMATIKA<br />
				<u>UNIVERSITAS DIPONEGORO</u></b><br /><br />
		<table align="center"> 
			<tr>
				<td colspan="8" class="centered-cell"><b>JADWAL KULIAH </b></td>
            </tr>
			<tr>
				<td colspan="8" class="centered-cell"><b>SEMESTER <?php echo strtoupper($semester);?> TAHUN AKADEMIK <?php echo $thn_ajar;?></b></td>
            </tr>
			<tr>
				<td colspan="8" class="centered-cell"><b>JURUSAN ILMU KOMPUTER / INFORMATIKA</b></td>
			</tr>
		</table>
            <br />
               <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-condensed" id="dataTable">
						<thead>
							<tr>
								<th>Hari/Jam</th>
								<th>Ruang</th>
								<th>Kode</th>
								<th>Mata Kuliah</th>
								<th>SKS</th>
								<th>SMT</th>
								<th>KLS</th>
								<th>Dosen Pengampu</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$no = 1;
								
								for($i=0;$i<count($tabel_hari['hari']);$i++):
								$hari = $tabel_hari['hari'][$i];
								$rowspan = count($jadwal[$hari]['id_jadwal']);
							?>
							<tr>
								
								<tr>
								<td colspan='8'> <?php echo $tabel_hari['hari'][$i]; ?> </td>
								</tr>
								<?php ?>
								
								<td> <?php $mulai=$jadwal[$hari]['jammulai'][0];
											  $selesai=$jadwal[$hari]['jamselesai'][0];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo $jadwal[$hari]['ruang'][0]['nama_ruang']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][0]['kode_matkul']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][0]['nama_matkul']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][0]['sks']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][0]['semesterke']; ?> </td>
								<td> <?php echo $jadwal[$hari]['kelas'][0]; ?> </td>
								<td> <?php echo $jadwal[$hari]['dosen_1'][0]['nama_dosen']; echo "<br>";
											  echo $jadwal[$hari]['dosen_2'][0]['nama_dosen']; ?> </td>
								
							</tr>
							<?php for($j=1;$j<$rowspan;$j++): ?>
							<tr>
								<td> <?php $mulai=$jadwal[$hari]['jammulai'][$j];
											  $selesai=$jadwal[$hari]['jamselesai'][$j];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo $jadwal[$hari]['ruang'][$j]['nama_ruang']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][$j]['kode_matkul']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][$j]['nama_matkul']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][$j]['sks']; ?> </td>
								<td> <?php echo $jadwal[$hari]['matkul'][$j]['semesterke']; ?> </td>
								<td> <?php echo $jadwal[$hari]['kelas'][$j]; ?> </td>
								<td> <?php echo $jadwal[$hari]['dosen_1'][$j]['nama_dosen']; echo "<br>";
											  echo $jadwal[$hari]['dosen_2'][$j]['nama_dosen']; ?> </td>
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