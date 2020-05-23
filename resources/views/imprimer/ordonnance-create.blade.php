@extends('layouts.home')

@section('main')
    <ordonnance :patients="{{ $patients }}"></ordonnance>
@endsection

<style >
    .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
        justify-content: space-around
    }
    .row .form-group {
        flex-basis: 45%
    }
</style>