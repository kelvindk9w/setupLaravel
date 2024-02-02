<h1>Dúvida {{ $infoSupport->id }}</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
        <strong style='color: red'>{{ $error }}</strong>
        <br><br>
    @endforeach
@endif

<form action="{{ route('supports.update', $infoSupport->id )}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value="{{$infoSupport->subject}}">
    <br><br>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{$infoSupport->body}}</textarea>
    <br><br>
    <button type="submit">Enviar</button>
</form>
