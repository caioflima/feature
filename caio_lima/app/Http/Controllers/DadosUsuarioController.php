<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DadosUsuarioController extends Controller
{
    public function index() {

        // $request = request()->query();

        $arrayCep = array(request()->query('cep'));

        // dd($arrayCep); //debug die

        if ($arrayCep[0]) {
            $cepString = implode(':', $arrayCep);

            $client = new Client();
            // $response = $client->request('GET', 'viacep.com.br/ws/07262218/json/');
            $response = $client->request('GET', 'viacep.com.br/ws/' . $cepString . '//json/');
            // $retorno = $client->send($response);
            $corpo = json_decode($response->getBody());

            // dd('oi');
            return view('welcome', ['corpo' => $corpo]);
        } else {
            $corpo = '';
            
            $mensagemErro = 'O CEP não informado';

            //var_dump($var); die;

            return view('welcome', ['corpo' => $corpo, 'mensagemErro' => $mensagemErro]);
        }
    }
}
