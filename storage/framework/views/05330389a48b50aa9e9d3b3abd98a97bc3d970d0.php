<div class="col-sm-3 col-xs-12 block-col-left">
    <div class="block-sidebar">
        <div class="block-module block-search-sidebar">
            <div class="block-title">
                <h2>
                    <i class="fa fa-search"></i>
                    TÌM KIẾM SẢN PHẨM
                </h2>
            </div>
            <div class="block-content">
                <form action="<?php echo route('search'); ?>" method="GET" id="searchForm" class="frm-search">
                    <div class="form-group">
                    <input type="text" class="form-control txtSearch" id="keyword" name="keyword" value="<?php echo e(isset($tu_khoa) ? $tu_khoa : ""); ?>" placeholder="Từ khóa tìm kiếm...">
                  </div>
                    <div class="form-group">
                    <input type="text" class="form-control" id="code" name="code" value="<?php echo e(isset($code) ? $code : ""); ?>" placeholder="Mã sản phẩm">
                  </div>
                    <div class="form-group">
                        <select class="form-control" id="price_range" name="p">
                        <option value="">--Chọn mức giá--</option>
                        <?php foreach( $priceList as $price): ?>
                        <option value="<?php echo $price->id; ?>" <?php echo e(isset($p) && $p == $price->id ? "selected" : ""); ?>><?php echo $price->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                    <div class="form-group">
                        <select class="form-control" id="parent_id" name="pid">
                        <option value="">--Chọn danh mục--</option>
                        <?php foreach( $cateParentList as $parent ): ?>
                        <option value="<?php echo e($parent->id); ?>" <?php echo e(isset($parent_id) && $parent_id == $parent->id ? "selected" : ""); ?>><?php echo $parent->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                    <div class="form-group">
                        <div class="choose-prod-color-list">
                            <?php foreach( $colorList as $color ): ?>
                            <a href="javascript:;"  data-id="<?php echo e($color->id); ?>" class="choose-color <?php echo e(isset($colorArr) && in_array($color->id, $colorArr) ? "active" : ""); ?>" style="background-color:<?php echo e($color->color_code); ?>"></a>
                            <input type="hidden" name="color[]" value="<?php echo e(isset($colorArr) && in_array($color->id, $colorArr) ? $color->id : ""); ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <button type="submit"  class="btn btn-main show btnSearch">Tìm kiếm</button>
                  </div>
                </form>
            </div>
        </div>
        <div class="block-module block-links-sidebar">
            <div class="block-title">
                <h2>
                    <i class="fa fa-gift"></i>
                    Khuyến mãi hot
                </h2>
            </div>
            <div class="block-content">
                <ul class="list">
                    <?php if($kmHot): ?>
                    <?php foreach( $kmHot as $obj ): ?>
                    <li>
                        <a href="<?php echo route('news-detail', [ $obj->cate->slug, $obj->slug, $obj->id ] ); ?>" title="<?php echo $obj->title; ?>">
                            <p class="thumb"><img src="<?php echo Helper::showImage( $obj->image_url ); ?>" alt="<?php echo $obj->title; ?>"></p>
                            <h3><?php echo $obj->title; ?></h3>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="block-module block-statistics-sidebar">
            <div class="block-title">
                <h2>
                    <i class="fa fa-bar-chart"></i>
                    THỐNG KÊ TRUY CẬP
                </h2>
            </div>
            <div class="block-content">
                <ul class="list">                    
                    <li>
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="text">Hôm nay:</span>
                        <span class="number"><?php echo e(Helper::view(1, 3, 1)); ?></span>
                    </li>
                    
                    <li>
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="text">Tổng truy cập:</span>
                        <span class="number"><?php echo e(Helper::view(1, 3)); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- /block-col-left -->