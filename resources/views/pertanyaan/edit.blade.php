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
              <textarea name="isi" type="text" cols="100" rows="5" class="form-control">
                  {{ old('isi', $pertanyaan->isi) }}
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