@extends('templates.base')

@section('content')
<div class="row tm-content-row tm-mt-big">
    <div class="col-xl-12 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <h2 class="tm-block-title d-inline-block">{{$title}}</h2>

                </div>
                <div class="col-md-4 col-sm-12 text-right">
                    @if ($title != 'Jogos')
                        <a href="{{route('publicar')}}" class="btn btn-small btn-primary">Adicionar {{$title}}</a>
                    @endif
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                        <tr class="tm-bg-gray">
                            @foreach ($headers as $index => $header)
                                <th scope="col" class="@if($index >= 1) text-center @endif">{{$header}}</th>    
                            @endforeach
                        </tr>
     
                    </thead>
                    <tbody>
                        
                        @foreach ($jogos as $jogo)
                            <tr>
                                <td class="tm-product-name"><a href="{{$jogo->url}}">{{$jogo->name ?? $jogo->titulo}}</a></td>
                                <td class="text-center">{{$jogo->contador}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

            <div class="tm-table-mt tm-table-actions-row">
                <div class="tm-table-actions-col-right">
                    <span class="tm-pagination-label">Paginas</span>
                    <nav aria-label="Page navigation" class="d-inline-block">
                        <ul class="pagination tm-pagination">

                            @for ($i = $jogos->currentPage() - 2; $i < $jogos->lastPage(); $i++)
                                @if (($i - 1) < 0)
                                  @continue
                                @endif

                                @if ( $i > $jogos->currentPage() + 1)
                                    @once
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                    @endonce
                                    
                                    @if($i > $jogos->lastPage() - 2)
                                        <li class="page-item">
                                            <a class="page-link" href="{{$jogos->url($i)}}">{{$i}}</a>
                                        </li> 
                                    @endif


                                    @continue
                                @endif
                                <li class="page-item @if($i == $jogos->currentPage()) active @endif">
                                    <a class="page-link" href="{{$jogos->url($i)}}">{{$i}}</a>
                                </li> 

                            @endfor
                          

                          
{{-- 
                            <li class="page-item">
                                <a class="page-link" href="#">{{$jogos->currentPage() + 2}}</a>
                            </li>

                            <li class="page-item">
                                <span class="tm-dots d-block">...</span>
                            </li>

                            <li class="page-item"><a class="page-link" href="{{$jogos->url($jogos->lastPage() - 1)}}">{{$jogos->lastPage() - 1}}</a></li>
                            <li class="page-item"><a class="page-link" href="{{$jogos->url($jogos->lastPage())}}">{{$jogos->lastPage()}}</a></li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
        <div class="bg-white tm-block h-100">
            <h2 class="tm-block-title d-inline-block">Categorias de Jogos</h2>
            <table class="table table-hover table-striped mt-3">
                <tbody>
                    <tr>
                        <td>RPG&MMO</td>
                        <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                    </tr>
                    <tr>
                        <td>FPS</td>
                        <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                    </tr>
                    <tr>
                        <td>MOBA</td>
                        <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                    </tr>
                    <tr>
                        <td>Ação e Aventura</td>
                        <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                    </tr>
                </tbody>
            </table>

            <a href="#" class="btn btn-primary tm-table-mt">Adicionar Nova Categoria</a>
        </div>
    </div> --}}
</div>
@endsection