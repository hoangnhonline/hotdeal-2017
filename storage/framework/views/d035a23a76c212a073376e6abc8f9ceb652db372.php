<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Bài viết
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo e(route( 'articles.index' )); ?>">Bài viết</a></li>
    <li class="active">Danh sách</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php if(Session::has('message')): ?>
      <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
      <?php endif; ?>
      <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-info btn-sm" style="margin-bottom:5px">Tạo mới</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Bộ lọc</h3>
        </div>
        <div class="panel-body">
          <form class="form-inline" role="form" method="GET" action="<?php echo e(route('articles.index')); ?>" id="searchForm">            
            <div class="form-group">
              <label for="email">Danh mục </label>
              <select class="form-control" name="cate_id" id="cate_id">
                <option value="">--Tất cả--</option>
                <?php if( $cateArr->count() > 0): ?>
                  <?php foreach( $cateArr as $value ): ?>
                  <option value="<?php echo e($value->id); ?>" <?php echo e($value->id == $cate_id ? "selected" : ""); ?>><?php echo e($value->name); ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>            
            <div class="form-group">
              <label for="email">Từ khóa :</label>
              <input type="text" class="form-control" name="title" value="<?php echo e($title); ?>">
            </div>
            <button type="submit" class="btn btn-default btn-sm">Lọc</button>
          </form>         
        </div>
      </div>
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách ( <span class="value"><?php echo e($items->total()); ?> bài viết )</span></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div style="text-align:center">
            <?php echo e($items->appends( ['cate_id' => $cate_id, 'title' => $title] )->links()); ?>

          </div>  
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width: 1%">#</th>              
              <th width="200">Thumbnail</th>
              <th>Tiêu đề</th>
              <th width="1%;white-space:nowrap">Thao tác</th>
            </tr>
            <tbody>
            <?php if( $items->count() > 0 ): ?>
              <?php $i = 0; ?>
              <?php foreach( $items as $item ): ?>
                <?php $i ++; ?>
              <tr id="row-<?php echo e($item->id); ?>">
                <td><span class="order"><?php echo e($i); ?></span></td>       
                <td>
                  <img class="img-thumbnail" src="<?php echo e(Helper::showImage($item->image_url)); ?>" width="145">
                </td>        
                <td>                  
                  <a style="font-size:17px" href="<?php echo e(route( 'articles.edit', [ 'id' => $item->id ])); ?>"><?php echo e($item->title); ?></a>                
                  
                  <?php if( $item->is_hot == 1 ): ?>
                  <label class="label label-danger">HOT</label>
                  <?php endif; ?>
                  <div class="block-author">
                      <ul>
                        <li>
                          <span>Tác giả:</span>
                          <span class="name"><?php echo $item->createdUser->display_name; ?></span>
                        </li>
                        <li>
                            <span>Ngày tạo:</span>
                          <span class="name"><?php echo date('d/m/Y H:i', strtotime($item->created_at)); ?></span>
                          
                        </li>
                         <li>
                            <span>Cập nhật:</span>
                          <span class="name"><?php echo $item->updatedUser->display_name; ?> ( <?php echo date('d/m/Y H:i', strtotime($item->updated_at)); ?> )</span>          
                        </li>  
                        <li>
                          <?php echo Helper::view($item->id, 2); ?> lượt xem
                        </li>
                      </ul>
                    </div>
                  <p><?php echo e($item->description); ?></p>
                </td>
                <td style="white-space:nowrap"> 
                  <a class="btn btn-default btn-sm" href="<?php echo e(route('news-detail', [$item->cate->slug, $item->slug, $item->id ])); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>                 
                  <a href="<?php echo e(route( 'articles.edit', [ 'id' => $item->id ])); ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>                 
                  
                  <a onclick="return callDelete('<?php echo e($item->title); ?>','<?php echo e(route( 'articles.destroy', [ 'id' => $item->id ])); ?>');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                  
                </td>
              </tr> 
              <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="9">Không có dữ liệu.</td>
            </tr>
            <?php endif; ?>

          </tbody>
          </table>
          <div style="text-align:center">
            <?php echo e($items->appends( ['cate_id' => $cate_id, 'title' => $title] )->links()); ?>

          </div>  
        </div>        
      </div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
<input type="hidden" id="table_name" value="articles">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>