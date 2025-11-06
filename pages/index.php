<?php  
$objForm = new Form();
$objValid = new Validation($objForm);
$objUser = new User();

if($objForm->isPost('fullname')) {
    $objValid->_expected = array(
        'fullname',
        'fathername',
        'mothername',
        'email',
        'emailagain',
        'address',
        'organization',
        'appoinment',
        'degree',
        'gpa',
        'board',
        'year',
        'courses',
        'information',
        'contactnumber',
        'payment',
        'bdraft',
        'picture'

    );

    $objValid->_required = array(
        'fullname',
        'fathername',
        'mothername',
        'email',
        'emailagain',
        'address',
        'degree',
        'gpa',
        'board',
        'year',
        'contactnumber',
       /* 'payment',
        'bdraft',*/
        'picture'
    );

    $objValid->_special = array(
        'email' => 'email'
    );

    $objValid->_post_remove = array(
        'emailagain'
    );

    $fullnamelength = $objForm->getPost('fullname');
        if (!empty($fullnamelength)) {
            if ((strlen($fullnamelength) < 3) || (strlen($fullnamelength) > 20)) {
                $objValid->add2Errors('length_not_valid');
            }
        }
    $fathernamelength = $objForm->getPost('fathername');
        if (!empty($fathernamelength)) {
            if ((strlen($fathernamelength) < 3) || (strlen($fathernamelength) > 20)) {
                $objValid->add2Errors('length_not_valid');
            }
        }
     $mothernamelength = $objForm->getPost('mothername');
        if (!empty($mothernamelength)) {
            if ((strlen($mothernamelength) < 3) || (strlen($mothernamelength) > 20)) {
                $objValid->add2Errors('length_not_valid');
            }
        }

    $email = $objForm->getPost('email');
    $user = $objUser->getByEmail($email);
    
    if (!empty($user)) {
        $objValid->add2Errors('email_duplicate');
    }

    $regNotActive = $objUser->getByEmailNotActivated($email);

        if (!empty($regNotActive)) {
            $objValid->add2Errors('already_registered_not_activated');
        }

    $objUpload = new Upload();

    if($objValid->isValid()) {
        $objValid->_posts['active'] = '0';
        $objValid->_posts['code'] = Helper::string2hash(mt_rand(10, 50));
        $objValid->_posts['date'] = date('y/m/d');
        $objValid->_posts['pictureid'] = $objUpload->_post; 
       // $objValid->_posts['pictureid'] = "image";

        

        if($objUpload->upload("uploaded")) {
            /*echo "<pre>";
            print_r($objValid->_posts);
            echo "</pre>";*/
            if($objUser->addUser($objValid->_posts, $objForm->getPost('email'))) {           
               Helper::redirect('?page=registered');
            }
        }
    }
    
}

?>



