<div class="container">
    <p>Apparently here is what everybody is watching at the moment:</p>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Username</td>
            <td>Anime Title</td>
            <td>Current Episode</td>
            <td>Total Episodes</td>
        </tr>
        <?php
        foreach($watchlist as $watch) {
        ?>
        <tr>
            <td><?php echo $watch['username'] ?></td>
            <td><?php echo $watch['name'] ?></td>
            <td><?php echo $watch['currentEpisode'] ?></td>
            <td><?php echo $watch['episodes'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <p>Total watching: <?php echo count($watchlist) ?></p>
</div>