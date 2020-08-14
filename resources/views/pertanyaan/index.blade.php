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

              
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Vote</th>
                  <th scope="col">Jawaban</th>
                  <th scope="col">Pertanyaan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <th scope="row">2</th>
                  <td>
                    <h3>
                      <a href="/questions/63397623/how-to-make-the-control-on-same-page-till-text-boxes-got-correct-no-of-characte" class="question-hyperlink">
                        How to make the control on same page till text boxes got correct no. of characters?
                      </a>
                    </h3>
                    <div class="d-flex">
                      <div>
                        <a href="/questions/tagged/javascript" class="post-tag" title="show questions tagged &#39;javascript&#39;" rel="tag">
                          javascript
                        </a> 
                        <a href="/questions/tagged/php" class="post-tag" title="show questions tagged &#39;php&#39;" rel="tag">
                          php
                        </a>
                        <a href="/questions/tagged/laravel" class="post-tag" title="show questions tagged &#39;laravel&#39;" rel="tag">
                          laravel
                        </a> 
                      </div>
                      <div class="ml-auto">
                          <a href="/questions/63397623/how-to-make-the-control-on-same-page-till-text-boxes-got-correct-no-of-characte" class="started-link">
                            asked <span title="2020-08-13 14:47:05Z" class="relativetime">52 secs ago</span>
                          </a>
                          <a href="/users/14020788/sasikala">
                            Sasikala
                          </a> 
                          <span class="reputation-score" title="reputation score " dir="ltr">1</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <th scope="row">2</th>
                  <td>
                    <h3>
                      <a href="/questions/63397623/how-to-make-the-control-on-same-page-till-text-boxes-got-correct-no-of-characte" class="question-hyperlink">
                        How to make the control on same page till text boxes got correct no. of characters?
                      </a>
                    </h3>
                    <div class="d-flex">
                      <div>
                        <a href="/questions/tagged/javascript" class="post-tag" title="show questions tagged &#39;javascript&#39;" rel="tag">
                          javascript
                        </a>
                        <a href="/questions/tagged/php" class="post-tag" title="show questions tagged &#39;php&#39;" rel="tag">
                          php
                        </a>
                        <a href="/questions/tagged/laravel" class="post-tag" title="show questions tagged &#39;laravel&#39;" rel="tag">
                          laravel
                        </a> 
                      </div>
                      <div class="ml-auto">
                        <a href="/questions/63397623/how-to-make-the-control-on-same-page-till-text-boxes-got-correct-no-of-characte" class="started-link">
                          asked <span title="2020-08-13 14:47:05Z" class="relativetime">52 secs ago</span>
                        </a>
                        <a href="/users/14020788/sasikala">
                          Sasikala
                        </a>
                        <span class="reputation-score" title="reputation score " dir="ltr">1</span>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection