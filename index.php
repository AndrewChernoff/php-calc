<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>User Information Form</h1>
    </div>

    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <div class="form-group">
                <label for="num1">Number 1</label>
                <input id="num1" type="number" name="num1" placeholder="Enter number 1" required>
            </div>

            <div >
                <label for="operation">Operation</label>
                <select id="operation" name="operation">
                    <option value="plus">+</option>
                    <option value="minus">-</option>
                    <option value="multiply">*</option>
                    <option value="divide">/</option>
                </select>
            </div>

            <div class="form-group">
                <label for="num2">Last Name</label>
                <input id="num2" type="number" name="num2" placeholder="Enter number 2" required>
            </div>



            <button type="submit">Calculate</button>
        </form>

        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT);
            $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT);
            $operation = htmlspecialchars($_POST["operation"]);

            $error = false;

            if(empty($num1) || empty($num2) || empty($operation)) {
                echo "<p>Fill in all fields</p>";
                $error = true;
            }

            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo "<p>All fields must be numbers</p>";
                $error = true;
            }

            if(!$error) {
                $result = 0;
                switch ($operation) {
                    case "plus":
                        $result = $num1 + $num2;
                        break;
                        case "minus":
                            $result = $num1 - $num2;
                            break;
                    case "multiply":
                        $result = $num1 * $num2;
                        break;
                    case "divide":
                        $result = $num1 / $num2;
                        break;
                        default:
                            echo "Something went wrong";
                }

                echo "<p>Result: $result</p>";
            }
        }

        ?>
    </div>
</div>
</body>
</html>