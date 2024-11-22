<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de Ordenamiento</title>
</head>
<body>
    <h1>Ejercicios de Ordenamiento</h1>

    <!-- Bubble Sort -->
    <h2>Bubble Sort</h2>
    <form method="post" action="">
        <label for="bubbleInput">Ingresa una lista de números separados por comas:</label><br>
        <input type="text" id="bubbleInput" name="bubbleInput" required><br>
        <input type="submit" name="bubbleSortSubmit" value="Ordenar">
    </form>

    <?php
    if (isset($_POST['bubbleSortSubmit'])) {
        function bubbleSort(array $array) {
            $n = count($array);
            for ($i = 0; $i < $n - 1; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($array[$j] < $array[$j + 1]) {
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
            return $array;
        }

        $input = $_POST['bubbleInput'];
        $array = array_map('trim', explode(',', $input));
        echo "Lista original: " . implode(", ", $array) . "<br>";
        $sortedArray = bubbleSort($array);
        echo "Lista ordenada (Bubble Sort): " . implode(", ", $sortedArray);
    }
    ?>

    <!-- Merge Sort -->
    <h2>Merge Sort</h2>
    <form method="post" action="">
        <label for="mergeInput">Ingresa una lista de palabras separadas por comas:</label><br>
        <input type="text" id="mergeInput" name="mergeInput" required><br>
        <input type="submit" name="mergeSortSubmit" value="Ordenar">
    </form>

    <?php
    if (isset($_POST['mergeSortSubmit'])) {
        function mergeSort(array $array) {
            if (count($array) < 2) {
                return $array; // Caso base
            }

            $mid = floor(count($array) / 2);
            $left = array_slice($array, 0, $mid);
            $right = array_slice($array, $mid);

            return merge(mergeSort($left), mergeSort($right));
        }

        function merge(array $left, array $right) {
            $result = [];
            $i = $j = 0;

            while ($i < count($left) && $j < count($right)) {
                if ($left[$i] < $right[$j]) {
                    $result[] = $left[$i++];
                } else {
                    $result[] = $right[$j++];
                }
            }

            while ($i < count($left)) {
                $result[] = $left[$i++];
            }
            while ($j < count($right)) {
                $result[] = $right[$j++];
            }

            return $result;
        }

        $input = $_POST['mergeInput'];
        $array = array_map('trim', explode(',', $input));
        echo "Lista original: " . implode(", ", $array) . "<br>";
        $sortedArray = mergeSort($array);
        echo "Lista ordenada (Merge Sort): " . implode(", ", $sortedArray);
    }
    ?>

    <!-- Insertion Sort -->
    <h2>Insertion Sort</h2>
    <form method="post" action="">
        <label for="insertionInput">Ingresa una lista de nombres separados por comas:</label><br>
        <input type="text" id="insertionInput" name="insertionInput" required><br>
        <input type="submit" name="insertionSortSubmit" value="Ordenar">
    </form>

    <?php
    if (isset($_POST['insertionSortSubmit'])) {
        function insertionSort(array $array) {
            $n = count($array);
            for ($i = 1; $i < $n; $i++) {
                $key = $array[$i];
                $j = $i - 1;

                // Mover elementos que son mayores que la clave hacia una posición adelante
                while ($j >= 0 && $array[$j] > $key) {
                    $array[$j + 1] = $array[$j];
                    $j--;
                }
                $array[$j + 1] = $key;
            }
            return $array;
        }

        $input = $_POST['insertionInput'];
        $array = array_map('trim', explode(',', $input));
        echo "Lista original: " . implode(", ", $array) . "<br>";
        $sortedArray = insertionSort($array);
        echo "Lista ordenada (Insertion Sort): " . implode(", ", $sortedArray);
    }
    ?>
</body>
</html>