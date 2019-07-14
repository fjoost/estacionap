@extends('layouts.admin')

@section('content')



<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/b-1.5.6/b-flash-1.5.6/datatables.min.js">
</script>





<div class="container">
    <h3>Listado usuarios</h3>
    <button class="add-modal" id="btnAgregar">Agregar</button>
    <table id="tblUsers" class="striped">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="user{{$user->id}}">
                <td>
                    {{$user->rut}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->last_name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->phone}}
                </td>
                <td>
                    <button class="" data-id="{{$user->id}}" data-name="{{$user->name}}" id="edit_user">
                        <span class=""></span> Edit
                    </button>
                    <button class="delete-modal" data-id="{{$user->id}}" data-name="{{$user->name}}" id="btnEliminar">
                        <span class=""></span> Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('pdf.users')}}" class="btn"></i> <span>Pdf</span> </a>
    <a href="{{route('xlsx.users')}}" class="btn"></i> <span>xlsx</span> </a>
</div>

<!--Agregar Modal Structure -->
<div id="modal3" class="modal">
    <div class="modal-content">
        <h4>Agregar usuario</h4>
        <form action="" method="">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="rut" type="text" name="rut" class="validate" value="{{old('rut')}}">
                        <label for="rut">Rut</label>
                        @if($errors->get('rut'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('rut') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nombre" type="text" name="txtNombre" class="validate" value="{{old('txtNombre')}}">
                        <label for="nombre">Nombre</label>
                        @if($errors->get('txtNombre'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtNombre') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <input id="apellido" type="text" name="txtApellido" class="validate"
                            value="{{old('txtApellido')}}">
                        <label for="apellido">Apellido</label>
                        @if($errors->get('txtApellido'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtApellido') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="correo" type="text" name="email" class="validate" value="{{old('email')}}">
                        <label for="correo">Correo</label>
                        @if($errors->get('email'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('email') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="telefono" type="tel" name="txtTelefono" class="validate"
                            value="{{old('txtTelefono')}}">
                        <label for="telefono">Telefono</label>
                        @if($errors->get('txtTelefono'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtTelefono') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <input id="fecha_nac" type="date" name="txtNacimiento" class="validate"
                            value="{{old('txtNacimiento')}}">
                        <label for="fecha_nac">Fecha Nacimiento</label>
                        @if($errors->get('txtNacimiento'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('txtNacimiento') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="contrasena" type="password" name="password" class="validate">
                        <label for="contrasena">Contraseña</label>
                        @if($errors->get('password'))
                        <div class="card-error red lighten-2">
                            @foreach ($errors->get('password') as $error)
                            <div class="card-content white-text">
                                <p class="error-form-registroUsu">{{ $error }}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
        </form>
    </div>
    <div class="modal-footer" id="modal-footerc">
        <button id="btn-save" type="button" class="waves-effect waves-teal btn-flat" value="crear">
            <i class="fa fa-plus"></i><span>Guardar</span>
        </button>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" id="btnCancelar3">Cancelar</a>
    </div>
</div>
<!-- Agregar Modal Structure -->


<!--Eliminar Modal Structure -->
{{-- <div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Eliminar</h4>
        <p>¿Está seguro que desea eliminar a
            <input type="text" name="" id="dname" class="dname" disabled>
        </p>
    </div>
    <div class="modal-footer" id="modal-footerd">
        <button id="eliminarArticulo" onclick="eliminarArticulo({{$user->id}})" class="btn btn-outline btn-danger"><i
    class="fa fa-trash"></i></button>
<a href="#!" class="modal-close waves-effect waves-green btn-flat" id="btnCancelar">Cancelar</a>
</div>
</div> --}}
<!-- Eliminar Modal Structure -->

<script type="text/javascript">
    function eliminarArticulo(id) {
        $.ajax({
            url: '/eliminaUsuarios',
            type: 'POST',
            data:
            {
                id:id,
                _token: '{!! csrf_token() !!}',
            },
            success: function(result) {
                window.alert("Usuario eliminado exitosamente");
                $('#modal1').hide(); //oculta modal id modal1
                $(".user" + id).remove(); //elimina html(fila tr) por clase user+id
            }
        });
    }
    $(document).ready(function() {


        window.addEventListener("keyup",function(e){
            if(e.keyCode==27) {
            document.getElementById("modal3").style.display="none";
        }
    });

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $('#tblUsers').DataTable({}); //inicializa datatable
        $(document).on('click', '.delete-modal', function() {

            // document.getElementById("dname").value = ($(this).data('name')); //setea el id como texto al span class .did
            // document.getElementById("did").value = ($(this).data('id')); //setea el id como texto al span class .did
            // $('#modal1').show(); //muestra modal1 ELIMINAR
            var nombre = ($(this).data('name'));
            var resp = confirm("Desea eliminar a "+nombre);
            if (resp == true) {
                eliminarArticulo({{$user->id}});
            } else{

            }
        });
        $('#edit_user').click(function(){

            $('#modal3').show(); //muestra modal3 EDITAR es el mismo modal
            $('#rut').val(data.id);
            $('#nombre').val(data.name);
            $('#apellido').val(data.email);
        });

        $('#btnAgregar').click(function(){
            $('#modal3').show(); //muestra modal3 AGREGAR
        });

    $('#btnCancelar3').click(function(){
        $('#modal3').hide(); //oculta modal3 AGREGAR
    });
});
</script>
@endsection