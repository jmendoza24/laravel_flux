@extends('layouts.app')
@section('titulo')Facturas @endsection
@section('content')
<div class="col-md-12">
     @include('factura.table')
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
    $('#factura-table').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     true
    } );
} );

</script>
@endsection
