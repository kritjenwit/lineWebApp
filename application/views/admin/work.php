<h1 class="display-4"><?php echo $title ?></h1>

<table class="table table-hover">
    <thead>
    <tr>
        <td>id</td>
        <td>User's name</td>
        <td>Work name</td>
        <td>done</td>
        <td>sent</td>
        <td>created_at</td>
        <td>updated_at</td>
        <td>Operation</td>
        <td>Status</td>
    </tr>
    </thead>

    <?php foreach ($works as $work): ?>
        <tbody>
        <tr>
            <td><?php echo $work['id'] ?></td>
            <td><?php
                    foreach ($users as $user){
                        if($work['user_id'] == $user['id']){
                            echo $user['display_name'];
                        }
                    }
                ?>
            </td>
            <td><?php echo $work['name'] ?></td>
            <td><?php echo $work['done'] ?></td>
            <td><?php echo $work['sent'] ?></td>
            <td><?php echo $work['created_at'] ?></td>
            <td><?php echo $work['updated_at'] ?></td>
            <td>
            <?php if (!($work['done'] == 1 && $work['sent'] == 1)): ?>
                <a href="work/edit/<?php echo $work['id'] ?>" class="btn btn-warning">Edit</a>
            <?php else:?>
                None
            <?php endif; ?>
            </td>
            <td>
                <?php if($work['done'] == 1 && $work['sent'] == 1): ?>
                    Clear
                <?php elseif($work['done'] == 1 && $work['sent'] == 0): ?>
                    Done, need to be send
                <?php else: ?>
                    In  progress
                <?php endif; ?>
            </td>
        </tr>
        </tbody>

    <?php endforeach;?>

</table>