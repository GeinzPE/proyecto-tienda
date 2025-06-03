@extends("admin.plantilla")
@section("contenido")
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>{{ isset($producto)?'Editar':'Crear' }}</strong> Producto
        </div>
        <div class="card-body card-block">
            <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                @if(isset($producto))
                <input type="hidden" value="{{ $producto->id }}" name="id">
                @endif
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                    <div class="col-12 col-md-9"><input value="{{ isset($producto)?$producto->nombre:'' }}" type="text" id="text-input" name="nombre" placeholder="Ingrese nombre..." class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Precio</label></div>
                    <div class="col-12 col-md-9"><input value="{{ isset($producto)?$producto->precio:'' }}" type="number" id="email-input" name="precio" placeholder="0.00" class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descripcion</label></div>
                    <div class="col-12 col-md-9"><textarea name="descripcion" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{ isset($producto)?$producto->descripcion:'' }}</textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="foto" class="form-control-file"></div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Grabar
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Limpiar
                </button>
            </form>


        </div>
    </div>

</div>
@endsection