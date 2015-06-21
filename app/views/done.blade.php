@extends('layouts.master')

@section('content')
    <div>
        <h1> {{$message}} </h1>
    </div>
    @if ($url)
        <div>
            <h3><a href="{{$url}}">Try again</a></h3>
        </div>
    @endif
@stop