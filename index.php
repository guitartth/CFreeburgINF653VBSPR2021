<?php
    //Set first name 
    $fName = $_GET['first'];

    //Set last name
    $lName = $_GET['last'];

    //Create full name
    $fullName = $fName.' '.$lName;
    
    //Set age
    $age = $_GET['age'];

    //Confirm age
    $goodAge = filter_var($age, FILTER_VALIDATE_INT); 
    
    //Set date
    $date = date('m/d/Y');

    //Find age in days IF good age submitted
    if ($goodAge){
        $ageDays = $age * 365;
    }

    //Set if old enough to vote
    if ($ageDays >= 6570) {
        $voter = true;
    }
    else {
        $voter = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Craig Freeburg INF 653 Week 2 GET Project</title>
</head>
<body>
    <header id="dateHeader">
        <p id="date"> Today is <?php echo htmlspecialchars($date) ?> </p>
    </header>
    <main>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 id="name">
            <?php 
            if (empty($lName) || empty($fName)){
                echo "You did not submit name parameters.";
                exit();
            }
            elseif (empty($age) || $goodAge == false){
                echo "You did not submit a numeric age parameter.";
                exit();
            }
            else {
                echo "Hello, my name is " . htmlspecialchars($fullName) . ".";
            }
            ?>
        </h1>
        <p id="voter">
            <?php
                if ($voter == true){
                    echo "I am " . htmlspecialchars($age) . " years old, and I am old enough to vote in the United States.";
                }
                else {
                    echo "I'm only " . htmlspecialchars($age) . ", which means I'm not old enough to vote.";
                };
            ?>
        </p>
        <p id="daysAge">
            <?php
                if ($voter == true){
                    echo "That means I'm at least " . htmlspecialchars(number_format($ageDays)).  " days old.";
                }
                else {
                    echo "I'm " . htmlspecialchars(number_format($ageDays)).  " days old, and I need to be 6,570 days old to vote in the United States.";
                };
            ?>
        </p>
    </main>
</body>

</html>


