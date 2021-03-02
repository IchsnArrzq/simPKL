@if($message = Session::get('access'))
<script>
    swal ( "Middleware" ,  '{{ $message }}' ,  "error" )
</script>
@endif
