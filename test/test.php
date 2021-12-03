<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Hello</h2>
    <?php 
    echo "Hello" ;
    echo("Hello");
    print "Hello";
    print("Hello");

    $a = 10;
    $b = 5;
    $string = "Hi";

    echo "$string";

    var_dump($a);
    var_dump($b);

    $c = ["hi", "hello", "taeyoung"];

    echo $c[0];

    function Func($a, $b){
        return $a + $b;
    }
    Func(2,4);

    ?>

</body>
</html>