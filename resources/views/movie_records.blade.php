<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">  <!-- you need this -->
	<style type="text/css">
		td{
			min-width:50px;
		}
	</style>
</head>
<body>
	<div>
		<h3>Movie seat records</h3>
		<h4>Remember change your display column name ya</h4>
		<table border=1>
			<tr>
				<th>id</th>
				<th>user_id (should be user name)</th>
				<th>movie_seat</th>
				<th>movie_name</th>
				<th>movie_show_time</th>
			</tr>
			<?php foreach($results as $result) {?>
			<tr>
				<td>{{ $result->id }}</td>
				<td>{{ $result->user_id }}</td>
				<td>{{ $result->movie_seat }}</td>
				<td>{{ $result->movie_name }}</td>
				<td>{{ $result->movie_show_time }}</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>