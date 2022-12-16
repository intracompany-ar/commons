<advices-frontend ref="advices"></advices-frontend>

@push('scriptsEnd')
    <script>
        $(function() { 
            @if (session('success'))
                app.success( "{{ session('success') }}" );
            @endif

            @if (session('status'))
                app.success( "{{ session('status') }}" );
            @endif

            @if (session('fail'))
                app.danger( "{{ session('fail') }}" );
            @endif

            @if (session('error'))
                app.danger( "{{ session('error') }}" );
            @endif

            @if(Session::has('info'))
                app.info( "{{ session('info') }}" );
            @endif

            @if (isset($errors))
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        app.warning( "{{ $error }}" );
                    @endforeach
                @endif
            @endif
        });
    </script>
@endpush