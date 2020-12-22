<?php 
class setTable{ 

public $topics; 
public $entries=[]; 


public function setTopics($topics){  
    $this->topics=$topics;
}
public function addEntries($entries){
$this->entries[]=$entries;
}

public function getValues(){
        $add='<div class="table-responsive" style="padding:30px;min-height: 420px;"><table class="table datatable-basic ">'; 
            $add.='<tr>';
                $add.='<thead class="bg-teal-600">'; 
                    foreach ($this->topics as $topics) { 
                        $add .= '<th>'.$topics.'</th>';
                    }
                    $add.='</thead>';
                    $add.='</tr>';
                    $add.='<tbody>';
                foreach ($this->entries as $entries) {
                
                    $add.='<tr class="alpha-teal">';
                            foreach ($entries as $key => $value) {
                                $add.= '<td>'.$value.'</td>';		
                            }
                            $add.= '</tr>';	    
                    }
                    $add.='</tbody>';
        $add.= '</table></div>'; 
                return $add;	
}

}
?>


