<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise do Sono</title>
</head>
<body>
    <h1>Análise do Sono</h1>

    <form method="POST" action="{{ route('calcular.sono') }}">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required>
        <br>

        <label for="horas_msono">Horas de Sono:</label>
        <input type="number" name="horas_msono" required>
        <br>

        <button type="submit">Avaliar Sono</button>
    </form>

    @if(isset($faixa_hsono))
        <h2>Resultado</h2>
        <p>{{ $nome }}, você tem {{ $idade }} anos e dorme uma média de {{ $horas_msono}} horas por dia.</p>
        <p>Pela sua idade, você deveria dormir uma média de {{ $faixa_hsono }}.</p>
    @endif
</body>
</html>