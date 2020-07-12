@extends('layouts.app')
@section('content')
   <thesis-protocol-evaluation-component :thesis-protocol="{{$thesis_protocol}}"></thesis-protocol-evaluation-component>
@endsection