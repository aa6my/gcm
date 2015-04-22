<?php
                //if wanna add any more type, just add the array value here!!! 
                $arr = array(
                             array('text' => $this->session->flashdata('login_match'), 'alert_type' => 'danger'),
                             array('text' => $this->session->flashdata('login_inactive'), 'alert_type' => 'danger'),
                             array('text' => $this->session->flashdata('login_account'), 'alert_type' => 'danger'),
                             array('text' => $this->session->flashdata('insert'), 'alert_type' => 'success')

                             
                            );
                
                foreach ($arr as $key => $value) {
                    if($value['text']){
                        ?>
                         <div class="alertMsg <?php echo $value['alert_type'];?>">
                             <span>
                             <i class="fa fa-check-square"></i>
                             </span> <?php echo $value['text'];?>
                             <a class="alert-close" href="#">x</a>
                         </div>
                     <?php
                    }
                    
                }
               
?>