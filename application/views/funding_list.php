<!DOCTYPE html>
<html>
<head>
	<title>Funding General Info</title>
	<?php include('include_file.php'); ?>

	<script>
	$(document).ready(function(){

	$('dataTables').dataTable({
       "scrollY": "500px",
       "scrollX": true,
       "bScrollCollapse": true,
       "paging": true,
       "iDisplayLength" : 10
	});


	</script>
</head>

<body>
<div class="container">
	<?php include('nav.php'); ?>
	<h2 class="page-header">Funding General Info</h2>
	<div class="table-responsive">
		<table id="dataTables" class="table table-hover">
			<thead>
				<tr>
					<?php 
						foreach ($field as $value) {
							echo "<th>" . $value . "</th>" ;
						}
						echo "<th>Total</th>"
					?>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($record as $key => $row) {
						echo "<tr>";
						$total = 0;
						foreach ($row as $key => $value) {
							$total += (int)$value;
							echo "<td>" . $value . "</td>" ;
						}
						echo "<td>" . $total . "</td>";
						echo "</tr>";
					}
				?>
			</tbody>
	
		</table>
	</div>
<?php include('footer.php') ?>
</div>
</body>
</html>