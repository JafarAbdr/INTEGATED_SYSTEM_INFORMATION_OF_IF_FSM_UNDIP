<?php
$tahun=$this->db->query("select max(tahun) FROM penelitian")->row_array();
$tahunp=$this->db->query("select max(tahun) FROM pengabdian")->row_array();

$th=max($tahun['max(tahun)'],$tahunp['max(tahun)']);
$jml=0;
$usl=0;
$dtr=0;
$dtl=0;
for($i=0;$i<5;$i++ ){
	$t=$th-$i;
	$datanya = $this->db->query("select * FROM penelitian WHERE tahun=$t")->result_array();
	for($j=0;$j<count($datanya);$j++){
		$data = $datanya[$j];
		if ($data['status']=="Usulan"){
		$usl=$usl+1;
		}
		if ($data['status']=="Diterima"){
		$dtr=$dtr+1;
		}
		if ($data['status']=="Ditolak"){
		$dtl=$dtl+1;
		}
		$jml=$jml+$data['alokasi_dana'];
	}
	$ta[$i]=$t;
	$jumlah[$i]=$jml;
	$usulan[$i]=$usl;
	$diterima[$i]=$dtr;
	$ditolak[$i]=$dtl;
	$jml_penelitian[$i]=count($datanya);

	$jml=0;
	$usl=0;
	$dtr=0;
	$dtl=0;
}
//$a[0][0]='halo';

//print_r($ta);
?>

<?php
$jml=0;
	$usl=0;
	$dtr=0;
	$dtl=0;
for($a=0;$a<5;$a++ ){
	$t=$th-$a;
	$datanyaa = $this->db->query("select * FROM pengabdian WHERE tahun=$t")->result_array();
	for($b=0;$b<count($datanyaa);$b++){
		$data = $datanyaa[$b];
		if ($data['status']=="Usulan"){
		$usl=$usl+1;
		}
		if ($data['status']=="Diterima"){
		$dtr=$dtr+1;
		}
		if ($data['status']=="Ditolak"){
		$dtl=$dtl+1;
		}
		$jml=$jml+$data['alokasi_dana'];
	}
	$jumlahp[$a]=$jml;
	$usulanp[$a]=$usl;
	$diterimap[$a]=$dtr;
	$ditolakp[$a]=$dtl;
	$jml_penelitianp[$a]=count($datanyaa);
	
	$jml=0;
	$usl=0;
	$dtr=0;
	$dtl=0;
}
?>

