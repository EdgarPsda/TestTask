<?php
//Includes
include_once('./config/database.php');
include_once('./objects/interval.php');

//objects
$database = new Database();
$db = $database->getConnection();
$interval = new Interval($db);

//Show Intervals
$data = $interval->index();
$data = $data->fetchAll();

// validate message to frontend
if(isset($_GET['message'])){
    echo $_GET['message'];
}

//Save Interval
if(isset($_POST['add'])){

    $interval->validate_interval($_POST['date_start'], $_POST['date_end'], $_POST['price']);
    header("Location: ./?message=Interval was Saved.");
}

// Delete Interval
if(isset($_GET['delete'])){

    // set id to be delete
    $interval->set_id($_GET['delete']);

    // delete interval
    if($interval->delete()){
        header("Location: ./?message=Interval was Deleted.");
    }
    else{
        header("Location: ./?message=Unable to Delete Interval.");
    }
}

// Drop Table
if(isset($_POST['drop_table'])){
    
    if($database->delete()){
        header("Location: ./?message=Data Cleared.");
    }
    else{
        header("Location: ./?message=Unable Delete Data.");
    }
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
    <form action="./index.php" method="POST">
        <input type="date" name="date_start">
        <br>
        <input type="date" name="date_end">
        <br>
        <input type="number" name="price">
        <br>
        <button type="submit" name="add">Add Interval</button> 
    </form>
    <br>
    <br>
    <table border="1">
        <th>Date Start</th>
        <th>Date End</th>
        <th>Price</th>
        <th>Actions</th>
        <?php
            foreach($data as $data)
            {
        ?>
        <tbody>
            <td><?php echo $data['date_start']; ?></td>
            <td><?php echo $data['date_end'];?></td>
            <td><?php echo $data['price'];?></td>
            <td>
                <a href="./index.php?delete=<?php echo $data['id']?>">Delete</a>
                <br>
                <a href="./views/update/?id=<?php echo $data['id']?>">Update</a>
                <br>
            </td>
        </tbody>
        <?php
            }
        ?>
    </table>
    <form action="./index.php" method="POST">
            <button type="submit" name="drop_table">Delete Table</button>
    </form>
</body>
</html>