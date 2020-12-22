<?php
require '../db/dbconnect.php';
require 'links.php';



function animalOweek(){
global $pdo;
$stmt=$pdo->prepare('SELECT animal_id FROM animal_of_the_week');
$stmt->execute();
$stmt=$stmt->fetch();
return $stmt['animal_id'];
}

function loadAnimalSpecific($type,$id){
global $pdo;
$r="";
$stmt=$pdo->prepare('SELECT * FROM animals WHERE animal_id=:a');
$stmt->execute(['a'=>$id]);
$stmt=$stmt->fetch();

if($type=='nick_name'){
	$r=$stmt['nick_name'];
}

if($type=='description'){
	$r=$stmt['description'];
}
return $r;

}


function loadsetanimalimage($id){
			global $pdo;
			$stmt =$pdo->prepare('SELECT img FROM animalimages WHERE animal_id=:id LIMIT 1');
			$stmt->execute(['id'=>$id]);
		
			if($stmt->rowCount()>0){
				$i=$stmt->fetch();
				
				$out= $i['0'];
		  }
			else{
				$out="noimage.PNG";
			}
		
			echo $out;
		
		}
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
      <!-- Main Carousel -->
      <section class="section background-dark">
        <div class="line">
          <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows">
            <div class="item">
              <div class="s-12 center">
                <img src="img/01-boxed.jpg" alt="">
                <div class="carousel-content">
                  <div class="padding-2x">
                    <div class="s-12 m-12 l-8">
                      <p class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1">Welcome to </p>
                      <p  class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1">ClayBrook </p>
                      <p  class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1">Zoo</p>
                    </div>                  
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="s-12 center">
                <img src="img/02-boxed.jpg" alt="">
                <div class="carousel-content">
                  <div class="padding-2x">
                    <div class="s-12 m-12 l-8">
                      <p class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1">Enjoy your visit</p>
                      
                    </div>                  
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </section>
      
      <!-- Section 1 -->
      <section class="section background-white"> 
        <div class="line">
          <div class="margin">
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="../images/lion.jpg"  style="width:500px;height:250px;"alt="">
              <h2 class="text-thin">Animals</h2>
              <p>View various species of animals.</p> 
              <a class="text-more-info text-primary-hover" href="animals.php">Visit</a>                
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="../images/visit.jpg" style="width:500px;height:250px;" alt="">
              <h2 class="text-thin">Events & Tickets</h2>
              <p>View all the upcoming events and book tickets.</p> 
              <a class="text-more-info text-primary-hover" href="eventstickets.php">Vist</a>                
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="../images/greenn.jpg" style="width:500px;height:250px;" alt="">
              <h2 class="text-thin">Gallery</h2>
              <p>View the gallery full of animal images.</p> 
              <a class="text-more-info text-primary-hover" href="gallery.php">Visit</a>                
            </div>
          </div>
        </div>
      </section>
      
      <!-- Section 2 -->
      <section class="section background-primary text-center">
        <div class="line">
          <div class="s-12 m-10 l-8 center">
            <h2 class="headline text-thin text-s-size-30">Animal of the week</h2>

          </div>
        </div>  
      </section>
      
      <!-- Section 3 -->
      <section class="section background-white">
        <div class="full-width text-center">
          <img class="center margin-bottom-30" style="margin-top: -200px;height:431px;width:600px;" src="../images/<?=loadsetanimalimage(animalOweek())?>" style="" alt="">
          <div class="line">
            <h2 class="headline text-thin text-s-size-30"><span class="text-primary"><?= loadAnimalSpecific('nick_name',animalOweek())?></span></h2>
            <p class="text-size-20 text-s-size-16 text-thin"><?= loadAnimalSpecific('description',animalOweek())?></p>
            <br>
            <br>
            <a href="specificanimal.php?animal_id=<?=animalOweek()?>" >
              <i class="icon-more_node_links icon2x text-primary margin-top-bottom-10"></i>
              <p class="text-size-20 text-s-size-16 text-thin text-primary">Learn More</p>
            </a>
          </div>  
        </div>  
      </section>
      <hr class="break margin-top-bottom-0">
      
      <!-- Section 4 --> 
      <section class="section background-white">
        <div class="line">
          <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">Upcoming <span class="text-primary">Events</span></h2>
          <div class="carousel-default owl-carousel carousel-wide-arrows upevents" style="margin-left:100px;">
            





          </div>
        </div>    
      </section>
      
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


$.ajax({
		url:"upcomingevent.php",
		method:"POST",
		success:function(data){
			$('.upevents').html(data);


		}
  });	
  


</script>