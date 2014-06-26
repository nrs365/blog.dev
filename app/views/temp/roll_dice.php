<!doctype html>
<html lang="en">
<head>
    <title>Roll dice</title>
</head>
<body>
    <!-- <h1>The random number is <?= $random; ?></h1>
    <h1>Your guess was <?= $guess; ?></h1> -->

    The random dice roll was: <?= $random; ?><br>
    Your guess was: <?= $guess; ?><br>
    <? if ($random == $guess) : ?>
        <p style="color:green;">Your guess was correct!</p>
    <? else : ?>
        <p style="color:red;">Sorry, please try again!</p>
    <? endif; ?>    
</body>
</html>