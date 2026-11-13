@extends('layouts.app')

@section('content')
  @include('partials.hero')
  @include('partials.about')
  @include('partials.journey')
  @include('partials.skills')
  @include('partials.projects')
  @include('partials.contact')
  @include('partials.project-modal')
@endsection

@push('scripts')
  <script src="{{ versioned_asset('assets/js/projects.js') }}"></script>
  <script src="{{ versioned_asset('assets/js/main.js') }}"></script>
@endpush
