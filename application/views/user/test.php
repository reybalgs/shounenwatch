<html>
    <head>Test</head>
    <body>
        <h2>Users list</h2>
        
        <?php foreach($users as $user): ?>
            <strong>ID: </strong><?php echo $user['id']; ?></br>
            <strong>Username: </strong><?php echo $user['username']; ?></br>
            <strong>About: </strong><?php echo $user['about']; ?></br>
            </br>
        <?php endforeach ?>
    </body>
</html>