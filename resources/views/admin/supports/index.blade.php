@extends('admin.templates.app')

@section('title', 'Fórum')

@section('header')
@include('admin.supports.partials.header', compact('supports'))
@endsection

@section('content')

@include('admin.supports.partials.content', compact('supports'))

<x-pagination
    :paginator="$supports"
    :appends="$filters"
/>|
@endsection
