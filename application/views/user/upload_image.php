<div class="container">
    <a href="<?php echo site_url('user/edit_profile').'/'.$this->session->userdata('username') ?>" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> Go back?</a>
    <h1 class="text-center">Change Your Profile Picture</h1>
    <div style="float:none; margin-left: auto; margin-right: auto; max-width:600px">
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
        <form method="post" action="<?php echo site_url('user/upload_image')?>" enctype="multipart/form-data">
            <p class="text-muted"><?php echo $this->upload->display_errors()?></p>
            <input type="file" name="userfile" size="20"/>
            <input type="submit" value="Upload" class="btn btn-default btn-block"/>
        </form>
    </div>
</div>