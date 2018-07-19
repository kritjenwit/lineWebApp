<h1 class="display-4"><?php echo $title ?></h1>

<table class="table table-hover">
    <thead>
    <tr>
        <td>id</td>
        <td>display name</td>
        <td>status message</td>
        <td>Created at</td>
        <td>send status message</td>
    </tr>
    </thead>



<?php foreach ($users as $user): ?>
    <tbody>
    <tr>
        <td><?php echo $user['id'] ?></td>
        <td><?php echo $user['display_name'] ?></td>
        <td><?php echo $user['status_message'] ?></td>
        <td><?php echo $user['created_at'] ?></td>
        <td>
            <?php echo form_open('line/send/' .$user['id']) ?>
                <input type="submit" value="Send" id="send" class="btn btn-success btn-block">
            </form>
        </td>
    </tr>
    </tbody>
<?php endforeach;?>
</table>