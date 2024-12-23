<?php
    if(isset($_POST['submit'])){
        $name = $_POST[ 'computer_id' ];
        $query = mysqli_query($con, "INSERT INTO games (title, genre, platform, price_per_hour,computer_id) VALUES ('$title', '$genre', '$platform', '$price_per_hour', '$computer_id')");
        if($query){
            echo"<script>('done')</script>";
        }else{
            echo"<script>('error')</script>";
        }
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Game</title>
<style>
    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    form {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.6);
        box-shadow: 0 0 10px rgb(175, 99, 0);
        opacity: 100%;
        color: #000;
    }
    label {
        display: block;
        margin-bottom: 10px;
        color: #000;
    }
    input[type="text"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #000;
        color: #ff9933;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #f7740c;
        color: #000;
    }
    input:invalid {
        border: 1px solid red;
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
    }
</style>
</head>
<body>

<form action="add_game.php" method="post">
    <h2>Add Game</h2>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" required>

    <label for="platform">Platform:</label>
    <input type="text" id="platform" name="platform" required>

    <label for="price_per_hour">Price Per Hour:</label>
    <input type="text" id="price_per_hour" name="price_per_hour" required>

    <label for="computer_id">Computer ID:</label>
        <?php
        $con = mysqli_connect("localhost", "root", "root", "gcms", 3310);
        $s=mysqli_query($con, "select * from games");
           ?>
           <select id="computer_id" name="computer_id">
            <?php
            while($r = mysqli_fetch_array($s))
            {
                 ?>
                <!-- <option><?php echo $r['computer_id'];?></option> -->
                <option value="<?php echo $r['computer_id']; ?>"><?php echo $r['computer_id']; ?></option>
        <?php   }     ?>
    </select>

    <input type="submit" value="Add Game">
</form>

</body>
</html>
