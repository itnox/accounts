<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title->name; ?>
        <small>Welcome to Aimstech Accounting!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>chart"><i class="fa fa-dashboard"></i> Chart of Accounts</a></li>
        <li class="active"><?= $title->name; ?></li>
      </ol>
    </section>
<!-- Main content -->
<section class="content container-fluid">

  <!--------------------------
    | Your Page Content Here |
    -------------------------->

    <!-- /.col -->
        <div class="col-md-6">
          
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><?= $title->name; ?> Chart</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 50px">#</th>
                  <th><?= $title->name; ?></th>
                  <th></th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php foreach ($result as $key => $value) { ?>
                    <tr>
                      <td><?php echo str_pad($value['levelone_id'], 4, '0', STR_PAD_LEFT); ?></td>
                      <td><strong><a href="<?php //echo site_url('/chart/'.$chart['chart_id']); ?>"><?php echo $value['name']; ?></a></strong></td>
                      <td><a href="<?php echo site_url('leveltwo/index/'.$value['levelone_id']); ?>" class="btn btn-primary pull-right">View</a></td>
                      <td><button type="submit" class="btn btn-danger pull-right">Delete</button></td>
                    </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Go Previous</h3>
              <a href="javascript:history.go(-1)" class="btn btn-primary pull-right">Back</a>
            </div>
          </div>

        <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add <?= $title->name; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('levelone/add', 'class = "form-horizontal"'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"><?= $title->name; ?></label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="<?= $title->name; ?>">
                    <input type="hidden" name="id" value="<?= $title->chart_id; ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary pull-right">Create</button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          <!-- /.box -->

          <?php if (validation_errors()): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?php echo validation_errors(); ?>
          </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('levelone_added')): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('levelone_added'); ?>
              </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('required')): ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('required'); ?>
              </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('callback_check_levelone_exists')): ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?php echo $this->session->flashdata('callback_check_levelone_exists'); ?>
              </div>
          <?php endif; ?>

          </div>
          <!-- /.box -->

</section>