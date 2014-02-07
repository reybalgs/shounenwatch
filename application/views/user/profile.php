<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <div class="well">
            <?php
                if(empty($image)) {
                    # Show a placeholder image
                    $properties = array(
                        'src'=>base_url('static').'/'.'user_placeholder.png',
                        'alt'=>$username."'s profile image",
                        'class'=>'img-thumbnail img-responsive'
                    );
                    echo img($properties);
                }
                else {
                    # Get the image of the user
                    $properties = array(
                        'src'=>base_url('upload/user').'/'.$image,
                        'alt'=>$username."'s profile image",
                        'class'=>'img-thumbnail img-responsive'
                    );
                    echo img($properties);
                }
            ?>
            <h2><?php echo $username?></h2>
            <h3>About me</h3>
            <?php
                if(empty($about)) {
                    
            ?>
            <p>I'm not creative enough to write something about myself. Or I could just be shy. Who knows?</p>
            <?php
                }
                else {
            ?>
            <p><?php echo nl2br($about)?></p>
            <?php
                }
                
                if($this->session->userdata('username') == $username) {
            ?>
            <a href="<?php echo site_url('user/edit_profile').'/'.$username ?>" class="btn btn-primary btn-block">Edit Your Profile</a>
            <?php
                }
            ?>
            </div>
        </div>
        <div class="col-xs-8">
            <h1>Submissions</h1>
            <?php
                if($this->session->userdata('username') == $username) {
            ?>
            <a href="#" class="btn btn-default">Submit New Anime</a>
            <?php
                }
                if(empty($anime)) {
            ?>
            <p>There doesn't seem to be anything here...</p>
            <?php
                }
                else {
                    foreach($anime as $submission):
            ?>
            <div class="row" style="padding-bottom: 2em">
                <div class="col-xs-4">
                    <?php
                        if(empty($submission['image'])) {
                            $properties = array(
                                'src'=>base_url('static').'/'.'anime_placeholder.gif',
                                'class'=>'img-thumbnail img-responsive'
                            );
                        }
                        else {
                            $properties = array(
                                'src'=>base_url('upload/anime').'/'.$submission['image'],
                                'class'=>'img-thumbnail img-responsive'
                            );
                            echo img($properties);
                        }
                    ?>
                </div>
                <div class="col-xs-8">
                    <h3><?php echo $submission['name'] ?></h3>
                    <p class="text-muted">Aired at <?php echo mdate("%m %d %Y", mysql_to_unix($submission['airing'])) ?></p>
                    <p class="text-muted">Total Episodes: <?php echo $submission['episodes'] ?></p>
                    <p class="text-muted"><?php echo number_format(rand(0, 5000)) ?> people are watching this.</p>
                    <h4>Synopsis:</h4>
                    <p><?php echo $submission['synopsis'] ?></p>
                </div>
            </div>
            <hr class="col-xs-12">
            <?php
                endforeach;
                }
            ?>
        </div>
    </div>
</div>