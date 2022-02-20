<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Discussao;
use App\Models\DiscussaoCategoria;
use App\Models\Jogo;
use Illuminate\Http\Request;

class DiscussaoController extends Controller
{
    public function home()
    {
        $jogos = Jogo::withCount('discussoes')->orderBy('discussoes_count', 'desc')->paginate(5);
        return view('home')->with([
            'title' => 'Jogos',
            'headers' => ['Jogo', 'Discussoes'],
            'jogos' => $jogos
        ]);
    }
    public function show($id)
    {
        $discussao = Discussao::with('categorias', 'comentarios')->findOrFail($id);
        return view('discussao', ['discussao' => $discussao]);
    }
    public function discussao(Request $request)
    {
        $discussoes = Discussao::query();

        if ($request->jogo) {
            $discussoes->where('jogo_id', $request->jogo);
        }

        $discussoes = $discussoes->withCount('comentarios')->orderBy('comentarios_count', 'desc')->paginate(5);
        return view('home')->with([
            'title' => 'Discussões',
            'headers' => ['Discussão', 'Comentarios'],
            'jogos' => $discussoes
        ]);
    }

    public function comentar(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required'
        ]);
        $discussao = Discussao::findOrFail($id);
        $discussao->comentar($request->comentario);
        return back();
    }

    public function create()
    {
        $categorias = Categoria::all();
        $jogos = Jogo::all();
        return view('publicar')->with(['jogos' => $jogos, 'categorias' => $categorias]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'jogo_id' => 'required',
            'categorias' => 'required',
            'texto' => 'required',
        ]);
        $discussao = Discussao::create($request->all());
        foreach ($request->categorias as $categoria) {
            DiscussaoCategoria::create([
                'categoria_id' => $categoria,
                'discussao_id' => $discussao->id
            ]);
        }
        return redirect()->route('show-discussao', ['id' => $discussao->id]);
    }
}
