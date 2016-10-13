<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">  <!-- you need this -->
</head>
<body>
	<div>
		<h3>Choose your movie</h3>
		<form action="{{ url('movie/insert') }}" method="POST">
			<select name="movieId" id="movieId">
				<option value="NULL">Choose your movie</option>
				<?php foreach ($movies as $movie){ ?>
				<option value="{{ $movie->id }}">{{ $movie->movie_name }}</option>
				<?php } ?>
			</select>

			<select name="showTime" id="showTime">
				<option>Choose your show time</option>
			</select>

			{!! csrf_field() !!}
			<input type="submit" value="Confirm">
		</form>
	</div>
	<script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') //this code is make sure laravel know who you are
		        //without csrf laravel wont accept your ajax call
		        //after setup like this then your ajax call should be no problem dy
		    }
		})


		$('#movieId').change(function(){
			id = $(this).val();
			$.ajax({
				url: "{{ url('movie/detail') }}", //post to MovieController@getMovieDetail (refer route web)
				data: {
					'id': id, //array in javascript
				},
				method: 'post',
				success:function(data){
					var htmlAppend = '<option value="NULL">Choose your show time</option>';
					for (var i = 0, len = data.length; i < len; i++) {
						htmlAppend = htmlAppend+"<option value='"+data[i].id+"'>"+data[i].movie_show_time+'</option>';
					}
					$('#showTime').html(htmlAppend);
				}
			})
		});
	</script>
</body>
</html>