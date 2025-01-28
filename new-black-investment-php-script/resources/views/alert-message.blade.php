<script src="{{ asset(themes('js/toast.js')) }}"></script>
<script>
    @if(session()->has('success'))
    message('{{session()->get('success')}}')
    @endif

    @if(session()->has('error'))
    message('{{session()->get('error')}}')
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            message('{{ $error }}')
        @endforeach
    @endif
</script>