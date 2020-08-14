@extends('layouts.app')

@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush


@section('content')
    
  <section>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('pertanyaan.destroy',$pertanyaan->id) }}" method="post">
            <a href="{{ route('pertanyaan.index') }}" class="btn btn-info">Kembali</a>
            <a href="{{ route('pertanyaan.edit', $pertanyaan->id) }}" class="btn btn-primary">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
          <div>&nbsp;</div>
        </div>
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> {{ $pertanyaan->judul }} </h3>
            </div>
            <div class="card-body">
              <div class="text-right">
                Dibuat Oleh : <a href="">{{ $pertanyaan->user_id }}</a>
                <br>
                Dibuat Pada : <a href="">{{ $pertanyaan->created_at }}</a>
              </div>
              <div class="">
                <p>
                  {{ $pertanyaan->isi }}
                </p>
              </div>
     `        <hr>
     <form action="{{ route('jawaban.store') }}" method="POST">
      @csrf
     <div class="form-group">
     <input type="hidden" name="pertanyaan_id" id="pertanyaan_id" value="{{$pertanyaan->id}}">
      <label for="isi"><h3>Jawaban Anda</h3></label>
      <textarea name="isi" class="form-control my-editor">{!! old('isi', $content ?? '') !!}</textarea>
      
      <input type="submit" value="Post" class="btn btn-success mt-2">
     </form>
     
    </div>

             

            </div>
          </div>
          
           

        </div>
      </div>
    </div>

    
  </section>

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