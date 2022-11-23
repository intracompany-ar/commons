<div class="row">
    <div class="col-12">
        <table id="{{ $id }}" class="table table-sm table-hover table-bordered compact {{ $tableStriped }} {{ $datatable ? 'datatableauto' : '' }}"  width="100%" cellspacing="0" border="1">
            <thead>
                <tr class="thead-inverse">
                    @foreach ($heads as $item)
                        <th scope="col">{{ $item }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>
