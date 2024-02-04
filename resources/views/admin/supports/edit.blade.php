@extends('admin.templates.app')

@section('title', 'Editar Dúvida')

@section('header')
    <div class="flex items-center gap-x-3">
        <h1 class="text-lg text-black-500">Dúvida {{ $infoSupport->subject }}</h1>
    </div>
@endsection

@section('content')

    <form action="{{ route('supports.update', $infoSupport->id )}}" method="POST">
        @method('PUT')
        @include('admin.supports.partials.form', ['support' => $infoSupport])
    </form>

@endsection
