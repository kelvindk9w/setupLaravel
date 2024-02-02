<h1>Detalhes da dúvida {{ $infoSupport->id }}</h1>

<ul>
    <li>Assunto: {{ $infoSupport->subject }}</li>
    <li>Status: {{ $infoSupport->status }}</li>
    <li>Descrição: {{$infoSupport->body}}</li>
</ul>

<form action="{{ route('supports.destroy', $infoSupport->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
