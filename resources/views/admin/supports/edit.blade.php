<h1>Dúvida {{ $infoSupport->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update', $infoSupport->id )}}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', ['support' => $infoSupport])
</form>
