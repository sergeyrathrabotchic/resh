
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="<?php echo $str_language; ?>" xml:lang="<?php echo $str_language; ?>">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MAMP PRO</title>
<style type="text/css">
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: .9em;
        color: #000000;
        background-color: #FFFFFF;
        margin: 0;
        padding: 10px 20px 20px 20px;
    }

    samp {
        font-size: 1.3em;
    }

    a {
        color: #000000;
        background-color: #FFFFFF;
    }

    sup a {
        text-decoration: none;
    }

    hr {
        margin-left: 90px;
        height: 1px;
        color: #000000;
        background-color: #000000;
        border: none;
    }

    #logo {
        margin-bottom: 10px;
        margin-left: 28px;
    }

    .text {
        width: 80%;
        margin-left: 90px;
        line-height: 140%;
    }
</style>
</head>

<body>
<?php



session_start();
if(isset($_POST["start"])){
    $name = htmlspecialchars( $_POST["name"]);
    $message = htmlspecialchars( $_POST["message"]);


}


$host = 'localhost'; 
$database = 'database_'; 
$user = 'root'; 
$password = 'root';



$conn = mysqli_connect($host,$user,$password,$database);
if(isset($_POST["start"])){
    $name = htmlspecialchars( $_POST["name"]);
    $message = htmlspecialchars( $_POST["message"]);
    if(($name != "")  && ($message != "")){

    $sql = 'INSERT INTO database_ ( name, message) VALUE( "' . $name . '","' . $message . '")';

    $result = mysqli_query($conn, $sql);
    }

}



$sql = 'SELECT * FROM database_';
$result = mysqli_query($conn, $sql);


$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


for ($i=0;$i<count($rows);$i++){
$ot = $ot . "\n" . "\n" .$rows[$i]["name"] . " ". $rows[$i]["date_tame"] . "\n" . $rows[$i]["message"];
}

$_SESSION["chat"] = $ot;


?>



<form action="" method="post">
 <textarea name="chat" cols="70" rows="10">
 <?php echo $_SESSION["chat"]?></textarea>
 <p>Введите имя: <input type="text" name="name"/></p>
 <p>Введите сообщее: </p>
 <textarea name="message" cols="40" rows="10">
 </textarea>
 <p><input type="submit" name="start" /></p>
</form>





</body>
</html>
