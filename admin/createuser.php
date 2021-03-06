<?php
session_start();
include_once "../connection.php";
if ($_SESSION["data"]['role'] != "Admin") {
    header("location:adminhome.php");
    exit();
}
$passworderror='';
$error='';
$email=$name=$role=$password='';
if(isset($_POST['']))
{
    $email=mysqli_escape_string($conn,$_POST['email']);
    $name=mysqli_escape_string($conn,$_POST['name']);
    $role=mysqli_escape_string($conn,$_POST['role']);
    $password=mysqli_escape_string($conn,$_POST['password']);

    $pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
    if( !(preg_match($pattern,$password)))
    {
        $passworderror="<span style='color:red'> Password must be atleast 8 Characters, atleast 1 special characters and numbers</span>";
    }else
    {

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "userheader.php";

?>
<section id="aboutus">
    <div>
        <div class="form-outer">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div style="text-align: center">
              <h2> New User</h2>
                </div>


                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" value="<?php echo $email; ?>" id="email" name="email" required>

                <label for="password" style="margin-top: 10px"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                <?php echo $passworderror; ?>
                <label for="name" style="margin-top: 10px"><b>Name</b></label>
                <input type="text" placeholder="Enter name" value="<?php echo $name; ?>" name="name" id="name" required>

                <label for="role" style="margin-top: 10px"><b>Role</b></label>
                <select  name="role" id="role" required>
                    <option value="">Select Role</option>
                    <option value="Admin" <?php if($role=="Admin"){echo 'selected';} ?>>Admin</option>
                    <option value="Professor" <?php if($role=="Professor"){echo 'selected';} ?>>Professor</option>
                    <option value="Department" <?php if($role=="Department"){echo 'selected';} ?>>Department</option>
                </select>

                <button type="submit" class="btn btn-success btn-mr">Submit</button>


            </form>
        </div>
    </div>

</section>
<?php
include_once "../footer.php";
?>
</body>
</html><?php
