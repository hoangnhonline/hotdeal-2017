<?php $__env->startSection('content'); ?>
<?php 
$bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>
<?php if($bannerArr): ?>
<div class="block block-side">
    <div class="owl-carousel owl-style2" data-nav="true" data-margin="0" data-items='1' data-autoplayTimeout="1000" data-autoplay="true" data-loop="true" data-navcontainer="true">
      <?php $i = 0; ?>
      <?php foreach($bannerArr as $banner): ?>
      <?php $i++; ?>
      <div class="item-slide">
        <?php if($banner->ads_url !=''): ?>
        <a href="<?php echo e($banner->ads_url); ?>" title="banner slide <?php echo e($i); ?>">
        <?php endif; ?>
        <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="slide <?php echo e($i); ?>">
        <?php if($banner->ads_url !=''): ?>
        </a>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>   
    </div>
  </div><!-- /block-side -->
<?php endif; ?>
  <div class="block block-title-cm block-categories-home">
    <div class="container">
      <div class="block-title">
        <h2 data-text="1" <?php if($isEdit): ?> class="edit" <?php endif; ?>><?php echo $textList[1]; ?></h2>
        <p data-text="2" class="desc <?php if($isEdit): ?> edit <?php endif; ?>"><?php echo $textList[2]; ?></p>
      </div>
      <div class="block-cate-product">
        <div class="row">
          <?php foreach( $cateParentHot as $obj ): ?>
          <div class="col-sm-3">
            <div class="cate-item">
              <figure class="box-thumb">
                <a href="<?php echo route( 'cate-parent', $obj->slug ); ?>" title="<?php echo $obj->name; ?>"><img src="<?php echo e(Helper::showImage( $obj->image_url )); ?>" alt="<?php echo $obj->name; ?>"></a>
              </figure>
              <figcaption class="box-caption">
                <h2 class="cate-name"><a href="<?php echo route( 'cate-parent', $obj->slug ); ?>" title="<?php echo $obj->name; ?>"><?php echo $obj->name; ?></a></h2>
                <p class="cate-desc"><?php echo $obj->description; ?></p>
                <p class="cate-btn"><a href="<?php echo route( 'cate-parent', $obj->slug ); ?>">Xem chi tiết</a></p>
              </figcaption>
            </div>
          </div><!-- /item -->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div><!-- /block_big-title -->
<?php 
$bannerArr = DB::table('banner')->where(['object_id' => 2, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>
<?php if($bannerArr): ?>  
  <?php $i = 0; ?>
  <?php foreach($bannerArr as $banner): ?>
  <?php $i++; ?>
  <div class="block block-banner">
    <?php if($banner->ads_url !=''): ?>
    <a href="<?php echo e($banner->ads_url); ?>" title="banner slide <?php echo e($i); ?>">
    <?php endif; ?>
    <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="slide <?php echo e($i); ?>">
    <?php if($banner->ads_url !=''): ?>
    </a>
    <?php endif; ?>
  </div><!-- /block-banner -->
  <?php endforeach; ?>
<?php endif; ?>
  <div class="block block-title-cm">
    <div class="container">
      <div class="block-title">
        <h2 data-text="3" <?php if($isEdit): ?> class="edit" <?php endif; ?>><?php echo $textList[3]; ?></h2>
        <p data-text="4" class="desc <?php if($isEdit): ?> edit <?php endif; ?>"><?php echo $textList[4]; ?></p>
      </div>
      <div class="block-news-home">
        <div class="row">
          <?php foreach( $articlesHotList as $obj ): ?>
          <div class="col-sm-3">
            <div class="news-item">
              <figure class="box-thumb">
                <a href="<?php echo route('news-detail', [ $obj->cate->slug, $obj->slug, $obj->id ]); ?>" title="<?php echo $obj->title; ?>"><img src="<?php echo e(Helper::showImage( $obj->image_url )); ?>" alt="<?php echo $obj->title; ?>"></a>
              </figure>
              <figcaption class="box-caption">
                <h2 class="news-title"><a href="<?php echo route('news-detail', [ $obj->cate->slug, $obj->slug, $obj->id ]); ?>" title="<?php echo $obj->title; ?>"><?php echo $obj->title; ?></a></h2>
                <p class="news-meta"><i class="fa fa-calendar"></i> 20/09/2017</p>
                <p class="news-desc"><?php echo $obj->description; ?></p>
              </figcaption>
              <p class="news-btn"><a href="<?php echo route('news-detail', [$obj->cate->slug, $obj->slug, $obj->id ]); ?>">Xem chi tiết</a></p>
            </div>
          </div><!-- /item -->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div><!-- /block_big-title -->
<?php $__env->stopSection(); ?>