<?php include 'config.php';?>
<?php 


if(isset($_POST['save']))
{
if(!empty($_POST)) 
{
    ////username,password,rpassword
    $name = $_POST['name'];
    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $phone = $_POST['phone'];
    $doe=date('d/m/y');
    $address = $_POST['address'];
    $status="active";
    
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    $usertype="customer";
    $_SESSION['username']=$userid; 
    if($password==$rpassword)///////////////////////////INSERT INTO `users`(`userid`, `name`, `password`, `email`, `address`, `phone`, `doe`, `status`, `question`, `answer`, `usertype`) VALUES ('','','','','','','','','','','')
	{
     $query="INSERT INTO `users`(`userid`, `name`, `password`, `email`, `address`, `phone`, `doe`, `status`, `question`, `answer`, `usertype`) VALUES ('$userid','$name','$password','$email','$address','$phone','$doe','$status','$question','$answer','$usertype')" ; 
     $result = mysqli_query($con,$query);
			
     
     header('Location:http://localhost/mygiftstore/admin/index.php');  
    }
    else
    {
        echo "password dosenot match with retype password";
    }
}
}
?>




<?php include 'header.php';?>
<?php include 'navbar.php';?>
  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Customer Signup
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              
                <img src="images/reg1.jpg" alt="Girl signup" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="customerSignup.php" method="post">
            
            <div>
              <input type="text" name="userid" placeholder="userid" required />
            </div>
            <div>
              <input type="text" name="name" placeholder="Name" required />
            </div>
            <div>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <div>
              <input type="password" name="rpassword" placeholder="Retype Password" required />
            </div>
            <div>
              <input type="email" name="email"  placeholder="Email" required />
            </div>
            <div>
              <input type="text" name="phone" placeholder="Phone" required />
            </div>
            <div>
              <input type="text" name="address" class="message-box" placeholder="Address" required />
            </div>
            <div>
              <input type="text" name="question" placeholder="Secrete Question" required />
            </div>
            <div>
              <input type="text" name="answer" placeholder="Secrete Answer" required />
            </div>
            <div class="d-flex ">
              <button type="submit" name="save">
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>