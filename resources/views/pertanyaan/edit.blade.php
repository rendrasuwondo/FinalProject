@extends('layouts.app')

@section('content')
    
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('pertanyaan.index') }}" class="btn btn-primary">Kembali</a>
      <div>&nbsp;</div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            {{ $pertanyaan->judul }}
          </h3>
        </div>
        <div class="card-body">
          <form action="{{ route('pertanyaan.update',$pertanyaan->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
              <strong>Judul :</strong>
              <input type="text" value="{{ $pertanyaan->judul }}" name="judul" class="form-control" placeholder="Judul">
            </div>

            <div class="form-group">
              <strong class="align-self-center">Isi :</strong>
              <textarea name="isi" class="form-control my-editor">
                {!! old('isi', $pertanyaan->isi ?? '') !!}
              </textarea>
            </div>
            <div class="form-group">
              <strong>Jawaban Terbaik :</strong>
              <select name="jawaban_id" class="form-control">
                <option value="{{ '' }}">Null</option>
                <option value="{{ 'jawaban_id' }}">Lorem</option>
                <option value="{{ 'jawaban_id' }}">Ipsum</option>
                <option value="{{ 'jawaban_id' }}">Dolor</option>
              </select>
            </div>
            <input type="submit" value="submit" class="btn btn-success">
          </form>
        </div> 
      </div>
    </div>
  </div>
</div>

@endsection
@push('script')
  
  <script>
      var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    
          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
    
          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };
    
      tinymce.init(editor_config);
    </script>    
  @endpush