<html>
<head>
	<title> Grafik Order</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
		body{
			font-family: roboto;
		}
		
		table{
			margin: 0px auto;
		}
	</style>
	
	
	<center>
		<h2>Grafik Order SXDSlime</h2>
	</center>
	
	
	<?php 
	include 'connection.php';
	?>
	
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
	<br/>
	<br/>
	<a href="data.php">BACK</a>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Galaxy Slime 100gr", "Galaxy Slime 350gr", "Microfloam Slime 100gr", "Microfloam Slime 350gr", "Metallic Slime 100gr", "Metallic Slime 350gr", "Ocean Clear Slime 100gr", "Ocean Clear Slime 350gr", "Floam Slime 100gr", "Floam Slime 350gr", "Jiggly Slime 100gr", "Jiggly Slime 350gr", "Glow in the Dark Slime 100gr", "Glow in the Dark Slime 350gr"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_gs100 = mysqli_query($koneksi,"select * from product_order where product_id='1'");
					echo mysqli_num_rows($jumlah_gs100);
					?>, 
					<?php 
					$jumlah_gs350 = mysqli_query($koneksi,"select * from product_order where product_id='2'");
					echo mysqli_num_rows($jumlah_gs350);
					?>,
					<?php
					$jumlah_ms100 = mysqli_query($koneksi,"select * from product_order where product_id='3'");
					echo mysqli_num_rows($jumlah_ms100);
					?>,
					<?php 
					$jumlah_ms350 = mysqli_query($koneksi,"select * from product_order where product_id='4'");
					echo mysqli_num_rows($jumlah_ms350);
					?>,
					<?php
					$jumlah_mt100 = mysqli_query($koneksi,"select * from product_order where product_id='5'");
					echo mysqli_num_rows($jumlah_mt100);
					?>,
					<?php 
					$jumlah_mt350 = mysqli_query($koneksi,"select * from product_order where product_id='6'");
					echo mysqli_num_rows($jumlah_mt350);
					?>,
					<?php
					$jumlah_ocs100 = mysqli_query($koneksi,"select * from product_order where product_id='7'");
					echo mysqli_num_rows($jumlah_ocs100);
					?>,
					<?php 
					$jumlah_ocs350 = mysqli_query($koneksi,"select * from product_order where product_id='8'");
					echo mysqli_num_rows($jumlah_ocs350);
					?>,
					<?php
					$jumlah_fs100 = mysqli_query($koneksi,"select * from product_order where product_id='9'");
					echo mysqli_num_rows($jumlah_fs100);
					?>,
					<?php 
					$jumlah_fs350 = mysqli_query($koneksi,"select * from product_order where product_id='10'");
					echo mysqli_num_rows($jumlah_fs350);
					?>,
					<?php
					$jumlah_js100 = mysqli_query($koneksi,"select * from product_order where product_id='11'");
					echo mysqli_num_rows($jumlah_js100);
					?>,
					<?php 
					$jumlah_js350 = mysqli_query($koneksi,"select * from product_order where product_id='12'");
					echo mysqli_num_rows($jumlah_js350);
					?>,
					<?php
					$jumlah_gds100 = mysqli_query($koneksi,"select * from product_order where product_id='13'");
					echo mysqli_num_rows($jumlah_gds100);
					?>,
					<?php 
					$jumlah_gds350 = mysqli_query($koneksi,"select * from product_order where product_id='14'");
					echo mysqli_num_rows($jumlah_gds350);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	<footer class="container">
		<p style="text-align: center;"><br>sxdslime &copy; 2020</p>
	</footer>
</body>
</html>