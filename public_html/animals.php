<?php
require '../db/dbconnect.php';
require 'links.php';


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
      <!-- Content -->
      <article>
  

      <header class="section  " style="background:url('../images/fourdivs/1.PNG');
      background-size:cover;
      background-repeat:no-repeat;
      background-position: center;
      height:553px;
       ">
    </header>

        <div class="section background-white"> 
          <div class="line">
            <div class="margin text-center">

                    <div style="padding:20px;">
                      <input type="text" id="searchQuery" placeholder="Enter search query" style="width:80%;font-size:20px;height: 40px;border-radius: 5px;">
                      <select name="searchby" id="searchby" style="font-size:20px;height: 40px;border-radius: 5px;" >
											<option value="natural_habitat">Habitat</option>
											<option value="nick_name">Species name</option>
						</select>
                    </div>
                    <a id="Fish" class="button border-radius showFish text-size-12 text-white text-strong" >FISH</a>
                    <a  id="Amphibian" class="button border-radius showamphibian" text-size-12 text-white text-strong" >AMPHIBIAN</a>
                    <a   id="Mammals" class="button border-radius  showmammals text-size-12 text-white text-strong" >MAMMALS</a>
                    <a  id="Reptiles"  class="button border-radius showreptiles  text-size-12 text-white text-strong" >REPTILES</a>
                    <a  id="Birds"  class="button border-radius  showbirds text-size-12 text-white text-strong" >BIRDS</a>

                 
                    <hr>
                    <br>
            
              <!-- <div class="s-12 m-12 l-4 margin-bottom">
                <div class="padding-2x block-bordered border-radius">
                  <i class="icon-paperplane_ico icon2x text-primary margin-bottom-30"></i>
                  <h2 class="text-thin">Lightweight</h2>
                  <p class="margin-bottom-30">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
                  <a class="button border-radius background-primary text-size-12 text-white text-strong" href="/">GET MORE INFO</a>
                </div>
              </div> -->
              <div class="gallery animalresults">
							
                            <?php 
                            $stmt= $pdo->prepare("SELECT * FROM animals WHERE archived=:ar ");
                            $stmt->execute(['ar'=>'No']);

                            foreach($stmt as $a){?>
                                <div class="s-12 m-12 l-4 margin-bottom" style="padding:4px;">
                                        <div class="padding-2x block-bordered border-radius">
                                            <div style="padding-left:35px;padding-right:35px;">
                                              <img src="../images/<?= loadsetanimalimage($a['animal_id'])?>" 
                                              alt="" style="height: 200px;
                                                            width: 200px;">
                                            </div>    
                                            <br>
                                        <h2 class="text-thin" style="border-bottom: 2px #7854 solid;
                                        border-top:2px #7854 solid;padding:2px;">
                                        <?=$a['nick_name']?></h2>
                                        <p><b>Habitat</b>: <?=$a['natural_habitat']?></p>
                                            <p class="margin-bottom-30">
                                                         <?php echo substr($a['description'], 0, 50);
															echo '   ................';
														?>
                                            </p>
                                            <a class="button border-radius background-primary text-size-12 text-white text-strong"
                                                href="specificanimal.php?animal_id=<?= $a['animal_id']?>">
                                             LEARN MORE
                                            </a>
                                        </div>
                                </div> 

                        <?php	}?>
                
                        
                    </div>
              

              

            </div>
          </div>
          
        </div> 
      </article>
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

   
		$('#searchQuery').val('');

	function removeColor(){
		$('.showfish').removeClass('background-primary');
		$('.showamphibian').removeClass('background-primary');
		$('.showmammals').removeClass('background-primary');
		$('.showreptiles').removeClass('background-primary');
		$('.showbirds').removeClass('background-primary');
		
	}

$('.showfish').click(function(){
	removeColor();
	$('.showfish').addClass('background-primary');

	$.ajax({
              url:"specificclassificationdisplay.php",
              method:"POST",
              data:{cat:$(this).attr('id')},
              success:function(response){
                  
                $('.animalresults').html(response);
                console.log(response);
              }
	  });  
    
});

$('.showamphibian').click(function(){
	removeColor();
	$('.showamphibian').addClass('background-primary');
	$.ajax({
              url:"specificclassificationdisplay.php",
              method:"POST",
              data:{ cat:$(this).attr('id')},
              success:function(response){
                  
                $('.animalresults').html(response);
                console.log(response);
              }
	  });  
    
	

});

$('.showmammals').click(function(){
	removeColor();
	$('.showmammals').addClass('background-primary');
	$.ajax({
              url:"specificclassificationdisplay.php",
              method:"POST",
              data:{ cat:$(this).attr('id')},
              success:function(response){
                  
                $('.animalresults').html(response);
                console.log(response);
              }
	  });  
    

});

$('.showreptiles').click(function(){
	removeColor();
	$('.showreptiles').addClass('background-primary');
	$.ajax({
              url:"specificclassificationdisplay.php",
              method:"POST",
              data:{ cat:$(this).attr('id')},
              success:function(response){
                  
                $('.animalresults').html(response);
                console.log(response);
              }
	  });  


});

$('.showbirds').click(function(){
	removeColor();
	$('.showbirds').addClass('background-primary');
	$.ajax({
              url:"specificclassificationdisplay.php",
              method:"POST",
              data:{cat:$(this).attr('id')},
              success:function(response){
                  
                $('.animalresults').html(response);
                console.log(response);
              }
	  });  

});

$("#searchQuery").keyup(function(){
  removeColor();
            $.ajax({
                url:"searchResult.php",
                method:"POST",
                data:{ query:String($(this).val()) , field:$('#searchby').val()},
                success:function(data){
                    $('.animalresults').html(data);
                }
            });
        
});
						



</script>