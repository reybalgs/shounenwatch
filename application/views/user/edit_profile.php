<div class="container">
    <a href="<?php echo site_url('user/profile').'/'.$user->username ?>" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> Go back?</a>
    <div class="row">
        <div class="col-xs-8">
            <?php
                if(validation_errors()) {
            ?>
            <div class="alert alert-danger">
                <?php
                    echo validation_errors();
                ?>
            </div>
            <?php
                }
                if($wrong_password) {
            ?>
            <div class="alert alert-danger">
                <p>The old password you entered was incorrect. Please try again.</p>
            </div>
            <?php
                }
                if($done and !($wrong_password)) {
            ?>
            <div class="alert alert-success">
                <p>Your information has been successfully updated.</p>
            </div>
            <?php
                }
                else if($done and $wrong_password) {
            ?>
            <div class="alert alert-warning">
                <p>Some of your information has not been updated. Please review your inputs.</p>
            </div>
            <?php
                }
            ?>
            <h1>Edit Your Profile</h1>
            <?php echo form_open(site_url('user/edit_profile'), array("class"=>"form-horizontal", "role"=>"form")) ?>
                <div class="form-group">
                    <label for="editInputEmail" class="col-xs-2 control-label">Email</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="edit-email" id="editInputEmail"  placeholder="Enter New Email"/>
                        <span class="help-block">Your email is currently set to <strong><?php echo $user->email ?></strong></span>
                        <span class="help-block">Leave this blank if you don't need to change your email.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="editInputAbout" class="col-xs-2 control-label">About</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" name="edit-about" id="editInputAbout" rows="15"><?php echo $user->about ?></textarea>
                        <span class="help-block">Write something witty and original here! You'd want to make some impact!</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="editInputPasswordOld" class="col-xs-2 control-label">Password</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="edit-password-old" id="editInputPasswordOld" placeholder="Old Password"/>
                        <input type="password" class="form-control" name="edit-password-new" id="editInputPasswordNew" placeholder="New Password"/>
                        <input type="password" class="form-control" name="edit-password-newconf" id="editInputPasswordNewConf" placeholder="Confirm New Password"/>
                        <span class="help-block">Remember, your password has to be unique and secure!</span>
                        <span class="help-block">If you don't want to change your password, just leave these fields blank.</span>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Save Changes</button>
        </div>
        <div class="col-xs-4">
            <h2>Current Profile Picture</h2>
            <?php
                if(empty($user->image)) {
                    echo img(array(
                        'src'=>base_url('static').'/'.'user_placeholder.png',
                        'alt'=>'Your profile picture',
                        'class'=>'img-thumbnail'
                    ));
                }
                else {
                    echo img(array(
                        'src'=>base_url('upload/user').'/'.$user->image,
                        'alt'=>'Your ugly face',
                        'class'=>'img-thumbnail'
                    ));
                }
            ?>
            <a href="#" class="btn btn-primary btn-block">Change Profile Picture</a>
        </div>
    </div>
</div>