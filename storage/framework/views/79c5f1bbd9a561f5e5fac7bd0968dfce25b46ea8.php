<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Danh mục con     
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('cate.index')); ?>">Danh mục con</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php 
    $slug = $loaiSp ? $loaiSp->slug : "danh-muc";
    ?>
    <a class="btn btn-default" href="<?php echo e(route('cate.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="<?php echo e(route('cate', [$slug, $detail->slug] )); ?>" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="POST" action="<?php echo e(route('cate.update')); ?>" id="dataForm">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
            <div class="box-body">
              <?php if(Session::has('message')): ?>
              <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
              <?php endif; ?>
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>
               <div class="form-group">
                  <label>Danh mục cha</label>
                  <select class="form-control" name="parent_id" id="parent_id">                  
                    <option value="0" <?php echo e($detail->parent_id == 0 ? "selected" : ""); ?>>--chọn--</option>
                    <?php foreach( $cateParentList as $value ): ?>
                    <option value="<?php echo e($value->id); ?>" <?php echo e(( $detail->parent_id == $value->id ) ? "selected" : ""); ?>><?php echo e($value->name); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div> 
               <!-- text input -->
              <div class="form-group">
                <label>Tên danh mục <span class="red-star">*</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($detail->name); ?>">
              </div>
              <div class="form-group">
                <label>Slug <span class="red-star">*</span></label>
                <input type="text" class="form-control" readonly="readonly" name="slug" id="slug" value="<?php echo e($detail->slug); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="4" name="description" id="description"><?php echo e($detail->description); ?></textarea>
              </div>              
              <div class="form-group">
                <label>Ẩn/hiện</label>
                <select class="form-control" name="status" id="status">                  
                  <option value="0" <?php echo e($detail->status == 0 ? "selected" : ""); ?>>Ẩn</option>
                  <option value="1" <?php echo e($detail->status == 1 ? "selected" : ""); ?>>Hiện</option>
                </select>
              </div>              
            </div>         
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="<?php echo e(route('cate.index')); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>
        <!-- /.box-header -->
            <div class="box-body">
              <input type="hidden" name="meta_id" value="<?php echo e($detail->meta_id); ?>">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo e(!empty((array)$meta) ? $meta->title : ""); ?>">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="6" name="meta_description" id="meta_description"><?php echo e(!empty((array)$meta) ? $meta->description : ""); ?></textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords"><?php echo e(!empty((array)$meta) ? $meta->keywords : ""); ?></textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="6" name="custom_text" id="custom_text"><?php echo e(!empty((array)$meta) ? $meta->custom_text : ""); ?></textarea>
              </div>
            
          </div>    

      </div>
      <!--/.col (left) -->      
    </div>    
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>