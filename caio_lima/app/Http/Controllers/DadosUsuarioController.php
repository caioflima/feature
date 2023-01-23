<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

// Criação da DadosUsuarioController que é uma extenção do Controller
class DadosUsuarioController extends Controller
{
    // Realizando uma requisição
    public function index(Request $request)
    {
        // dd($request->query());

        // Armazenamento de um novo Cadastro na Variavel &dadosCadastro
        $dadosCadastro = new Cadastro;

        // $request = request()->query();
        $arrayCep = array(request()->query('cep'));

        // dd($arrayCep); //debug die

        if ($arrayCep[0]) {
            $cepString = implode(':', $arrayCep);

            $requestViaCep = Http::get('viacep.com.br/ws/' . $cepString . '//json/');

            if(!$requestViaCep) {
                dd('xau');
            }

            $corpo = $requestViaCep->object();

            // dd($corpo);

            // $client = new Client();
            // $response = $client->request('GET', 'viacep.com.br/ws/07262218/json/');
            // $response = $client->request('GET', 'viacep.com.br/ws/' . $cepString . '//json/');
            // $retorno = $client->send($response);
            // $corpo = json_decode($response->getBody());

            $dadosCadastro->nome = $request->name;
            $dadosCadastro->idade = $request->age;
            $dadosCadastro->email = $request->email;
            $dadosCadastro->tell = $request->tell;
            $dadosCadastro->cep = $request->cep;

            $dadosCadastro->ddd = $request->ddd ? $request->ddd : '';
            $dadosCadastro->localizacao = $request->localizacao ? $request->localizacao : '';
            $dadosCadastro->uf = $request->uf ? $request->uf : '';
            $dadosCadastro->rua = $request->rua ? $request->rua : '';
            $dadosCadastro->bairro = $request->bairro ? $request->bairro : '';

            $corpo->nome = $request->name ?  $request->name : '';
            $corpo->idade = $request->age ?  $request->age : '';
            $corpo->email = $request->email ?  $request->email : '';
            $corpo->tell = $request->tell ?  $request->tell : '';
            $corpo->cep = $request->cep ? $request->cep : '';

            // return view('welcome', ['corpo' => $corpo]);

            // return

            $response = response([
                'status' => true,
                'data' => $corpo
            ]);

            // return view('welcome', ['response' => $response, 'corpo' => $corpo]);

            $dadosCadastro->save();

            return view('welcome', ['corpo' => $corpo]);
        } else {
            $corpo = '';

            $mensagemErro = 'O CEP não informado';

            //var_dump($var); die;

            return view(
                'welcome',
                [
                    'corpo' => $corpo,
                    'mensagemErro' => $mensagemErro
                ]
            );
        }
    }

    // public function store() {
    //     $dadosCadastro = new Cadastro;

    //     $dadosCadastro->nome = $request->nome;

    //     $dadosCadastro->save();
    // }
}
