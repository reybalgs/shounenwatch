<div class="container">
    <h1>Reports test</h1>
    <table class="table table-bordered">
        <tr>
            <th>Report ID</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Anime ID</th>
            <th>Anime Title</th>
            <th>Comment</th>
        </tr>
        <?php
        foreach($reports as $report) {
        ?>
        <tr>
            <td><?php echo $report['reportID'] ?></td>
            <td><?php echo $report['userID'] ?></td>
            <td><?php echo $report['username'] ?></td>
            <td><?php echo $report['animeID'] ?></td>
            <td><?php echo $report['name'] ?></td>
            <td><?php echo $report['comment'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <h1>Reports on Shitty Anime</h1>
    <table class="table table-bordered">
        <tr>
            <th>Report ID</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Anime ID</th>
            <th>Anime Title</th>
            <th>Comment</th>
        </tr>
        <?php
        foreach($sa_reports as $report) {
        ?>
        <tr>
            <td><?php echo $report['reportID'] ?></td>
            <td><?php echo $report['userID'] ?></td>
            <td><?php echo $report['username'] ?></td>
            <td><?php echo $report['animeID'] ?></td>
            <td><?php echo $report['name'] ?></td>
            <td><?php echo $report['comment'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <h1>Reports by Mr. Torgue</h1>
    <table class="table table-bordered">
        <tr>
            <th>Report ID</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Anime ID</th>
            <th>Anime Title</th>
            <th>Comment</th>
        </tr>
        <?php
        foreach($torgue_reports as $report) {
        ?>
        <tr>
            <td><?php echo $report['reportID'] ?></td>
            <td><?php echo $report['userID'] ?></td>
            <td><?php echo $report['username'] ?></td>
            <td><?php echo $report['animeID'] ?></td>
            <td><?php echo $report['name'] ?></td>
            <td><?php echo $report['comment'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>