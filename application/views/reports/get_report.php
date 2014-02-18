<div class="container">
    <div class="text-center">
        <?php
        if($success) {
        ?>
        <h1><i class="fa fa-thumbs-o-up fa-5x"></i></h1>
        <h3>Thanks!</h3>
        <p>Your report has been submitted and the admins will look into it as soon as possible.</p>
        <?php
        }
        else {
        ?>
        <h1><i class="fa fa-meh-o fa-5x"></i></h1>
        <h3>Sorry...</h3>
        <p>You forgot to add a comment for your report. Please try again.</p>
        <?php
        }
        ?>
        <a href="<?php echo site_url('anime').'/'.$anime->id ?>" class="btn btn-success">Go back</a>
    </div>
</div>