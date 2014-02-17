<div class="container">
    <table class="table table-striped table-bordered">
        <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Anime ID</th>
            <th>Anime Title</th>
            <th>Rating ID</th>
            <th>Rating</th>
        </tr>
        <?php
        foreach($ratings as $rating) {
        ?>
        <tr>
            <td><?php echo $rating['userID'] ?></td>
            <td><?php echo $rating['username'] ?></td>
            <td><?php echo $rating['animeID'] ?></td>
            <td><?php echo $rating['name'] ?></td>
            <td><?php echo $rating['ratingID'] ?></td>
            <td><?php echo $rating['rating'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>