<!DOCTYPE html>
<html>
<head>
	<title>
		Faculty Detail Page
	</title>
	<?php include('include_file.php'); ?>
</head>
<body>
<div class="container">
	<?php include('nav.php'); ?>
	<div class="panel panel-info">
		<div class="panel-heading">Supervised Students</div>
		<div class="panel-body">
			
		<?php
		
		foreach($students as $index=>$entry) { 
			foreach($entry as $key => $value) {?>
			<?=$value?>
		<? } ?>
			<br>
		<? } ?>
		</div>
	</div>
	
		<div class="panel panel-success">
		<?php foreach ($GSSP as $index => $entry) { ?>

			<div class="panel-heading">
				<?= $index+1 ?> GSSP
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
		</div>


			
		<? } ?>	
	
</body>
</html>

