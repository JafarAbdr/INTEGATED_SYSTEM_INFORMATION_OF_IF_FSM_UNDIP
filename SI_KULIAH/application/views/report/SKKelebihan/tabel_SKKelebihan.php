			Lampiran : SK Kelebihan Mengajar Semester <?php echo $semester;?> Tahun Akademik <?php echo $thn_ajar?> <br />
         No : <br /><br />
         <h4 align='center'>
            KELEBIHAN JAM MENGAJAR<br />
            DOSEN-DOSEN ILMU KOMPUTER / INFORMATIKA<br />
            SEMESTER <?php echo strtoupper($semester);?> TAHUN AKADEMIK <?php echo $thn_ajar;?>
         </h4>
         <br />
         <table cellpadding="0" cellspacing="0" border="1" class="table table-condensed" id="">
         <thead>
            <tr>
					<th rowspan='2'>NO</th>
					<th rowspan='2'>Nama / NIP / JABATAN / GOL </th>
					<th rowspan='2'>SMT</th>
					<th rowspan='2'>Mata Kuliah</th>
					<th rowspan='2'>Jurusan</th>
					<th>TIM/</th>
					<th>SKS</th>
					<th>JML</th>
					<th>JML</th>
					<th>SKS</th>
					<th>SKS</th>
				</tr>
				<tr>
					<th>MANDIRI</th>
					<th>MK</th>
					<th>DOSEN</th>
					<th>KLS</th>
					<th>REAL</th>
					<th>LEBIH</th>
				</tr>
         </thead>
         <tbody>
         <?php
            $no = 1;
            $banyakdata = count($dosen['id_dosen']);
            //echo $n;
            for($i=0;$i<$banyakdata;$i++):
					$id_dosen = $dosen['id_dosen'][$i];
               $rowspanDosen = 0;
					$rowspanDosen = $matkul[0][$id_dosen]['banyak_matakuliah'];
               if(isset($matkul[1][$id_dosen]['banyak_matakuliah'])){
                  $rowspanDosen += $matkul[1][$id_dosen]['banyak_matakuliah'];
               }
               //echo $rowspanDosen;
         ?>
         <tr>
            <!--nomor-->
            <td rowspan='<?php echo $rowspanDosen;?>' align='center' valign='top'> 
               <?php echo $no; ?> 
            </td>
            <!--nama nip-->
            <td rowspan='<?php echo $rowspanDosen;?>'> 
               <?php 
                  echo $dosen['nama_dosen'][$i].
                  '<br />NIP. '.$dosen['nip'][$i].
                  '<br />'.$dosen['jabatan'][$i].
                  ' / '.$dosen['pangkat'][$i];
                  ; 
               ?> 
            </td>
            <!--Semester Ke pertama-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['semesterke'][0];?> 
            </td>
            <!--mata kuliah pertama-->
            <td> 
               <?php echo $matkul[0][$id_dosen]['nama_matkul'][0]; ?> 
            </td>
            <!--jurusan_kelas pertama-->
            <td> 
               <?php echo $matkul[0][$id_dosen]['jurusan_kelas'][0]; ?> 
            </td>
            <!--tim pengampu pertama-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['tim_pengampu'][0]; ?> 
            </td>
            <!--sks Pertama-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['sks'][0]; ?> 
            </td>
            <!--jumlah dosen Pertama-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['jumlah_dosen'][0]; ?> 
            </td>
            <!--jumlah kelas Pertama-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['jumlah_kelas'][0]; ?> 
            </td>
            
            <?php
               //informatika
                  $m = $matkul[0][$id_dosen]['banyak_matakuliah'];
                  $sks_real = array();
                  for($j=0;$j<$m;$j++){
                     $temp_sksmatkul = $matkul[0][$id_dosen]['sks'][$j];
                     $temp_jmldosen = $matkul[0][$id_dosen]['jumlah_dosen'][$j];
                    
                     $temp_jmlkls = $matkul[0][$id_dosen]['jumlah_kelas'][$j];
                     $sks_real[$j] = $temp_sksmatkul*$temp_jmlkls/$temp_jmldosen;
                     //echo $sks_real[$j];
                  }
                  
               //fsm
                  $sks_real_fsm = array();
                  if(isset($matkul[1][$id_dosen]['banyak_matakuliah'])){
                     $m = $matkul[1][$id_dosen]['banyak_matakuliah'];
                     for($j=0;$j<$m;$j++){
                     $temp_sksmatkul = $matkul[1][$id_dosen]['sks'][$j];
                     $temp_jmldosen = $matkul[1][$id_dosen]['jumlah_dosen'][$j];
                    
                     $temp_jmlkls = $matkul[1][$id_dosen]['jumlah_kelas'][$j];
                     $sks_real_fsm[$j] = $temp_sksmatkul*$temp_jmlkls/$temp_jmldosen;
                     //echo $sks_real_fsm[$j];
                     }
                  }  
               
              ?>
            
            <!--hitung sks Pertama-->
            <td align='center'> 
               <?php echo $sks_real[0]; ?> 
            </td>
            <!--tanggungan beban Pertama-->
            <td rowspan='<?php echo $rowspanDosen;?>' align='center' valign='top'> 
               <?php
                  $sum = array_sum($sks_real)+array_sum($sks_real_fsm);
                  $sks_lebih = $sum - $sks_wajib;
                  echo $sks_lebih;
               ?> 
            </td>
         </tr>
         <?php 
            $m = $matkul[0][$id_dosen]['banyak_matakuliah'];
            for($j=1;$j<$m;$j++):
         ?>
         <tr>
            <!--Semester Ke perulangan-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['semesterke'][$j];?> 
            </td>
            <!--mata kuliah perulangan-->
            <td> 
               <?php echo $matkul[0][$id_dosen]['nama_matkul'][$j]; ?> 
            </td>
            <!--jurusan_kelas perulangan-->
            <td> 
               <?php echo $matkul[0][$id_dosen]['jurusan_kelas'][$j]; ?> 
            </td>
            <!--tim pengampu perulangan-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['tim_pengampu'][$j]; ?> 
            </td>
            <!--sks Perulangan-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['sks'][$j]; ?> 
            </td>
            <!--jumlah dosen Perulangan-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['jumlah_dosen'][$j]; ?> 
            </td>
            <!--jumlah kelas Perulangan-->
            <td align='center'> 
               <?php echo $matkul[0][$id_dosen]['jumlah_kelas'][$j]; ?> 
            </td>
            <!--hitung sks Perulangan-->
            <td align='center'> 
               <?php echo $sks_real[$j]; ?> 
            </td>
         </tr> 
         <?php endfor;?>
         
         <!--jurusan di fsm-->
         <?php
            if(isset($matkul[1][$id_dosen]['banyak_matakuliah'])): 
            $m = $matkul[1][$id_dosen]['banyak_matakuliah'];
            for($j=0;$j<$m;$j++):
         ?>
         <tr>
            <!--Semester Ke perulangan-->
            <td align='center'> 
               <?php echo $matkul[1][$id_dosen]['semesterke'][$j];?> 
            </td>
            <!--mata kuliah pertama-->
            <td> 
               <?php echo $matkul[1][$id_dosen]['nama_matkul'][$j]; ?> 
            </td>
            <!--jurusan_kelas pertama-->
            <td> 
               <?php echo $matkul[1][$id_dosen]['jurusan_kelas'][$j]; ?> 
            </td>
            <!--tim pengampu pertama-->
            <td align='center'> 
               <?php echo $matkul[1][$id_dosen]['tim_pengampu'][$j]; ?> 
            </td>
            <!--sks Pertama-->
            <td align='center'> 
               <?php echo $matkul[1][$id_dosen]['sks'][$j]; ?> 
            </td>
            <!--jumlah dosen Perulangan-->
            <td align='center'> 
               <?php echo $matkul[1][$id_dosen]['jumlah_dosen'][$j]; ?> 
            </td>
            <!--jumlah kelas Perulangan-->
            <td align='center'> 
               <?php echo $matkul[1][$id_dosen]['jumlah_kelas'][$j]; ?> 
            </td>
            <!--hitung sks Perulangan-->
            <td align='center'> 
               <?php echo $sks_real_fsm[$j]; ?> 
            </td>
         </tr> 
         <?php endfor;endif;?>
         
         <tr bgcolor='gray'>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         </tr>
         <?php
            
            $no++;
            endfor;
         ?>
           
         </tbody>
         
      </table>