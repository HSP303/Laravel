<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>
    <h1>Calculadora de IMC</h1>

    <form method="POST" action="{{ route('calcular.imc') }}">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required>
        <br>

        <label for="peso">Peso (kg):</label>
        <input type="number" step="0.1" name="peso" required>
        <br>

        <label for="altura">Altura (m):</label>
        <input type="number" step="0.01" name="altura" required>
        <br>

        <button type="submit">Calcular IMC</button>
    </form>

    @if(isset($imc))
        <h2>Resultado</h2>
        <p>{{ $nome }}, você tem {{ $idade }} anos, sua altura é {{ $altura }}m, seu peso é {{ $peso }}kg e seu IMC é: {{ $imc }}.</p>
        <p>Pelo cálculo do IMC você está classificado como “{{ $classificacao }}”.</p>
    @endif
</body>
</html>