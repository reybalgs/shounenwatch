<div class="container">
    <a href="<?php echo site_url('user/profile').'/'.$user->username ?>" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> Go back?</a>
    <div class="row">
        <div class="col-xs-8">
            <h1>Edit Your Profile</h1>
            <?php echo form_open(site_url('user/edit_profile'), array("class"=>"form-horizontal", "role"=>"form")) ?>
                <div class="form-group">
                    <label for="editInputEmail" class="col-xs-2 control-label">Email</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="edit-email" id="editInputEmail" value="<?php echo $user->email ?>"  placeholder="Email"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="editInputAbout" class="col-xs-2 control-label">About</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" name="edit-about" id="editInputAbout" rows="15"><?php echo $user->about ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="editInputPasswordOld" class="col-xs-2 control-label">Password</label>
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="edit-password-old" id="editInputPasswordOld" placeholder="Old Password"/>
                        <input type="password" class="form-control" name="edit-password-new" id="editInputPasswordNew" placeholder="New Password"/>
                        <input type="password" class="form-control" name="edit-password-newconf" id="editInputPasswordNewConf" placeholder="Confirm New Password"/>
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