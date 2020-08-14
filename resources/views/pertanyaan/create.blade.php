@extends('layouts.app')

@section('content')

  <section>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('pertanyaan.index') }}" class="btn btn-primary">Kembali</a>
          <div>&nbsp;</div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Ajukan Pertanyaan Mu
              </h3>
            </div>
            <div class="card-body">
              <form action="{{ route('pertanyaan.store') }}" method="POST">

                @csrf
    
                <div class="form-group">
                    <strong>Judul Pertanyaan :</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Judul">
                </div>

                <div class="form-group">
                    <strong class="align-self-center">Isi :</strong>
                    <textarea name="isi" cols="100" rows="5" class="form-control"></textarea>
                </div>

                <input type="submit" value="submit" class="btn btn-success">
              </form>
            </div> 
          </div>
        </div>
      </div>
    </div>

  </section>
    
@endsection