<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Chi tiết đơn đặt hàng #<?php echo e(str_pad($order->id, 6, '0', STR_PAD_LEFT)); ?>

  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo e(route( 'orders.index' )); ?>">Đơn đặt hàng</a></li>
    <li class="active">Chi tiết đơn hàng</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <a class="btn btn-default btn-sm" href="<?php echo e(route('orders.index')); ?>?status=<?php echo e($s['status']); ?>&name=<?php echo e($s['name']); ?>&date_from=<?php echo e($s['date_from']); ?>&date_to=<?php echo e($s['date_to']); ?>" style="margin-bottom:5px">Quay lại</a>
  <div class="row">
    <div class="col-md-12">
      <?php if(Session::has('message')): ?>
      <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
      <?php endif; ?>
      <div class="box">

        <div class="box-header with-border">
          <div class="col-md-4">
              <h4>Chi tiết chung</h4>
            <p>
              <span>Thời gian đặt hàng :</span><br> <?php echo e(date('d-m-Y H:i', strtotime($order->created_at ))); ?> <br>
              <div class="clearfix" style="margin-bottom:5px"></div>
              <span>Tình trạng đơn hàng : </span><br />
              <select class="select-change-status form-control" order-id="<?php echo e($order->id); ?>" style="width:200px;" >
                  <?php foreach($list_status as $index => $status): ?>
                  <option value="<?php echo e($index); ?>"
                    <?php if($index == $order->status): ?>
                      selected
                    <?php endif; ?>
                    ><?php echo e($status); ?></option>
                  <?php endforeach; ?>
                </select>                  
             <div class="clearfix" style="margin:5px"></div>
              <span>Khách hàng : <span><br>
              <span><?php echo e($order->fullname); ?>( # <?php echo e($order->email); ?>)</span>
              
            </p>
          </div>
          <div class="col-md-4">
            <h4>Thông tin thanh toán</h4>
            <p>
              <span>Địa chỉ :</span><br> <?php echo e($order->address); ?><br>
              <div class="clearfix" style="margin-bottom:5px"></div>
              <span>Email : </span><br />
              <span><?php echo e($order->email); ?></span>                  
             <div class="clearfix" style="margin:5px"></div>
              <span>Điện thoại : <span><br>
              <span><?php echo e($order->phone); ?></span>
              
            </p>
          </div>
          <div class="col-md-4">
            <h4>Chi tiết giao nhận hàng</h4>
            <p>
              <?php if( $order->is_other_address == 0 ): ?>
              <a href="http://maps.google.com/maps?&q=<?php echo e($order->address); ?>" target="_blank"> 
              <?php echo e($order->fullname); ?><br> <?php echo e($order->address); ?> <br> <?php echo e($order->phone); ?>

              <br>
              <?php echo e($order->email); ?>

              </a>
              <?php else: ?>
              <a href="http://maps.google.com/maps?&q=<?php echo e($order->other_address); ?>" target="_blank"> 
              <?php echo e($order->other_fullname); ?><br> <?php echo e($order->other_address); ?> <br> <?php echo e($order->other_phone); ?>

              <br>
              <?php echo e($order->other_email); ?>

              </a>
              <?php endif; ?>
            </p>
          </div>

        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width:1%">No.</th>
              <th> Tên Sản phẩm </th>
              <th style="text-align:right"> Số Lượng </th>
              <th style="text-align:center">Giá bán </th>
              <th style="text-align:center">Tổng</th>              
            </tr>
            <tbody>
            <?php $i = 0; ?>
            <?php foreach($order_detail as $detail): ?>
            <?php $i++; ?>
              <tr>
                  <td style="text-align:center"><?php echo e($i); ?></td>
                  <td class="product_name"><?php echo e($detail->product->name); ?></td>
                  <td style="text-align:right"><?php echo e($detail->amount); ?></td>
                  <td style="text-align:right"><?php echo e(number_format($detail->price)); ?> đ</td>
                  <td style="text-align:right"><?php echo e(number_format($detail->total)); ?> đ</td>
                 
              </tr>
            <?php endforeach; ?>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style="text-align:right"><b>Phí vận chuyển</b></td>
                  <td style="text-align:right"><?php echo e(number_format($order->shipping_fee)); ?> đ</td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style="text-align:right"><b>Tổng chi phí</b></td>
                  <td style="text-align:right">
                    <strong><?php echo e(number_format($order->total_payment)); ?></strong> đ</td>
              </tr>
          </tbody>
          </table>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">

$(document).ready(function(){
  $('.btn-delete-order-detail').click(function(){
    var order_detail_id = $(this).attr('order-detail-id');
    var order_id = $(this).attr('order-id');
    if(confirm('Bạn có muốn xoá sản phẩm ' + $(this).parents('tr').find('.product_name').text() +' này trong đơn hàng ?')) {
      delete_order_detail(order_id, order_detail_id);
    }
  });
   $('.select-change-status').change(function(){
      var status_id = $(this).val();
      var order_id  = $(this).attr('order-id');
      var customer_id = $(this).attr('customer-id');
      update_status_orders(status_id, order_id, customer_id);
    });

    function update_status_orders(status_id, order_id, customer_id) {
      $.ajax({
        url: '<?php echo e(route('orders.update')); ?>',
        type: "POST",
        data: {
          status_id : status_id,
          order_id : order_id,
          customer_id : customer_id
        },
        success: function (response) {
          location.reload()
        },
        error: function(response){

        }
      });
    }
  function delete_order_detail(order_id, order_detail_id) {
    $.ajax({
      url: '<?php echo e(route('order.detail.delete')); ?>',
      type: "POST",
      data: {
        order_id        : order_id,
        order_detail_id : order_detail_id
      },
      success: function (response) {
        location.reload()
      },
      error: function(response){

      }
    });
  }

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>