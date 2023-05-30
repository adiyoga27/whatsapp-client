@extends('wordpress.layout.master')
@section('content')
    @include('wordpress.component.' . $profile->template . '.header')
    @include('wordpress.component.' . $profile->template . '.testimonial')
    @include('wordpress.component.modal')
    @include('wordpress.component.' . $profile->template . '.footer')
@stop
@section('script')
    @include('wordpress.component.' . $profile->template . '.script')
@stop
