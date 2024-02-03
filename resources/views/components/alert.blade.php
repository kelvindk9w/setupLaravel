<div class="alert alert-danger">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <strong style='color: red'>{{ $error }}</strong>
            <br><br>
        @endforeach
    @endif
</div>
