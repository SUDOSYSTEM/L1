<!DOCTYPE html>
<html>
<head>
    <title>Shape Area Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        .result {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    // Base class Shape
    class Shape {
        public $area;

        public function getArea() {
            return $this->area;
        }
    }

    // Subclass Triangle
    class Triangle extends Shape {
        private $base, $height;

        public function __construct($base, $height) {
            $this->base = $base;
            $this->height = $height;
            $this->area = 0.5 * $base * $height;
        }
    }

    // Subclass Square
    class Square extends Shape {
        private $side;

        public function __construct($side) {
            $this->side = $side;
            $this->area = $side * $side;
        }
    }

    // Subclass Circle
    class Circle extends Shape {
        private $radius;

        public function __construct($radius) {
            $this->radius = $radius;
            $this->area = pi() * $radius * $radius;
        }
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $shape = $_POST["shape"];

        if ($shape == "triangle") {
            $base = $_POST["base"];
            $height = $_POST["height"];
            $triangle = new Triangle($base, $height);
            $result = "Area of the triangle: " . $triangle->getArea();
        } elseif ($shape == "square") {
            $side = $_POST["side"];
            $square = new Square($side);
            $result = "Area of the square: " . $square->getArea();
        } elseif ($shape == "circle") {
            $radius = $_POST["radius"];
            $circle = new Circle($radius);
            $result = "Area of the circle: " . $circle->getArea();
        }
    }
    ?>

    <h1>Shape Area Calculator</h1>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Select a shape:</label><br>
        <input type="radio" name="shape" value="triangle"> Triangle<br>
        <input type="radio" name="shape" value="square"> Square<br>
        <input type="radio" name="shape" value="circle"> Circle<br><br>

        <div id="shape-inputs">
            <!-- Inputs for each shape will be displayed here -->
        </div>

        <button type="submit">Calculate Area</button>
    </form>

    <?php if (isset($result)) { ?>
        <p class="result"><?php echo $result; ?></p>
    <?php } ?>

    <script>
        // Function to display input fields based on the selected shape
        function showShapeInputs() {
            var shapeInputs = document.getElementById("shape-inputs");
            shapeInputs.innerHTML = "";

            var selectedShape = document.querySelector('input[name="shape"]:checked');
            if (selectedShape) {
                switch (selectedShape.value) {
                    case "triangle":
                        shapeInputs.innerHTML = "Base: <input type='number' name='base' required><br>";
                        shapeInputs.innerHTML += "Height: <input type='number' name='height' required>";
                        break;
                    case "square":
                        shapeInputs.innerHTML = "Side: <input type='number' name='side' required>";
                        break;
                    case "circle":
                        shapeInputs.innerHTML = "Radius: <input type='number' name='radius' required>";
                        break;
                }
            }
        }

        // Add event listener to radio buttons
        var radioButtons = document.querySelectorAll('input[name="shape"]');
        for (var i = 0; i < radioButtons.length; i++) {
            radioButtons[i].addEventListener("change", showShapeInputs);
        }
    </script>
</body>
</html>