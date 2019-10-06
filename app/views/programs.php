<?php
//Todo using ajax in submitting form.
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3 class="text-center">Programs</h3>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-md-12 ">
        <div class="well ">
            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#NuxAddS">Add Program
            </button>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Abbreviation</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php if ($programs): foreach ($programs as $program): ?>
                    <tr>
                        <td><?= $program->id ?></td>
                        <td><?= $program->title ?></td>
                        <td><?= $program->abbreviation ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                        data-toggle="dropdown">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="<?= base_url() ?>programs/edit/<?= $program->id ?>">Edit</a>
                                    </li>
                                    <li><a href="<?= base_url() ?>identifiers/delete/<?= $program->id ?>">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!--row-->

<!--Add program-->
<div class="modal fade" id="NuxAddS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Add Program</h4>
            </div>
            <div class="modal-body">
                <?= form_open('programs/add') ?>

                <div class="form-group">
                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Enter Program title"
                           required>
                </div>

                <div class="form-group">
                    <input type="text"
                           name="abbreviation"
                           class="form-control"
                           placeholder="Enter Program abbreviation"
                           required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<!--/.Add program-->


