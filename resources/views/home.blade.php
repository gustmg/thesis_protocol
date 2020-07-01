@extends('layouts.app')
@section('content')
    @if(auth()->user()->user_type == 1)
    <home-student-component></home-student-component>
    @elseif(auth()->user()->user_type == 2)
    
    @else
    <home-admin-component></home-admin-component>
    @endif
@endsection
