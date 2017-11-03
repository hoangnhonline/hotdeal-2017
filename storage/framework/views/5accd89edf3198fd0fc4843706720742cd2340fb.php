<header class="header">
	<div class="block-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-12 block-logo">
					<a href="<?php echo route('home'); ?>" title="Logo">
						<img src="<?php echo e(URL::asset('public/assets/images/logo.png')); ?>" alt="Logo">
					</a>
				</div><!-- /block-logo -->
				<div class="col-sm-8 col-xs-12 block-info">
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<div class="block-search">
								<form class=""  action="<?php echo e(route('search')); ?>" method="GET">
									<button type="submit" class="btn icon btnSearch"><i class="fa fa-search"></i></button>
									<div class="search-inner">
										<input type="text" class="txtSearch" value="<?php echo isset($tu_khoa) ? $tu_khoa : ""; ?>" name="keyword" placeholder="Từ khóa bạn cần tìm...">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div><!-- /bblock-info -->				
				<form class="hdr-search"  action="<?php echo e(route('search')); ?>" method="GET">
					<div class="input-serach">
						<input type="text" class="txtSearch" value="<?php echo isset($tu_khoa) ? $tu_khoa : ""; ?>" name="keyword" placeholder="Từ khóa bạn cần tìm...">
					</div>
					<div class="select-choice">
						<div class="form-category">
							<select class="cid choice" name="pid">
								<option value="">Danh mục</option>
								<?php foreach($cateParentList as $value): ?>
							   	<option value="<?php echo e($value->id); ?>" <?php echo e(isset($parent_id) && $parent_id == $value->id ? "selected" : ""); ?>><?php echo $value->name; ?></option>>
							   	<?php endforeach; ?>
							</select>
						</div>
						<button type="submit" class="btn-search">Tìm kiếm</button>
					</div>
				</form>

				<div class="hdr-cart">
					<a href="<?php echo e(route('cart')); ?>" title="Giỏ hàng">
						<i class="fa fa-shopping-cart"></i>
						<span>Giỏ hàng</span><br>
						<span><b><?php echo e(Session::get('products') ? array_sum(Session::get('products')) : 0); ?></b> sản phẩm</span>
					</a>
				</div>

				<ul class="hdr-social">
					<li><a href=""><i class="fa fa-facebook"></i></a></li>
					<li><a href=""><i class="fa fa-google"></i></a></li>
					<li><a href=""><i class="fa fa-youtube"></i></a></li>
					<li><a href=""><i class="fa fa-skype"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="block-fb">
			<div class="icon">
				<i class="fa fa-facebook"></i>
			</div>
			<div class="fb-inner">
				<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width="300px" data-height="500px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
			</div>
		</div>
	</div><!-- /block-header-bottom -->
	<div class="menu">
		<div class="nav-toogle">
			<i class="fa"></i>
		</div>
		<div class="block-cart-mb">
			<a href="<?php echo e(route('cart')); ?>" title="Giỏ hàng">
				<i class="fa fa-shopping-cart"></i>
				<span><?php echo e(Session::get('products') ? array_sum(Session::get('products')) : 0); ?></span>
			</a>
		</div>
		<nav class="menu-top">
			<div class="container">
				<ul class="nav-menu">
					<li class="level0 <?php if( $routeName == "home"): ?> active <?php endif; ?>"><a href="<?php echo route('home'); ?>" title="Trang Chủ">Trang Chủ</a></li>
					<li class="level0 <?php if( $routeName == "pages" && $slug == "gioi-thieu" ): ?> active <?php endif; ?>"><a href="<?php echo route('pages', 'gioi-thieu' ); ?>" title="Giới Thiệu">Giới Thiệu</a></li>
					<li class="level0 parent <?php if( in_array($routeName, ["cate-parent", "cate", "product"])): ?> active <?php endif; ?>">
						<a href="#" title="Sản Phẩm">SẢN PHẨM</a>
						<ul class="level0 submenu">
							<?php foreach( $cateParentList as $parent ): ?>							
							<li class="level1 <?php if( !empty( $cateArrByLoai[$parent->id] ) ): ?> parent <?php endif; ?> ">
								<a href="<?php echo route( 'cate-parent', $parent->slug ); ?>" title="<?php echo $parent->name; ?>"><?php echo $parent->name; ?></a>
								<?php if( !empty( $cateArrByLoai[$parent->id] ) ): ?>									
									<ul class="level1 submenu">
										<?php foreach( $cateArrByLoai[$parent->id] as $cate ): ?>
										<li class="level2"><a href="<?php echo e(route('cate', [ $parent->slug, $cate->slug ])); ?>" title="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></a></li>
										<?php endforeach; ?>
									</ul>									
								<?php endif; ?>
							</li>
							<?php endforeach; ?>
						</ul>
					</li>
					<li class="level0 <?php if( ( $routeName == "news-list" || $routeName == "news-detail" ) && isset($cateDetail) && $cateDetail->slug == "khuyen-mai" ): ?> active <?php endif; ?>""><a href="<?php echo route('news-list', 'khuyen-mai'); ?>" title="KHUYẾN MÃI">KHUYẾN MÃI</a></li>
					<li class="level0 <?php if( ( $routeName == "news-list" || $routeName == "news-detail")  && isset($cateDetail) && $cateDetail->slug == "tuyen-dung"  ): ?> active <?php endif; ?>""><a href="<?php echo route('news-list', 'tuyen-dung'); ?>" title="TUYỂN DỤNG">TUYỂN DỤNG</a></li>
					<li class="level0"><a href="<?php echo route('contact'); ?>" title="Liên Hệ">Liên Hệ</a></li>
					<li class="nav-info">
						<i class="fa fa-phone"></i> <a href="tel:<?php echo $textList[13]; ?>" data-text="13" <?php if($isEdit): ?> class="edit" <?php endif; ?>><?php echo $textList[13]; ?></a> - <a href="tel:<?php echo $textList[14]; ?>" <?php if($isEdit): ?> class="edit" <?php endif; ?>><?php echo $textList[14]; ?></a>
					</li>
				</ul>
			</div>
		</nav><!-- /menu-top -->
	</div><!-- /menu -->
</header><!-- /header -->