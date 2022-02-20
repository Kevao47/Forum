@extends('templates.base')

@section('content')
<div class="row tm-content-row tm-mt-big">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">
            <div class="row mb-3">
                <div class="col-md-8 col-sm-12">
                    <h2 class="d-inline-block">{{$discussao->titulo}}</h2>
                </div>
            </div>
            <hr>
            <div class="table-responsive mb-5">
                {{$discussao->texto}}
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <h3 class="tm-block-title d-inline-block">Comentarios</h3>
                    @foreach ($discussao->comentarios as $comentario)
                        <div class='comentario'>
                            <div class='comentario-foto'>
                                <img src="{{$comentario->usuario->photo_url}}" alt="">
                            </div>
                            <div class='comentario-texto'>
                                <span class='font-weight-bold'>{{$comentario->usuario->name}}</span>
                                <p>{{$comentario->texto}}</p>
                            </div>
                        </div>
                    @endforeach
                    
                    <hr class='mt-5'>
                    <h3 class="tm-block-title d-inline-block">Comentar</h3>
                    <form method='post' action="{{ route('comentar', ['id' => $discussao->id]) }}">
                        @csrf
                        <div class="form-group">
                            <x-DefaultInput label='Comentario' name='comentario'/>
                        </div>
                        <button type="submit" class="btn btn-primary">Comentar</button>
                      </form>
                </div>
            </div>

        </div>
    </div>
  
</div>
@endsection