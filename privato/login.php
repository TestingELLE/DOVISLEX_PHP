<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../it/navigation.css">

    <!--All page specific code goes above this line which loads the common head-->
    <script src="../js/load-head.js"></script>
  </head>

  <body>
    <div id="supra-header"></div>
    <div id="page">
      <div id="header"> 
          <?php include('header.html'); ?> 
      </div>
      <div id="main-container" class="clear"> 
        <div id="tableDiv" class="notranslate">
          <br>
          <h1 style="text-align: center; font-family: Georgia;">
            You have been successfully logged in!
          </h1>
          <br>
          <div style="margin: auto; width: 50%;">
            <br>
            <p style="background-color: #D5D5D5; padding-left:5px;">
              New Professionisti Page
            </p>
            <ul>
              <li>
                <a href="../it/index.php?page=professionisti_1">Professionisti_1</a>
              </li>
            </ul>
            <br>

            <p style="background-color: #D5D5D5; padding-left:5px;">
              Restricted Pages, Access Only Allowed By Valid-User
            </p>
            <ul>
              <li>
                <a href="login.php">Restricted - Login</a>
              </li>
              <li>
                <a href="page1.php">Restricted - Page 1</a>
              </li>
              <li>
                <a href="page2.php">Restricted - Page 2</a>
              </li> 
              <li>
                <a href="page3.php">Restricted - Page 3</a>
              </li> 
            </ul>
            <br>

            <p style="background-color: #D5D5D5; padding-left:5px;">
              Back to Dovislex
            </p>
            <ul>
              <li>
                <a href="../en/index.php">Dovislex - English</a>
              </li>  
              <li>
                <a href="../sp/index.php">Dovislex - Spanish</a>
              </li>  
              <li>
                <a href="../fr/index.php">Dovislex - French</a>
              </li>  
              <li>
                <a href="../de/index.php">Dovislex - German</a>
              </li>  
              <li>
                <a href="../it/index.php">Dovislex - Italian</a>
              </li> 
            </ul>
          </div>
          <br>
          <div style="text-align: center;">
            <button type="button" style="width: 180px; background-color: #D5D5D5;
            border: 1px solid black; cursor: pointer;" onclick="location.href =
            '../privato/logout.php';">
              Logout
            </button>
            <br>
            <br>
          </div>
        </div>
      </div>

      <nav id="navigation"> 
          <?php include('navigation.html'); ?> 
      </nav>
      <footer id="colophon" class="clearfix notranslate"> 
        <?php include('footer.html'); ?> 
      </footer>
    </div>
  </body>
</html>