@if($message = Session::get('access'))
<script>
    swal ( "Middleware" ,  '{{ $message }}' ,  "error" )
</script>
@endif
@if($message = Session::get('success'))
<script>
    swal( "System", '{{ $message }}' , 'success' )
</script>
@endif

@if($message = Session::get('error'))
<script>
    swal( "System", '{{ $message }}' , 'error' )
</script>
@endif
