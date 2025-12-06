<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Лабораторная работа №4 - Вариант 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Вычисление площади треугольника</h1>
        <p class="lead">Вариант 3: Вычислить площадь треугольника со сторонами А, В, С с проверкой условия существования</p>
        
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="sideA" class="form-label">Сторона A:</label>
                        <input type="number" class="form-control" id="sideA" name="sideA" step="0.01" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="sideB" class="form-label">Сторона B:</label>
                        <input type="number" class="form-control" id="sideB" name="sideB" step="0.01" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="sideC" class="form-label">Сторона C:</label>
                        <input type="number" class="form-control" id="sideC" name="sideC" step="0.01" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Вычислить площадь</button>
                </form>
            </div>
        </div>
        
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = floatval($_POST['sideA']);
    $b = floatval($_POST['sideB']);
    $c = floatval($_POST['sideC']);
    
    echo '<div class="card">';
    echo '<div class="card-header bg-info text-white">';
    echo '<h4>Результат вычисления</h4>';
    echo '</div>';
    echo '<div class="card-body">';
    
    if ($a <= 0 || $b <= 0 || $c <= 0) {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<strong>Ошибка!</strong> Все стороны треугольника должны быть положительными числами.';
        echo '</div>';
    } else if (($a + $b <= $c) || ($a + $c <= $b) || ($b + $c <= $a)) {
        echo '<div class="alert alert-warning" role="alert">';
        echo '<strong>Внимание!</strong> Треугольник с заданными сторонами <strong>не существует</strong>.<br>';
        echo 'Условие существования треугольника: сумма любых двух сторон должна быть больше третьей стороны.<br><br>';
        echo 'Проверка условий:<ul>';
        echo '<li>A + B = ' . ($a + $b) . (($a + $b > $c) ? ' > ' : ' ≤ ') . 'C = ' . $c . '</li>';
        echo '<li>A + C = ' . ($a + $c) . (($a + $c > $b) ? ' > ' : ' ≤ ') . 'B = ' . $b . '</li>';
        echo '<li>B + C = ' . ($b + $c) . (($b + $c > $a) ? ' > ' : ' ≤ ') . 'A = ' . $a . '</li>';
        echo '</ul></div>';
    } else {
        $p = ($a + $b + $c) / 2;
        $area = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
        
        echo '<div class="alert alert-success" role="alert">';
        echo '<strong>Успех!</strong> Треугольник существует.';
        echo '</div>';
        
        echo '<table class="table table-bordered">';
        echo '<tr><th>Сторона A</th><td>' . $a . '</td></tr>';
        echo '<tr><th>Сторона B</th><td>' . $b . '</td></tr>';
        echo '<tr><th>Сторона C</th><td>' . $c . '</td></tr>';
        echo '<tr><th>Полупериметр (p)</th><td>' . round($p, 2) . '</td></tr>';
        echo '<tr class="table-success"><th><strong>Площадь треугольника</strong></th><td><strong>' . round($area, 2) . '</strong> кв. ед.</td></tr>';
        echo '</table>';
    }
    
    echo '</div></div>';
}
?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
