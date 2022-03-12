@section('title')
Nhà phân phối : "{{$authorInfo->author_name}}"
@stop

@extends('front-end.layouts.master')
@section('content')
    @include('front-end.layouts.section-author')
@stop