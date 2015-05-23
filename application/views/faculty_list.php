<!DOCTYPE html>
<html>
<head>
	<title>Faculty Resource</title>
</head>
<?php include('include_file.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

	$('#dataTables').dataTable({
       "scrollY": "500px",
       "scrollX": true,
       "bScrollCollapse": true,
       "paging": true,
       "iDisplayLength" : 10
	});

     var table = $('#dataTables').DataTable();
      // Apply the search
      table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );


      });

      $('tbody tr td:first').on('click', function(){
      	var vno = $(this).text();
      	window.location.href = "/yogurt/faculty/get_details/" + vno;

      });
      $('tbody tr td:first').addClass('btn btn-link clickCol');

	});
</script>
<body>
<div class="container">
	<?php include('nav.php'); ?>
	<h2 class="page-header">Faculty General Info</h2>
	<div class="table-responsive">
		<table id="dataTables" class="table table-hover">
			<thead>
				<tr>
					<?php 
						foreach ($record[0] as $key=>$value) {
							echo "<th>" . $key . "</th>" ;
						}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($record as $key => $row) {
						echo "<tr>";
						foreach ($row as $key => $value) {
							echo "<td>" . $value . "</td>" ;
						}
						echo "</tr>";
					}
				?>
			</tbody>
			<tfoot>
				<tr>
					<?php
						foreach ($record[0] as $key=>$value) {
						    echo "<th><input type='text' placeholder='" . $key . "'/></th>";
						}
					?>
				</tr>
			</tfoot>
		</table>
	</div>
<?php include('footer.php') ?>
</div>
</body>
</html>