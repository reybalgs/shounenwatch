<div class="container">
    <?php
        if(isset($submit_success)) {
    ?>
    <div class="alert alert-success">
        <p>Your anime has been successfully submitted!</p>
    </div>
    <?php
        }
        if(!($anime->active)) {
    ?>
    <div class="alert alert-warning">
        <h3>WARNING!</h3>
        <p>This anime has been deleted by its original submitter and has been made inactive. You can still track your progress on it, however.</p>
    </div>
    <?php
        }
    ?>
    <div class="row">
        <div class="col-sm-4">
            <?php
                if(empty($anime->image)) {
                    $properties = array(
                        'src'=>base_url('static').'/'.'anime_placeholder.gif',
                        'class'=>'img-thumbnail img-responsive'
                    );
                }
                else {
                    $properties = array(
                        'src'=>base_url('upload/anime').'/'.$anime->image,
                        'class'=>'img-thumbnail img-responsive'
                    );
                }
                echo img($properties);
            ?>
        </div>
        <div class="col-sm-8">
            <h1><?php echo $anime->name ?></h1>
            <h4>Submitted by <a href="<?php echo site_url('user/profile').'/'.$submitter->username ?>"><?php echo $submitter->username ?></a></h4>
            <p>Aired at <?php echo mdate("%M %d %Y", mysql_to_unix($anime->airing)) ?></p>
            <p>Total Episodes:
            <?php
            if($anime->episodes > 0) {
                echo $anime->episodes;
            }
            else {
                echo 'Unknown';
            }
            ?>
            </p>
            <p><?php echo number_format(count($this->watching_model->get_watching_anime($anime->id))) ?> people are watching this.</p>
            <p>Rating: <?php echo $this->rating_model->get_rating_stars($rating) ?> <?php echo $rating / 1.0 ?> (<?php echo count($ratings) ?> ratings)
            </p>
            <h2>Synopsis</h2>
            <p><?php echo nl2br($anime->synopsis) ?></p>
            <?php
            if($this->session->userdata('logged_in')) {
            ?>
                <div class="btn-group">
                    <?php
                        if($this->session->userdata('username') == $submitter->username) {
                    ?>
                    <a href="<?php echo site_url('anime/edit').'/'.$anime->id ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Information</a>
                    <?php
                        }
                        else {
                    ?>
                    <button type="button" class="btn btn-primary" disabled="disabled">Edit Information</button>
                    <?php
                        }
                        if($this->session->userdata('username')) {
                            if($watching) {
                    ?>
                    <a href="<?php echo site_url('anime/remove_from_watchlist').'/'.$anime->id?>" class="btn btn-danger"><i class="fa fa-times"></i> Drop from Watching</a>
                    <?php
                            }
                            else {
                    ?>
                    <a href="<?php echo site_url('anime/add_to_watchlist').'/'.$anime->id?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add to Watching List</a>
                    <?php
                            }
                        }
                        else {
                    ?>
                    <button type="button" class="btn btn-default" disabled="disabled">Log in to add to watchlist</button>
                    <?php
                        }
                    ?>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $user_rating = $this->rating_model->get_user_anime_rating($this->session->userdata('user_id'), $anime->id);
                        if($user_rating) {
                            echo 'Your rating: '.$this->rating_model->get_rating_stars($user_rating->rating).' <i class="fa fa-caret-down"></i>';
                        }
                        else {
                        ?>
                        Rate This Anime <i class="fa fa-caret-down"></i>
                        <?php
                        }
                        ?>
                    </button>
                    <ul class="dropdown-menu">
                        <?php
                        if($user_rating) {
                        ?>
                        <li><a href="<?php echo site_url('rating/remove').'/'.$user_rating->ratingID.'/'.$anime->id?>">Remove your rating</a></li>
                        <?php
                        }
                        ?>
                        <li><a href="<?php echo site_url('rating/set').'/'.$anime->id.'/'.$this->session->userdata('user_id').'/'.'1' ?>">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </a></li>
                        <li><a href="<?php echo site_url('rating/set').'/'.$anime->id.'/'.$this->session->userdata('user_id').'/'.'2' ?>">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </a></li>
                        <li><a href="<?php echo site_url('rating/set').'/'.$anime->id.'/'.$this->session->userdata('user_id').'/'.'3' ?>">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </a></li>
                        <li><a href="<?php echo site_url('rating/set').'/'.$anime->id.'/'.$this->session->userdata('user_id').'/'.'4' ?>">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </a></li>
                        <li><a href="<?php echo site_url('rating/set').'/'.$anime->id.'/'.$this->session->userdata('user_id').'/'.'5' ?>">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </a></li>
                    </ul>
                    <button type="button" class="btn btn-warning"><i class="fa fa-exclamation-circle"></i> Report Anime</button>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>