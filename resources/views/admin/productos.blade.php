@extends("admin.plantilla")
@section("contenido")
<div class="animated fadeIn">
    <div class="row">
        @if(Request::has('lista'))
        <a class="btn btn-primary ml-3 mb-2" href="{{ route('productos.index') }}">volver <i class="fa fa-arrow-left"></i></a>
        @else
        <a class="btn btn-success ml-3 mb-2" href="{{ route('productos.create') }}">Agregar <i class="fa fa-plus"></i></a>
        @endif
        <a class="btn btn-secondary ml-3 mb-2" href="{{ route('productos.index').'?lista=archivados' }}">Archivados <i class="fa fa-trash"></i></a>

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">

                    <strong class="card-title">Productos</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Fecha</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{ $p->descripcion }}</td>
                                <td>{{ $p->precio }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>
                                    <form action="{{route('productos.destroy',[$p->id])}}" id="form_eliminar_{{$p->id}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        @if(Request::has('lista'))
                                        <input type="hidden" name="eliminar" value="eliminar">
                                        @endif
                                    </form>
                                    @if(Request::has('lista'))
                                    <a class="btn btn-success" href="{{ route('productos.edit',[$p->id]).'?accion=restaurar'}}"><i class="fa fa-arrow-up"></i></a>
                                    @else
                                    <a class="btn btn-success" href="{{ route('productos.edit',[$p->id]) }}"><i class="fa fa-pencil"></i></a>
                                    @endif
                                    <a class="btn btn-danger" href="javascript:eliminar({{ $p->id }})"><i class="fa fa-{{Request::has('lista')?'times':'trash'}}"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
@endsection
@section("scripts")
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/init/datatables-init.js"></script>


<script type="text/javascript">
    function eliminar(id) {
        var rpta = confirm("realmente desea eliminar?")
        if (rpta) {
            $('#form_eliminar_' + id).trigger('submit')
        }
    }
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>

@endsection
@section("estilos")
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection