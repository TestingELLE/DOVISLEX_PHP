<?php
session_start();  // do not include c_session.php as this page is not protected

$year = time() + 31536000;
if ($_POST['remember']) {
    setcookie('remember_me', $_POST['username'], $year);
    setcookie('remember_me2', $_POST['password'], $year);
}

if (isset($_POST["submit"])) {
    $_SESSION['uname'] = $_POST["username"]; //we need uname for access to table
    $_SESSION['uname_long'] = "z1bb6fc8_" . $_SESSION['uname']; //we need uname_long for access to database
    $_SESSION['psw'] = $_POST["password"];

    if (!$_POST['remember']) {
        if (isset($_COOKIE['remember_me'])) {
            $past = time() - 100;
            setcookie('remember_me', "", $past);
        }
        if (isset($_COOKIE['remember_me2'])) {
            $past = time() - 100;
            setcookie('remember_me2', "", $past);
        }
    }

            
include_once("c_connection.php");


    /* Establish connection -- else 'error' */
//$connection = mysqli_connect($host, $user, $pass, $db);
//  
//        if (!$connection)
//        {
////            header('location: login.php');
//            die('Could not connect: ' . mysqli_error());
//        }
        mysqli_select_db($connection,$db);
        
        $result=mysqli_query($connection,"SELECT * FROM accounts WHERE username='".$_SESSION['uname']."'limit 1");
        $row = mysqli_fetch_assoc($result);
        //check the user type and save user name in session
        
        

    //check the user type and save user name in session        

         $_SESSION['type']=$row['type'];
        $_SESSION["Last_Activity"]=time(); 
        header("location: posts.php");
        if(mysqli_num_rows($result)==1 && $row['type']=="Admin" || $row['type']=="Maintainer" ){
            
            exit();
            mysqli_close($connection);
        };
    
     
        if(mysqli_num_rows($result)==1 && $row['type']=="viewer"){
            exit();
            mysqli_close($connection);
        };
        if(mysqli_num_rows($result)==1 && $row['type']=="Maintainer"){
            exit();
            mysqli_close($connection);
        };
        
       
    }
    
?>



<html>
     <head>
        <meta charset="utf-8" />
        <?php
        include_once("head_section.php");
        ?> 
        <!--All page specific code goes below this line -->


    </head
    <body>
        <div>
    <table style="margin-bottom: 0px;">
        <tbody>
            <tr>
                <td id="left-header" width="80%">
                    <div id="stars">
                        <!-- creates a hidden div on top of the page where the stars are displayed
                             right clicking on the div will lead to a new page -->
                        <div oncontextmenu="javascript:window.location.href = '../privato/index.php';" 
                             style="opacity: 0; width: 50px; height:50px; left: 23px; cursor:default; 
                             background-color:red; position: absolute;"></div>

                        <h1 style="display:inline-block">Dovislex </h1>
                    </div>
                    <h4>Manage Posts</h4>
                </td>
             
            </tr>
        </tbody>
    </table>


    <!--
    <div class="middle-bar"></div> -->
</div> 

        <form action="login.php" method="POST">
                User: </br>
                <input type="text" name="username" value="<?php 
                    
                    echo $_COOKIE['remember_me'];
                ?>"><br/>
                Password<br/>
                <input type="password" name="password" value="<?php
                
                    echo $_COOKIE['remember_me2']; 
                
                ?>"><br/>
                <input type="submit" name="submit"value="Login">
                <br>
                <br>
                <input type="checkbox" name="remember" id="remember" value="1" <?php 
                if(isset($_COOKIE['remember_me'])&&isset($_COOKIE['remember_me2'])) {
                    echo 'checked="checked"';
                    }
                    else {
                        echo '';
                    }
                ?>>
                <label for="remember">Remember me</label>
            </form>
        <p> <br>This page is for internal use or authorized clients only.</p>
    </body>
</html>