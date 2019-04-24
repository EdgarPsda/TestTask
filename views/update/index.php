<?php
//Includes
include_once('../../config/database.php');
include_once('../../objects/interval.php');

//objects
$database = new Database();
$db = $database->getConnection();
$interval = new Interval($db);

// interval id
$id = $_GET['id'];

// validate if update needed
if(isset($_POST['update'])){
    
    // set new form values
    $interval->set_date_start($_POST['date_start']);
    $interval->set_date_end($_POST['date_end']);
    $interval->set_price($_POST['price']);
    $interval->set_id($_POST['id']);

    $interval->update();

    header("Location: ../../");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Task</title>
</head>
<body>
<form action="./" method="POST">
    <input type="hidden" value="<?php echo $id?>" name="id">
    <input type="date" name="date_start">
        <br>
        <input type="date" name="date_end">
        <br>
        <input type="number" name="price">
        <br>
        <button type="submit" name="update">Update Interval</button>

</form>
    
</body>
</html>