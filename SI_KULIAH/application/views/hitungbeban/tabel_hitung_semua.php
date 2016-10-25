            <br />
            <h4 align='center'>PERHITUNGAN BEBAN SKS PER DOSEN</h4>
            <h4 align='center'>SEMESTER GANJIL DAN GENAP TAHUN AJARAN <?php echo $thn_ajar;?></h4>
            <!--<h4 align='center'>JURUSAN ILMU KOMPUTER / INFORMATIKA</h4>
            <h4 align='center'>FAKULTAS SAINS DAN MATEMATIKA UNIVERSITAS DIPONEGORO</h4>-->
            <br />
            <br />
         <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
         <thead>
            <tr>
					<th rowspan='2'>No.</th>
					<th rowspan='2'>Nama Dosen</th>
					<th colspan='2'>Informatika</th>
					<th colspan='2'>FSM</th>
					<th colspan='2'>Non FSM</th>
					<th colspan='2'>Jumlah</th>
					<th rowspan='2'>Total</th>
				</tr>
				<tr>
					<th>Ganjil</th>
					<th>Genap</th>
					<th>Ganjil</th>
					<th>Genap</th>
					<th>Ganjil</th>
					<th>Genap</th>
					<th>Ganjil</th>
					<th>Genap</th>
				</tr>
         </thead>
         <tbody>
			<!--
         <?php
            $no = 1;
            $banyakdata = count($dosen['id_dosen']);
            //echo $n;
            for($i=0;$i<$banyakdata;$i++):
               $id_dosen = $dosen['id_dosen'][$i];
         ?>
         <tr>
            <!--nomor-->
            <td> 
               <?php echo $no; ?> 
            </td>
            <!--nama dosen-->
            <td> 
               <?php echo $dosen['nama_dosen'][$i];?> 
            </td>
            <!--Informatika Ganjil-->
            <td> 
               <?php echo $Ganjil['sks_keseluruhan'][0][$id_dosen]; ?> 
            </td>
				<!--Informatika Genap-->
            <td> 
               <?php echo $Genap['sks_keseluruhan'][0][$id_dosen]; ?> 
            </td>
            <!--FSM Ganjil-->
            <td> 
               <?php echo $Ganjil['sks_keseluruhan'][1][$id_dosen];?> 
            </td>
				<!--FSM Genap-->
            <td> 
               <?php echo $Genap['sks_keseluruhan'][1][$id_dosen];?> 
            </td>
            <!--NON FSM Ganjil-->
            <td> 
               <?php echo $Ganjil['sks_keseluruhan'][2][$id_dosen];?> 
            </td>
				<td> 
               <?php echo $Genap['sks_keseluruhan'][2][$id_dosen];?> 
            </td>
				<!-- untuk penjumlahan-->
				<?php
					$sum_ganjil = $Ganjil['sks_keseluruhan'][0][$id_dosen]+$Ganjil['sks_keseluruhan'][1][$id_dosen]+$Ganjil['sks_keseluruhan'][2][$id_dosen];
					$sum_genap = $Genap['sks_keseluruhan'][0][$id_dosen]+$Genap['sks_keseluruhan'][1][$id_dosen]+$Genap['sks_keseluruhan'][2][$id_dosen];
					$sum_total = $sum_ganjil + $sum_genap;
				?>
            <!--Jumlah Ganjil-->
            <td> 
               <?php echo $sum_ganjil;?> 
            </td>
				<!--Jumlah Genap-->
            <td> 
               <?php echo $sum_genap;?> 
            </td>
				<!--Jumlah Total-->
            <td> 
               <?php echo $sum_total;?> 
            </td>
         </tr>
         <?php
            $no++;
            endfor;
         ?>
            
         </tbody>
         
      </table>