<div class="container">
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
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Submit New Anime
                    </h1>
                </div>
                <div class="panel-body">
                    <?php echo form_open_multipart(site_url('anime/submit'), array('class'=>'form-horizontal', 'role'=>'form')) ?>
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
                                        'value'=>set_value('anime-title'),
                                        'class'=>'form-control',
                                        'id'=>'animeInputTitle',
                                        'placeholder'=>'Title'
                                    );
                                    
                                    echo form_input($title_input);
                                ?>
                                <span class="help-block text-justify">As much as possible, input your anime in <i>romaji</i> (roman character representation) to help non-Japanese users find it. Also, put in the full name of the anime, and do not abbreviate anything.</span>
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
                                        'value'=>set_value('anime-airing'),
                                        'class'=>'form-control',
                                        'id'=>'animeInputAiring',
                                        'type'=>'date',
                                        'placeholder'=>'Airing Date'
                                    );
                                    echo form_input($title_input);
                                ?>
                            </div>
                            <span class="help-block col-sm-4 text-justify"><b><i>The format is yyyy-mm-dd.</i></b> Put the exact airing date of the anime, wherever it was aired first. In the case of movies or anything not broadcasted on television, use its release date instead.</span>
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
                                        'value'=>set_value('anime-episodes'),
                                        'class'=>'form-control',
                                        'id'=>'animeInputEpisodes',
                                        'type'=>'date',
                                        'placeholder'=>'Episodes'
                                    );
                                    echo form_input($title_input);
                                ?>
                            </div>
                            <span class="help-block col-sm-4 text-justify">If the total number of episodes are unknown, put a zero (0) here.</span>
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
                                        'value'=>set_value('anime-synopsis'),
                                        'id'=>'animeInputSynopsis',
                                        'class'=>'form-control',
                                        'placeholder'=>'Synopsis'
                                    ));
                                ?>
                            </div>
                            <span class="help-block col-sm-4 text-justify">As much as possible, copy and paste the official synopsis released by the anime's artists/production companies, and not your own thoughts on the anime. This will help verify the authenticity and accuracy of your submissions, as well as help other users find it.</span>
                        </div>
                        <div class="form-group">
                            <label for="animeInputImage" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <?php
                                    echo img(array(
                                        'src'=>base_url('static').'/'.'anime_placeholder.gif',
                                        'alt'=>'Anime image',
                                        'class'=>'img-thumbnail'
                                    ));
                                ?>
                                <input type="file" name="userfile" size="20"/>
                            </div>
                            <span class="help-block col-sm-4 text-justify">Please upload the anime's release poster (or other official promotional artwork by the artists/production companies), rather than a screenshot of the anime. This will help users and the system verify the authenticity of the anime.</span>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button class="btn btn-success pull-right" type="submit">Submit</button>
                            </div>
                            <span class="help-block col-sm-4 text-justify">Please review the accuracy and authenticity of all fields before submitting.</span>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Remember!
                    </h1>
                </div>
                <div class="panel-body">
                    <p class="text-muted">Before posting new anime, be sure to check out our rules, as well as to see if the anime you're posting is already here.</p>
                </div>
            </div>
        </div>
    </div>
</div>