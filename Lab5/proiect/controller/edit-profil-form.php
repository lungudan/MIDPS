<form action="controller/update-profil.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab"><?php echo $lang[$default]['edit_general']; ?></a></li>
      <li><a href="#personal" data-toggle="tab"><?php echo $lang[$default]['edit_personal']; ?></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">         
            <div class="col-md-6">
                <div class="form-group float-label-control">  
                     <br />				
                    <label for=""><?php echo $lang[$default]['edit_first']; ?></label>
                    <input type="text" class="form-control" placeholder="" name="name" value="<?php echo $row['name'];?>" autocomplete="off">
                </div>
                <div class="form-group float-label-control">  
                    <label for=""><?php echo $lang[$default]['edit_last']; ?></label>
                    <input type="text" class="form-control" placeholder="" name="prename" value="<?php echo $row['prename'];?>" autocomplete="off">
                </div>
                <div class="form-group float-label-control">
                    <label for=""><?php echo $lang[$default]['edit_avatar']; ?></label>
					
                    <input name="ImageFile" type="file" id="uploadFile"  accept="image/png, image/jpeg, image/gif"/>
					
                    <div class="col-md-6">
                        <div class="shortpreview">
                            
                            <br> 
                            <img src="userfiles/avatars/<?php echo $row['avatar'];?>" class="img-responsive">
                        </div>
                    </div>
                    
                </div>
            </div>  
            <div class="col-md-6">
			  <br />	
                <label for="">Id</label>
                <div class="form-group float-label-control">      
                        <div class="input-group">
                           <fieldset disabled> 
                               <input type="text" class="form-control" placeholder="<?php echo $row['user_id'];?>" name="user_name" value="Id: <?php echo $row['user_id'];?>" id="disabledTextInput" autocomplete="off">
                            </fieldset>
                        <br>	
                     <label for=""><?php echo $lang[$default]['edit_username']; ?></label>						
                            <fieldset disabled> 
                                <input type="text" class="form-control" placeholder="<?php echo $row['user_name'];?>" name="user_name" value="<?php echo $row['user_name'];?>" id="disabledTextInput" autocomplete="off">
                            </fieldset>  
                        </div>
                    </a>
                </div>
                
                <div class="form-group float-label-control">
                    <label for=""><?php echo $lang[$default]['edit_email']; ?></label> 
                    <input type="text" class="form-control" placeholder="<?php echo $row['user_email'];?>" name="user_email" value="<?php echo $row['user_email'];?>" autocomplete="off">
                </div>  
            </div>
        </div>
        <div class="tab-pane fade" id="personal">
            <div class="col-md-6">
                
                <div class="form-group float-label-control">
				  <br />	
                    <label for=""><?php echo $lang[$default]['edit_birth']; ?></label>   
                    <input type="date" class="form-control" placeholder="<?php echo $row['user_dob'];?>" name="user_dob" value="<?php echo $row['user_dob'];?>" autocomplete="off">      
                </div>
                <div class="form-group float-label-control">
                    <label for=""><?php echo $lang[$default]['edit_proff']; ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['user_profession'];?>" name="user_profession" value="<?php echo $row['user_profession'];?>" id="profession" autocomplete="off">    
                </div>  
                <label for=""><?php echo $lang[$default]['edit_gender']; ?></label>              
                <div class="form-group float-label-control">
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="user_gender" id="optionsRadios1" value="<?php echo $lang[$default]['edit_gender_male']; ?>" checked><?php echo $lang[$default]['edit_gender_male']; ?></label>
                    </div>              
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="user_gender" id="optionsRadios1" value="<?php echo $lang[$default]['edit_gender_female']; ?>"><?php echo $lang[$default]['edit_gender_female']; ?></label>
                    </div>
                </div>
                <div class="form-group float-label-control">
                    <label for=""><?php echo $lang[$default]['edit_country']; ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['user_country'];?>" name="user_country" value="<?php echo $row['user_country'];?>" id="country" autocomplete="off">    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group float-label-control">
				  <br />	
                    <label for=""><?php echo $lang[$default]['edit_address']; ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['user_address'];?>" name="user_address" value="<?php echo $row['user_address'];?>" autocomplete="off">     
                </div>
                
            </div>
        </div>
    </div>     
    <br>
    <div class="submit">
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" /><?php echo $lang[$default]['edit_save_profile']; ?></button>
        </center>
    </div>
</form>