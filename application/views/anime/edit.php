<div class="container">
    <a href="<?php echo site_url('anime').'/'.$anime_id ?>" class="btn btn-default"><i class="fa fa-angle-left"></i> Go Back?</a>
    <h1>Edit Anime Information</h1>
    <div class="alert alert-info">
        <strong>NOTE: </strong>Your changes here will reflect for everyone on this site.
    </div>
    <div class="alert alert-info">
        <strong>Remember: </strong>If you don't want to make any changes to a field, leave it blank.
    </div>
    <?php
        if(validation_errors()) {
    ?>
    <div class="alert alert-danger">
        <?php
            echo validation_errors();
        ?>
    </div>
    <?php
        }
    ?>
    <?php echo form_open_multipart(site_url('anime/edit').'/'.$anime_id, array('class'=>'form-horizontal', 'role'=>'form')) ?>
        <?php
            if(form_error('anime-title')) {
        ?>
        <div class="form-group has-error">
        <?php
            }
            else {
        ?>
        <div class="form-group">
        <?php } ?>
            <label for="animeInputName" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
                <?php
                    $title_input = array(
                        'name'=>'anime-title',
                        'class'=>'form-control',
                        'id'=>'animeInputTitle',
                        'placeholder'=>'Title'
                    );
                    
                    echo form_input($title_input);
                ?>
                <span class="help-block">Your anime's title is currently set to <strong><?php echo $curr_anime->name ?></strong>.</span>
                <span class="help-block">As much as possible, input your anime in <i>romaji</i> (roman character representation) to help non-Japanese users find it. Also, put in the full name of the anime, and do not abbreviate anything.</span>
            </div>
        </div>
        <script>
            // Script for date picker
             $(function() {
                $( "#animeInputAiring" ).datepicker({ dateFormat: "yy-mm-dd" });
            });
        </script>
        <?php
            if(form_error('anime-airing')) {
        ?>
        <div class="form-group has-error">
        <?php
            }
            else {
        ?>
        <div class="form-group">
        <?php
            }
        ?>
            <label for="animeInputAiring" class="col-sm-2 control-label">Airing Date</label>
            <div class="col-sm-4">
                <?php
                    $title_input = array(
                        'name'=>'anime-airing',
                        'value'=>$curr_anime->airing,
                        'class'=>'form-control',
                        'id'=>'animeInputAiring',
                        'type'=>'date',
                        'placeholder'=>'Airing Date'
                    );
                    echo form_input($title_input);
                ?>
            </div>
            <span class="help-block col-sm-6">
                <?php echo $curr_anime->name ?>'s airing date is currently set to <strong><?php echo mdate("%M %d %Y", mysql_to_unix($curr_anime->airing)) ?></strong>.
                <br/>
                <b><i>The format is yyyy-mm-dd.</i></b> Put the exact airing date of the anime, wherever it was aired first. In the case of movies or anything not broadcasted on television, use its release date instead.
            </span>
        </div>
        <?php
            if(form_error('anime-episodes')) {
        ?>
        <div class="form-group has-error">
        <?php
            }
            else {
        ?>
        <div class="form-group">
        <?php
            }
        ?>
            <label for="animeInputAiring" class="col-sm-2 control-label">Episodes</label>
            <div class="col-sm-4">
                <?php
                    $title_input = array(
                        'name'=>'anime-episodes',
                        'value'=>$curr_anime->episodes,
                        'class'=>'form-control',
                        'id'=>'animeInputEpisodes',
                        'type'=>'date',
                        'placeholder'=>'Episodes'
                    );
                    echo form_input($title_input);
                ?>
            </div>
            <span class="help-block col-sm-6">
                <?php echo $curr_anime->name ?> currently has <strong><?php echo $curr_anime->episodes ?></strong> episodes in total.
                <br/>
                If the total number of episodes are unknown, put a zero (0) here.
            </span>
        </div>
        <?php
            if(form_error('anime-synopsis')) {
        ?>
        <div class="form-group has-error">
        <?php
            }
            else {
        ?>
        <div class="form-group">
        <?php
            }
        ?>
            <label for="animeInputSynopsis" class="col-sm-2 control-label">Synopsis</label>
            <div class="col-sm-4">
                <?php
                    echo form_textarea(array(
                        'name'=>'anime-synopsis',
                        'value'=>$curr_anime->synopsis,
                        'id'=>'animeInputSynopsis',
                        'class'=>'form-control',
                        'placeholder'=>'Synopsis'
                    ));
                ?>
            </div>
            <span class="help-block col-sm-6">As much as possible, copy and paste the official synopsis released by the anime's artists/production companies, and not your own thoughts on the anime. This will help verify the authenticity and accuracy of your submissions, as well as help other users find it.</span>
        </div>
        <div class="form-group">
            <label for="animeInputImage" class="col-sm-2 control-label">Image</label>
            <div class="col-sm-4">
                <?php
                    if(isset($curr_anime->image)) {
                        echo img(array(
                            'src'=>base_url('upload/anime').'/'.$curr_anime->image,
                            'alt'=>$curr_anime->name.' image',
                            'class'=>'img-thumbnail'
                        ));
                    }
                    else {
                        echo img(array(
                            'src'=>base_url('static').'/'.'anime_placeholder.gif',
                            'alt'=>'Anime image',
                            'class'=>'img-thumbnail'
                        ));
                    }
                ?>
                <input type="file" name="userfile" size="20"/>
            </div>
            <span class="help-block col-sm-6">Please upload the anime's release poster (or other official promotional artwork by the artists/production companies), rather than a screenshot of the anime. This will help users and the system verify the authenticity of the anime.</span>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-4">
                <button class="btn btn-primary pull-right" type="submit">Submit</button>
            </div>
            <span class="help-block col-sm-6">Please review the accuracy and authenticity of all fields before submitting.</span>
        </div>
</div>