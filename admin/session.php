<!-- modified from c_session.php from Funds-Viewer -->
<?php
    //session_start();
    
    // protects the page from unauthorized users
    if(!isset($_SESSION['uname'])){  
        header("Location:login.php");
        exit();
    }
    
    $_SESSION['count'];
isset($PHPSESSID) ? session_id($PHPSESSID) : $PHPSESSID = session_id();

$_SESSION['count'] ++;
setcookie('PHPSESSID', $PHPSESSID, time() + 21800);


    $user=$_SESSION['uname'];
    $type=$_SESSION['type'];
    
    // check if "Set Date" button has been submitted to prevent page refresh pop-up
    if(isset($_POST['date'])){
        header('Location:posts.php');
      }

    // check if "Today" button has been submitted to prevent page refresh pop-up
    if(isset($_POST['today'])){
        header('Location:posts.php');
    }

    // if $_SESSION['date'] has not been set then set it to today's date
    if (!isset($_SESSION['date'])) {
        $_SESSION['date'] = date('Y-m-d');
    }
    
 
?>


