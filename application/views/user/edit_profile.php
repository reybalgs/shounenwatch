<div class="container">
    <div class="row">
        <div class="col-md-8">
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Edit Your Profile
                        <a href="<?php echo site_url('user/profile').'/'.$user->username ?>" class="pull-right"><i class="fa fa-long-arrow-left"></i> Click here to go back.</a>
                    </h1>
                </div>
                <div class="panel-body">
                    <?php echo form_open(site_url('user/edit_profile'), array("class"=>"form-horizontal", "role"=>"form")) ?>
                        <div class="form-group">
                            <label for="editInputEmail" class="col-xs-2 control-label">Email*</label>
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
                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-check"></i> Save Changes</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Current Profile Picture</h1>
                </div>
                <div class="panel-body">
                    <?php
                        if(empty($user->image)) {
                            echo img(array(
                                'src'=>base_url('static').'/'.'user_placeholder.png',
                                'alt'=>'Your profile picture',
                                'class'=>'img-rounded img-responsive'
                            ));
                        }
                        else {
                            echo img(array(
                                'src'=>base_url('upload/user').'/'.$user->image,
                                'alt'=>'Your ugly face',
                                'class'=>'img-rounded img-responsive'
                            ));
                        }
                    ?>
                    <br/>
                    <a href="<?php echo site_url('user/upload_image') ?>" class="btn btn-default btn-block"><i class="fa fa-picture-o"></i> Change Profile Picture</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Delete your profile</h1>
                </div>
                <div class="panel-body">
                    <p class="text-danger"><strong>WARNING!</strong> This is irreversible.</p>
                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-times"></i> Delete your account</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php # warning modal ?>
<div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3 class="modal-title" id="deleteModalLabel">Are you sure about this?</h3>
            </div>
            <div class="modal-body">
                <h3 class="text-danger">THIS ACTION CANNOT BE UNDONE!</h3>
                <p>Here's a lowdown on what's going to happen if you delete your profile:</p>
                <ul>
                    <li>Your anime will <strong>not</strong> be removed from the system. However, <strong>they will be marked as inactive</strong>. This allows people who are tracking your submissions to keep doing so.</li>
                    <li>Your profile will be inaccessible by other people.</li>
                    <li>You won't be able to register with the same username and email address again.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <p>Are you still sure? You could just forget about your account if you don't want it anymore.</p>
                <p class="text-danger">Remember, deleting your account <strong>CANNOT BE UNDONE!</strong></p>
                <a href="<?php echo site_url('user/delete').'/'.$user->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-o-up"></i> Yes, I'm sure!</a>
            </div>
        </div>
    </div>
</div>