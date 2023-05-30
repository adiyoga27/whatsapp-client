@extends('wordpress.layout.master')
@section('content')
    @include('wordpress.component.' . $profile->template . '.header')
    @include('wordpress.component.detail-articel')
    @include('wordpress.component.' . $profile->template . '.footer')
@stop
@section('script')
    @include('wordpress.component.' . $profile->template . '.script')


@stop
