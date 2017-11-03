<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
           <li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>        
            <li class="active"><?php echo $parentDetail->name; ?></li>
        </ul>
    </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
    <div class="row">
        <div class="col-xs-12 block-col-main">
            <div class="block-page-common clearfix">
                <div class="block block-title tit-more">
                    <h1 class="title-main"><?php echo $parentDetail->name; ?></h1>
                    <?php if($parentDetail->description): ?>
                    <p class="desc text-center">
                       <?php echo $parentDetail->description; ?>

                    </p>
                    <?php endif; ?>
                </div>
                <?php if($cateList): ?>
                <?php foreach($cateList as $cate): ?>
                <?php if(isset($productArr[$cate->id]) && count($productArr[$cate->id]) > 0 ): ?>
                <div class="block-content">
                    <div class="box-title-cate-prod">
                        <i class="fa fa-heart"></i> <h3><?php echo $cate->name; ?></h3>                        
                        <a href="<?php echo e(route('cate', [ $parentDetail->slug, $cate->slug ])); ?>" class="readmore btn-main">Xem chi tiết <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    <div class="product-list">

                        <div class="owl-carousel owl-theme owl-style2" data-nav="true" data-margin="30" data-items='5' data-autoplayTimeout="500" data-autoplay="false" data-loop="false" data-navcontainer="true" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":5}}'>
                            <?php foreach($productArr[$cate->id] as $obj): ?>
                            <div class="product-item">
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
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>

            </div>                      
        </div><!-- /block-ct-news -->
    </div><!-- /block-col-left -->
</div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>