
<!--<a href="--><?php //echo $line; ?><!--">Login with line</a>-->
<style>
    #login-btn{
        width: 303px;
        height: 88px;
        background: url('<?php echo base_url() ?>assets/img/btn_login_base.png') no-repeat;
    }
    #login-btn:hover{
        width: 303px;
        height: 88px;
        background: url('<?php echo base_url() ?>assets/img/btn_login_hover.png') no-repeat;
    }
    #login-btn:active{
        width: 303px;
        height: 88px;
        background: url('<?php echo base_url() ?>assets/img/btn_login_press.png') no-repeat;
    }
</style>

<a href="<?php echo $line; ?>">
    <div id="login-btn">

    </div>
</a>