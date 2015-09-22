<!DOCTYPE html>
<html>
    <head>
        <title>Ellilog - Dashboard</title>
    </head>
    <body>
        <h1>Ellilog</h1>
        <h2>Dashboard</h2>
        <h3>Welcome</h3>
        <p>Dashboard: <?php echo $data; ?></p>

        <form action="/log" method="POST">
            User: <select id="user" name="user">
                <?php foreach($users as $user) { ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->first_name . ' ' . $user->last_name; ?></option>
                <?php } ?>
            </select>

            Baby: <select id="baby" name="baby">
                <?php foreach($babies as $baby) { ?>
                <option value="<?php echo $baby->id; ?>"><?php echo $baby->first_name . ' ' . $baby->last_name; ?></option>
                <?php } ?>
            </select>

            Thing: <select id="thing" name="thing">
                <?php foreach($things as $thing) { ?>
                <option value="<?php echo $thing->thing; ?>"><?php echo $thing->thing; ?></option>
                <?php } ?>
            </select>
        </form>
    </body>
</html>
