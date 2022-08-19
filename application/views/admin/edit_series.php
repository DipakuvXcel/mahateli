<?php $this->load->view('admin/_includes/header');?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->

		<h3 class="page-title">
			Edit Product Series
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li><i class="icon-home"></i> <a
					href="<?php echo base_url('admin'); ?>">Home</a> <i
					class="fa fa-angle-right"></i></li>
				<li><a href="<?php echo base_url('admin/product_series'); ?>">Product Series</a>
					<i class="fa fa-angle-right"></i></li>
				<li><span> Edit Product Series</span>	
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
								class="caption-subject bold uppercase"> Edit Product Series</span>
						</div>
						<div class="actions">
							<a href="<?php echo base_url('admin/product_series');?>" class="btn btn-circle default"> Back</a>
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
			              
			             
		              
						<form id="add_student_form" class="horizontal-form" action="<?php echo base_url('admin/update_edit_series');?>"
							method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?= $series->id; ?>">
							<div class="form-body">
								<div class="row">
								<div class="col-md-4">
								<label class="control-label">Start Series</label><span style="color:red">*</span>
									<div class="form-group">
										<input id="start_number" name="start_number" class="form-control" type="text" value="<?= set_value('start_number',$series->start_number); ?>">
									</div>
								</div>
								
								<div class="col-md-4">
								<label class="control-label">End Series</label><span style="color:red">*</span>
									<div class="form-group">
										<input id="end_number" name="end_number" class="form-control" type="text" value="<?= set_value('end_number',$series->end_number); ?>">
									</div>
								</div>
							 
								<div class="col-md-3" style="margin-top: 2%;text-align: right;">
								<button type="submit" class="btn blue">
									<i class="fa fa-check"></i> Update
								</button>
								<a type="button" class="btn default" href="<?php echo base_url('admin/product_series');?>">Cancel</a>
								</div>	 
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