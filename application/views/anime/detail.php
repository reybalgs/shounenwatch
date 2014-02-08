<div class="container">
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
                <button type="button" class="btn btn-primary">Edit Information</button>
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