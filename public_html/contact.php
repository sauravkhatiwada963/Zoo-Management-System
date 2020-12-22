<?php
require '../db/dbconnect.php';
require 'links.php';
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Claybrook Zoo</title>
  </head>   
  
  <body class="size-1140">
  
<header>

    <nav class="background-white background-primary-hightlight">
        
      <div class="line">

      <a href="index.php" class="logo">
            <img src="../images/zoologo2.jpg" alt=""style="width:80px;position:absolute;top:1px;">
      </a>
        
      
        <div class="top-nav s-20 l-15">
          
          <ul class="right chevron">
            <li><a href="index.php">Home</a></li>
            <li><a href="animals.php">Animals</a></li>
            <li><a href="eventstickets.php">Events & Tickets</a></li>
            <li><a href="vacancies.php">Vacancies</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
</header>
    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        
      <header class="section  " style="background:url('../images/fourdivs/6.PNG');
          background-size:cover;
          background-repeat:no-repeat;
          background-position: center;
          height:553px;
          ">
      </header>

        <div class="section background-white"> 
          <div class="line">
            <div class="margin">
              
              <!-- Company Information -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Company Information</h2>
                <div class="float-left">
                  <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">Company Address</h4>
                  <p>
                     45 Zoo Lane , Eastlands<br> North Yorkshire, YR12 3TH, UK
                  </p>               
                </div>
                <div class="float-left">
                  <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">E-mail</h4>
                  <p>mail@claybrookzoo.com<br>
                     admin@claybrookzoo.com
                  </p>              
                </div>
                <div class="float-left">
                  <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80">
                  <h4 class="text-strong margin-bottom-0">Phone Numbers</h4>
                  <p>0800 4521 800 50<br>
                     0450 5896 625 16<br>
                     
                  </p>             
                </div>
              </div>
              
              <!-- Contact Form -->
              <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30">Contact Us</h2>
                <form class="customform" id="feedbackform">
                  <div class="line">
                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <input name="email" class="required email border-radius" placeholder="Your e-mail" title="Your e-mail" type="email" required/>
                      </div>
                      <div class="s-12 m-12 l-6">
                        <input name="name" class="name border-radius" placeholder="Your name" title="Your name" type="text" required/>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="date" id="date" value="<?=date('Y-m-d')?>">
                  <div class="s-12">
                    <textarea name="message" class="required message border-radius" placeholder="Your message" rows="3" required></textarea>
                  </div>
                  <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">Submit </button></div> 
                </form>
              </div>  
            </div>  
          </div> 
        </div> 
      </article>
     
     
    </main>
    
    <!--FOOTER -->
    <footer>
      <!-- Social -->
     
      
      <!-- Main Footer -->
      <section class="section background-dark">
        <div class="line">
          <div class="margin">
          
            
            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-6 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">Contact Us</h4>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><b>Address:</b>  45 Zoo Lane , Eastlands, North Yorkshire, YR12 3TH, UK</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-mail text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><a href="/" class="text-primary-hover"><b>E-mail:</b> mail@claybrookzoo.com</a></p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-smartphone text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><b>Phone:</b> 0700 000 987</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-smartphone text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>Opening Times  (BST) 10-8pm    all other times of the year 12-6pm</p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-twitter text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p><a href="/" class="text-primary-hover"><b>Twitter</b></a></p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-facebook text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11">
                  <p><a href="/" class="text-primary-hover"><b>Facebook</b></a></p>
                </div>
              </div>
            </div>
            
            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-5">
             
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d599056.7241735973!2d-1.948962830382395!3d54.090317076012994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4878c340e19865f1%3A0xc3e02219c8959fb7!2zTm9ydGggWW9ya3NoaXJlLCDgpLjgpILgpK_gpYHgpJXgpY3gpKQg4KSF4KSn4KS_4KSw4KS-4KSc4KWN4KSv!5e0!3m2!1sne!2snp!4v1593879139715!5m2!1sne!2snp" 
              width="600" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

          </div>
        </div>
      </section>
      <div class="background-primary padding text-center">
        <a href="/"><i class="icon-facebook_circle icon2x text-white"></i></a> 
        <a href="/"><i class="icon-twitter_circle icon2x text-white"></i></a>
        <a href="/"><i class="icon-instagram_circle icon2x text-white"></i></a>                                                                        
      </div>
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);">
      
      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12">Copyright <?=date('Y')?>, ClayBrook Zoo</p>
           
          </div>
         
        </div>
      </section>
    </footer>  
    
    


   </body>
</html>

<script type="text/javascript" src="js/AST-Notif-master/ast-notif.js"></script>
    <script type="text/javascript" src="js/AST-Notif-master/ast-notif.min.js"></script>

  <link href="js/AST-Notif-master/gaya.css?v=1" rel="stylesheet">
<link href="js/AST-Notif-master/fa/css/fa.css" rel="stylesheet">
<link href="js/AST-Notif-master/css/ast-notif.css?v=2" rel="stylesheet">
<script src="js/AST-Notif-master/js/ast-notif.js?v=2"></script>
<script>  

document.getElementById("feedbackform").reset(); 
$("form#feedbackform").submit(function(e){
	e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "sendFeedback.php",
                type: 'POST',
                data: formData,
                success: function (response) {
					
					
                if (response.data=="feedbackSent"){
                  AstNotif.notify("Feedback submitted");
                  document.getElementById("feedbackform").reset(); 
				      	}
                },
                cache: false,
                contentType: false,
                processData: false
            });
});


</script>