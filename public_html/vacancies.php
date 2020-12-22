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
     
    <link rel="stylesheet" href="css/bulma.css" />

  
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
  

      <header class="section  " style="background:url('../images/fourdivs/7.PNG');
      background-size:cover;
      background-repeat:no-repeat;
      background-position: center;
      height:553px;
       ">
    </header>

        <div class="section background-white"> 
          <div class="line">
            <div class="margin text-center">

                    <h1 class="text-primary">Vacancies</h1>
            
             
              <div class="gallery animalresults">
							
                            <?php 

                                                            
                                function randomImage(){
                                  $arr= ["searchjob1.PNG","searchjob2.PNG","searchjob3.PNG","searchjob4.PNG"];
                                  $r=rand(0,3);
                                  return $arr[$r];
                                }
                            $stmt= $pdo->prepare("SELECT * FROM vacancies WHERE archive_status=:ar ");
                            $stmt->execute(['ar'=>'No']);

                            foreach($stmt as $a){?>
                                <div class="s-12 m-12 l-4 margin-bottom" style="padding:4px;">
                                        <div class="padding-2x block-bordered background-dark border-radius">
                                            <div style="padding-left:35px;padding-right:35px;">
                                              <img src="../images/<?=randomImage()?>" 
                                              alt="" style="height: 200px;
                                                            width: 200px;">
                                            </div>    
                                            <br>
                                        <h2 class="text-strong text-primary"><?=$a['v_position']?></h2>
                                        <hr>
                                        <ul style="list-style:none;text-align: initial; " class="text-primary">
                                          <li >
                                            <i class="icon-newspaper"></i>
                                            Description: <?=$a['v_description']?>
                                          </li>
                                          <li>
                                            <i class="icon-hourglass"></i>
                                            Type:<?=$a['v_type']?>
                                          </li>
                                          <li>
                                           
                                            <i class="icon-calendar"></i>
                                             Time: <?=$a['v_valid_from'].'//'.$a['v_valid_till']?>
                                      
                                          </li>
                                        </ul>
                                        <br>
                                        
                                        <button
                                         data-toggle="modal" data-target="#exampleModal"id="<?=$a['v_id']?>"
                                        class=" button is-success showmodal   text-size-18 text-white text-strong" >APPLY</button>
                                           
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

<div class="modal" id="addModuleModal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head"> 
      <h2  class=" modal-card-title">Apply</h2>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class=" modal-card-body">

			<form id="applyvacancyform">
				<input type="hidden" name="v_id" class="v_id">
					<div class="field">
						<label class="label">Name:</label>
						<div class="control">
							<input class="input is-hovered" name="applicant_name" id="applicant_name" type="text" placeholder="Enter your name" required>
						</div>
					</div>
					<div class="field">
						<label class="label">Email:</label>
						<div class="control">
							<input class="input is-hovered" name="applicant_email" id="applicant_email" type="email" placeholder="Enter your email" required>
						</div>
					</div>
					<div class="field">
						<label class="label">Number:</label>
						<div class="control">
							<input class="input is-hovered" name="applicant_number" id="applicant_number" type="text" placeholder="Enter your number" required>
						</div>
					</div>

					<div class="field">
						<label class="label">CV:</label>
						<div class="control">
							
							<input  name="applicant_cv[]"  id="applicant_cv" type="file"  required>	
						</div>
					</div>



					<button  class="button " id="confirmModuleAdd">Submit</button>
				</form>
			
			
			
    </section>

      
	  
  </div>
 
</div>

<script type="text/javascript" src="js/AST-Notif-master/ast-notif.js"></script>
    <script type="text/javascript" src="js/AST-Notif-master/ast-notif.min.js"></script>

  <link href="js/AST-Notif-master/gaya.css?v=1" rel="stylesheet">
<link href="js/AST-Notif-master/fa/css/fa.css" rel="stylesheet">
<link href="js/AST-Notif-master/css/ast-notif.css?v=2" rel="stylesheet">
<script src="js/AST-Notif-master/js/ast-notif.js?v=2"></script>


<script>

function clearall(){
	$('#applicant_email').val('');
	$('#applicant_name').val('');
	$('#applicant_id').val('');
	$('#applicant_number').val('');
	$('#applicant_cv').val('');

}

clearall();


$('.showmodal').click(function(){
	$('.modal').addClass('is-active');
	$('.v_id').val($(this).attr('id'));
});

$('.delete').click(function(){
	$('.modal').removeClass('is-active');
	clearall();
});


$("form#applyvacancyform").submit(function(e){
	e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "uploadvacancy.php",
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response=="done"){
                      $('.modal').removeClass('is-active');
                      AstNotif.notify("Files submitted!");
					}
                },
                cache: false,
                contentType: false,
                processData: false
            });
});


</script>