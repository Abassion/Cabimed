@extends('layouts.layout-admin')
@section('main')
    <rapport :patients="{{ $patients }}" :user="{{ Auth::user() }}" :cabinet="{{ $cabinet }}"></rapport>
@endsection
