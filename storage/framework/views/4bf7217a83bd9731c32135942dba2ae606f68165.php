<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="vi-VN" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vi">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index,follow"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="description" content="<?php echo $__env->yieldContent('site_description'); ?>"/>
    <meta name="keywords" content="<?php echo $__env->yieldContent('site_keywords'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="<?php echo e(URL::asset('public/assets/images/favicon.ico')); ?>" type="image/x-icon"/>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?>" />
    <meta property="og:description" content="<?php echo $__env->yieldContent('site_description'); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:site_name" content="phukiencuoigiang.com" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="<?php echo e(Helper::showImage($socialImage)); ?>" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('site_description'); ?>" />
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title'); ?>" />        
    <meta name="twitter:image" content="<?php echo e(Helper::showImage($socialImage)); ?>" />	

	<!-- ===== Style CSS ===== -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/assets/css/style.css')); ?>">
	<!-- ===== Responsive CSS ===== -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/assets/css/responsive.css')); ?>">

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link href='css/animations-ie-fix.css' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
	<![endif]-->
	<?php echo $settingArr['google_analystic']; ?>

</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=567408173358902";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>

	<?php echo $__env->make('frontend.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="wrapper">
		
		<?php echo $__env->yieldContent('content'); ?>

	</div><!-- /wrapper-->

	<?php echo $__env->make('frontend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
  		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</a><!-- Return To Top -->
	<input type="hidden" id="route-add-to-cart" value="<?php echo e(route('add-product')); ?>" />
	<input type="hidden" id="route-short-cart" value="<?php echo e(route('short-cart')); ?>" />
	<input type="hidden" id="route-update-product" value="<?php echo e(route('update-product')); ?>" />	
	<input type="hidden" id="route-cart" value="<?php echo e(route('cart')); ?>" />	
	<input type="hidden" id="route-save-content" value="<?php echo e(route('save-content')); ?>" />	

	<?php echo $__env->make('frontend.partials.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<!-- ===== JS ===== -->
	<script src="<?php echo e(URL::asset('public/assets/js/jquery.min.js')); ?>"></script>
	<!-- ===== JS Bootstrap ===== -->
	<script src="<?php echo e(URL::asset('public/assets/lib/bootstrap/bootstrap.min.js')); ?>"></script>
	<!-- carousel -->
	<script src="<?php echo e(URL::asset('public/assets/lib/carousel/owl.carousel.min.js')); ?>"></script>
	<!-- sticky -->
    <script src="<?php echo e(URL::asset('public/assets/lib/sticky/jquery.sticky.js')); ?>"></script>
    <!-- Js Common -->
	<script src="<?php echo e(URL::asset('public/assets/js/common.js')); ?>"></script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59b215c2a2658a8a"></script> 	
	<script src="https://apis.google.com/js/platform.js" async defer></script>	
	<?php echo $__env->yieldContent('js'); ?>
	

</body>
</html>
