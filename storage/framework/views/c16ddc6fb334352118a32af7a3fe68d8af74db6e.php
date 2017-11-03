<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo route('home'); ?>">Trang chủ</a></li>
            <li class="active"><?php echo $detailPage->title; ?></li>
        </ul>
    </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
    <div class="row">
        <?php echo $__env->make('frontend.cate.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-sm-9 col-xs-12 block-col-right">
            <div class="block-page-about">
                <div class="block-page-common">
                    <div class="block block-title">
                        <h1 class="title-main"><?php echo $detailPage->title; ?></h1>
                    </div>
                </div>
                <div class="block-article">
                    <div class="block block-content">
                        <?php echo $detailPage->content; ?>

                    </div>
                </div>
            </div>
        </div><!-- /block-col-left -->

    </div>
</div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>  

<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>