<!DOCTYPE html>
<html>
<head>
	<title>Funding details</title>
	<?php include('include_file.php'); ?>
	<script>
	$(document).ready(function(){

		var url = "<? echo site_url('/funding/edit'); ?>" ;
		var id = $('#VNumber').text() ;

		$('.col-xs-3 a').each(function() {
			$(this).editable({
				type: 'text',
				url: url,
				pk: id,
			})
		});

		$('button:contains("Add")').on('click', function(){

		});

		// Get VNumber
		var parts = $(location).attr('href').split('/');
		var vno = parts.pop();

		$("#dialog input:first").val(vno);
		$("#dialog input:first").attr("readonly", "readonly");

	});
	</script>
</head>
<body>
<div class="container">
	<?php include 'nav.php' ?>
	<div class="panel panel-info">
		<?php 
		if(count($fund_arr) == 0) {
			echo '<div class="alert alert-info">Cannot find funding source from the student.</div>';
		
		}
		foreach ($fund_arr as $index => $entry) { ?>

			<div class="panel-heading">
				<?= $index+1 ?> Funding Source
			</div>
			<div class="panel-body">

			<?php 
				foreach ($entry as $key => $value) { ?>
				<div class="col-xs-3"> 
					<?=$key?>:&nbsp;&nbsp;
					<a id="<?=$key?>"><?=$value?></a>
				</div>
			
			<? } ?>
			</div>

		<? } ?>

	</div>
	
	<form method="post" action="<?php echo base_url('funding/add_entry')?>"> 
	<div id="dialog">
		<?php 
		foreach ($field as $index) {  ?>
			<?=$index?>:<input type="text" data-name="<?=$index?>" name="newFunding[]">
		<?php 
		} ?>
	</div>
	<input type="submit" value="add">
	</form>
</div>
</body>
</html>