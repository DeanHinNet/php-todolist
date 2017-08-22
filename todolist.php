<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>Everyone Loves TO-DO lists!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
		p, span, h1, h2, h3, h4, h5, h6, ul, li{
			padding: 0;
			margin: 0;
		}

		ul {
			list-style: none;

		}
		table {
			align: center;
			border: 1px;
			width: 100%;
		}

		#table_done {
			width: 10%;
		}

		#table_description {
			width: 54%;
		}

		#table_date {
		
		}

		#table_status {
			width: 20%;
		}

		.container {
			width: 400px;
			margin: 10px auto;

		}
		.complete_task {
			margin: 0 auto;
			display: block;
		}

		#section_input {
			text-align: center;
		}

		#select_category {
			text-align: center;
			margin: 10px 0px;
		}
		#select_category li{
			display: inline-block;
			padding: 3px;

		}
		.selected {
			background-color: lightgray;
		}
	</style>
<!--

[17-03-38] Add css filter for different statuses of tasks.
[] "Done" checkbox updates the status 
[] Connect to SQL Database
[] Fix when clicking out of categories
-->
</head>
<body>
	<div class='container'>

		<section id='section_input'>
			<button id='button_add'>Add</button>
			<input type='text' id='input_add'>
		</section>

		<section class='section_output'>
			<ul id='select_category'>
				<li id='working' class='selected'>Working</li>
				<li id='completed'>Completed</li>
				<li id='all'>All</li>
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
	<script>
	 //GLOBAL VARIABLES
	 var tasks = [
	 	['0','Create Mockup', '3-26-17', 'completed'],
	 	['1','Create html', '3-26-17', 'working'],
	 	['2','Add CSS', '3-26-17', 'working'],
	 	['3','Commit to GIT', '3-26-17', 'working']
	 ];

	 
	 //RENDER FUNCTIONS
	 function displayTable(status){
	 	//displays the initial list of tasks
	 	//var new_tbody = document.createElement('tbody');
	 	//var table = document.getElementById('table_tasks').getElementsByTagName('tbody')[0];
	 	var rows = [];
	 	var cells = [];
	 	var old_tbody = document.getElementById('table_tasks').getElementsByTagName('tbody')[0];
	 	var table = document.createElement('tbody');
	 	var row_count = 0;

	 	for(i = 0; i < tasks.length; i++){
	 		if(status == 'all'){
		 		rows[i] = table.insertRow(i);
		 		rows[i].setAttribute('id', 'row_'+i)

		 		cells[0] = rows[i].insertCell(0);
		 		cells[0].innerHTML = "<input id='"+tasks[i][0]+"' type='checkbox' class='complete_task'>";

		 		for(j = 0; j < tasks[i].length-1; j++){
		 			cells[j+1] = rows[i].insertCell(j+1);
		 			cells[j+1].innerHTML = tasks[i][j+1];
		 		}
	 		} else if(status == tasks[i][3]){
	 			
	 			rows[row_count] = table.insertRow(row_count);
		 		rows[row_count].setAttribute('id', 'row_'+i)

		 		cells[0] = rows[row_count].insertCell(0);
		 		cells[0].innerHTML = "<input id='"+tasks[i][0]+"' type='checkbox' class='complete_task'>";

		 		for(j = 0; j < tasks[row_count].length-1; j++){
		 			cells[j+1] = rows[row_count].insertCell(j+1);
		 			cells[j+1].innerHTML = tasks[i][j+1];
		 		}
		 		row_count++;
	 		}
	 	}
	 	//replaces old table with new table
	 	old_tbody.parentNode.replaceChild(table, old_tbody);
	 }

	 //EXECUTE FUNCTIONS
	 function displayNewTask(){
	 	//adds the latest task to the table as the last row
	 	var tableRef = document.getElementById('table_tasks').getElementsByTagName('tbody')[0];
	 	var newRow = tableRef.insertRow(tableRef.rows.length);
	 	
	 	var cells = [];
	 	var lastTask = tasks.length-1;
	 	//newCells

 		cells[0] = newRow.insertCell(0);
 		cells[0].innerHTML = "<input id='task_"+tableRef.rows.length+"' type='checkbox' class='complete_task'>";

 		for(j = 0; j < tasks[lastTask].length; j++){
 			cells[j+1] = newRow.insertCell(j+1);
 			cells[j+1].innerHTML = tasks[lastTask][j];
 		}
	 
	 }
	 function currentTime(){
	 	var new_date = new Date();
	 	var year;


	 	//current+= new_date.getHours() + ":" + new_date.getMinutes();
		year = new_date.getFullYear();
		year = year.toString();	
	 	return new_date.getMonth()+1 + "-" + new_date.getDate() + "-" + year.substring(0,2); 

	 }
	 //EVENT LISTENERS
	 document.getElementById('button_add').addEventListener('click',
	 	function(){
	 		//When the "add" button is clicked, the task is added to the tasks array, the input is than cleared, and the displayNewTask function is executed.

	 		var new_task = document.getElementById('input_add').value;
	 		var new_date;

	 		if (new_task != ''){
	 			new_date = currentTime();
	 			console.log(new_date);
	 			tasks.push([new_task, new_date, 'working']);
	 			document.getElementById('input_add').value = '';
	 			displayNewTask();
	 		} else {
	 			console.log('blanked');
	 		}
	 	}
	 );

	 document.getElementById('select_category').addEventListener('click', 
	 	function(evt){
	 	//triggers when user clicks on status categories
	 		var statuses = document.getElementById('select_category').getElementsByTagName('li');
	 		var selected = document.getElementById(evt.target.id);
	 		//removed 'selected' from all
	 		for(i = 0; i < statuses.length; i++){
	 			statuses[i].classList.remove('selected');
	 		}
	 		//add 'selected' class to clicked status
	 		selected.className = 'selected';
	 		
	 		displayTable(evt.target.id);
	 	 }
	 );


	 //add event listeners to all the 'complete_task' buttons
	 function doneListeners(){
		 var done_classes = document.getElementsByClassName('complete_task');

		 var changeStatus = function(evt){
		 	//find the task with the id
		 	console.log('yo');
		 	for(i=0; i < tasks.length; i++){
		 		if(tasks[i][0] == evt.target.id){
		 			//updated the tasks status
		 			tasks[i][3] = 'completed';
		 			console.log('yes');
		 			i = tasks.length;
		 		}
		 	}	
		 	displayTable('all');
		 }

		 for(i = 0; i < done_classes.length; i++){
		 //adds the eventlistener to all instances of the "complete_task" class
		 		console.log('time to add');
		 		done_classes[i].addEventListener('change',changeStatus);
		 }
	}

	 //Initial display of the table of tasks
	 displayTable('all');
	 doneListeners();

	 //event listener for 1st complete_task
	
	 
	</script>
</html>