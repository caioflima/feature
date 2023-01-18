<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <h1>Teste de Formulario YouTwo</h1>

        <form action="/" method="GET">
            {{ csrf_field() }}
            Nome: <input type="text" id="name" name="name" placeholder=""> <br>
            Idade: <input type="text" id="age" name="age" value=""> <br>
            Telefone: <input type="tel" id="tell" name="tell" value="XXXX-XXXX"> <br>
            Email: <input type="email" id="email" name="email" value="exemplo@exemplos.com.br"> <br>
            CEP: <input type="number" id="cep" name="cep" value=""> <br>

            @if($corpo)
                Rua: <input type="text" id="rua" name="rua" value="{{ $corpo->logradouro }}"> <br>
                Bairro: <input type="text" id="bairro" name="bairro" value="{{ $corpo->bairro }}"> <br>
            @else
                Rua: <input type="text" id="rua" name="rua" value=""> <br>
                Bairro: <input type="text" id="bairro" name="bairro" value=""> <br>
            @endif

            <input type="submit" id="btn_enviar" value="Enviar">
            <input type="reset" id="btn_limpar" value="Limpar">
        </form>

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
