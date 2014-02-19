<div class="container">
    <?php
    if($user->active) {
    ?>
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
                        <h1><i class="fa fa-question-circle fa-5x"></i></h1>
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
                            $end_anime = end($anime);
                            $i = 1;
                            foreach($anime as $submission):
                            if($submission['active']) {
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
                                <p class="text-muted"><i class="fa fa-video-camera"></i> Aired <?php echo mdate("%M %d %Y", mysql_to_unix($submission['airing'])) ?></p>
                                <p class="text-muted"><i class="fa fa-users"></i> <?php echo number_format(count($this->watching_model->get_watching_anime($submission['id']))) ?> viewers</p>
                                <p class="text-muted">Rating: <?php echo $this->rating_model->get_rating_stars($this->rating_model->get_rating_average($this->rating_model->get_all_ratings_from_anime($submission['id']))) ?></p>
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
                            if($end_anime['id'] == $submission['id']) {
                                # There aren't any more anime next to list
                    ?>
            </div>
                    <?php
                            }
                        }
                    ?>
                    <?php
                            }
                        endforeach;
                        }
                    ?>
            <?php echo $links ?>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Watchlist
                        <?php
                            if($this->session->userdata('username') == $username) {
                        ?>
                        <a href="<?php echo site_url('user/manage_watchlist').'/'.$user->id?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-pencil"></i> Manage</a>
                        <?php
                            }
                        ?>
                    </h1>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Anime Title</th>
                            <th>Current Episode</th>
                            <th>Total Episodes</th>
                        </tr>
                        <?php
                            foreach($watchlist as $watched_anime) {
                        ?>
                        <tr>
                            <td><a href="<?php echo site_url('anime').'/'.$watched_anime['animeID'] ?>"><?php echo $watched_anime['name'] ?></a></td>
                            <td><?php echo $watched_anime['currentEpisode'] ?></td>
                            <td>
                                <?php
                                if($watched_anime['episodes'] > 0) {
                                    echo $watched_anime['episodes'];
                                }
                                else {
                                    echo 'Unknown';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    else {
    ?>
    <h1 class="text-center"><i class="fa fa-frown-o fa-5x"></i></h1>
    <p class="text-center">This user profile has been deleted.</p>
    <?php
    }
    ?>
</div>