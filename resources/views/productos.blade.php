@extends('plantilla')

@section('title', 'Productos - Floreria El Abuelo')

@section('content')

    <div class="row ">
        
        <form action="{{ route('busqueda.simple') }}" method="get" class="col l3 m4 s12">
            <div class="row ">
                <div class="input-field col s12">
                    <input id="nombre" name="nombre" type="text" class="validate" required>
                    <label for="nombre">Buscar Producto:</label>
                </div>
                <div class="col s12">
                    <button class="btn" type="submit" value="">Buscar</button>
                </div>
            </div>
        </form>

        <div class="col s12 m8 l9">
            <div class="row">
                    @if(count($productos) == 0)
                        <h5>No productos disponibles</h5>
                    @else
                        @foreach ($productos as $producto)
                            <div class="col s12 m6 z-depth-1 section">
                                <div class="row section">
                                    <div class="col s12">
                                    <a href="{{ route('producto.mostrar', $producto->nombre) }}"><h4 class="black-text">{{$producto->nombre}}</h4></a> <br>
                                       <center><img class="responsive-img" style="max-height: 250px;" src="{{ asset($producto->imagen) }}"> </center> 
                                    </div>
                                    <div class="col s12">
                                        <p>{{$producto->descripcion}}</p>
                                        <h5>$ {{$producto->precio}}</h5>
                                        <h6>Color: {{$producto->color}}</h6>
                                        <h6>Stok: {{$producto->stok}} disponibles</h6>
                                    </div>
                                    <div class="col s12">
                                        <button class="btn" onclick="mandarNotificacion('{{$producto->nombre}}')">Comprar</button>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
    


@endsection