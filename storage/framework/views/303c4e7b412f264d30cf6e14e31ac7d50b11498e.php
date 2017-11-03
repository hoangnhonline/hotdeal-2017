<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>
            <li><a href="<?php echo e(route('cate-parent', [$cateDetail->cateParent->slug])); ?>"><?php echo $cateDetail->cateParent->name; ?></a></li>
            <li class="active"><?php echo $cateDetail->name; ?></li>
        </ul>
    </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
    <div class="row">
        
        <?php echo $__env->make('frontend.cate.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="col-sm-9 col-xs-12 block-col-right">
            <div class="block-page-common clearfix">
                <div class="block block-title">
                    <h1 class="title-main"><?php echo $cateDetail->name; ?></h1>
                </div>
                <div class="block-content">
                    <div class="product-list">
                        <div class="row">
                            <?php if($productList): ?>
                            <?php foreach($productList as $obj): ?>
                            <div class="col-sm-3 col-xs-6">
                                <div class="product-item">
                                    <div class="product-img">
                                            <p class="box-ico">
                                               <?php if( $obj->is_new == 1): ?>
                                                <span class="ico-new ico">NEW</span>
                                                <?php endif; ?>
                                                <?php if( $obj->is_sale == 1 && $obj->sale_percent > 0 ): ?>
                                                <span class="ico-sales ico">-15%</span>
                                                <?php endif; ?>
                                            </p>
                                        <a href="<?php echo e(route('product', [$obj->slug, $obj->id ])); ?>" title="<?php echo $obj->name; ?>">
                                        <img src="<?php echo Helper::showImageThumb( $obj->image_url ); ?>" class="img-1" alt="<?php echo $obj->name; ?>">
                                    </a>
                                    </div>
                                    <div class="product-info">
                                        <h2 class="title"><a href="<?php echo e(route('product', [$obj->slug, $obj->id ])); ?>" title="<?php echo $obj->name; ?>"><?php echo $obj->name; ?></a></h2>
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
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?> 
                        </div>

                        <nav class="block-pagination">
                            <?php echo e($productList->links()); ?>

                        </nav><!-- /block-pagination -->
                    </div>
                </div>
            </div><!-- /block-ct-news -->
        </div><!-- /block-col-right -->

    </div>
</div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>