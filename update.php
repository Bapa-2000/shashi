<?php
include "config.php";
if(isset($_POST['update'])){
    $firstname = $_POST['firstname'];
    $user_id = $_POST['user_id'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $gender = $_POST['gender'];

    // Update the record 
    $sql = "UPDATE students SET firstname=?, lastname=?, email=?, password=?, gender=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $firstname, $lastname, $email, $password, $gender, $user_id);
    $result = $stmt->execute();

    if($result==True){
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $first_name = $row['firstname'];
            $last_name = $row['lastname'];
            $email = $row['email'];
            $password = $row['password']; // Fetch password from database
            $gender = $row['gender'];
            $id = $row['id'];
        }
?>
        <html>
            <body>
                <h2>User Update</h2>
                <form action="" method="post">
                    <fieldset>
                        <legend>Personal Information</legend>
                        First name:<br>
                        <input type="text" name="firstname" value="<?php echo $first_name; ?>"><br>
                        <input type="hidden" name="user_id" value="<?php echo $id; ?>"><br>
                        Last name:<br>
                        <input type="text" name="lastname" value="<?php echo $last_name; ?>"><br>
                        Email:<br>
                        <input type="email" name="email" value="<?php echo $email; ?>"><br>
                        Password:<br>
                        <input type="password" name="password" value="<?php echo $password; ?>"><br> <!-- Display password from database -->
                        Gender:<br>
                        <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>> Male
                        <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>> Female<br><br>
                        <input type="submit" value="Update" name="update">
                    </fieldset>
                </form>
            </body>
        </html>
<?php
    } else {
        header("Location: view.php");
        exit();
    }
}
?>
