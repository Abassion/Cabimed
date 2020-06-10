
@extends('layouts.layout-admin')

@section('main')
  <patients :showRecherche="recherche" :facteur="facteur">
    @csrf
  </patients>    
@stop
