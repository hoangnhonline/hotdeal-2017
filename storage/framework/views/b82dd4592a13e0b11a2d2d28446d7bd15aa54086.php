<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>
            <li><a href="<?php echo e(route('cate-parent', $loaiDetail->slug)); ?>" title="<?php echo $loaiDetail->name; ?>"><?php echo $loaiDetail->name; ?> </a></li>
            <li><a href="<?php echo e(route('cate', [$loaiDetail->slug, $cateDetail->slug])); ?>" title="<?php echo $cateDetail->name; ?>"><?php echo $cateDetail->name; ?> </a></li>
            <li class="active"><?php echo $detail->name; ?></li>
        </ul>
    </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
    <div class="row">
        <div class="col-sm-9 col-xs-12 block-col-main">
            <div class="block-title-commom block-detail">
                <div class="block-content">
                    <div class="block row">
                        <div class="col-sm-5">
                            <div class="block block-slide-detail">
                                <!-- Place somewhere in the <body> of your page -->
                                <div id="slider" class="flexslider">
                                    <ul class="slides slides-large">
                                        <?php foreach( $hinhArr as $hinh ): ?>
                                        <li><img src="<?php echo e(Helper::showImage($hinh['image_url'])); ?>" alt=" hinh anh <?php echo $detail->name; ?>" /></li>
                                        <?php endforeach; ?>                                        
                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                        <?php $i = 0; ?>
                                        <?php foreach( $hinhArr as $hinh ): ?>
                                        <li><img src="<?php echo e(Helper::showImageThumb($hinh['image_url'])); ?>" alt="thumb <?php echo $detail->name; ?>"  /></li>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div><!-- /block-slide-detail -->
                        </div>
                        <div class="col-sm-7">
                            <div class="block-page-common clearfix">
                                <div class="block block-title">
                                    <h1 class="title-main"><?php echo $detail->name; ?></h1>
                                </div>
                                <div class="block-content">

                                    <div class="block block-product-options clearfix">
                                        <div class="bl-modul-cm bl-code">
                                            <p class="title">Mã sản phẩm:</p>
                                            <p class="des"><?php echo $detail->code; ?></p>
                                        </div>
                                        <?php if( $detail->is_sale == 1): ?>
                                        <div class="bl-modul-cm bl-price">
                                            <p class="title">Giá giảm:</p>
                                            <p class="des"><?php echo number_format($detail->price_sale); ?>đ</p>
                                        </div>
                                        <div class="bl-modul-cm bl-price-old">
                                            <p class="title">Giá gốc:</p>
                                            <p class="des"><?php echo number_format($detail->price); ?>đ</p>
                                        </div>
                                        <?php else: ?>
                                        <div class="bl-modul-cm bl-price">
                                            <p class="title">Giá giảm:</p>
                                            <p class="des"><?php echo number_format($detail->price); ?>đ</p>
                                        </div>
                                        <?php endif; ?>
                                        <div class="bl-modul-cm bl-color">
                                            <p class="title">Màu sản phẩm:</p>
                                            <div class="des">
                                                <ul class="cl-list">
                                                    <li class="color_01" style="background:<?php echo $detail->color->color_code; ?>;"><a href="#"></a></li></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php 
                                        $sessionArr = Session::get('products');
                                        $quantity = isset($sessionArr[$detail->id]) ? $detail->inventory - $sessionArr[$detail->id] : $detail->inventory;    
                                        ?>
                                        <?php if( $quantity > 0 ): ?>
                                        <div class="bl-modul-cm bl-qty">
                                            <p class="title">Chọn số lượng:</p>
                                            <div class="des">
                                                <select name="" class="prod_qty" id="quantity">
                                                    <?php for($i = 0; $i < $quantity ; $i++): ?>
                                                    <option value="<?php echo e($i + 1); ?>"><?php echo $i + 1; ?></option>>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if( $detail->description ): ?>
                                        <div class="bl-modul-cm bl-desc">
                                            <span class="lb-txt">Mô tả ngắn:</span>
                                            <?php echo $detail->description; ?>

                                        </div>
                                        <?php endif; ?>
                                    </div><!-- /block-datail-if -->

                                    <div class="block block-share" id="share-buttons">
                                        <div class="share-item">
                                            <div class="fb-like" data-href="<?php echo e(url()->current()); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                                        </div>
                                        <div class="share-item" style="max-width: 65px;">
                                            <div class="g-plus" data-action="share"></div>
                                        </div>
                                        <div class="share-item">
                                            <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php echo $detail->title; ?>"></a>
                                        </div>
                                        <div class="share-item">
                                            <div class="addthis_inline_share_toolbox share-item"></div>
                                        </div>
                                    </div><!-- /block-share-->
                                    <div class="block-btn-addtocart">
                                        <?php if( $quantity > 0 && $detail->price > 0 ): ?>
                                        <button type="button" data-id="<?php echo e($detail->id); ?>" class="btn btn-addcart-product btn-main">MUA NGAY</button>
                                        <?php else: ?>
                                        <button type="button" class="btn btn-default btn-order-contact">LIÊN HỆ</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if( $detail->content ): ?>
                    <div class="block block-datail-atc block-page-common">
                        <div class="block block-title">
                            <h2 class="title-main">THÔNG TIN CHI TIẾT SẢN PHẨM</h2>
                        </div>
                        <div class="block-content block-editor-content">
                           <?php echo $detail->content; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($otherList->count() > 0): ?>
                    <div class="block-datail-atc block-page-common">
                        <div class="block block-title">
                            <h2 class="title-main">SẢN PHẨM LIÊN QUAN</h2>
                        </div>
                        <div class="block-content product-list">
                            <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-autoplay="true" data-autoplayTimeout="500" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":4}}'>
                                <?php $i = 0;?>
                                <?php foreach($otherList as $obj): ?>
                                <?php $i++; ?>
                                <li class="product-item">
                                    <div class="product-img">
                                        <p class="box-ico">
                                            <?php if( $obj->is_new == 1): ?>
                                            <span class="ico-new ico">NEW</span>
                                            <?php endif; ?>
                                            <?php if( $obj->is_sale == 1 && $obj->sale_percent > 0 ): ?>
                                            <span class="ico-sales ico">-<?php echo e($obj->sale_percent); ?>%</span>
                                            <?php endif; ?>
                                        </p>
                                        <a href="<?php echo e(route('product', [$obj->slug])); ?>" title="<?php echo $obj->name; ?>">
                                            <img src="<?php echo Helper::showImageThumb( $obj->image_url ); ?>" class="img-1" alt="<?php echo $obj->name; ?>">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="title"><a href="<?php echo e(route('product', [$obj->slug])); ?>" title="<?php echo $obj->name; ?>"><?php echo $obj->name; ?></a></h2>
                                        <div class="product-price">
                                        <span class="label-txt">Giá:</span> <span class="price-new">
                                            <?php if($obj->is_sale == 1 && $obj->price_sale > 0): ?>
                                            <?php echo e(number_format($obj->price_sale)); ?>đ
                                            <?php else: ?>
                                                <?php echo e(number_format($obj->price)); ?>đ
                                            <?php endif; ?>  
                                        </span>
                                        <?php if( $obj->is_sale == 1): ?>
                                        <span class="price-old"><?php echo e(number_format($obj->price)); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </li>                               
                                <?php endforeach; ?> 
                                         
                                       
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div><!-- /block-detail -->
        </div><!-- /block-col-left -->
        <?php echo $__env->make('frontend.cate.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        

    </div>
</div><!-- /block_big-title -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- Js zoom -->
    <script src="<?php echo e(URL::asset('public/assets/lib/jquery.zoom.min.js')); ?>"></script>
    <!-- Flexslider -->
    <script src="<?php echo e(URL::asset('public/assets/lib/flexslider/jquery.flexslider-min.js')); ?>"></script>
    <script type="text/javascript">
    $(document).ready(function () {
           // The slider being synced must be initialized first
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: true,
            slideshow: false,
            itemWidth: 75,
            itemMargin: 15,
            nextText: "",
            prevText: "",
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: false,
            animationLoop: false,
            slideshow: false,
            animationSpeed: 500,
            sync: "#carousel"
        });

        $('.slides-large li').each(function () {
            $(this).zoom();
        });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>