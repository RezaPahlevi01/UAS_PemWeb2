<!DOCTYPE html>
<html>
<head>
    <title>Topsis Result</title>
</head>
<body>
    <h1>Topsis Result</h1>

    <h2>Normalized Matrix</h2>
    <table border="1">
        <tr>
            <th>Kriteria\Restorant</th>
            @foreach ($restorants as $restorant)
                <th>{{ $restorant->name }}</th>
            @endforeach
        </tr>
        @foreach ($normalized as $kriteriaId => $values)
            <tr>
                <td>{{ $kriterias->find($kriteriaId)->name }}</td>
                @foreach ($values as $restorantId => $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>

    <h2>Weighted Matrix</h2>
    <table border="1">
        <tr>
            <th>Kriteria\Restorant</th>
            @foreach ($restorants as $restorant)
                <th>{{ $restorant->name }}</th>
            @endforeach
        </tr>
        @foreach ($weighted as $kriteriaId => $values)
            <tr>
                <td>{{ $kriterias->find($kriteriaId)->name }}</td>
                @foreach ($values as $restorantId => $value)
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>

    <h2>Ideal Positive</h2>
    <ul>
        @foreach ($idealPositive as $kriteriaId => $value)
            <li>{{ $kriterias->find($kriteriaId)->name }}: {{ $value }}</li>
        @endforeach
    </ul>

    <h2>Ideal Negative</h2>
    <ul>
        @foreach ($idealNegative as $kriteriaId => $value)
            <li>{{ $kriterias->find($kriteriaId)->name }}: {{ $value }}</li>
        @endforeach
    </ul>

    <h2>Positive Distances</h2>
    <ul>
        @foreach ($positiveDistances as $restorantId => $value)
            <li>{{ $restorants->find($restorantId)->name }}: {{ $value }}</li>
        @endforeach
    </ul>

    <h2>Negative Distances</h2>
    <ul>
        @foreach ($negativeDistances as $restorantId => $value)
            <li>{{ $restorants->find($restorantId)->name }}: {{ $value }}</li>
        @endforeach
    </ul>

    <h2>Scores</h2>
    <ul>
        @foreach ($scores as $restorantId => $score)
            <li>{{ $restorants->find($restorantId)->name }}: {{ $score }}</li>
        @endforeach
    </ul>
</body>
</html>
