@extends('plantilla')

@section('title', 'Floreria El Abuelo')

@section('content')
    <div class="container">
        <a href="{{route('productos.show')}}"><h3>Ver los productos</h3></a> <br>
        <img class="responsive-img" style="max-height: 400px;" src="{{ asset('img/productos/13556_Ramo_de_Amor_con_12_Rosas_Rojas.jpg') }}">
        <img class="responsive-img" style="max-height: 400px;" src="{{ asset('img/productos/multicolor.jpg') }}">
    </div>

@endsection

@section('scripts')
    @if (session('info'))
        <script>
            M.toast({
                html: '{{ session("info")}} ',
                classes: 'black',
                displayLength: 3000,
            })
        </script>
    @endif
@endsection