<script>
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'DATA PENELITIAN'
            },
            subtitle: {
                text: 'Dosen Informatika'
            },
            xAxis: {
                categories: [
                    <?php echo $ta[0]?>,
                    <?php echo $ta[1]?>,
                    <?php echo $ta[2]?>,
                    <?php echo $ta[3]?>,
                    <?php echo $ta[4]?>
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Penelitian'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Usulan',
                data: [
				<?php echo $usulan[0]?>,	
				<?php echo $usulan[1]?>,	
				<?php echo $usulan[2]?>,	
				<?php echo $usulan[3]?>,	
				<?php echo $usulan[4]?>	
				]
    
            }, {
                name: 'Diterima',
                data: [
				<?php echo $diterima[0]?>,
				<?php echo $diterima[1]?>,
				<?php echo $diterima[2]?>,
				<?php echo $diterima[3]?>,
				<?php echo $diterima[4]?>
				]
    
            }, {
                name: 'Ditolak',
                data: [
				<?php echo $ditolak[0]?>,
				<?php echo $ditolak[1]?>,
				<?php echo $ditolak[2]?>,
				<?php echo $ditolak[3]?>,
				<?php echo $ditolak[4]?>,
				]
    
            }]
        });
    });
	
	$(function () {
        $('#pengabdian').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'DATA PENGABDIAN'
            },
            subtitle: {
                text: 'Dosen Informatika'
            },
            xAxis: {
                categories: [
                    <?php echo $ta[0]?>,
                    <?php echo $ta[1]?>,
                    <?php echo $ta[2]?>,
                    <?php echo $ta[3]?>,
                    <?php echo $ta[4]?>
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pengabdian'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Usulan',
                data: [
				<?php echo $usulanp[0]?>,	
				<?php echo $usulanp[1]?>,	
				<?php echo $usulanp[2]?>,	
				<?php echo $usulanp[3]?>,	
				<?php echo $usulanp[4]?>	
				]
    
            }, {
                name: 'Diterima',
                data: [
				<?php echo $diterimap[0]?>,
				<?php echo $diterimap[1]?>,
				<?php echo $diterimap[2]?>,
				<?php echo $diterimap[3]?>,
				<?php echo $diterimap[4]?>
				]
    
            }, {
                name: 'Ditolak',
                data: [
				<?php echo $ditolakp[0]?>,
				<?php echo $ditolakp[1]?>,
				<?php echo $ditolakp[2]?>,
				<?php echo $ditolakp[3]?>,
				<?php echo $ditolakp[4]?>,
				]
    
            }]
        });
    });
	
	$(function () {
        $('#dana').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'TOTAL DANA'
            },
            subtitle: {
                text: 'Penelitian dan Pengabdian'
            },
            xAxis: {
                categories: [
                    <?php echo $ta[0]?>,
                    <?php echo $ta[1]?>,
                    <?php echo $ta[2]?>,
                    <?php echo $ta[3]?>,
                    <?php echo $ta[4]?>
                    
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Dana'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Penelitian',
                data: [
				<?php echo $jumlah[0]?>,	
				<?php echo $jumlah[1]?>,	
				<?php echo $jumlah[2]?>,	
				<?php echo $jumlah[3]?>,	
				<?php echo $jumlah[4]?>	
				]
    
            }, {
                name: 'PENGABDIAN',
                data: [
				<?php echo $jumlahp[0]?>,
				<?php echo $jumlahp[1]?>,
				<?php echo $jumlahp[2]?>,
				<?php echo $jumlahp[3]?>,
				<?php echo $jumlah[4]?>
				]
    
            }]
        });
    });
</script>
<script src="chart/highcharts.js"></script>
<script src="chart/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<hr>
<div id="pengabdian" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<hr>
<div id="dana" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<hr>
<h4>
PENELITIAN
</h4>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>TAHUN </th>
			<th>USULAN</th>
			<th>DITERIMA</th>
			<th>DITOLAK</th>
			<th>JUMLAH</th>
			<th>TOTAL DANA</th>
		</tr>
	</thead>
	
	<tbody>
		<?php
		for($k=0;$k<5; $k++){
		$alokasi='Rp ' .number_format( $jumlah[$k] , 2 , ',' , '.' );
		echo"
			<tr>
				<td>$ta[$k]</td>
				<td>$usulan[$k]</td>
				<td>$diterima[$k]</td>
				<td>$ditolak[$k]</td>
				<td>$jml_penelitian[$k]</td>
				<td>$alokasi</td>
			</tr>
		
		";
		
		}
		?>
	</tbody>
</table>


<h4>
PENGABDIAN
</h4>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>TAHUN </th>
			<th>USULAN</th>
			<th>DITERIMA</th>
			<th>DITOLAK</th>
			<th>JUMLAH</th>
			<th>TOTAL DANA</th>
		</tr>
	</thead>
	
	<tbody>
		<?php
		for($c=0;$c<5; $c++){
		$al='Rp ' .number_format( $jumlahp[$c] , 2 , ',' , '.' );
		echo"
			<tr>
				<td>$ta[$c]</td>
				<td>$usulanp[$c]</td>
				<td>$diterimap[$c]</td>
				<td>$ditolakp[$c]</td>
				<td>$jml_penelitianp[$c]</td>
				<td>$al</td>
			</tr>
		
		";
		
		}
		?>
	</tbody>
</table>
