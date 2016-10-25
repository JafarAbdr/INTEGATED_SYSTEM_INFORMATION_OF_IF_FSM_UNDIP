            <br />
            <h4 align='center'>PERHITUNGAN BEBAN SKS PER DOSEN</h4>
            <h4 align='center'>SEMESTER <?php echo strtoupper($semester);?> TAHUN AJARAN <?php echo $thn_ajar;?></h4>
            <!--<h4 align='center'>JURUSAN ILMU KOMPUTER / INFORMATIKA</h4>
            <h4 align='center'>FAKULTAS SAINS DAN MATEMATIKA UNIVERSITAS DIPONEGORO</h4>-->
            <br />
            <br />
            
         <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable">
         <thead>
            <tr>
               <th>No.</th>
               <th>Nama Dosen</th>
               <th>Informatika</th>
               <th>FSM</th>
               <th>Non FSM</th>
               <th>Jumlah</th>
            </tr>
         </thead>
         <tbody>
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
            <!--Informatika-->
            <td> 
               <?php echo $sks_keseluruhan[0][$id_dosen]; ?> 
            </td>
				<!--FSM-->
            <td> 
               <?php echo $sks_keseluruhan[1][$id_dosen];?> 
            </td>
            <!--NON FSM-->
            <td> 
               <?php echo $sks_keseluruhan[2][$id_dosen];?> 
            </td>
            <!--Jumlah-->
            <td> 
               <?php
                  $sum = $sks_keseluruhan[0][$id_dosen]+$sks_keseluruhan[1][$id_dosen]+$sks_keseluruhan[2][$id_dosen]; 
                  echo $sum;  
               ?> 
            </td>
         </tr>
         <?php
            $no++;
            endfor;
         ?>
            
         </tbody>
         
      </table>