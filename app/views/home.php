<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Actions
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="" data-toggle="modal" data-target="#verify">Verify All</a></li>
                <li class="divider"></li>
                <li><a href="" data-toggle="modal" data-target="#unverify">Unverify All</a></li>
                <li class="divider"></li>
                <li><a href="" data-toggle="modal" data-target="#delete_year">Delete Year</a></li>
                <li class="divider"></li>
                <li><a href="" data-toggle="modal" data-target="#delete_class">Delete Class</a></li>
                <li class="divider"></li>
                <li><a href="" data-toggle="modal" data-target="#delete">Delete All</a></li>
            </ul>
        </div>

        <div class="btn-group pull-left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Add
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="" data-toggle="modal" data-target="#NuxAdd">Student</a></li>
                <li class="divider"></li>
                <li><a href="" data-toggle="modal" data-target="#NuxImport">Class</a></li>
            </ul>
        </div>
        <h3 class="text-center">All Students</h3>
    </div>
</div>
<div class="col-lg-12">

    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-nux">
        <thead>
        <tr>
            <th>Reg No</th>
            <th>Email</th>
            <th>Program</th>
            <th>Year</th>
            <th>Residence</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): ?>
            <tr class="gradeA">
                <td><?= $student->reg_no ?></td>
                <td><?= $student->email ?></td>
                <td><?= $student->program ?></td>
                <td><?= $student->year ?></td>
                <td><?= $student->residence ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <!-- /.table-responsive -->

</div>
<!-- /.col-lg-12 -->

<hr>


<div class="modal fade" id="NuxImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">Import a list</h4>
                <div class="well well-sm">
                    <p>This feature supports CSV files (comma delimited). The very first line consisting of headers is
                        automatically ignored.
                        Below is an example on how your tables need to look like.</p>
                    <p><em>Note:</em> All characters apart from A-Z and 0-9 will be ignored automatically now as well as
                        during students login.</p>

                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Reg No</th>
                        <th>Index No</th>
                        <th>Password</th>
                        <th>Sex</th>
                        <th>Residence Id</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Arya Stark</td>
                        <td>REG/340/10</td>
                        <td>S0400/0012/2001</td>
                        <td>786521</td>
                        <td>Female</td>
                        <td>2</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-body">

                <?= form_open_multipart('students/register') ?>

                <div class="form-group input-group">
                    <span class="input-group-addon">School</span>
                    <select name="school_id" class="form-control">
                        <?php foreach ($schools as $school): ?>
                            <?= "<option value='$school->school_id'>$school->school</option>" ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon">Faculty</span>
                    <select name="faculty_id" class="form-control">
                        <?php foreach ($faculties as $faculty): ?>
                            <?= "<option value='$faculty->faculty_id'>$faculty->faculty</option>" ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon">Year</span>
                    <select name="year" class="form-control">
                        <?= "<option value='1'>1</option>" ?>
                        <?= "<option value='2'>2</option>" ?>
                        <?= "<option value='3'>3</option>" ?>
                        <?= "<option value='4'>4</option>" ?>
                        <?= "<option value='5'>5</option>" ?>

                    </select>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon">CSV</span>
                    <input value="" type="file" class="form-control" name="nux_csv" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!---->
<!--<div class="modal fade" id="delete_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
<!--                <h4 class="modal-title" id="myModalLabel">Choose year to delete</h4>-->
<!--            </div>-->
<!---->
<!--            <div class="modal-body">-->
<!--                <h4 class="text-danger text-center">This will delete all students in the class below.</h4>-->
<!--                --><?//= form_open('students/delete_class') ?>
<!--                <div class="form-group input-group">-->
<!--                    <span class="input-group-addon">Faculty</span>-->
<!--                    <select name="faculty_id" class="form-control">-->
<!--                        --><?php //foreach ($faculties as $faculty): ?>
<!--                            --><?//= "<option value='$faculty->faculty_id'>$faculty->faculty</option>" ?>
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
<!--                </div>-->
<!---->
<!--                <div class="form-group input-group">-->
<!--                    <span class="input-group-addon">Year</span>-->
<!--                    <select name="year" id="" class="form-control">-->
<!--                        <option value="5">5</option>-->
<!--                        <option value="4">4</option>-->
<!--                        <option value="3">3</option>-->
<!--                        <option value="2">2</option>-->
<!--                        <option value="1">1</option>-->
<!--                    </select>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>-->
<!--                <button type="submit" class="btn btn-danger">Delete</button>-->
<!--            </div>-->
<!--            --><?//= form_close() ?>
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
<!--</div>-->

<script>
    $(document).ready(function () {
        $('#dataTables-nux').DataTable({
            responsive: true
        });
    });
</script>