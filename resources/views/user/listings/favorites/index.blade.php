@extends('layouts.app')

@section('content')
    @if ($listings->count())
      @foreach ($listings as $listing)
        @include('listings.partials._listing_favorite', compact('listing'))
      @endforeach

      {{ $listings->links() }}

    @else
      <p>No favorite listings.</p>
    @endif
@endsection
