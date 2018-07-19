<h1 class="display-4 text-center"><?php echo $title ?></h1>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <form class="card-header">
                <div class="img text-center">
                    <img src="<?php echo  $this->session->userdata('img') ;?>" alt="display image" class="img-thumbnail" style="width: 200px; height: auto;" >
                </div>
                <div class="form-group">
                    <label for="">User id</label>
                    <input type="text" name="" id="" class="form-control" value="<?php echo $this->session->userdata('id') ?>" disabled>
        </div>
                <div class="form-group">
                    <label for="">Display name</label>
                    <input type="text" name="" id="" class="form-control" value="<?php echo $this->session->userdata('display_name') ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">Status message</label>
                    <input type="text" name="" id="" class="form-control" value="<?php echo $this->session->userdata('status') ?>" disabled>
                </div>
            </div>
        </div>
    </div>
</div>