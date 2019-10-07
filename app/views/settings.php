<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <div class="page-header">
            <h3 class="text-center">Settings</h3>
        </div>

        <?php if (validation_errors()): ?>
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h5><?php echo validation_errors(); ?></h5>
            </div>
        <?php endif; ?>


        <div class="well">
            <h5><strong>Email</strong> <a data-toggle="modal" data-target="#username"
                                          class="btn btn-primary pull-right">Update</a></h5>
            <hr>
            <h5><strong>Password</strong> <a data-toggle="modal" data-target="#password"
                                             class="btn btn-primary pull-right">Update</a></h5>
        </div>
    </div>
</div>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Change Password</h4>
            </div>
            <div class="modal-body">
                <?= form_open('settings/change_password') ?>
                <?php
                $email = array(
                    'class' => 'form-control',
                    'type' => 'password',
                    'name' => 'password',
                    'placeholder' => 'Current Password',
                    'required' => ''
                );
                $passone = array(
                    'class' => 'form-control',
                    'type' => 'password',
                    'name' => 'new_password',
                    'placeholder' => 'New Password',
                    'required' => ''
                );
                $passtwo = array(
                    'class' => 'form-control',
                    'type' => 'password',
                    'name' => 'confirm_password',
                    'placeholder' => 'Confirm Password',
                    'required' => ''
                );
                $btn = array(
                    'class' => 'btn btn-primary',
                    'value' => 'Save'
                )
                ?>
                <?= form_input($email); ?>
                <br>
                <?= form_input($passone); ?>
                <br>
                <?= form_input($passtwo); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= form_submit($btn) ?>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!--Modal-->


<div class="modal fade" id="username" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Change Username</h4>
            </div>
            <div class="modal-body">
                <?= form_open('settings/change_email') ?>
                <?php
                $email = array(
                    'class' => 'form-control',
                    'type' => 'text',
                    'name' => 'email',
                    'placeholder' => 'New email',
                    'required' => ''
                );

                $password = array(
                    'class' => 'form-control',
                    'type' => 'password',
                    'name' => 'password',
                    'placeholder' => 'Current password',
                    'required' => ''
                );

                $btn = array(
                    'class' => 'btn btn-primary',
                    'value' => 'Save'
                )
                ?>
                <?= form_input($email, $this->session->userdata('email')); ?>
                <br>
                <?= form_input($password); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= form_submit($btn) ?>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
