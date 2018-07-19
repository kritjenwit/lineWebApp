<div class="row mt-5">
    <div class="col-md-6 offset-lg-3">
        <div class="card">
            <div class="card-header">
                <?php echo form_open('admin/update') ?>
                    <h1 class="display-4"><?php echo $title; ?></h1>
                    <?php echo validation_errors(); ?>

                    <div class="form-group">
                        <label for="">Work name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $work['name'] ?> ">
                    </div>
                    <div class="form-grroup">
                        <label  for="">done</label>
                        <select class="form-control" name="done" id="">
                            <?php if ($work['done'] == 1): ?>
                                <option value="0">0</option>
                                <option value="1" selected>1</option>
                            <?php else: ?>
                                <option value="0" selected>0</option>
                                <option value="1" >1</option>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">sent</label>
                        <select class="form-control" name="sent" id="">
                            <?php if ($work['sent'] == 1): ?>
                                <option value="0">0</option>
                                <option value="1" selected>1</option>
                            <?php else: ?>
                                <option value="0" selected>0</option>
                                <option value="1" >1</option>
                            <?php endif;?>
                        </select>
                    </div>
                    <input type="text" name="id" id="" hidden value="<?php echo $work['id'] ?>">
                    <input type="submit" value="Update" name="update" class="btn btn-success btn-block">
                </form>
                <br>
                <?php echo form_open( site_url('admin/delete/') . $work['id']) ?>
                    <input type="hidden" name="id" value="">
                    <input type="submit" value="Delte" class="btn btn-danger btn-block">
                </form>
            </div>
        </div>
    </div>
</div>
