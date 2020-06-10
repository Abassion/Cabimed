@extends('layouts.layout-admin')
@section('main')
    <ordonnance :patients="{{ $patients }}" :user="{{ Auth::user() }}" :cabinet="{{ $cabinet }}"></ordonnance>
@endsection
