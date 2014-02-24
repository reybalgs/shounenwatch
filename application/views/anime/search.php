<div class="container">
    <h1 class="page-header">Search Anime</h1>
    <?php
    if(validation_errors()) {
    ?>
    <div class="alert alert-info">
        <?php echo validation_errors() ?>
    </div>
    <?php
    }
    ?>
    <p class="text-muted">Enter the title of the anime you're looking for on the box below.</p>
    <?php echo form_open(site_url('anime/search'), array("class"=>"form-inline", "role"=>"form")); ?>
    <div class="input-group">
        <?php
        $search_input = array(
            'name'=>'search-input',
            'value'=>set_value('search-input'),
            'class'=>'form-control',
            'id'=>'searchInput',
            'type'=>'text',
            'placeholder'=>'Search'
        );
        echo form_input($search_input);
        ?>
        <span class="input-group-btn">
            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
        </span>
    </div>
    <br/>
    <?php
    if(!(is_null($anime_list))) {
    ?>
    <p><strong><?php echo count($anime_list) ?></strong> results were found.</p>
    <?php
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
                <p class="text-muted"><i class="fa fa-calendar"></i> Aired <?php echo mdate("%M %d %Y", mysql_to_unix($anime['airing'])) ?></p>
                <p class="text-muted"><i class="fa fa-users"></i> <?php echo number_format(count($this->watching_model->get_watching_anime($anime['id']))) ?> viewers</p>
                <p class="text-muted">Rating: <?php echo $this->rating_model->get_rating_stars($this->rating_model->get_rating_average($this->rating_model->get_all_ratings_from_anime($anime['id']))) ?> <?php echo $this->rating_model->get_rating_average($this->rating_model->get_all_ratings_from_anime($anime['id'])) ?> (<?php echo count($this->rating_model->get_all_ratings_from_anime($anime['id'])) ?>)</p>
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
        echo $links;
    }
    if($empty) {
    ?>
    <div class="col-xs-4 col-xs-offset-4 text-center">
        <h1><i class="fa fa-question-circle fa-5x"></i></h1>
        <h3>Sorry, no results were found!</h3>
        <p>Please try again.</p>
    </div>
    <?php
    }
    ?>
</div>