<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Everyone Loves TO-DO lists!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src='js/myjs.js'></script>
	<link rel="stylesheet" href="css/mycss.css">

	<script type="text/javascript">
		$(document).ready(function(){
			//Initial display of the table of tasks
			displayTable('all');
			addListeners();
			doneListeners();
//event listener for 1st complete_task


		});
		// $(document).ready(function(){
		// 	$('form').submit(function(event){
		// 		//this will do the submission of your form data
		// 		event.preventDefault();

		// 		$.post(
		// 			$(this).attr('action'),
		// 			$(this).serialize(), 
		// 			function(data){
		// 				$('#names').append(data+"was here!<br>");
		// 			},
		// 			'json');
		// 	});
	</script>
	

</head>
<body>
	<div class='container'>

		<section id='section_input'>
			<button id='button_add'>Add</button>
			<input type='text' id='input_add'>
		</section>

		<section class='section_output'>
			<ul id='select_category'>
				<li id='all' class='selected'>All</li>
				<li id='working'>Working</li>
				<li id='completed'>Completed</li>
				<li id='none'>None</li>
			</ul>
			<table id='table_tasks' border=1>
				<thead>
					<th id='table_done'>Done</th>
					<th id='table_description'>Description</th>
					<th id='table_date'>Date Added</th>
					<th id='table_status'>Status</th>
				</thead>
				<tbody>
				</tbody>
			</table>

		</section>
	</div>

</body>
	
</html>