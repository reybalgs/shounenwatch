<div class="container">
    <h1 class="page-header">
        Manage Your Watchlist
    </h1>
    <?php
    if(validation_errors()) {
    ?>
    <div class="alert alert-danger">
        <?php echo validation_errors() ?>
    </div>
    <?php
    }
    if($done) {
    ?>
    <div class="alert alert-success">
        Your watchlist is successfully updated.
    </div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Your watchlist
                    </h1>
                </div>
                <div class="panel-body">
                    <?php echo form_open('user/manage_watchlist'.'/'.$user->id, array(
                        "role"=>"form"
                    )); ?>
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <tr>
                            <th>Anime Title</th>
                            <th>Current Episode</th>
                            <th>Total Episodes</th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach($watchlist as $anime) {
                        ?>
                        <tr>
                            <td style="vertical-align: middle"><?php echo $anime['name']?></td>
                            <td>
                                <input type="number" style="vertical-align: middle" class="form-control input-xs" id="epInput<?php echo $i?>" name="epInput<?php echo $i?>" min="0" size="2" step="1" value="<?php echo $anime['currentEpisode']?>"/>
                            </td>
                            <td style="vertical-align: middle">
                            <?php
                            if($anime['episodes'] > 0) {
                                echo $anime['episodes'];
                            }
                            else {
                                echo 'Unknown';
                            }
                            ?>
                            </td>
                        </tr>
                        <?php
                        $i = $i + 1;
                        }
                        ?>
                    </table>
                    <button type="submit" class="btn btn-default btn-success pull-right">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">
                        Heads up!
                    </h1>
                </div>
                <div class="panel-body">
                    <h3>How to manage your watchlist</h3>
                    <p class="text-justify">
                        To set the episode you're currently on in an anime, click its <strong>Current Episode</strong> box a field and type in your current episode there. Remember that you can only input a number within the number of episodes, but if the anime has an unknown number of episodes, you can put whatever you want here.
                    </p>
                    <h3>About your watchlist</h3>
                    <p class="text-justify">
                        Your <strong>watchlist</strong> is a list of anime that you plan on watching or are watching already.
                    </p>
                    <p class="text-justify">
                        When you watch an anime, you can track which episode you are currently on out of all the episodes of the anime (if the anime does not have a definite total number of episodes, you can still track your progres nonetheless). Keep in mind that other people can see your watchlist, but don't worry, since all the anime on ShounenWatch are shounen anime, nobody here is going to judge your tastes!
                    </p>
                    <p class="text-justify">
                        Remember: You can add anime to your wishlist by clicking the "Add to Watch List" button when viewing an anime in detail, whenever you have not done so already.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
