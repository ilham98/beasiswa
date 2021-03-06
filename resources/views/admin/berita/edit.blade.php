@extends('admin.master')

@section('title', 'Berita')

@section('content-title', 'Berita')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<form id="form" action="{{ url('a/berita') }}" method="POST">
	@csrf
	@method('PUT')
	<div class="col-md-6">
		<div class="form-group">
			<label>Nama</label>
			<input type="" class="form-control" name="judul" value="{{ old('judul') ? old('judul') : $berita->judul }}">
			@if($errors->has('judul'))
				<p class="text-danger">{{ $errors->first('judul') }}</p>
			@endif
		</div>
		<div class="form-group">
			<label>Isi</label>
			<input id="isi" name="isi" value="{{ old('isi') ? old('isi') : $berita->isi }}" style="display: none">
			<textarea id="editor"></textarea>
			@if($errors->has('isi'))
				<p class="text-danger">{{ $errors->first('isi') }}</p>
			@endif
		</div>
		<div class="form-group d-flex justify-content-end">
			<input id="save_button" type="button" class="btn btn-success" value="Update">
      <input id="delete_button" type="button" class="ml-2 btn btn-danger" value="Hapus">
		</div>
	</div>
</form>
<form id="delete-form" action="{{ url('/a/berita').'/'.$berita->id }}" method="POST">
    @csrf
    @method('DELETE')
</form>
<script>
    tinymce.init({ 
      selector:'textarea#editor',
      plugins: "lists",
      toolbar: [
        'undo redo | styleselect | bold italic | link image',
        'alignleft aligncenter alignright numlist bullist'
      ],
      init_instance_callback: function (editor) {
        editor.on('Change', function (e) {
          $('#isi').val(tinymce.activeEditor.getContent());
        });
      },
      setup: function (editor) {
          editor.on('init', function (e) {
            if(`{!! old('isi') ? old('isi') : $berita->isi !!}` == '')
              tinymce.activeEditor.setContent("");
            else {
              tinymce.activeEditor.setContent(`{!! old('isi') ? old('isi') : $berita->isi !!}`);
              console.log('mantap');
            }

            $('#isi').val(tinymce.activeEditor.getContent());
          });
        }
    });
  </script>
  <script type="text/javascript">
    $('#save_button').click(function() {
            $('#form').submit();
          });
  </script>
  <script type="text/javascript">
    $('#delete_button').click(function() {
      Swal.fire({
        title: 'Hapus berita?',
        text: "Data yang dihapus tidak dapat dikembalikan.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          $('#delete-form').submit();
        }
      });
    });
  </script>
@endsection