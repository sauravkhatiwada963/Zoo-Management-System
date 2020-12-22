<?php 
require '../../classes/databasetable.php';
require '../../classes/tablecreate.php';
require '../../db/dbconnect.php';

?>

<div class="panel panel-fit">

        <div class="panel-heading bg-teal">
			<h5 class="panel-title">Bookings</h5>
        </div>

        <div class="table-responsive pre-scrollable">
                            <?php 
             
							$bookings = new DatabaseTable('ticket_booking');
							$booking= $bookings->findAll(); //extracts all regarding enquiries table
							$bookingTable= new setTable();  //table is set
							$bookingTable->setTopics(["Buyer","Date","Children tickets","Adult Tickets"]);   //header is set
							
                                if($booking->rowCount()>0){
                                    foreach($booking as $b){
                                        $bookingTable->addEntries([  $b['buyer_email'],$b['date'],$b['no_child_tickets'],$b['no_adult_tickets'] ]);
                                    }
                                    echo $bookingTable->getValues();   //value is passed
                                }
                                else{
                                    echo "<br>"; ?>

                                <div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
                                    <h6 class="alert-heading text-semibold">No Bookings
                                         found</h6>
                                </div>
                                <?php  }   ?>
							
						</div>

</div>