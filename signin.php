<?php 
    if (isset($_POST['signin_submit'])) {
        
        $serverName = "localhost";
        $database = "dufunaSignup";
        $username = "root";
        $password = "mysql";
        

        $conn = mysqli_connect($serverName, $username, $password, $database);

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if (empty($email) || empty($password)) {
            echo "Either email or password field is empty" ;
        } 
        else{
            $sql = "SELECT * FROM signups WHERE email = '$email' AND password = '$password'"; 
            $stmt = mysqli_stmt_init($conn); 

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Error from database.";
            }

            else {
                mysqli_stmt_bind_param($stmtm, "ss", $email, $password);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            }

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password,$row['password']);
                
                if($pwdcheck == false) {
                    echo "Wrong password";
                }
                else {
                    session_start();
                    $_SESSION['userfname'] = $row['firstname'];
                    $_SESSION['useremail'] = $row['email'];
                    header('Location: welcome.php');
                }
            }
            else {
                echo "No user information";
            }
        }

    }    


?>