<?php require_once("_header.php"); ?>
	
	<div class="container">
		<div class="row"> <!-- all contents row start  -->
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"><!--  vertical menu div starts from here -->
			</div><!-- visitor counter div ends -->
			</div><!--  Left vertical menu div ends -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--  For vertical menu right side space content show -->
				<!-- <div class="content-area" id="myDiv"> --><!-- All userdefined content within here -->
          

          <div class="container">
            <div class="row">
              <div><br/><span><strong>Onlone Registration for Web Security and Apps Development</strong></span></div><br/>
                <span><?php echo $objValid->validate('already_registered_not_activated');?></span>
                <form role="form" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-8">
                        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong>
                        </div>
                       
                        <div class="form-group">
                            <label for="fullname">Name</label>
                                <?php 
                                    echo $objValid->validate('fullname');
                                    echo $objValid->validate('fullname_length_not_valid');
                                  ?>
                            <div class="input-group">
                                <input type="text" class="form-control input-box-height" name="fullname" value="<?php echo $objForm->stickyText('fullname'); ?>" id="fullname" placeholder="Type your full name" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fathername">Father's Name</label>
                            <?php 
                                echo $objValid->validate('fathername');
                                echo $objValid->validate('length_not_valid');
                            ?>
                            <div class="input-group">
                                <input type="text" class="form-control input-box-height" name="fathername" value="<?php echo $objForm->stickyText('fathername'); ?>"  id="fathername" placeholder="Type your father's name" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="mothername">Mother's Name</label>
                            <?php 
                                echo $objValid->validate('mothername');
                                echo $objValid->validate('length_not_valid');
                            ?>
                            <div class="input-group">
                                <input type="text" class="form-control input-box-height" name="mothername" id="mothername" value="<?php echo $objForm->stickyText('mothername'); ?>" placeholder="Type your mother's name" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <?php 
                                echo $objValid->validate('email');
                                echo $objValid->validate('email_duplicate');
                            ?>
                            <div class="input-group">
                                <input type="email" class="form-control input-box-height" id="email" name="email" value="<?php echo $objForm->stickyText('email'); ?>" placeholder="Type your email" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emailagain">Confirm Email:</label>
                            <?php 
                                echo $objValid->validate('email');
                            ?>
                            <div class="input-group">
                                <input type="email" class="form-control input-box-height" id="emailagain" name="emailagain" value="<?php echo $objForm->stickyText('emailagain'); ?>" placeholder="Type your email address again" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Mailing Address</label>
                            <?php 
                                echo $objValid->validate('address');
                                echo $objValid->validate('length_not_valid');
                            ?>
                            <div class="input-group">
                                <textarea name="address" id="address" class="form-control" rows="3" value="<?php echo $objForm->stickyText('address'); ?>" placeholder="Type your mailing address"required></textarea>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="organization">Name of the Organization: (Optional)</label>
                            <?php 
                               /* echo $objValid->validate('organization');*/
                                echo $objValid->validate('length_not_valid');
                            ?>
                            <div class="input-group">
                                <input type="text" class="form-control input-box-height" id="organization" name="organization" value="<?php echo $objForm->stickyText('organization'); ?>" placeholder="Type the name of the organization if applicable">
                                <span class="input-group-addon"><span class="glyphicon "></span></span>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="appoinment">Appointment (Optional)</label>
                            <?php 
                                /*echo $objValid->validate('appoinment');*/
                                echo $objValid->validate('length_not_valid');
                            ?>
                            <div class="input-group">
                                <input type="text" class="form-control input-box-height" name="appoinment" id="appoinment" value="<?php echo $objForm->stickyText('appoinment'); ?>" placeholder="Type appoinment if any">
                                <span class="input-group-addon"><span class="glyphicon"></span></span>
                            </div>
                        </div>

                        <div><br/><span><strong>Educational Qualification</strong></span></div><br/>
                            <label for="degree">Name of the Degree ( Your last obtained academic certificate )</label>
                            <?php 
                                echo $objValid->validate('degree');
                                echo $objValid->validate('length_not_valid');
                            ?>
                            <div class="input-group">
                                <select name="degree">
                                    <option value="Dipolma in Engineering">Dipolma in Engineering</option>
                                    <option value="B.Sc">B.Sc Engineering</option>
                                </select> 
                            </div><br/>

                            <div class="form-group">
                                <label for="gpa">Type Your obtained GPA/Division</label>
                                 <?php 
                                    echo $objValid->validate('gpa');
                                    echo $objValid->validate('length_not_valid');
                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control input-box-height" id="gpa" name="gpa" value="<?php echo $objForm->stickyText('gpa'); ?>" placeholder="Type your obtained GPA/Division" required>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="board">Board</label>
                                 <?php 
                                    echo $objValid->validate('board');
                                    echo $objValid->validate('length_not_valid');
                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control input-box-height" id="board" name="board" value="<?php echo $objForm->stickyText('board'); ?>" placeholder="Type board name" required>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                 </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="year">Passing Year</label>
                                <?php 
                                    echo $objValid->validate('year');
                                    echo $objValid->validate('length_not_valid');
                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control input-box-height" id="year" name="year" value="<?php echo $objForm->stickyText('year'); ?>" placeholder="Type your passing year" required>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div> 
                             
                            <div class="form-group">
                                <label for="courses">Computer Network/Security related courses (if any):</label>
                                <?php 
                                    //echo $objValid->validate('courses');
                                    echo $objValid->validate('length_not_valid');
                                ?>
                                <div class="input-group">
                                    <textarea name="courses" id="courses" class="form-control input-box-height" rows="2" value="<?php echo $objForm->stickyText('courses'); ?>" placeholder="Type network/Security related courses"></textarea>
                                    <span class="input-group-addon"><span class="glyphicon"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="information">Any relevant information:</label>
                                <?php 
                                   // echo $objValid->validate('information');
                                    echo $objValid->validate('length_not_valid');
                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control input-box-height" id="information" name="information" value="<?php echo $objForm->stickyText('information'); ?>" placeholder="Any relevant information:">
                                    <span class="input-group-addon"><span class="glyphicon"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contactnumber">Mobile Number (Start from 01.. )</label>
                                <?php 
                                    echo $objValid->validate('contactnumber');
                                    echo $objValid->validate('length_not_valid');
                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control input-box-height" id="contactnumber" name="contactnumber" value="<?php echo $objForm->stickyText('contactnumber'); ?>" placeholder="Type mobile number" required>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="payment">Payment Information (Bank Draft No: )</label>
                                <?php 
                                    echo $objValid->validate('payment');
                                    echo $objValid->validate('length_not_valid');
                                ?>
                                <div class="input-group">
                                    <input type="text" class="form-control input-box-height" id="payment" name="payment" value="<?php echo $objForm->stickyText('payment'); ?>" placeholder="Type bank draft number">
                                    <span class="input-group-addon"><span class="glyphicon"></span></span>
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="bdraft">Attach a scan copy of your Bank Draft (only .jpg entention accepted and not bigger than 300KB) </label>
                                <?php 
                                  echo $objValid->validate('error_uploading');
                                ?>
                                <div class="input-group">
                                    <span class="btn btn-lg btn-file input-box-height">
                                    <input type="file" name="bdraft" enctype='multipart/form-data' id="bdraft" multiple accept="image/gif, image/png, image/jpeg"></span>
                                </div>
                            </div>

                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                        </div>
                        
                        <div class="col-sm-4 col-md-push-0">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for="picture">Attach Picture (only .jpg extention  not bigger than 300KB)</label>
                                    <?php 
                                       // echo $objUpload->validateUpload('picture');
                                    ?>
                                    <div class="input-group">
                                        <span class="btn btn-lg btn-file" name="picture" >
                                        <input type="file" name="picture" enctype='multipart/form-data' id="picture"  multiple accept="image/gif, image/png, image/jpeg"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                </form>

                <div class="col-lg-4 col-md-push-0">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                        </div>
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                        </div>
                    </div>
                </div>
            </div>
          </div>

				<!-- </div> --><!-- All userdefined content within here -->
			</div>
				<!-- Check condition if the content of the page is lot or few -->
				<!-- <script type="text/javascript" src="script/showingHidingDiv.js"></script> -->
				
			</div><!--  For vertical menu right side space content show ends -->
			<div style="clear:both"></div> <!-- For clearing the right side  -->
			
		</div>
	</div> <!-- all contents row ends  -->
    <div class="matgin-top-20"></div>

<?php require_once("_footer.php");?>