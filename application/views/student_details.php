<!DOCTYPE html>
<html>
<head>
	<title>Student Detail Info</title>
	<?php include('include_file.php'); 
	?>
	<script>
	$.fn.editable.defaults.mode = 'popup';
	$.fn.editable.defaults.send = 'always';

	$(document).ready(function(){
		var post_basic_url = "<? echo base_url('student/edit_basic_info');?>";
		var post_reg_url = "<? echo base_url('student/edit_reg_info');?>";
		var post_funding_url = "<? echo base_url('student/edit_funding_info');?>";

		<?php 

		foreach ($basic as $key => $value) { ?>

			/* <?=$key?> would return the object instead of string */
			var selector = <? echo json_encode($key) ?>;
			var value = <? echo json_encode($value) ?>;
			var vnumber = $('#VNumber').text();

			$('#' + selector).editable({
				// container: 'body',
				type: 'text',
				url: post_basic_url,
				dataType: 'json',
				/* X-editable only sends name, value and pk
				could not make custom data like ajax */
				pk: vnumber
			});

		<?php
		}
		foreach ($registration as $key => $value) { ?>
			var selector = <? echo json_encode($key) ?>;
			var value = <? echo json_encode($value) ?>;
			var vnumber = $('#VNumber').text();

			$('#' + selector).editable({
				type: 'text',
				url: post_reg_url,
				pk: vnumber
			});
	<?php } ?>
	 });
	</script>
</head>

<body>
	<div class="container">
		<?php include('nav.php'); ?>
		<div class="panel panel-info">
			<div class="panel-heading">Basic Infomation</div>
			<div class="panel-body">
			<?php
				foreach($basic as $key=>$value) { ?>
					<div class="col-xs-3">
						<?=$key?>:&nbsp;&nbsp;
						<a id="<?=$key?>"><?=$value?></a>
					</div>

			<?	}
			?>
			</div>
			<div class="panel-footer">Panel footer</div>
		</div>

		<div class="panel panel-warning">
			<div class="panel-heading">Registration Infomation</div>
			<div class="panel-body">
			<?php
				foreach($registration as $key=>$value) { ?>
					<div class="col-xs-3">
						<?=$key?>:&nbsp;&nbsp;
						<a id="<?=$key?>"><?=$value?></a>
					</div>

			<?	}
			?>
			</div>
			<div class="panel-footer">Panel footer</div>
		</div>

		<div class="panel panel-success">
			<div class="panel-heading">Funding Infomation</div>
			<div class="panel-body">
				Panel content
			</div>
			<div class="panel-footer">Panel footer</div>
		</div>
</body>
<?php include('footer.php') ?>
</html>