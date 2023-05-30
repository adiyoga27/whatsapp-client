@extends('wordpress.layout.master')
@section('content')
    @include('wordpress.component.' . $profile->template . '.header')
    @include('wordpress.component.cart')
    @include('wordpress.component.' . $profile->template . '.footer')
@stop
@section('script')
    @include('wordpress.component.' . $profile->template . '.script')
    <script>
        let profile = {!! json_encode($profile->toArray()) !!}
    </script>
    <script src="{{ asset('/wordpress/js/cart.js') }}"></script>
@stop
