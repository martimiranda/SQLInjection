<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>LOGIN</h1>
    <form method="POST" action="loginPetable.php">
        <input type="text" name="userName" placeholder="Usuari"></input>
        <input type="password" name="pwd" placeholder="Contrasenya"></input>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if(isset($_POST['userName']) && isset($_POST['pwd'])){
        try {
            
            $pwd=$_POST['pwd'];
            $userName = $_POST['userName'];
            $dsn = "mysql:host=localhost;dbname=mylogin";
            
            $query = $pdo->prepare("select nom from users where contrasenya = sha2(\"$pwd\",512) and nom= \"$userName\";");
            echo "select nom from users where contrasenya = sha2(\"$pwd\",512) and nom= \"$userName\";";
        $query->execute();
        $row = $query->fetch();
        $correct = false;
        while ( $row ) {
            echo "<h1>"."Benvingut ". $row['nom']. "</h1>";
            $row = $query->fetch();
            $correct=true;
        }
        if(!$correct){
            echo "incorrecto";
        }
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    //PETABLE CON USER " OR "a"="a
    ?>
</body>
</html>