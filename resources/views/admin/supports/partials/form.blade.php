@csrf
<input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}">
<br><br>
<textarea name="body" cols="30" rows="5" placeholder="Descrição">{{  $support->body ?? old('body') }}</textarea>
<br><br>
<button type="submit">Enviar</button>
