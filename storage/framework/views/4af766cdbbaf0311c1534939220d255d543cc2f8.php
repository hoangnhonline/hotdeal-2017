<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<?php $total = 0; ?>
<div class="block block-breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="#">Trang chủ</a></li>
      <li><a href="#">Giỏ hàng</a></li>
      <li class="active">Thông tin thanh toán</li>
    </ul>
  </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
  <div class="block-page-common">
    <div class="block block-title">
      <h2>THÔNG TIN THANH TOÁN</h2>
    </div>
  </div><!-- /block-page-common -->
  <div class="row">
    <div class="col-sm-8 col-xs-12 block-col-left">
      <div class="block-billing">
        <div class="block-title">
          THÔNG TIN ĐẶT HÀNG
        </div>
        <div class="block-content">
          <form action="<?php echo e(route('payment')); ?>" method="POST" class="form-billing" id="paymentForm">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label class="choose-another"><input type="radio" name="method_id" checked="checked" value="1" class="radio-cus"> Thanh toán tiền mặt khi nhận hàng - COD</label>
            </div>
            <div class="form-group">
              <label class="choose-another"><input type="radio" name="method_id" value="2" class="radio-cus"> Chuyển khoản ngân hàng</label>
            </div>
            <div class="form-group">
              <div class="content">                
              <div class="form-group">
                <div class="thumb">
                  <img src="images/payments/VIB.jpg" alt="">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="thumb">
                  <img src="<?php echo e(URL::asset('public/assets/images/payments/TCB.jpg')); ?>" alt="ACB">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="thumb">
                  <img src="<?php echo e(URL::asset('public/assets/images/payments/ACB.jpg')); ?>" alt="ACB">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              <div class="form-group">
                <div class="thumb">
                  <img src="<?php echo e(URL::asset('public/assets/images/payments/VCB.jpg')); ?>" alt="ACB">
                </div>
                <div class="des">
                  <p class="title">Ngân hàng thươnag mại cổ phần Á Châu - Chi nhánh Thủ Đức</p>
                  <p class="info">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
                  </p>
                </div>
              </div>
              </div>
            </div>
            <div class="form-group">
              <label class="choose-another"><input type="radio" name="method_id" value="3" class="radio-cus"> Thanh toán qua Bảo Kim</label>
            </div>
            <div class="form-group text-right">
              <a href="<?php echo route('address-info'); ?>" title="Quay Lại" class="btn btn-default"><i class="fa fa-long-arrow-left"></i> Quay Lại</a>
              <button title="Quay Lại" class="btn btn-main" id="btnPayment" >Đặt hàng <i class="fa fa-long-arrow-right"></i></button>
            </div>
          </form>
        </div>
      </div><!-- /block-billing -->
    </div><!-- /block-col-left -->
    <div class="col-sm-4 col-xs-12 block-col-right">
      <div class="block block-billing-product block-info-address">
        <div class="block-title">
          THÔNG TIN NGƯỜI MUA
        </div>
        <div class="block-content">
          <p>
            <span class="title">Họ và tên:</span>
            <span class="info"><?php echo $addressInfo['fullname']; ?></span>
          </p>
          <p>
            <span class="title">Địa chỉ:</span>
            <span class="info"><?php echo $addressInfo['address']; ?></span>
          </p>
          <p>
            <span class="title">Điện thoại di động:</span>
            <span class="info"><?php echo $addressInfo['phone']; ?></span>
          </p>
          <p>
            <span class="title">Email:</span>
            <span class="info"><?php echo $addressInfo['email']; ?></span>
          </p>
          <p>
            <span class="title">Ngày đặt hàng:</span>
            <span class="info"><?php echo date('d-m-Y'); ?></span>
          </p>
        </div>
      </div>
      <?php if( isset($addressInfo['choose_other_address']) && $addressInfo['choose_other_address'] == 1): ?>
      <div class="block block-billing-product block-info-address">
        <div class="block-title">
          THÔNG TIN NGƯỜI NHẬN
        </div>
        <div class="block-content">
          <p>
            <span class="title">Họ và tên:</span>
            <span class="info"><?php echo $addressInfo['other_fullname']; ?></span>
          </p>
          <p>
            <span class="title">Địa chỉ:</span>
            <span class="info"><?php echo $addressInfo['other_address']; ?></span>
          </p>

          <p>
            <span class="title">Điện thoại di động:</span>
            <span class="info"><?php echo $addressInfo['other_phone']; ?></span>
          </p>
          <?php if( $addressInfo['other_email'] ): ?>
          <p>
            <span class="title">Email:</span>
            <span class="info"><?php echo $addressInfo['other_email']; ?></span>
          </p>          
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>

      <div class="block-billing-product">
        <div class="block-title">
          THÔNG TIN SẢN PHẨM
        </div>
        <div class="block-content">
          <table class="table-billing-product">
            <thead>
              <tr>
                <th style="width: 73%;"><strong>Sản phẩm</strong></th>
                <th><strong>Tổng cộng</strong></th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty(Session::get('products'))): ?>
              
              <?php if( $arrProductInfo->count() > 0): ?>
                  <?php $i = 0; ?>
                <?php foreach($arrProductInfo as $product): ?>
                <?php 
                $i++;
                $price = $product->is_sale ? $product->price_sale : $product->price; 

                $total += $total_per_product = ($getlistProduct[$product->id]*$price);
                
                ?>

              <tr>
                <td>
                  <p class="tb-commom"><strong><?php echo $product->name; ?></strong></p>
                  <p class="tb-commom">Số lượng: <?php echo e($getlistProduct[$product->id]); ?> x <?php echo number_format($product->price_sell); ?></p>
                  
                </td>
                <td class="text-right">
                  <strong ><?php echo number_format($total_per_product); ?>đ</strong>
                </td>
              </tr>
              <?php endforeach; ?>

              <?php endif; ?>  

              <?php endif; ?>

              <tr>
                <td>
                  <strong>Tổng phụ</strong>
                </td>
                <td>
                  <p class="text-right"><?php echo e(number_format($total)); ?>đ</p>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Tổng cộng</strong>
                </td>
                <td>
                  <p class="cl-red text-right"><?php echo e(number_format($total)); ?>đ</p>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  (Chưa bao gồm phí vận chuyển nếu có)
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /block-col-right -->
  </div>
</div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
   <script type="text/javascript">
   $(document).ready(function(){
    $('#btnPayment').click(function(){            
        $(this).html('<i class="fa fa-spin fa-spinner"></i>').attr('disabled', 'disabled');
        $('#paymentForm').submit();      
    });
  });
  </script>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>