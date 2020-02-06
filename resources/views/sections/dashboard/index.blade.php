@extends('high-sender::vendor.indigo-layout.main')

@section('meta_title',  __('high-sender::dashboard.startup_baselinker') . ' // ' .config('app.name') )
@section('meta_description', _p('pages.dashboard.meta_description', 'Check your dashboard with all important metrics and values.'))

@push('head')
    @include('high-sender::integration.favicons')
    @include('high-sender::integration.ga')
@endpush

@section('content')


@endsection
