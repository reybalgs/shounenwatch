<div class="container">
    <?php
        if(isset($submit_success)) {
    ?>
    <div class="alert alert-success">
        <p>Your anime has been successfully submitted!</p>
    </div>
    <?php
        }
        if(isset($image_errors)) {
    ?>
    <div class="alert alert-danger">
        <p><?php echo $image_errors ?></p>
    </div>
    <?php
        }
    ?>
    <div class="row">
        <div class="col-xs-4">
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
        <div class="col-xs-8">
            <h1><?php echo $anime->name ?></h1>
            <p>Aired at <?php echo mdate("%M %d %Y", mysql_to_unix($anime->airing)) ?></p>
            <p>Total Episodes: <?php echo $anime->episodes ?></p>
            <p><?php echo number_format(rand(0, 5000)) ?> people are watching this.</p>
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
                ?>
                <button type="button" class="btn btn-default">Add to Watching</button>
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