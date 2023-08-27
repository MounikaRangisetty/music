
<nav class="navbar navbar-expand-md navbar-dark bg-dark" >
  <div class="container-fluid" id="navbar">
    <a class="navbar-brand" href="javascript:void(0)"><img src='logo.jpeg' class="img-responsive"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navHeaderCollapse justify-content-end" id="mynavbar"> 
		  <ul class=" nav navbar-nav  me-auto  ">
        <li class="nav-item">
          <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="About1.php">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="achieve.php">ACHEIVEMENTS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#container">QUERIES</a>
          </li>

<?php 
 session_start();
 if(isset($_SESSION['logged_in']) ): ?>

          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CONTENT <b class='caret'></b></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="vocal1.php">VOCAL 1</a></li>
            <li><a class="dropdown-item" href="#">VOCAL 2</a></li>
            <li><a class="dropdown-item" href="#">VOCAL 3</a></li>
          </ul>
        </li>

       
<?php 
endif; 
?>      
</ul>

<?php  if(isset($_SESSION['logged_in']) ): ?>

        <form class="d-flex form-inline my-2 my-lg-0" >
          <button class="btn btn-primary" type="button"><a href='logout.php' style="text-decoration: none; color: azure;"><span class="	fas fa-user-alt"></span> logout </a></button>
        </form>
<?php 
endif; 
?>  

<?php if( ! isset($_SESSION["logged_in"]) ): ?>
    
      <form class="d-flex form-inline my-2 my-lg-0" >
        <button class="btn btn-primary" type="button"><a href='register.html' style="text-decoration: none; color: azure;"><span class="	fas fa-user-alt"></span> Regiser </a></button>
     
<span>...</span>
        
<button class="btn btn-primary" type="button"><a href='signin.html' style="text-decoration: none; color: azure;"> <span class="fas fa-sign-in-alt"></span> Login </a></button>
      </form>

      <?php 
endif; 
?> 

 
    </div>
  </div>
</nav>