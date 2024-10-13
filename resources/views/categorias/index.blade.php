<form method="POST" action="{{ route('categorias.destroy', $categorias->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>