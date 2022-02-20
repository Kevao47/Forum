@extends('templates.base')

@section('content')

<div class="row tm-content-row tm-mt-big">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">
            <h1>Criar Discussão</h1>
            <form method='POST'>
                @csrf
                <div class="form-group">
                    <x-DefaultInput label='Titulo' name='titulo'/>
                </div>
                <div class="form-group">
                  <label for="jogo">Jogo</label>
                  <select class="form-control" id="jogo" name='jogo_id'>
                    @foreach ($jogos as $jogo)
                        <option value='{{$jogo->id}}'>{{$jogo->name}}</option>
                    @endforeach    
            
                  </select>
                </div>

                <div class="form-group">
                  <label for="categorias">Categorias</label>
                  <select multiple class="form-control" id="categorias" name='categorias[]'>
                    @foreach ($categorias as $categoria)
                        <option value='{{$categoria->id}}'>{{$categoria->name}}</option>
                    @endforeach   
                  </select>
                </div>

                <div class="form-group">
                  <label for="texto">Texto</label>
                  <textarea class="form-control" id="texto" name='texto' rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
              </form>
              
        </div>
    </div>
  
</div>
@endsection