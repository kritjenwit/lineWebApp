<div class="row">
    <div class="col-md-6">
        <div class="broadcast mt-5">
            <div class="jumbotron">
                <div class="text-center">
                    <p>Broadcast button will send message to all the user those are store in database about there work status</p>
                </div>
                <?php echo form_open('line/broadcast_all') ?>
                    <div class="form-group text-center">
                        <input type="submit" value="Broadcast to all" class="btn btn-secondary btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="broadcast mt-5">
            <div class="jumbotron">
                <div class="text-center">
                    <p>Broadcast button will send message to all the user who works have been done</p>
                </div>
                <?php echo form_open('line/broadcast_done') ?>
                    <div class="form-group text-center">
                        <input type="submit" value="Broadcast for done work" class="btn btn-secondary btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<h1 class="display-4">Undone Work </h1>


<div class="container mt-5">
    <div id="undone-work">
        <?php foreach ($works as $work): ?>
            <div class="alert alert-info ">
                Work: <strong><?php echo $work['name'] ?></strong>
                <div class="p">
                    User's name:
                    <?php
                        $data['users'] = $this->user_model->get_user();
                        foreach ($data['users'] as $user){
                            if($work['user_id'] == $user['id']){
                                echo $user['display_name'];
                            }
                        }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<hr>

<h1 class="display-4">Unsent work</h1>

<div class="container mt-5">
    <div id="unsent-work">
        <?php foreach ($unsent_works as $work): ?>
            <div class="alert alert-info ">
                Work: <strong><?php echo $work['name'] ?></strong>
                <div class="p">
                    User's name:
                    <?php
                    $data['users'] = $this->user_model->get_user();
                    foreach ($data['users'] as $user){
                        if($work['user_id'] == $user['id']){
                            echo $user['display_name'];
                        }
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>