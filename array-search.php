<!DOCTYPE html>
<html>
<head>
    <title>Employee Name Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 5px;
        }
        button {
            padding: 5px 10px;
        }
        .result {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    // Create an indexed array of 20 employee names
    $employees = array(
        "John Doe",
        "Jane Smith",
        "Michael Johnson",
        "Emily Williams",
        "David Brown",
        "Sarah Davis",
        "Robert Miller",
        "Jessica Wilson",
        "Daniel Anderson",
        "Ashley Thomas",
        "Matthew Taylor",
        "Olivia Moore",
        "Christopher Martin",
        "Emma Thompson",
        "Joshua Jackson",
        "Sophia White",
        "Andrew Harris",
        "Isabella Allen",
        "Joseph Clark",
        "Ava Lewis"
    );

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchName = $_POST["search_name"];
        $found = false;

        // Search for the name in the array
        foreach ($employees as $name) {
            if ($name == $searchName) {
                $found = true;
                break;
            }
        }

        // Display the result
        if ($found) {
            $result = "The name '$searchName' was found in the employee list.";
        } else {
            $result = "The name '$searchName' was not found in the employee list.";
        }
    }
    ?>

    <h1>Employee Name Search</h1>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        Enter an employee name: <input type="text" name="search_name">
        <button type="submit">Search</button>
    </form>

    <?php if (isset($result)) { ?>
        <p class="result"><?php echo $result; ?></p>
    <?php } ?>
</body>
</html>