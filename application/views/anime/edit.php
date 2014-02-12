<div class="container">
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
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Edit Anime Information
                        <a href="<?php echo site_url('anime').'/'.$anime_id ?>" class="pull-right"><i class="fa fa-long-arrow-left"></i> Click here to go back.</a>
                    </h1>
                </div>
                <div class="panel-body">
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
                            <label for="animeInputName" class="col-sm-2 control-label">Title*</label>
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
                            <label for="animeInputAiring" class="col-sm-2 control-label">Airing Date*</label>
                            <div class="col-sm-6">
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
                            <span class="help-block col-sm-4">
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
                            <label for="animeInputAiring" class="col-sm-2 control-label">Episodes*</label>
                            <div class="col-sm-6">
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
                            <span class="help-block col-sm-4">
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
                            <label for="animeInputSynopsis" class="col-sm-2 control-label">Synopsis*</label>
                            <div class="col-sm-6">
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
                            <span class="help-block col-sm-4">As much as possible, copy and paste the official synopsis released by the anime's artists/production companies, and not your own thoughts on the anime. This will help verify the authenticity and accuracy of your submissions, as well as help other users find it.</span>
                        </div>
                        <div class="form-group">
                            <label for="animeInputImage" class="col-sm-2 control-label">Image*</label>
                            <div class="col-sm-6">
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
                            <span class="help-block col-sm-4">Please upload the anime's release poster (or other official promotional artwork by the artists/production companies), rather than a screenshot of the anime. This will help users and the system verify the authenticity of the anime.</span>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button class="btn btn-primary pull-right" type="submit">Submit</button>
                            </div>
                            <span class="help-block col-sm-4">Please review the accuracy and authenticity of all fields before submitting.</span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Delete your anime</h1>
                </div>
                <div class="panel-body">
                    <p class="text-danger"><strong>WARNING!</strong> This action is irreversible.</p>
                    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteModal" type="button"><i class="fa fa-times"></i> Delete Anime</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<?php # warning modal ?>
<div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h3 class="modal-title" id="deleteModalLabel">Are you sure about this?</h3>
            </div>
            <div class="modal-body">
                <p class="text-danger">If you delete your anime now, the following actions will be performed:</p>
                <ul class="fa-ul">
                    <?php
                        /*
                         * There should  be code here that retrieves the number of viewers an anime has,
                         * but at this time we haven't implmented that yet so we will use random values
                         * for now.
                         */
                    ?>
                    <li>
                        <i class="fa-li fa fa-frown-o"></i>
                        <strong><?php echo $curr_anime->name ?></strong> has <?php echo number_format(rand(0, 5000)) ?> viewers. If you delete it, they will still be able to track their watching habits.
                    </li>
                    <li>
                        <i class="fa-li fa fa-users"></i>
                        Other users will not be able to find this anime, and it will not show up in searches.
                    </li>
                    <li>
                        <i class="fa-li fa fa-pencil"></i>
                        Other people (you included) can create a new entry for this anime, even with exactly the same name.
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <p class="text-danger">Are you still sure about deleting <strong><?php echo $curr_anime->name ?></strong>? This action <strong>CANNOT BE REVERTED!</strong></p>
                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-o-up"></i> Yes, I'm sure!</a>
            </div>
        </div>
    </div>
</div>