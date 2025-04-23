<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Consumo de Combustível</title>
</head>
<body>
    <h1>Cálculo de Consumo de Combustível</h1>

    <form action="{{ route('calcular.gasto') }}" method="POST">
        @csrf
        <label for="combustivel">Combustível:</label>
        <select name="combustivel" id="combustivel">
            <option value="Gasolina">Gasolina</option>
            <!-- Adicione outros tipos de combustível se necessário -->
        </select><br>

        <label for="valorCombustivel">Valor do Combustível (R$):</label>
        <input type="number" step="0.01" name="valorCombustivel" id="valorCombustivel" required><br>

        <label for="distancia">Distância a ser percorrida (km):</label>
        <input type="number" name="distancia" id="distancia" required><br>

        <label for="consumo">Consumo do veículo (km/l):</label>
        <input type="number" step="0.1" name="consumo" id="consumo" required><br>

        <button type="submit">Calcular</button>
    </form>

    @isset($gastoTotal)
        <h2>Resultado do Cálculo de Consumo</h2>
        <p>O valor total do gasto será de: R$ {{ number_format($gastoTotal, 2, ',', '.') }}</p>
    @endisset
</body>
</html>