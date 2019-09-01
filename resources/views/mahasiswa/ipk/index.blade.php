@extends('mahasiswa.master')

@section('title', 'IPK')

@section('content-title', 'IPK')

@section('content')
	<form action="" method="POST">
		@csrf
		@method('PUT')
		<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>Semester 1</label>
				<input type="" value="{{ isset($ipk[0]) ? $ipk[0]->nilai : ''  }}" class="form-control" name="ipk[1]">
			</div>
			<div class="form-group">
				<label>Semester 2</label>
				<input type="" value="{{ isset($ipk[1]) ? $ipk[1]->nilai : ''  }}" class="form-control" name="ipk[2]">
			</div>
			<div class="form-group">
				<label>Semester 3</label>
				<input type="" value="{{ isset($ipk[2]) ? $ipk[2]->nilai : ''  }}" class="form-control" name="ipk[3]">
			</div>
			<div class="form-group">
				<label>Semester 4</label>
				<input type="" value="{{ isset($ipk[3]) ? $ipk[3]->nilai : ''  }}" class="form-control" name="ipk[4]">
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<label>Semester 5</label>
				<input type="" value="{{ isset($ipk[4]) ? $ipk[4]->nilai : ''  }}" class="form-control" name="ipk[5]">
			</div>
			<div class="form-group">
				<label>Semester 6</label>
				<input type="" value="{{ isset($ipk[5]) ? $ipk[5]->nilai : ''  }}" class="form-control" name="ipk[6]">
			</div>
			<div class="form-group">
				<label>Semester 7</label>
				<input type="" value="{{ isset($ipk[6]) ? $ipk[6]->nilai : ''  }}" class="form-control" name="ipk[7]">
			</div>
			<div class="form-group">
				<label>Semester 8</label>
				<input type="" value="{{ isset($ipk[7]) ? $ipk[7]->nilai : ''  }}" class="form-control" name="ipk[8]">
			</div>
		</div>
		</div>
		<div class="col-sm-6 d-flex justify-content-end">
		<div>
			<input type="submit" value="Update" class="btn btn-primary" name="">
		</div>
	</div>
	</form>
@if(session('error'))
	<script type="text/javascript">
		Swal.fire(
			'Error',
			'{!! session('error') !!}',
			'error'
		)
	</script>
@endif
	
@endsection