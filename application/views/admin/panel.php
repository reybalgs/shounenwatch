<div class="container">
    <h1 class="page-header">ShounenWatch Admin Panel</h1>
    <?php
    if($message) {
    ?>
    <div class="alert alert-info">
        <p><?php echo $message ?></p>
    </div>
    <?php
    }
    if($error) {
    ?>
    <div class="alert alert-danger">
        <p><?php echo $error ?></p>
    </div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#home" data-toggle="pill">Home</a></li>
                <li><a href="#users" data-toggle="pill">Users</a></li>
                <li><a href="#anime" data-toggle="pill">Anime</a></li>
                <li><a href="#reports" data-toggle="pill">Reports</a></li>
                <li><a href="#statistics" data-toggle="pill">Statistics</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <h2>Welcome to the ShounenWatch Admin Panel.</h2>
                    <h3>What is this?</h3>
                    <p>
                        The Admin Panel is where you, as the admin, can manage the inner workings of ShounenWatch, such as adding, deleting and editing submissions at will.
                    </p>
                    <p><strong>REMEMBER:</strong> With great power comes great responsibility.</p>
                    <p>To get started, check out the options on the left.</p>
                </div>
                <div class="tab-pane fade" id="users">
                    <h2>Users</h2>
                    <h3>What is this?</h3>
                    <p>
                        The Users tab is where you can view a list of all the users, and do all sorts of things with them, including adding new users and deleting existing ones.
                    </p>
                    <h3>Full User List</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>About</th>
                        </tr>
                        <?php
                        foreach($users as $user) {
                        ?>
                        <tr>
                            <td><?php echo $user['id'] ?></td>
                            <td><a href="<?php echo site_url('user/profile').'/'.$user['username']?>"><?php echo $user['username'] ?></a></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo substr(nl2br($user['about']), 0, 80) ?>...</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="anime">
                    <h2>Anime</h2>
                    <h3>What is this?</h3>
                    <p>
                        The Anime tab is where you can see all the anime submitted to the system in one whole list.
                    </p>
                    <h3>Full Anime List</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Submitter</th>
                            <th>Airing Date</th>
                            <th>Synopsis</th>
                            <th>Episodes</th>
                        </tr>
                        <?php
                        foreach($anime as $submission) {
                        ?>
                        <tr>
                            <td><?php echo $submission['id'] ?></td>
                            <td><a href="<?php echo site_url('anime').'/'.$submission['id']?>"><?php echo $submission['name'] ?></a></td>
                            <td><?php echo $submission['username'] ?></td>
                            <td><?php echo $submission['airing'] ?></td>
                            <td><?php echo substr(nl2br($submission['synopsis']), 0, 80) ?>...</td>
                            <td><?php echo $submission['episodes'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="reports">
                    <h2>Reports</h2>
                    <h3>What is this?</h3>
                    <p>
                        The Reports tab is where you can view all the reports submitted by users, and resolve them when necessary.
                    </p>
                    <h3>Full Reports List</h3>
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Anime</th>
                            <th>Comment</th>
                            <th>Resolve</th>
                        </tr>
                        <?php
                        foreach($reports as $report) {
                        ?>
                        <tr>
                            <td><?php echo $report['reportID']?></td>
                            <td><a href="<?php echo site_url('user/profile').'/'.$report['username']?>"><?php echo $report['username']?></a></td>
                            <td><a href="<?php echo site_url('anime').'/'.$report['animeID']?>"><?php echo $report['name']?></a></td>
                            <td><?php echo nl2br($report['comment']) ?></td>
                            <td><a href="<?php echo site_url('reports/resolve_report').'/'.$report['reportID']?>" class="btn btn-success">Resolve</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="statistics">
                    <p>Statistics be here</p>
                </div>
            </div>
        </div>
    </div>
</div>