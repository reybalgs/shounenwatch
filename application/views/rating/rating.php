<div class="container">
    <h2>All ratings</h2>
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
    <h2>Reluctant Hero ratings</h2>
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
        foreach($reluctanthero as $rating) {
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
    <p class="text-right">Average rating: <?php echo $rhaverage?></p>
    <h2>phoenixwright's ratings</h2>
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
        foreach($phoenixwright as $rating) {
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
    <h2>phoenix wright's ace attorney ratings</h2>
    <table class="table table-striped table-bordered">
        <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Anime ID</th>
            <th>Anime Title</th>
            <th>Rating ID</th>
            <th>Rating</th>
        </tr>
        <tr>
            <td><?php echo $pwaarating->userID ?></td>
            <td><?php echo $pwaarating->username ?></td>
            <td><?php echo $pwaarating->animeID ?></td>
            <td><?php echo $pwaarating->name ?></td>
            <td><?php echo $pwaarating->ratingID ?></td>
            <td><?php echo $pwaarating->rating ?></td>
    </table>
</div>