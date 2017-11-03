  
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="block block-breadcrumb">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>
      <li class="active"><?php echo $cateDetail->name; ?></li>
    </ul>
  </div>
</div><!-- /block-breadcrumb -->
<div class="block block-two-col container">
  <div class="row">
    
    <?php echo $__env->make('frontend.cate.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="col-sm-9 col-xs-12 block-col-right">
      <div class="block-page-common block-sales">
        <div class="block block-title">
          <h1 class="title-main"><?php echo $cateDetail->name; ?></h1>
        </div>
        <div class="block-content">
          <?php if($articlesList): ?>
          <?php foreach($articlesList as $obj): ?>
          <div class="item">
            <div class="thumb">
              <a href="<?php echo e(route('news-detail', [ $obj->cate->slug, $obj->slug, $obj->id ])); ?>">
                <img src="<?php echo Helper::showImage($obj->image_url); ?>" alt="<?php echo $obj->title; ?>">
              </a>
            </div>
            <div class="des">
              <a href="<?php echo e(route('news-detail', [ $obj->cate->slug, $obj->slug, $obj->id ])); ?>" title="<?php echo $obj->title; ?>"><?php echo $obj->title; ?></a>
              <p class="date-post"><i class="fa fa-calendar"></i> <?php echo date( 'd/m/Y H:i', strtotime($obj->created_at) ); ?></p>
              <p class="description"><?php echo $obj->description; ?></p>
            </div>
          </div><!-- /item -->
          <?php endforeach; ?>          
          <?php endif; ?>
        </div>
      </div><!-- /block-ct-news -->
      <nav class="block-pagination">
        <?php echo e($articlesList->links()); ?>

      </nav><!-- /block-pagination -->
    </div><!-- /block-col-right -->
  </div>
</div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>