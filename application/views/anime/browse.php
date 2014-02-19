<div class="container">
    <?php
    if($type == 'all') {
    ?>
    <h1 class="page-header">All anime</h1>
    <p>
        Below is a list of all anime submitted into the ShounenWatch service.
    </p>
    <?php
    }
    else if($type == 'watching') {
    ?>
    <h1 class="page-header">Most Watched</h1>
    <p>
        Below is a list of the most watched anime in the ShounenWatch service, arranged in descending order.
    </p>
    <?php
    }
    else if($type == 'rating') {
    ?>
    <h1 class="page-header">Highest Rated</h1>
    <p>
        Below is a list of the highest rated anime in the ShounenWatch service, arranged in descending order.
    </p>
    <?php
    }
        if(!(empty($anime_list))) {
        $i = 1;
        $end_anime = end($anime_list);
        foreach($anime_list as $anime) {
            if($anime['active']) {
                if($i == 1) {
    ?>
    <div class="row" style="padding-bottom: 2em">
    <?php
                }
    ?>
        <div class="col-sm-3 col-md-3">
            <a href="<?php echo site_url('anime').'/'.$anime['id'] ?>" class="thumbnail">
                <?php
                if(empty($anime['image'])) {
                    $properties = array(
                        'src'=>base_url('static').'/'.'anime_placeholder.gif',
                        'class'=>'img-thumbnail img-responsive'
                    );
                }
                else {
                    $properties = array(
                        'src'=>base_url('upload/anime').'/'.$anime['image'],
                        'class'=>'img-thumbnail img-responsive'
                    );
                }
                echo img($properties);
                ?>
            </a>
            <div class="caption">
                <a href="<?php echo site_url('anime').'/'.$anime['id'] ?>">
                    <h4><?php echo $anime['name'] ?></h4>
                </a>
                <p class="text-muted"><i class="fa fa-video-camera"></i> Aired <?php echo mdate("%M %d %Y", mysql_to_unix($anime['airing'])) ?></p>
                <p class="text-muted"><i ckass="fa fa-users"></i> <?php echo number_format(count($this->watching_model->get_watching_anime($anime['id']))) ?> viewers</p>
                <p class="text-muted">Rating: <?php echo $this->rating_model->get_rating_stars($this->rating_model->get_rating_average($this->rating_model->get_all_ratings_from_anime($anime['id']))) ?></p>
            </div>
        </div>
    <?php
                if($i == 4) {
    ?>
    </div>
    <?php
                    $i = 1;
                }
                else {
                    $i = $i + 1;
                    if($anime['id'] == $end_anime['id']) {
                        # No more anime for the list
    ?>
    </div>
    <?php
                    }
                }
            }
        }
    }
    ?>
    <?php echo $links ?>
</div>