<?php $this->load->view('admin/_includes/header');?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->

		<h3 class="page-title">
			Edit Service
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li><i class="icon-home"></i> <a
					href="<?php echo base_url('admin'); ?>">Home</a> <i
					class="fa fa-angle-right"></i></li>
				<li><a href="<?php echo base_url('admin/services'); ?>">Services</a>
					<i class="fa fa-angle-right"></i></li>
				<li><span> Edit Service</span>	
			</ul>
		</div>
		<!-- END PAGE HEADER-->

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet light ">
					<div class="portlet-title">
						<div class="caption font-dark">
							<i class="icon-settings font-dark"></i> <span
								class="caption-subject bold uppercase"> Edit Service</span>
						</div>
						<div class="actions">
							<a href="<?php echo base_url('admin/services');?>" class="btn btn-circle default"> Back</a>
						</div>
					</div>
					<div class="portlet-body">
					
							<?php if($this->session->flashdata("success_message")!=""){?>
			                <div class="Metronic-alerts alert alert-info fade in">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true"></button>
								<i class="fa-lg fa fa-check"></i>  <?php echo $this->session->flashdata("success_message");?>
			                </div>
			              <?php }?>
			              <?php if($this->session->flashdata("error_message")!=""){?>
			                <div
								class="Metronic-alerts alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true"></button>
								<i class="fa-lg fa fa-warning"></i>  <?php echo $this->session->flashdata("error_message");?>
			                </div>
			              <?php }?>
			              
			              <?php if(validation_errors()!=""){?>
			                <div
								class="Metronic-alerts alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true"></button>
								<i class="fa-lg fa fa-warning"></i>  <?php echo validation_errors();?>
			                </div>
			              <?php }?>
			              
			              <?php if( $this->upload->display_errors()!=""){?>
			                <div
								class="Metronic-alerts alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true"></button>
								<i class="fa-lg fa fa-warning"></i>  <?php echo  $this->upload->display_errors();?>
			                </div>
			              <?php }?>

						<form id="add_student_form" class="horizontal-form" action="<?php echo base_url('admin/update_service');?>"
							method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?= $services[0]->id; ?>">
							<input type="hidden" id="cat_id" value="<?= $services[0]->main_category ?>" />
							<div class="form-body">
								<div class="row">
									<div class="col-md-4 col-md-push-1">
										<div class="form-group">
											<label class="control-label">Service Name</label><span style="color:red">*</span>
											<input id="product_name" name="product_name" class="form-control" type="text" value="<?= set_value('product_name', $services[0]->name); ?>">
										</div>
									</div>
									<div class="col-md-2 col-md-push-1">
										<img id="old" src="<?php echo upload_path.'services/'.$services[0]->image; ?>"
										 width="80" height="80">
										<img id="blah" src="#" style="display:none;" alt="blog image" />
									</div>
									<div class="col-md-4 col-md-push-1">
										<div class="form-group">
											<label class="control-label">Service Image </label><span style="color:red">*</span><br>
											<div class="fileinput fileinput-new"
												data-provides="fileinput">
												<div class="input-group input-large">
													<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
														<i class="fa fa-file fileinput-exists"></i>&nbsp; 
														<span class="fileinput-filename"> </span>
													</div>
													<span class="input-group-addon btn default btn-file"> 
														<span class="fileinput-new"> Select file </span> 
														<span class="fileinput-exists"> Change </span> 
														<input type="file" name="image"  onchange="readURL(this);" accept="image/*">
													</span> 
													<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput" onclick="removeSingleImg()">X</a>
														
												</div>
											</div>
											<span class="help-block"> Allowed file types .jpg, .png</span>
										</div>
										</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-md-push-2">
										<div class="form-group">
											<label class="control-label">Main Category</label><span style="color:red">*</span>
											
											<select id="main_category" name="main_category" class="form-control" onChange="service_subcat(this.value);" >
												<option value="">--Select--</option>
												<option value="1" <?php if($services[0]->main_category == 1){ echo 'selected'; }?>>Customized Designing</option>
												<option value="2" <?php if($services[0]->main_category == 2){ echo 'selected'; }?> >Upholstery</option>
											</select>
											
										</div>
									</div>
 
									<div class="col-md-4 col-md-push-2" id="service_subcat">
										<div class="form-group">
											<label class="control-label">Sub Category</label><span style="color:red">*</span>
											
											<select id="sub_category" name="sub_category" class="form-control"  >
												<option value="">--Select--</option>
												<?php for($i=0;$i<count($category);$i++){ ?>
												<option value="<?= $category[$i]->id ?>" <?php if($services[0]->sub_category == $category[$i]->id){ echo 'selected'; }?>><?php echo $category[$i]->name; ?></option>
												<?php } ?>
											</select>
											
										</div>
									</div>
								</div>

		                        <div class="col-md-12">
									<div class="form-group">
										<label class="control-label">Service Description</label>
										<textarea rows="3" id="product_desc" name="product_desc" class="form-control" > <?= $services[0]->description; ?></textarea>
									</div>
								</div>
								 
							</div>
							<div class="form-actions right">
								<button type="submit" class="btn blue">
									<i class="fa fa-check"></i> Update
								</button>
								<a type="button" class="btn default" href="<?php echo base_url('admin/services');?>">Cancel</a>
							</div>
						</form>
					</div>
				</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
		</div>

	</div>
	<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<?php
$this->load->view ( 'admin/_includes/footer', $data );
?>

<script>

	$(document).ready(function() {
		var selectid=$('#cat_id').val();
		if(selectid==1){
			$('#service_subcat').show();
		}else{
			$('#service_subcat').hide();
		}

	});
	function service_subcat(subcat_id){
		if(subcat_id==1){
			$('#service_subcat').show();
		}else{
			$('#service_subcat').hide();
		}
	}
	function readURL(input) {
		
        if (input.files && input.files[0]) {
			$('#blah').show();
			$('#old').hide();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(98)
                    .height(90);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	
	function removeSingleImg(){
		$('#blah').hide();
		$('#old').show();
	}
</script>