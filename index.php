<?php
    include "database.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Задача про козу, лодку, капусту и волка</h1>
        <p>Крестьянину нужно перевезти через реку волка, козу и капусту. Но лодка такова что в нее может поместиться
            только крестьянин, а с ним или один волк, или одна капуста, или одна коза. Но если оставить волка с козой,
            то волк съест козу, а если оставить козу с капустой, то коза съест капусту. Как перевез свой груз
            крестьянин?</p>


        <?php
        $count_result = mysqli_query($connect, "SELECT count_value FROM counts WHERE id = 1");

        if ($count_result) {
            $count_value = mysqli_fetch_assoc($count_result)['count_value'];
        ?>
        <h2>Количество неудачных попыток: <span class="count"><?= $count_value ?></span></h2>
        <?php
        } else {
            echo "Error: " . mysqli_error($connect);
        }
        ?>



        <h2> Алгоритм решения:</h2>
        <ol>
            <li>'Перевезти козу на другой берег'</li>
            <li>'Вернуться обратно'</li>
            <li>'Перевезти волка на другой берег'</li>
            <li>'Вернуться с козой'</li>
            <li>'Перевезти капусту на другой берег'</li>
            <li>'Вернуться обратно'</li>
            <li>'Перевезти козу на другой берег'</li>
        </ol>

        <div class="game-container">
            <div class="shore left">
                <div class="unit" id="farmer">"Крестьянин"</div>
                <div class="unit" id="goat">"Коза"</div>
                <div class="unit" id="cabbage">"Капуста"</div>
                <div class="unit" id="wolf">"Волк"</div>
            </div>
            <div class="boat">
                <button id="move" type="button">Переместить</button>
            </div>
            <div class="shore right">
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>