@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
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
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Pertanyaan</th>
                  <th></th>
                </tr>
              </thead>
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
                    <form action="{{ route('pertanyaan.destroy', $data->id) }}" method="POST">
                      <a class="btn btn-info btn-sm" href="{{ route('pertanyaan.show',$data->id) }}">Lihat</a>
                      <a class="btn btn-primary btn-sm" href="{{ route('pertanyaan.edit',$data->id) }}">Perbarui</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
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