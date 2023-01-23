<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Chamada do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    </style>
</head>

<body class="antialiased">
    <div class="container-fluid p-5">
        <!-- Titulo do Projeto -->
        <h1 class="mt-4 mb-4">Teste de Formulario 2You</h1>
        <!-- Formulario -->
        <form action="/" method="GET">
            <div class="form-group">
                <!-- Criação de um inputHidden para segurança do formulario -->
                {{ csrf_field() }}
                <!-- Campos do Formulario -->
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-4">
                        <label for="name">Nome:</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="">
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-4">
                        <label for="idade">Idade: </label>
                        <input class="form-control" type="text" id="idade" name="age">
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <label for="email">Email: </label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="exemplo@exemplos.com.br">
                    </div>
                    <div class="col-sm-5 col-md-4 col-lg-4">
                        <label for="tell">Telefone: </label>
                        <input class="form-control" type="tel" id="tell" name="tell" placeholder="XXXX-XXXX">
                    </div>
                    <div class="col-sm-5 col-md-4 col-lg-4">
                        <label for="cep">CEP: </label>
                        <input class="form-control" type="number" id="cep" name="cep">
                    </div>
                    <!-- Caso a variavel corpo for verdade preencher campo -->
                    @if($corpo)
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <label for="ddd">DDD: </label>
                        <input class="form-control" type="number" id="ddd" name="ddd" placeholder="(XX)" value="{{ $corpo->ddd}}">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <label for="uf">UF: </label>
                        <input class="form-control" type="text" id="uf" name="uf" placeholder="XX" value="{{ $corpo->uf}}">
                    </div>
                    <div class="col-sm-5 col-md-4 col-lg-4">
                        <label for="localizacao">Cidade: </label>
                        <input class="form-control" type="text" id="localizacao" name="localizacao" value="{{ $corpo->localidade }}">
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-4">
                        <label for="rua">Rua: </label>
                        <input class="form-control" type="text" id="rua" name="rua" value="{{ $corpo->logradouro }}">
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-4">
                        <label for="bairro">Bairro: </label>
                        <input class="form-control" type="text" id="bairro" name="bairro" value="{{ $corpo->bairro }}">
                    </div>
                    <!-- Caso a requisição seja nula devido ao tempo comprencher com um campo vazio -->
                    @else
                    <div class="col-sm-12 col-md-5 col-lg-4">
                        <label for="rua">Rua: </label>
                        <input class="form-control" type="text" id="rua" name="rua" value="">
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-4">
                        <label for="bairro">Bairro: </label>
                        <input class="form-control" type="text" id="bairro" name="bairro" value="">
                    </div>
                    @endif
                </div>
                <!-- Botao de envio -->
                <div class="justify-content-start">
                    <input type="submit" class="btn btn-primary mt-4" id="btn_enviar" value="Enviar">
                </div>

            </div>


        </form>

        {{ dd($response)}}

        @if($corpo)
        <br> {{ $corpo->logradouro }}
        <br> {{ $corpo->bairro }}
        <br> {{ $corpo->localidade }}
        <br> {{ $corpo->uf }}
        <br> {{ $corpo->ddd }}
        @else
        {{ $mensagemErro }}
        @endif

    </div>

</body>

</html>
