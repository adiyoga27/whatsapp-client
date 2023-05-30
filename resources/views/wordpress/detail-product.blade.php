@extends('wordpress.layout.master')
@section('content')
    @include('wordpress.component.' . $profile->template . '.header')
    @include('wordpress.component.detail-product')
    @include('wordpress.component.' . $profile->template . '.footer')
@stop
@section('script')
    @include('wordpress.component.' . $profile->template . '.script')
    <script>
        let profile = {!! json_encode($profile->toArray()) !!};
        let product = {!! json_encode($product->toArray()) !!};
    </script>
    <script src="{{ asset('/wordpress/js/detail-cart.js') }}"></script>
@stop
