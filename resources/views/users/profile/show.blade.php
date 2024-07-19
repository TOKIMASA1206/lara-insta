@extends('layouts.app')

@section('title', 'Profile')

@section('content')

{{-- HEADER --}}
@include('users.profile.header')


{{-- POST --}}
@include('users.profile.post')


@endsection