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
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Aims Contact Technologies (PVT) Ltd.
           <!-- <small class="pull-right">Date: 2/10/2014</small> -->
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-xs-12">
          <h2 class="lead">
            Journal Voucher (JV)
          </h2>
        </div>
        <!-- /.col -->
      </div>

      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-8 invoice-col">
          
          
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <?php foreach ($result as $value) : ?>
            <b>Account:</b><?php echo $value['levelthree_id']; ?><br>
            <b>Name:</b> <?php echo $value['name']; ?><br> 
          <?php endforeach; ?>
          <b>Date: </b><span id="date"></span> <script>document.getElementById('date').appendChild(document.createTextNode(new Date().toLocaleString()))</script><br>
          <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row" id="cont">
        <div class="col-xs-12 table-responsive">
          <div id="cont"></div>
          <table class="table table-striped voucherTable">
            <thead>
            
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <tr>
                <button id="addrow" type="button" class="btn btn-primary pull-right" onclick="addRow()"><i class="fa fa-plus"></i> ADD 
                </button>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>  
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
      <!--    <p class="lead">Payment Methods:</p>
          <img src="<?php// echo base_url();?>public/dist/img/credit/visa.png" alt="Visa">
          <img src="<?php// echo base_url();?>public/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="<?php// echo base_url();?>public/dist/img/credit/american-express.png" alt="American Express">
          <img src="<?php// echo base_url();?>public/dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p> -->
        </div> 
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right" id="bt" onclick="sumbit()"><i class="fa fa-credit-card"></i> Submit 
          </button>
          <a href="javascript:history.go(-1)" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-window-close"></i> Cancel
          </a>
        </div>
      </div>
    </section>
    <!-- /.content -->

</section>
<!-- /.content -->