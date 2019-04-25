<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <small>Welcome to Aimstech Accounting!</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>chart"><i class="fa fa-dashboard"></i> <?= $title; ?></a></li>
        <li class="active"><?= $title; ?></li>
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
              <h3 class="box-title">Chart Of Accounts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 50px">#</th>
                  <th>Task</th>
                  <th></th>
                  <th style="width: 40px">Action</th>
                </tr>
                <?php foreach ($result as $key => $value) { ?>
                    <tr>
                      <td>0<?php echo $value['chart_id']; ?></td>
                      <td><strong><a href="<?php //echo site_url('/chart/'.$chart['chart_id']); ?>"><?php echo $value['name']; ?></a></strong></td>
                      <td>
                        <a href="<?php echo site_url('levelone/index/'.$value['chart_id']); ?>" class="btn btn-primary pull-right">View</a>
                      </td>
                      <td><button type="submit" class="btn btn-danger disabled pull-right">Delete</button></td>
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

        <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Equity</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Equity</label>

                  <div class="col-sm-10">
                    <input type="text" name="equity" class="form-control" id="inputEmail3" placeholder=" Equity">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <?php echo validation_errors(); ?>  
          </div>
          <!-- /.box -->

</section>
<!-- /.content -->