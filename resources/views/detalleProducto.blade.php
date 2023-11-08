@extends('plantilla')

@section('title', 'Productos - Floreria El Abuelo')

@section('content')

    <div class="row ">
        <form action="{{ route('busqueda.avanzada') }}" method="get" class="col l6 m6 s12">
            <div class="row">
                <div class="input-field col l4 m5 s5 ">
                    <select name="marca"> 
                        <option value="DELL">DELL</option>
                        <option value="HP">HP</option>
                        <option value="LENOVO">LENOVO</option>
                        <option value="ASUS">ASUS</option>
                        <option value="MOTOROLA">MOTOROLA</option>
                        <option value="SAMSUMG">SAMSUMG</option>
                        <option value="HUAWEI" selected>HUAWEI</option>
                    </select>
                    <label>Marca</label>
                </div>
                <div class="input-field col l4 m5 s6 ">
                    <select name="categoria"> 
                        <option value="computadoras">LAPTOPS</option>
                        <option value="tablets">TABLETS</option>
                        <option value="smarthphones" selected>TELEFONO</option>
                    </select>
                    <label>Categoria</label>
                </div>
                <div class="col s1">
                    <button style="background-color: #fff; border:#fff; cursor:pointer;" type="submit" value=""><i class="material-icons medium">search</i></button>
                </div>
            </div>
        </form>

        <div class="col m0 l1 s0 "></div>
        
        <form action="{{ route('busqueda.simple') }}" method="get" class="col l5 m6 s12">
            <div class="row ">
                <div class="input-field col s11">
                    <input id="nombre" name="nombre" type="text" class="validate" required>
                    <label for="nombre">Buscar Producto:</label>
                </div>
                <div class="col s1">
                    <button style="background-color: #fff; border:#fff; cursor:pointer;" type="submit" value=""><i class="material-icons medium">search</i></button>
                </div>
            </div>
        </form>
    </div>
        
    <div id="productos" class="row">
        <div class="col s12">
            <div class="row z-depth-2 section contProductos">
                <div class="col s12 m4 l3">
                    <img class="responsive-img" src="{{ asset($producto->imagen) }}">
                </div>
                <div class="col s12 m8 l9">
                    <h4 class="black-text">{{$producto->nombre}}</h4>
                    <p>{{$producto->descripcion}}</p>
                    <h5>$ {{$producto->precio}}</h5>
                    <h6>Color: {{$producto->color}}</h6>
                    <h6>Stok: {{$producto->stok}} disponibles</h6>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="row">
        <center><h4>Reseñas de este producto</h4></center>
        <div class="col s12">
            @if (count($comentarios) == 0)
                <h5>No se encontraron reseñas</h5>
            @else
                @foreach ($comentarios as $comentario)
                    <div class="row z-depth-2 section">
                        <div class="col s12 m4 l3">
                            <img class="responsive-img" src="{{ asset('img/hombre.png') }}">
                        </div>
                        <div class="col s12 m8 l9">
                            <h4 class="black-text">{{$comentario->titulo}}</h4>
                            <p>{{$comentario->comentario}}</p>
                            <h6>Cliente: {{$comentario->name}}</h6>
                            <h6>Calificacion: {{$comentario->estrellas}} estrellas</h6>
                            <h6>{{$comentario->created_at}}</h6>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
@endsection