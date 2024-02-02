<h1>Nova Dúvida</h1>

@if($errors->any())
    @foreach($errors->all() as $error)
        <strong style='color: red'>{{ $error }}</strong>
        <br><br>
    @endforeach
@endif

<form action="{{ route('supports.store' )}}" method="POST">
    @csrf
    <input type="text" placeholder="Assunto" name="subject" value="{{old('subject')}}">
    <br><br>
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    <br><br>
    <button type="submit">Enviar</button>
</form>
