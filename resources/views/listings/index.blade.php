@extends('layouts.app')

@section('content')
  <div class="container">
    <h4>{{ $category->parent->name }} &nbsp; > &nbsp; {{ $category->name }}</h4>

    @if ($listings->count())
        @foreach ($listings as $listing)
          @include('listings.partials._listing', compact('listing'))
        @endforeach

        {{-- Pagination --}}
    @else
      <p>No listings found.</p>
    @endif
  </div>
@endsection
