<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <small>Welcome to Aimstech Accounting!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pages</a></li>
        <li class="active"><?= $title; ?></li>
      </ol>
    </section>
<!-- Main content -->
<section class="content container-fluid">

  <!--------------------------
    | Your Page Content Here |
    -------------------------->
    <div class="col-md-6">
          
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><?= ucfirst($title); ?> Chart</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 50px">#</th>
                  <th><?= ucfirst($title); ?>s</th>
                  <th></th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php foreach ($result as $key => $value) { ?>
                <tr>
                  <td>1</td>
                  <td><strong><a href="">Journal Voucher</a></strong></td>
                  <td></td>
                  <td><a href="<?php echo site_url('voucher/jv/'.$value['levelthree_id']); ?>" class="btn btn-primary pull-right">ADD</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><strong><a href="">Cash Receipt Voucher (CRV)</a></strong></td>
                  <td></td>
                  <td><a href="<?php echo site_url('voucher/crv/'.$value['levelthree_id']); ?>" class="btn btn-primary pull-right">ADD</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td><strong><a href="">Cash Payment Voucher  (CPV)</a></strong></td>
                  <td></td>
                  <td><a href="<?php echo site_url('voucher/cpv/'.$value['levelthree_id']); ?>" class="btn btn-primary pull-right">ADD</a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td><strong><a href="">Bank Receipt Voucher  (BRV)</a></strong></td>
                  <td></td>
                  <td><a href="<?php echo site_url('voucher/brv/'.$value['levelthree_id']); ?>" class="btn btn-primary pull-right">ADD</a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td><strong><a href="">Bank Payment Voucher  (BPV)</a></strong></td>
                  <td></td>
                  <td><a href="<?php echo site_url('voucher/bpv/'.$value['levelthree_id']); ?>" class="btn btn-primary pull-right">ADD</a></td>
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
    <!-- /.content -->

</section>
<!-- /.content -->