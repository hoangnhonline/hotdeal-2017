<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sản phẩm mới    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('product.index')); ?>">Sản phẩm mới</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="<?php echo e(route('product.index', ['parent_id' => $detail->parent_id, 'cate_id' => $detail->cate_id])); ?>" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="<?php echo e(route('product', [$detail->slug] )); ?>" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <form role="form" method="POST" action="<?php echo e(route('product.update')); ?>" id="dataForm" class="productForm">
    <div class="row">
      <!-- left column -->
      <input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->               
            <?php echo csrf_field(); ?>          
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
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>                    
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>                                                      
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Danh mục cha</label>
                          <select class="form-control" name="parent_id" id="parent_id">
                            <option value="">--Chọn--</option>
                            <?php foreach( $cateParentList as $value ): ?>
                            <option value="<?php echo e($value->id); ?>"
                            <?php 
                            if( old('parent_id') && old('parent_id') == $value->id ){ 
                              echo "selected";
                            }else if( $detail->parent_id == $value->id ){
                              echo "selected";
                            }else{
                              echo "";
                            }
                            ?>

                            ><?php echo e($value->name); ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                          <div class="form-group col-md-6 none-padding pleft-5">
                          <label for="email">Danh mục con<span class="red-star">*</span></label>

                          <select class="form-control req" name="cate_id" id="cate_id">
                            <option value="">--Chọn--</option>
                            <?php foreach( $cateArr as $value ): ?>
                            <option value="<?php echo e($value->id); ?>" <?php echo e(old('cate_id', $detail->cate_id) == $value->id ? "selected"  : ""); ?>

                              
                            ><?php echo e($value->name); ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>     
                        <div class="form-group" >                  
                          <label>CODE <span class="red-star">*</span></label>
                          <input type="text" class="form-control req" name="code" id="code" value="<?php echo e(old('code', $detail->code)); ?>">
                        </div>                      
                        <div class="form-group" >                  
                          <label>Tên <span class="red-star">*</span></label>
                          <input type="text" class="form-control req" name="name" id="name" value="<?php echo e(old('name', $detail->name)); ?>">
                        </div>
                        <div class="form-group">                  
                          <label>Slug <span class="red-star">*</span></label>                  
                          <input type="text" class="form-control req" readonly="readonly" name="slug" id="slug" value="<?php echo e(old('slug', $detail->slug)); ?>">
                        </div>                        
                        <div class="col-md-3 none-padding">
                          <div class="checkbox">
                              <label><input type="checkbox" name="is_hot" value="1" <?php echo e(old('is_hot', $detail->is_hot) == 1 ? "checked" : ""); ?>> NỔI BẬT </label>
                          </div>                          
                        </div>
                        <div class="col-md-3 none-padding">
                          <div class="checkbox">
                              <label><input type="checkbox" name="is_new" value="1" <?php echo e(old('is_new', $detail->is_new) == 1 ? "checked" : ""); ?>> NEW </label>
                          </div>                          
                        </div>                        
                        <div class="col-md-3 none-padding pleft-5">
                            <div class="checkbox">
                              <label><input type="checkbox" name="is_sale" id="is_sale" value="1" <?php echo e(old('is_sale', $detail->is_sale) == 1 ? "checked" : ""); ?>> SALE </label>
                          </div>
                        </div>
                        <div class="form-group col-md-4 none-padding" >                  
                            <label>Giá<span class="red-star">*</span></label>
                            <input type="text" class="form-control number" name="price" id="price" value="<?php echo e(old('price', $detail->price)); ?>">
                        </div>
                        <div class="form-group col-md-4 pleft-5 none-padding" >                  
                            <label>Giá SALE</label>
                            <input type="text" class="form-control number <?php echo e(old('is_sale', $detail->is_sale) == 1  ? "req" : ""); ?>" name="price_sale" id="price_sale" value="<?php echo e(old('price_sale', $detail->price_sale)); ?>">
                        </div>
                        <div class="form-group col-md-4" >                  
                            <label>% SALE</label>
                            <input type="text" class="form-control number <?php echo e(old('is_sale', $detail->is_sale) == 1  ? "req" : ""); ?>" name="sale_percent" id="sale_percent" value="<?php echo e(old('sale_percent', $detail->sale_percent)); ?>">
                        </div>
                         <div class="col-md-6 none-padding">
                          <label>Số lượng tồn<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control req number" name="inventory" id="inventory" value="<?php echo e(old('inventory', $detail->inventory)); ?>">                        
                        </div>
                      <div class="col-md-6">
                          <label>Màu sắc</label>
                          <select name="color_id" id="color_id" class="form-control">
                              <option value="">--chọn--</option>
                              <?php if( $colorArr->count() > 0): ?>
                                <?php foreach( $colorArr as $color ): ?>
                                    <option value="<?php echo e($color->id); ?>" <?php echo e(old('color_id', $detail->color_id) == $color->id ? "selected" : ""); ?>><?php echo e($color->name); ?></option>
                                <?php endforeach; ?>
                              <?php endif; ?>
                          </select>
                      </div>
                      <div style="margin-bottom:10px;clear:both"></div>
                      <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="4" name="description" id="description"><?php echo e(old('description', $detail->description)); ?></textarea>
                      </div>
                      
                      <div class="form-group">
                          <label>Chi tiết</label>
                          <textarea class="form-control" rows="4" name="content" id="content"><?php echo e(old('content', $detail->content)); ?></textarea>
                        </div>  
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                    
                   
                     <div role="tabpanel" class="tab-pane" id="settings">
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                         
                          <div class="col-md-12" style="text-align:center">                            
                            
                            <input type="file" id="file-image"  style="display:none" multiple/>
                         
                            <button class="btn btn-primary btnMultiUpload" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                            <div class="clearfix"></div>
                            <div id="div-image" style="margin-top:10px">                              
                              <?php if( $hinhArr ): ?>
                                <?php foreach( $hinhArr as $k => $hinh): ?>
                                  <div class="col-md-3">
                                    <img class="img-thumbnail" src="<?php echo e(Helper::showImage($hinh)); ?>" style="width:100%">
                                    <div class="checkbox">                                   
                                      <label><input type="radio" name="thumbnail_id" class="thumb" value="<?php echo e($k); ?>" <?php echo e($detail->thumbnail_id == $k ? "checked" : ""); ?>> Ảnh đại diện </label>
                                      <button class="btn btn-danger btn-sm remove-image" type="button" data-value="<?php echo e($hinh); ?>" data-id="<?php echo e($k); ?>" >Xóa</button>
                                    </div>
                                    <input type="hidden" name="image_id[]" value="<?php echo e($k); ?>">
                                  </div>
                                <?php endforeach; ?>
                              <?php endif; ?>

                            </div>
                          </div>
                          <div style="clear:both"></div>
                        </div>

                     </div><!--end hinh anh-->
                     
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">             
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="<?php echo e(route('product.index', ['parent_id' => $detail->parent_id, 'cate_id' => $detail->cate_id])); ?>">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-4">      
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
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>

    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<input type="hidden" id="route_upload_tmp_image_multiple" value="<?php echo e(route('image.tmp-upload-multiple')); ?>">
<input type="hidden" id="route_upload_tmp_image" value="<?php echo e(route('image.tmp-upload')); ?>">
<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #444345 !important;
  }
  .error{
    border : 1px solid red;
  }
  .select2-container--default .select2-selection--single{
    height: 35px !important;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
    $(document).ready(function(){           
      $('#parent_id').change(function(){
        location.href="<?php echo e(route('product.create')); ?>?parent_id=" + $(this).val();
      })
    
    });
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>