@extends('layouts.app')
@section('content')
    @if(auth()->user()->user_type == 1)
    <home-student-component :student-id="{{Auth::id()}}"></home-student-component>
    @elseif(auth()->user()->user_type == 2)
    <home-evaluator-component :evaluator-id="{{Auth::id()}}"></home-evaluator-component>
    @else
    <home-admin-component></home-admin-component>
    @endif
@endsection
