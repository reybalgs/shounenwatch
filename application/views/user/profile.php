<div class="container">
    <div class="row">
        <div class="col-md-4">
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
            <?php
                if(empty($about)) {
                    
            ?>
            <p class="text-justify">I'm not creative enough to write something about myself. Or I could just be shy. Who knows?</p>
            <?php
                }
                else {
            ?>
            <p class="text-justify"><?php echo nl2br($about)?></p>
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
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Submissions
                        <?php
                            if($this->session->userdata('username') == $username) {
                        ?>
                        <a href="<?php echo site_url('anime/submit') ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-plus"></i> Submit New Anime</a>
                        <?php
                            }
                        ?>
                    </h1>
                </div>
                <div class="panel-body">
                    <?php
                        if(empty($anime)) {
                    ?>
                    <div class="text-center">
                        <i class="fa fa-question-circle fa-5x"></i>
                        <?php
                            if($this->session->userdata('username') == $username) {
                        ?>
                        <h4>You don't have any submissions! Why not add one?</h4>
                        <?php
                            }
                            else {
                        ?>
                        <h4>This user has no submissions.</h4>
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                        }
                        else {
                            $i = 1;
                            foreach($anime as $submission):
                                if($i == 1) {
                    ?>
                    <div class="row" style="padding-bottom: 2em">
                    <?php
                                }
                    ?>
                        <div class="col-sm-4 col-md-4">
                            <a href="<?php echo site_url('anime').'/'.$submission['id'] ?>" class="thumbnail">
                                <?php
                                    if(empty($submission['image'])) {
                                        $properties = array(
                                            'src'=>base_url('static').'/'.'anime_placeholder.gif',
                                            'class'=>'img-thumbnail img-responsive'
                                        );
                                        echo img($properties);
                                    }
                                    else {
                                        $properties = array(
                                            'src'=>base_url('upload/anime').'/'.$submission['image'],
                                            'class'=>'img-thumbnail img-responsive'
                                        );
                                        echo img($properties);
                                    }
                                ?>
                            </a>
                            <div class="caption">
                                <a href="<?php echo site_url('anime').'/'.$submission['id'] ?>">
                                    <h4><?php echo $submission['name'] ?></h4>
                                </a>
                                <p class="text-muted">Aired <?php echo $submission['airing'] ?></p>
                                <p class="text-muted"><?php echo number_format(rand(0, 5000)) ?> viewers</p>
                            </div>
                        </div>
                    <?php
                        if($i == 3) {
                    ?>
                    </div>
                    <?php
                            $i = 1;
                        }
                        else {
                            $i = $i + 1;
                        }
                    ?>
                    <?php
                        endforeach;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>