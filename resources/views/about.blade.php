@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="text-center">
          <img src="{{ asset('/img/coding.jpg')}}" alt="Solve a code">
        </div>
        
        <hr class="my-4">

        <div class="jumbotron">
          <h2 style="text-align:center;">Tentang Kami</h2>
          <p style="text-align:center;">Saat ini semakin banyak masyarakat Indonesia di usia produktif mulai belajar tentang programming. Media pembelajaran sangat mudah ditemui dengan hanya mengandalkan kata kunci di mesin pencarian.
            Namun untuk para pembelajar pemula terutama bagi mereka yang kesulitan memahami literatur dalam bahasa Inggris kebanyakan menyerah ketika mendapati error ketika mencoba mempelajari materi lewat praktek langsung.
            Saat ini mereka menggunakan media komunikasi seperti grup telegram komunitas untuk bertanya tapi sangat sedikit dari anggota grup yang dapat membantu karena masih terlalu sulit untuk bertanya tentang pemrograman melalui aplikasi chatting. </p>
        </div>

      </div>
    </div>
  </div>
@endsection
