@extends('templates.base')

@section('content')
<div class="row tm-content-row tm-mt-big">
    <div class="tm-col tm-col-big">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-12">
                    <h2 class="tm-block-title">Edite sua Conta</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" class="tm-signup-form">
                        @csrf
                        <div class="form-group">
                            <x-DefaultInput label="Nome" name='name' :value="auth()->user()->name"/>
                        </div>
                        <div class="form-group">
                            <x-DefaultInput label="Email" name='email' type='email' :value="auth()->user()->email"/>
                        </div>
                        <div class="form-group">
                            <x-DefaultInput label="Senha" name='password' type='password' />
                        </div>
                        <div class="form-group">
                            <x-DefaultInput label="Confirme sua Senha" name='password_confirmation' type='password'/>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                            <div class="col-12 col-sm-6 tm-btn-right">
                                <a href="{{route('delete-account')}}">
                                    <button type="button" class="btn btn-danger">Deletar conta</button>
                                </a>
                            
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="tm-col tm-col">
        <div class="bg-white tm-block d-flex justify-content-center align-items-center flex-column">
            <h2 class="tm-block-title">Imagem de Perfil</h2>
            <img src="{{ auth()->user()->photo_url }}" alt="Profile Image" class="img-fluid" width='360' height="360">
            <div class="custom-file mt-3 mb-3">
                <form id='form-image' action="{{ route('upload') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <input id="fileInput" type="file" name='photo_url' style="display:none;" />
                    <input type="button" class="btn btn-primary d-block mx-xl-auto" value="Atualizar Imagem" onclick="document.getElementById('fileInput').click();"/>
                </form>
            </div>
        </div>
    </div>
</div>
<script defer>
    const file_input = document.getElementById('fileInput')
    const form = document.getElementById('form-image')
    file_input.addEventListener('change', ()=>{
        form.submit();
    })
</script>
@endsection