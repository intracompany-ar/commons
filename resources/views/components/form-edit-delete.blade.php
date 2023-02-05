<form action="{{ $urldelete }}" method="post" onsubmit="return confirm('{{ $frase }}');" id="{{ $id }}">
    @method('DELETE')
    @csrf

    @if ($urledit)
        <a href="{{ $urledit }}"><i class="fas fa-edit"></i></a>
    @endif

    @if ($urldelete)
        <a onclick="$(this).closest('form').submit()" style="cursor:pointer;">
            <i class="fas fa-trash-alt"></i>
        </a>
    @endif

</form>
