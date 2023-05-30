@extends('wordpress.layout.master')
@section('content')
    @include('wordpress.component.' . $profile->template . '.header')
    @include('wordpress.component.invoice')
    @include('wordpress.component.' . $profile->template . '.footer')
@stop
@section('script')
    @include('wordpress.component.' . $profile->template . '.script')
    <script>
        let id = {!! json_encode($id) !!}
    </script>
    <script src="{{ asset('/wordpress/js/invoce.js') }}"></script>
@stop
