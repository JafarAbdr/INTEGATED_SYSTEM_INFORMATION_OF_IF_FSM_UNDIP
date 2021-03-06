Lampiran : SKMT Pengampu Mata Kuliah dan Praktikum Jurusan Ilmu Komputer / Informatika <br />
         No : <br /><br />
            <h4 align='center'>
               DAFTAR NAMA-NAMA DOSEN PENGAMPU MATA KULIAH DAN PRAKTIKUM <br />
               SEMESTER <?php echo strtoupper($semester);?> TAHUN AJARAN <?php echo $thn_ajar;?><br />
               JURUSAN ILMU KOMPUTER / INFORMATIKA <br />
               FAKULTAS SAINS DAN MATEMATIKA UNIVERSITAS DIPONEGORO
            </h4>
            <br />
         <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-condensed" id="dataTable">
         <thead>
            <tr>
               <th rowspan='2'>No.</th>
               <th rowspan='2'>Nama/NIP</th>
               <th rowspan='2'>Jabatan <br /> Gol</th>
               <th colspan='4'>Mata Kuliah</th>
            </tr>
            <tr>
               <th>Kelas <br /> paralel</th>
               <th>Nama</th>
               <th>SKS</th>
               <th>Jumlah Tim<br /> Pengampu</th>
            </tr>
            <tr>
               <th>1</th>
               <th>2</th>
               <th>3</th>
               <th>4</th>
               <th>5</th>
               <th>6</th>
               <th>7</th>
            </tr>
         </thead>
         <tbody>
         <?php
            $no = 1;
            $banyakdata = count($dosen['id_dosen']);
            //echo $n;
            for($i=0;$i<$banyakdata;$i++):
					$id_dosen = $dosen['id_dosen'][$i];
					$rowspan = array_sum($matkul[$id_dosen]['jumlah_kelas']);
         ?>
         <tr>
            <!--nomor-->
            <td rowspan='<?php echo $rowspan;?>' align='center' valign='top'> 
               <?php echo $no; ?> 
            </td>
            <!--nama nip-->
            <td rowspan='<?php echo $rowspan;?>'> 
               <?php echo $dosen['nama_dosen'][$i].'<br />NIP. '.$dosen['nip'][$i]; ?> 
            </td>
            <!--Jabatan Gol-->
            <td rowspan='<?php echo $rowspan;?>'> 
               <?php echo $dosen['jabatan'][$i].'<br />'.$dosen['pangkat'][$i]; ?> 
            </td>
            <!--kelas paralel pertama-->
            
            <td align='center'> 
               <?php echo $matkul[$id_dosen]['kelas'][0][0]; ?> 
            </td>
            <!--nama matakuliah pertama-->
            <td> 
               <?php echo $matkul[$id_dosen]['nama_matkul'][0][0]; ?> 
            </td>
            <!--sks pertama-->
            <td align='center'> 
               <?php echo $matkul[$id_dosen]['sks'][0][0]; ?> 
            </td>
            <!--Jumlah Tim Pertama-->
            <td align='center'> 
               <?php echo $matkul[$id_dosen]['tim_pengampu'][0][0];; ?> 
            </td>
            
         </tr>
         <?php 
            $m = $matkul[$id_dosen]['m'];
            for($j=0;$j<$m;$j++):
         ?>
         <?php
            $n =  $matkul[$id_dosen]['jumlah_kelas'][$j];
            if($j==0){
               $k=1;
            }else{
               $k=0;
            }
            for($k;$k<$n;$k++):
         ?>
            <tr>
            <td  align='center'> 
               <?php echo $matkul[$id_dosen]['kelas'][$j][$k]; ?> 
            </td>
            <!--nama matakuliah pertama-->
            <td> 
               <?php echo $matkul[$id_dosen]['nama_matkul'][$j][$k]; ?> 
            </td>
            <!--sks pertama-->
            <td  align='center'> 
               <?php echo $matkul[$id_dosen]['sks'][$j][$k]; ?> 
            </td>
            <!--Jumlah Tim Pertama-->
            <td  align='center'> 
               <?php echo $matkul[$id_dosen]['tim_pengampu'][$j][$k];; ?> 
            </td>
            </tr>
         <?php endfor;?>   
         <?php endfor;?>   
         <?php
            $no++;
            endfor;
         ?>
            
         </tbody>
      </table>
      <table>
         <tr>
			<td colspan='5' width='700px'></td>
            <td colspan='2'>
			  <br><br>
              Semarang, <?php echo $tanggal;?><br />
              Dekan,    <br />
              <br />           
              <br />           
              <br />           
              <br />
              <?php
                  echo $nama_dekan;
                  echo '<br>';
                  echo 'NIP. '.$nip;
              ?>           
            </td>
         </tr>
      </table>
      <br />