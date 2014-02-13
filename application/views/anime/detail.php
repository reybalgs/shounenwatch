<div class="container">
    <?php
        if(isset($submit_success)) {
    ?>
    <div class="alert alert-success">
        <p>Your anime has been successfully submitted!</p>
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
            <p>Aired at <?php echo mdate("%M %d %Y", mysql_to_unix($anime->airing)) ?></p>
            <p>Total Episodes: <?php echo $anime->episodes ?></p>
            <p><?php echo number_format(count($this->watching_model->get_watching_anime($anime->id))) ?> people are watching this.</p>
            <h2>Synopsis</h2>
            <p><?php echo nl2br($anime->synopsis) ?></p>
            <div class="btn-group">
                <?php
                    if($this->session->userdata('username') == $user->username) {
                ?>
                <a href="<?php echo site_url('anime/edit').'/'.$anime->id ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Information</a>
                <?php
                    }
                    else {
                ?>
                <button type="button" class="btn btn-primary" disabled="disabled">Edit Information</button>
                <?php
                    }
                    if($this->watching_model->check_if_watching($user->id, $anime->id)) {
                ?>
                <a href="<?php echo site_url('anime/remove_from_watchlist').'/'.$anime->id?>" class="btn btn-danger"><i class="fa fa-times"></i> Remove from Watching</a>
                <?php
                    }
                    else {
                ?>
                <a href="<?php echo site_url('anime/add_to_watchlist').'/'.$anime->id?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add to Watching List</a>
                <?php
                    }
                ?>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Rate This Anime <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">No rating</a></li>
                    <li><a href="#">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star-empty">
                        <span class="glyphicon glyphicon-star-empty">
                        <span class="glyphicon glyphicon-star-empty">
                        <span class="glyphicon glyphicon-star-empty">
                        </span>
                    </a></li>
                    <li><a href="#">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star-empty">
                        <span class="glyphicon glyphicon-star-empty">
                        <span class="glyphicon glyphicon-star-empty">
                        </span>
                    </a></li>
                    <li><a href="#">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star-empty">
                        <span class="glyphicon glyphicon-star-empty">
                        </span>
                    </a></li>
                    <li><a href="#">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star-empty">
                        </span>
                    </a></li>
                    <li><a href="#">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        <span class="glyphicon glyphicon-star">
                        </span>
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>