@extends('layouts.app')

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
            </div>
          </div>
          
        </div>
      </div>
    </div>

  </section>

@endsection