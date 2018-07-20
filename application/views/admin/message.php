<div id="message">
    <h1 class="display-4 text-center">Message</h1>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    <?php echo form_open('line/send_message') ?>
                        <div class="form-gruop">
                            <label for="">Send to</label>
                            <select class="form-control" name="id[]" id="user_id" multiple>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?php echo $user['id'] ?>"><?php echo $user['display_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <div class="form-group text-center">
                                <button id="select-all" class="btn" onclick="return false">Select All</button>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea name="message" class="form-control" placeholder="type the message to user"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary btn-block">
                        </div>
                        <?php if($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>