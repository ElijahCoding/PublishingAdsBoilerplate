@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <nav class="nav-stacked">
              <li><a href="">Email to a friend</a></li>
              <li><a href="">Add to favorite</a></li>
            </nav>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="panel panel-default">
          <div class="panel-heading">
            {{ $listing->title }} in {{ $listing->area->name }}
          </div>

          <div class="panel-body">
            {!! nl2br(e($listing->body)) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
