<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imc;

class ImcController extends Controller
{

    public function index()
    {
        return view('Imc');
    }

    public function sono()
    {
        return view('sono');
    }


    public function viajem()
    {
        return view('viajem');
    }

    public function calcularImc(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
        ]);

        $nome = $request->input('nome');
        $dataNascimento = $request->input('data_nascimento');
        $peso = $request->input('peso');
        $altura = $request->input('altura');

        $idade = date_diff(date_create($dataNascimento), date_create('today'))->y;
        $imc = $peso / ($altura * $altura);

        $classificacao = $this->classificarImc($imc);

        return view('Imc', [
            'nome' => $nome,
            'idade' => $idade,
            'altura' => $altura,
            'peso' => $peso,
            'imc' => number_format($imc, 2),
            'classificacao' => $classificacao,
        ]);
    }

    public function calcularSono(Request $request){
        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required|date',
            'horas_msono' => 'required'
        ]);

        $nome = $request->input('nome');
        $dataNascimento = $request->input('data_nascimento');
        $horas_msono = $request->input('horas_msono');

        $idade = date_diff(date_create($dataNascimento), date_create('today'))->y;

        $faixa_hsono = $this->classificarSono($idade);

        return view('sono', [
            'nome' => $nome,
            'idade' => $idade,
            'horas_msono' => $horas_msono,
            'faixa_hsono' => $faixa_hsono,
        ]);    
    }

    public function calcularViajem(Request $request)
    {
        $combustivel = $request->input('combustivel');
        $valorCombustivel = $request->input('valorCombustivel');
        $distancia = $request->input('distancia');
        $consumo = $request->input('consumo');

        $gastoTotal = ($distancia / $consumo) * $valorCombustivel;

        return view('viajem', ['gastoTotal' => $gastoTotal]);
    }

    private function classificarImc($imc)
    {
        if ($imc < 18.5) {
            return 'Abaixo do peso';
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            return 'Peso normal';
        } elseif ($imc >= 25 && $imc <= 29.9) {
            return 'Acima do peso (sobrepeso)';
        } elseif ($imc >= 30 && $imc <= 34.9) {
            return 'Obesidade I';
        } elseif ($imc >= 35 && $imc <= 39.9) {
            return 'Obesidade II';
        } else {
            return 'Obesidade III';
        }
    }

    private function classificarSono($idade)
    {
        if ($idade == 0) {
            return '12 à 17 horas';
        } elseif ($idade == 1 || $idade == 2) {
            return '11 à 14 horas';
        } elseif ($idade >= 3 && $idade <= 5){
            return '10 à 13 horas';
        } elseif ($idade >= 6 && $idade <= 13){
            return '9 à 11 horas';
        } elseif($idade >= 14 && $idade <= 17){
            return '8 à 10 horas';
        } elseif($idade >= 18 && $idade <= 25){
            return '7 à 9 horas';
        } elseif($idade >= 26 && $idade <= 64){
            return '7 à 9 horas';
        } else {
            return '7 à 8 horas';
        }
}
}