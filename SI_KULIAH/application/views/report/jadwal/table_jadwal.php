<style type="text/css">
.centered-cell {
  text-align: center;
}
</style>				
				
				<b>FAKULTAS SAINS DAN MATEMATIKA<br />
				<u>UNIVERSITAS DIPONEGORO</u></b><br /><br />
		<table align="center"> 
			<tr>
				<td colspan="10" class="centered-cell"><b>JADWAL KULIAH </b></td>
            </tr>
			<tr>
				<td colspan="10" class="centered-cell"><b>SEMESTER <?php echo strtoupper($semester);?> TAHUN AKADEMIK <?php echo $thn_ajar;?></b></td>
            </tr>
			<tr>
				<td colspan="10" class="centered-cell"><b>JURUSAN ILMU KOMPUTER / INFORMATIKA</b></td>
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
								
								for($i=0;$i<count($tabel_hari['id_hari']);$i++):
								$id_hari = $tabel_hari['id_hari'][$i];
								$rowspan = count($jadwal[$id_hari]['id_jadwal']);
							?>
							<tr>
								
								<tr>
								<td colspan='8'> <?php echo $tabel_hari['nama_hari'][$i]; ?> </td>
								</tr>
								<?php ?>
								
								<td> <?php $mulai=$jadwal[$id_hari]['jammulai'][0];
											  $selesai=$jadwal[$id_hari]['jamselesai'][0];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo $jadwal[$id_hari]['ruang'][0]['nama_ruang']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][0]['kode_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][0]['nama_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][0]['sks']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][0]['semesterke']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['kelas'][0]; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['dosen_1'][0]['nama_dosen']; echo "<br>";
											  echo $jadwal[$id_hari]['dosen_2'][0]['nama_dosen']; ?> </td>
								
							</tr>
							<?php for($j=1;$j<$rowspan;$j++): ?>
							<tr>
								<td> <?php $mulai=$jadwal[$id_hari]['jammulai'][$j];
											  $selesai=$jadwal[$id_hari]['jamselesai'][$j];
												echo substr($mulai,0,2).'.'.substr($mulai,3,2).' - '.substr($selesai,0,2).'.'.substr($selesai,3,2);?>
								</td>
								<td> <?php echo $jadwal[$id_hari]['ruang'][$j]['nama_ruang']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][$j]['kode_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][$j]['nama_matkul']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][$j]['sks']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['matkul'][$j]['semesterke']; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['kelas'][$j]; ?> </td>
								<td> <?php echo $jadwal[$id_hari]['dosen_1'][$j]['nama_dosen']; echo "<br>";
											  echo $jadwal[$id_hari]['dosen_2'][$j]['nama_dosen']; ?> </td>
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