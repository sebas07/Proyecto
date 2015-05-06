@extends('ventanas.layout')

@section('title', 'Principal')

@section('content')
    <p>This is my body content.</p>
   <a href="{{ url('/auth/logout') }}">Logout</a><br>
    {!! Auth::user()->username!!}
@stop

