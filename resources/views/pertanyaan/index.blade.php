@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <nav class="navbar navbar-light bg-light" >
          <a class="navbar-brand" href="#">
            {{Auth::user()->email }}
            Reputasi : {{$reputasi}}
          </a>
        </nav>
        <div class="card">
          <div class="card-header">
            <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
              <a class="btn btn-sm btn-primary my-2 my-md-0" href="{{ route('pertanyaan.create') }}">
                Buat Pertanyaan
              </a>
              <h1 class="bd-title" id="content">Pertanyaan</h1>
            </div>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
            @endif
              
            <table class="table table-hover">
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pertanyaan as $data)
                  
                <tr>
                  <td> {{ $no++ }} </td>
                  <td> {{ $data->judul }} </td>
                  <td> {!! substr($data->isi, 0,100) !!}...</td>
                  <td> 

                    @if ($data->user_id == Auth::id())
                        
                    <form action="{{ route('pertanyaan.destroy', $data->id) }}" method="POST">
                      <a class="btn btn-info btn-sm" href="{{ route('pertanyaan.show',$data->id) }}">Lihat</a>
                      <a class="btn btn-primary btn-sm" href="{{ route('pertanyaan.edit',$data->id) }}">Perbarui</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>

                    @else

                    <a class="btn btn-info btn-sm" href="{{ route('pertanyaan.show',$data->id) }}">Lihat</a>

                    @endif

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection