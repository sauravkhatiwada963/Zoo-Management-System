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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  
  
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
  

      <header class="section  " style="background:url('../images/fourdivs/4.PNG');
      background-size:cover;
      background-repeat:no-repeat;
      background-position: center;
      height:553px;
       ">
    </header>
    
    <div class="modaldiv right text-size-12 margin-top margin-right">
     <a class="button border-radius background-primary text-size-12 text-white text-strong" rel="modal:open" href="#ex1">
      BUY TICKETS
     </a>
      
    </div>
        <div class="section background-white"> 
          <div class="line">
            <div class="margin text-center">

                  
           
              <div class="gallery animalresults">
							
                            <?php 
                            $stmt= $pdo->prepare("SELECT * FROM events WHERE archive_status=:ar");
                            $stmt->execute(['ar'=>'No']);

                            foreach($stmt as $a){?>
                                <div class="s-12 m-12 l-4 margin-bottom" style="padding:4px;">
                                        <div class="padding-2x block-bordered border-radius">
                                            <div style="padding-left:35px;padding-right:35px;">
                                              <img src="../images/<?=$a['image']?>" 
                                              alt="" style="height: 200px;
                                                            width: 200px;">
                                            </div>    
                                            <br>
                                            <h2 class="text-thin" style="border-bottom: 2px #7854 solid;
                                        border-top:2px #7854 solid;padding:2px;">
                                        <?=$a['e_title']?></h2>
                                       
                                            <p class="margin-bottom-30">
                                                         <?php echo $a['e_description'];?>
                                            </p>
                                            
                                        </div>
                                </div> 

                        <?php	}?>
                
                        
                    </div>
              

              

            </div>
          </div>
          
        </div> 
      </article>

      <div id="ex1" class="modal">
        <form id="bookticketform">
        <div>
          <label >Email:</label>
          <input style="width:85%;" type="email" name="buyer_email" id="email" required>
        </div>
        <br>
        <div>
          <label >No.of Child Tickets:</label>
          <input type="number" name="no_child_tickets" id="no_child_tickets" min="0" max="10" required>
        </div>
        <br>
        <div>
          <label >No.of Adult Tickets:</label>
          <input type="number" name="no_adult_tickets"  id="no_adult_tickets" min="0" max="10" required>
        </div>
        <br>
        <div>
            <label>Date:</label>
            <input class="input is-hovered" 
									
							id="date" type="date" min="<?= date('Y-m-d') ?>" name="date" required>
        </div>
        <br>
        <br>
        <button class="button border-radius background-primary text-size-12 text-white text-strong" >
           SUBMIT
        </button>
        </select>
        
        </form>
      </div>

<!-- Link to open the modal -->

    </main>
    
    
    <!-- FOOTER -->
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


<script>

document.getElementById("bookticketform").reset(); 

$("form#bookticketform").submit(function(e){
	e.preventDefault();
  
            var formData = new FormData(this);
            $.ajax({
                url: "bookticket.php",
                type: 'POST',
                data: formData,
                success: function (response) {
                    if(response.data=='ticketBooked'){
                      $('.close-modal').click();
                      alert('Ticket booked');
                    }
                    else{
                      alert(response.data);
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
  

});


</script>