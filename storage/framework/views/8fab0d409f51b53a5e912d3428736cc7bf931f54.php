<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<?php $total = 0; ?>
<div class="block block-breadcrumb">
    <div class="container">
      <ul class="breadcrumb">
        <li><a class="home" href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>
        <li class="active">Giỏ hàng</li>
      </ul>
    </div>
  </div><!-- /block-breadcrumb -->
  <div class="block block-two-col container">
    <div class="block-page-common">
      <div class="block block-title">
        <h1 class="title-main">
          <i class="fa fa-cart-arrow-down"></i>
          GIỎ HÀNG
        </h1>
      </div>
    </div><!-- /block-page-common -->
    <div class="row">
      <div class="col-sm-8 col-xs-12 block-col-sidebar">
        <div class="block-cart">
          <div class="shopcart-ct">
            <form action="#" method="POST" class="form-cart">
              <div class="table cart-tbl">
                <div class="table-row thead">
                  <div class="table-cell product-col t-c">Sản phẩm</div>
                  <div class="table-cell numb-col">Giá</div>
                  <div class="table-cell total-col t-c">Số lượng</div>
                </div><!-- table-row thead -->
                <div class="tr-wrap">
                  <?php if(!empty(Session::get('products'))): ?>
                 <?php $total = 0; ?>
                  <?php if( $arrProductInfo->count() > 0): ?>
                      <?php $i = 0; ?>
                    <?php foreach($arrProductInfo as $product): ?>
                    <?php 
                    $i++;
                    $price = $product->is_sale ? $product->price_sale : $product->price; 

                    $total += $total_per_product = ($getlistProduct[$product->id]*$price);
                    
                    ?>
                  <div class="table-row clearfix">
                    <div class="table-cell product-col">
                      <figure class="img-prod">
                        <img alt="<?php echo $product->name; ?>" src="<?php echo e($product->image_url ? Helper::showImage($product->image_url) : URL::asset('public/assets/images/no-img.png')); ?>">
                      </figure>
                      <a href="<?php echo e(route('product', [ $product->slug ])); ?>" class="prod-tit" target="_blank" title="<?php echo $product->name; ?>"><?php echo $product->name; ?></a>
                      
                      <p>
                        <span>Mã sản phẩm:</span>
                        <span class="p-code"><?php echo $product->code; ?></span>
                      </p>
                      <p>
                        <a href="javascript:void(0);" title="Xóa sản phẩm" data-id="<?php echo e($product->id); ?>" class="p-del del_item">Xóa</a>
                      </p>
                    </div>
                    <div class="table-cell total-col">                     
                      <?php if( $product->is_sale == 1): ?>
                      <p class="p-price"><b><?php echo number_format( $product->price_sale ); ?>đ</b></p>
                      <p class="p-price-old"><?php echo number_format( $product->price ); ?>đ</p>
                      <p class="p-price-dis"><span>-<?php echo number_format( $product->sale_percent ); ?>%</span></p>
                      <?php else: ?>
                      <p class="p-price"><b><?php echo number_format( $product->price ); ?>đ</b></p>
                      <?php endif; ?>
                    </div><!-- /table-cell total-col t-r -->
                    <div class="table-cell numb-col t-c">
                      <select data-id="<?php echo e($product->id); ?>" size="1" class="change_quantity">
                        <?php for($i = 1; $i <= $product->inventory ; $i ++): ?> 
                        <option value="<?php echo e($i); ?>" <?php if( $getlistProduct[$product->id] == $i ): ?> selected <?php endif; ?>><?php echo e($i); ?></option>                 
                        <?php endfor; ?>      
                      </select>
                    </div>
                  </div><!-- table-row clearfix -->
                  
                
              
              <?php endforeach; ?>

              <?php endif; ?>  

              <?php endif; ?>
              </div><!-- tr-wrap -->
              </div><!-- table cart-tbl --> 
              <div class="block-btn text-right">
                <a href="<?php echo e(route('home')); ?>" title="Tiếp tục mua hàng" class="btn btn-main"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                <?php if(!empty(Session::get('products'))): ?>
               <a href="<?php echo e(route('empty-cart')); ?>" onclick="return confirm('Quý khách có chắc chắn bỏ hết hàng ra khỏi giỏ?'); " class="btn btn-default"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
               <?php endif; ?>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /block-col-left -->
      <div class="col-sm-4 col-xs-12 block-col-right">
        <div class="block-billing-product">
          <div class="block block-content">
            <table class="table-billing-product">
              <tbody>
                <tr>
                  <td>
                    <strong>Tạm tính</strong>
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
                    <p class="text-small text-right">(Đã bao gồm VAT)</p>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="text-center text-small text-italic fs12">
                    (Chưa bao gồm phí vận chuyển nếu có)
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php if(!empty(Session::get('products'))): ?>
          <a href="<?php echo e(route('address-info')); ?>" title="Tiến hành đặt hàng" class="btn btn-main btn-pay">Tiến hành đặt hàng</a>
          <?php endif; ?>
        </div>
      </div><!-- /block-col-right -->
    </div>
  </div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
   <script type="text/javascript">
   $(document).ready(function(){
    $.ajax({
          url : $('#rating-route').val(),
          type : 'POST',
          dataType : 'html',
          data : $('#rating-form').serialize(),
          success : function(data){
              $('#rating-summary').html(data);
              var $input = $('input.rating');
              if ($input.length) {
                  $input.removeClass('rating-loading').addClass('rating-loading').rating();
              }
          }
      });

        $(document).ready(function($){  
          $('a.btn-order').click(function() {
                var product_id = $(this).data('id');
                addToCart(product_id);
                
              });
        });
        $('#btnDatHang').click(function(){
          $(this).html('<i class="fa fa-spin fa-spinner"><i>').attr('disabled', 'disabled');
          location.href=$(this).data('href');
        });
        $(document).on('change', '.change_quantity', function() {
            var quantity = $(this).val();
            var id = $(this).data('id');
            updateQuantity(id, quantity, 'ajax');
        });        
        
  }); 
function addToCart(product_id) {
  $.ajax({
    url: $('#route-add-to-cart').val(),
    method: "GET",
    data : {
      id: product_id
    },
    success : function(data){
       window.location.reload();
    }
  });
} 
function calTotalProduct() {
    var total = 0;
    $('.change_quantity ').each(function() {
        total += parseInt($(this).val());
    });
    $('.order_total_quantity').html(total);
}

function updateQuantity(id, quantity, type) {
    $.ajax({
        url: $('#route-update-product').val(),
        method: "POST",
        data: {
            id: id,
            quantity: quantity
        },
        success: function(data) {
            
            location.reload();            
        }
    });
}
  </script>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>