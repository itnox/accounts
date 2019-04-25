<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?php  ?></h1>

     <div class="card o-hidden border-0 shadow-lg my-5">
     	<div class="card-body p-0">
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Chart Of Accounts</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Name</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Serial Number</th>
                      <th>Name</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($sub_chart as $value) { ?>
                    <tr>
                      <td>0<?php echo $value['chart_id']; ?></td>
                      <td><strong><a href="<?php //echo site_url('/chart/equity/'.$chart['id']); ?>"><?php echo $value['type']; ?></a></strong></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

     	</div>
     </div>

</div>
<!-- /.container-fluid -->