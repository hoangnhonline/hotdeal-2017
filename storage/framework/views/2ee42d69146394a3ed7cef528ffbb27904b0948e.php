<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Màu
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('color.index')); ?>">Màu</a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="<?php echo e(route('color.index')); ?>" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="<?php echo e(route('color.store')); ?>">
    <div class="row">
      <!-- left column -->

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tạo mới</h3>
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>


            <div class="box-body">
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php foreach($errors->all() as $error): ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
              <?php endif; ?>                
                <div class="form-group" >
                  
                  <label>Tên màu<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>">
                </div> 
                <div class="form-group" >
                  
                  <label>Mã màu<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="color_code" id="name" value="<?php echo e(old('color_code')); ?>">
                </div>               
                  
            </div>              
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="<?php echo e(route('color.index')); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

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