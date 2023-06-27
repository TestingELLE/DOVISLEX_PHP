<?php
////    session_start();
//    // session_destroy();
//    
//    // NOTE: default FID set on index.php page so that group.php page can load correctly
//    // NOTE: default lid set on c_navigation.php page so that fund.php page can load correctly the first time the page is visited
//    // check for form submissions to prevent page refresh pop-up
//
//    // protects the page from unauthorized users
//    if(!isset($_SESSION['uname'])){  
//        header("Location:index.php");
//        exit();
//    }
//    
//    $_SESSION['count'];
//    isset($PHPSESSID) ? session_id($PHPSESSID) : $PHPSESSID = session_id();
//
//    $_SESSION['count'] ++;
//    setcookie('PHPSESSID', $PHPSESSID, time() + 21800);
//
//
//    $user=$_SESSION['uname'];
//    $type=$_SESSION['type'];
//    
//    // check if "Set Date" button has been submitted to prevent page refresh pop-up
//    if(isset($_POST['date'])){
//        header('Location:allGroups.php');
//      }
//
//    // check if "Today" button has been submitted to prevent page refresh pop-up
//    if(isset($_POST['today'])){
//        header('Location:allGroups.php');
//    }
//
//    // if $_SESSION['date'] has not been set then set it to today's date
//    if (!isset($_SESSION['date'])) {
//        $_SESSION['date'] = date('Y-m-d');
//    }
//
//    // charts.php:
//    #region
//
//    if(isset($_POST['charts_FID'])){
//        $_SESSION['FID'] = $_POST['charts_FID'];    
//        header('Location:charts.php?FID=' . $_SESSION['FID']);
//    } 
//
//    if(isset($_POST['chartsExpLidInput'])) {
//        $_SESSION['$expLid'] = $_POST['chartsExpLidInput'];
//        header('Location:charts.php?FID=' . $_SESSION['FID']);
//    }
//
//    if(isset($_POST['chartsExpLidClear'])){
//        $_SESSION['$expLid'] = 0; 
//        header('Location:charts.php?FID=' . $_SESSION['FID']);
//    } // end if(isset($_POST["groupFIDInput"])){
//
//    #endregion
//    // end charts.php
//
//    // group.php
//    #region
//
//    if(isset($_POST['groupFIDInput'])){
//        $_SESSION['FID'] = $_POST['groupFIDInput'];     
//        header('Location:group.php?FID=' . $_SESSION['FID']);
//    } // end if(isset($_POST["groupFIDInput"])){
//
//    if(isset($_POST['groupExpLidInput'])){
//        $_SESSION['$expLid'] = $_POST['groupExpLidInput'];
//        header('Location:group.php?FID=' . $_SESSION['FID']);
//    } // end if(isset($_POST["groupFIDInput"])){
//
//    if(isset($_POST['groupExpLidClear'])){
//        $_SESSION['$expLid'] = 0; 
//        header('Location:group.php?FID=' . $_SESSION['FID']);
//    } // end if(isset($_POST["groupFIDInput"])){
//    
//    #endregion
//    // end group.php
//    
//?>
