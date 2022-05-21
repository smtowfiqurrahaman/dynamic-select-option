<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dynamic Selector</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div class="row justify-content-center">
		<div class="col-5 ">
			<br><br><br>
	<center><h1>Dynamic Selector</h1></center>
	<hr>
	<br><br>
	<center>
		<select name="" id="division"  class="form-select">
			<option value="">Select Division</option>
			@foreach ($divisions as $date)
			<option value="{{ $date->id }}">{{ $date->division }}</option>
			@endforeach
		</select>
		<br>
		<select  id="district" class="form-select">
			<option value="">Select District</option>
			{{-- @foreach ($districts as $list) --}}
			{{-- <option value="{{ $list->id }}">{{ $list->district }}</option> --}}
			{{-- @endforeach --}}
		</select>
		
	</center>
	</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function(){
			jQuery('#division').change(function(){
				let did = jQuery(this).val();
             jQuery.ajax({
             	url:'/getDivision',
             	type:'post',
             	data:'did='+did+'&_token={{ csrf_token() }}',
             	success:function(result){
             		jQuery('#district').html(result)
             	}
             });
			});

		})
	</script>
</body>
</html>