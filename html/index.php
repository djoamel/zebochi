<?php 
require_once "conection.php";
session_start();

if (isset($_POST['registr'])){



$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$sexe=$_POST['sexe'];

// Insertion des données dans la base de données
$sql =mysqli_query($conn,"INSERT INTO `utilisatuer`(`nom`, `sexe`, `prénom`, `email`, `mot de passe`) 
VALUES ('$firstname','$sexe','$lastname','$email','$password')");


}
if (isset($_POST['login'])){

  
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  // Insertion des données dans la base de données
  $sql1 =mysqli_query($conn,"SELECT `id_utilisateur`, `email`, `mot de passe` FROM `utilisatuer` WHERE email='$email'AND `mot de passe`='$password' limit 1");
  if (mysqli_num_rows($sql1)) {
    $row=mysqli_fetch_assoc($sql1);
    $_SESSION['id_u']=$row['id_utilisateur'];
    $_SESSION['email']=$row['email'];
    $_SESSION['login_success'] = true;
    
} else {
    // Utilisateur non trouvé, vous pouvez afficher un message d'erreur ou rediriger vers la page de connexion
    echo "Login failed. Please check your credentials.";
}
  
  }


?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
</head>
<body>
    
    <header>
        <div class="logo">
            <p><span>job</span>opportunity</p>
        </div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="offreopp.php">Offer</a></li>
            <li><a href="aboutus.php" >About us</a></li>
            <?php 
            if (!isset($_SESSION['id_u']))
         
         
         {
            echo'<li><a href="espace recruteure.php">Recruiting area</a></li>';
         }
         ?>
            
            <?php 
              if (!isset($_SESSION['email']))
         
         
            {
           echo '<li  onclick="openk()" id="open"><a>Sign In</a><i class="fa fa-sign-in" aria-hidden="true" style="font-size:15px" ></i></li>';
              }
              else if (!isset($_SESSION['id_u']));
              ?>

<?php 
              if (isset($_SESSION['id_r']))
         
         
            {
           echo '<li><a href="profile.php" >Profile</a></li>';
              }
              ?>
               
              <?php 
              if (isset($_SESSION['id_u'])||isset($_SESSION['id_r']))
         
         
            {
           echo '<li><a href="logout.php" >logout</a></li>';
              }
              ?>


              
        </ul>

        <!-- menu responsive -->
        <div class="toggle_menu"></div>
        
    </header>


<div id="popup" class="popup">
  <p>Login successful!</p>
</div>



   
    <div id="windw" >
      <div id="dakhel">
        <span id="close" onclick="closek()">&times;</span>
        <section>
        <form class="form" method="post">
                <div class="flex-column">
                  <label>Email</label>
                </div>
                <div class="inputForm">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    viewBox="0 0 32 32"
                    height="20"
                  >
                    <g data-name="Layer 3" id="Layer_3">
                      <path
                        d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"
                      ></path>
                    </g>
                  </svg>
                  <input placeholder="Enter your Email" class="input" type="text" name="email" />
                </div>
              
                <div class="flex-column">
                  <label>Password </label>
                </div>
                <div class="inputForm">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    viewBox="-64 0 512 512"
                    height="20"
                  >
                    <path
                      d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"
                    ></path>
                    <path
                      d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"
                    ></path>
                  </svg>
                  <input placeholder="Enter your Password" class="input" type="password" name="password"/>
                </div>
              
                <div class="flex-row">
                  
                  <span class="span">Forgot password?</span>
                </div>
                <button class="button-submit" name="login">Sign In</button>
                <p class="p">Don't have an account? <a class="rgstr" onclick="openl()" id="open1">Sign Up</span></a></p>
            
                </div>
              </form>
              
        </section>
      </div>
    </div>



    <div id="windw1">
        <div id="dakhel1">
          <section>
          <form class="form1" method="post">
                <p class="title">Register </p>
                <p class="message">Signup now and get your job</p>
                    <div class="flex">
                    <label>
                        <input style="width: 200px;" id="fn" class="input" type="text" placeholder="" required="" aria-activedescendant="" name="firstname">
                        <span>Firstname</span>
                    </label>
            
                    <label>
                        <input id="ln" style=" width: 200px; position: relative; right: 18px;" class="input" type="text" placeholder="" required="" name="lastname">
                        <span >Lastname</span>
                    </label>
                </div>  
                <label>
                    <select name="sexe" id="" >
                      <option value="sexe" selected disabled>Sex</option>
                      <option value="homme">homme</option>
                      <option value="femme">femme</option>
            </select>
                </label> 
                        
                <label>
                    <input class="input" type="email" placeholder="" required="" name="email">
                    <span>Email</span>
                </label> 
                    
                <label>
                    <input class="input" type="password" placeholder="" required="" name="password">
                    <span>Password</span>
                </label>
                <label>
                    <input class="input" type="password" placeholder="" required="">
                    <span>Confirm password</span>
                </label>
                <button  class="submit" name="registr">Sign up</button>
                <p class="signin">Already have an acount ? <a onclick="closel()" id="close1">Signin</a> </p>
            </form>
        </section>
        </div>
    </div>


















    <!-- section acceuil home -->

    <section id="home">
        <div class="left">
            <h4>Our purpose</h4>
            <h1>Your career starts here</h1>
            <p>We want to create a platform that serves as a bridge between job seekers and employers, facilitating seamless interactions and fostering a thriving professional community. .</p>
             <button><a href="offreopp.php">apply now</a></button>
        </div>
        <div class="right">
            <img src="../images/design-nahar_977617-74426-removebg-preview.png">
        </div>
    </section>



    <div class="advertise" >
    <?php
     $get_offers=mysqli_query($conn," SELECT * FROM `offre` WHERE naw3='special'");
     if(mysqli_num_rows($get_offers) > 0)
     {
         
         while($row=mysqli_fetch_assoc($get_offers))
          {
             echo'
             <h1>Advertise!</h1>
             <p>Here are some special offers</p>
             <div class="alll">
             <img src="./offer/'.$row['logo'].'">
             <div class="text">
             <h2>'.$row['nom_entreprise'].':</h2>
              <p>'.$row['Kind_worker'].'</p>
                 <h6>For more information:0'.$row['tel_entreprise'].'</h6>

                 <a  href="offreopp.php" > <button   class="butn1" >Apply</button></a>
            <button  onclick="openk()" id="open" class="butn2">Learn more</button>
               </div>
               <div id="windw" >
               <div id="dakhel">
                 <span id="close" onclick="closek()">&times;</span>
                 <div class="more" >
                 <h5> '.$row['détaille_offre'].' </h5>
                 </div>
               </div>
             </div>  
              </div>
             
              
              
        



             ';
         }
    }
    ?>


</div>

       <!-- section  menu -->

       <section id="menu">
           <h4 class="mini_title">Offer</h4>
           <h2 class="title" >Popular offre</h2>
           <div class="dishes">
               <div class="dish">
                   <img src="../images/pexels-energepiccom-110472.jpg">
                   <p>bar man</p>
                   <h2>sunstar coffee</h2>
                   <a href="../html/offreopp.php">Apply</a>
               </div>
               <div class="dish">
                    <img src="../images/pexels-tiger-lily-4483610.jpg">
                    <p>inventory Manager</p>
                    <h2>CERAMIC PALACE-ANNABA</h2>
                    <a href="../html/offreopp.php">Apply</a>
               </div>
               <div class="dish">
                    <img src="../images/pexels-edgars-kisuro-1488467.jpg">
                    <p>salesperson in a store</p>
                    <h2>zara  shop</h2>
                    <a href="../html/offreopp.php">Apply</a>
                </div>
                <div class="dish">
                        <img src="../images/pexels-anete-lusina-4792498.jpg">
                        <p>architectural Engineer </p>
                        <h2>private company</h2>
                        <a href="../html/offreopp.php">Apply</a>
                </div>
                <div class="dish">
                    <img src="../images/pexels-fauxels-3184465.jpg">
                    <p>executive Assistant</p>
                    <h2>private company</h2>
                    <a href="../html/offreopp.php">Apply</a>
               </div>
               <div class="dish">
                <img src="../images/téléchargement (1).png">
                <p>mail Delivery Agent</p>
                <h2>yalidine express</h2>
                <a href="../html/offreopp.php">Apply</a>
           </div>

           </div>
       </section>
       <div class="statistiques">
    <span>
         <h2>450+</h2>
         <p>Recrutements / an</p>
    </span>
    <span>
         <h2>120+</h2>
         <p>Entreprises</p>
   </span>
   <span>
         <h2>160+</h2>
         <p>offre d'emplois</p>
   </span>
  </div>


       <!-- section about us -->

       <section id="about_us">
            <h4 class="mini_title">About Us</h4>
            <h2 class="title">Why choose us ?</h2>
            <div class="about">
                <div class="left">
                    <img src="../images/431954286_1119997585991327_9213122147907286357_n-removebg-preview.png">
                </div>
                <div class="right">
                    <h3>Best offer in Algeria</h3>
                    <p>Welcome to our online recruitment platform! Simplify your recruitment process or find your next job opportunity in just a few clicks. Recruiters and candidates, join us today for an efficient and intuitive recruitment experience.</p>
                    <a href="../html/aboutus.php">See more</a>
                </div>
            </div>
       </section>


       <!-- section comments -->
      <section class="comment_section">
            <h4 class="mini_title">Comments</h4>
            <h2 class="title"> What People think about us</h2>
            <div class="comments">
                <div class="comment">
                    <div>
                        <img src="../images/jack.jpeg">
                        <h4>Jack-26 years old sience teacher</h4> 
                        
                    </div>
                    <p>« As I'm always a bit fair, I really appreciate the payment of lessons within 72 hours after they are entered. »</p>
                </div>
                <div class="comment">
                    <div>
                        <img src="../images/vlntn.jpeg">
                        <h4>Valentin-22 years old math teacher </h4>
                    </div>
                    <p>« I had to find a job quickly, I was served! Within a week, I became a math tutor and gave my 1st lesson! »</p>
                </div>
                <div class="comment">
                    <div>
                        <img src="../images/anayis.jpeg">
                        <h4>Anais-25 years old frensh teacher</h4>
                    </div>
                    <p>« Advisors are always available if you have any doubts or questions. It's reassuring to have a listening ear. »</p>
                </div>


            </div>
      </section>

      
      <footer>
          <div class="services_list">
              <div class="service">
                  <img src="../icon/clock.png" alt="">
                  <h2>Ouverture</h2>
                  <p>10h30 à 23h45</p>
                  <p>23h45 à 9h30</p>
              </div>

              <div class="service">
                <img src="../icon/pin.png" alt="">
                <h2>Adresses</h2>
                <p>France-Paris</p>
                <p>Annaba-Algérie</p>
            </div>
            <div class="service">
                <img src="../icon/email.png" alt="">
                <h2>Emails</h2>
                <p>email@gmail.com</p>
                <p>étudiantopp@gmail.com</p>
            </div>
            <div class="service">
                <img src="../icon/call.png" alt="">
                <h2>Numbers</h2>
                <p>+231 657542328</p>
                <p>+33 45687515</p>
            </div>
            
            <hr>
          </div>

          <p class="footer_text">Directed by <span class="span">DJAMEL MLM Dev</span> | All rights reserved.</p>
          
      </footer>


      <script>
<?php if(isset($_SESSION['login_success']) && $_SESSION['login_success']): ?>
    
          setTimeout(function(){
      document.getElementById('popup').style.display = 'block';
    }, 400);
    
    
    setTimeout(function(){
      document.getElementById('popup').style.display = 'none';
    }, 2500);
  <?php
    // Reset the session variable
    unset($_SESSION['login_success']);
    endif;
?>




var open=document.getElementById('open');
var close=document.getElementById('close');
var windw=document.getElementById('windw');

function openk(){
    windw.style.display = 'block';

    
}

function closek(){
    windw.style.display = 'none';
   
}

window.onclick = function(event) {
    if (event.target == windw) {
      windw.style.display = "none";
    }
  }


  window.onclick = function(event) {
    if (event.target == windw1) {
      windw1.style.display = "none";
    }
  }





var open_1=document.getElementById('open1');
var closem_1=document.getElementById('close1');
var windw_1=document.getElementById('windw1');
function openl(){
    windw_1.style.display = 'block';
    
}

function closel(){
    windw_1.style.display = 'none';
}




var small_menu = document.querySelector('.toggle_menu')
var menu = document.querySelector('.menu')

small_menu.onclick = function(){
     small_menu.classList.toggle('active');
     menu.classList.toggle('responsive');
}
  







  










         
      </script>




</body>
</html>