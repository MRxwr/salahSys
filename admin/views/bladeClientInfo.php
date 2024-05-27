<?php 
if( $application = selectDBNew("applications",[$_GET["id"]],"`id` = ?","")){
	$applicant = json_decode($application[0]["applicant"],true);
	$address = json_decode($application[0]["address"],true);
	$visa = json_decode($application[0]["visa"],true);
	$sponsor = json_decode($application[0]["sponsor"],true);
	$attachment = json_decode($application[0]["attachment"],true);
}else{
	header("LOCATION: ?v=Applications");die();
}
?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
		<div class="panel-wrapper collapse in">
		<div class="panel-body">
		<div class="form-wrap">
			<form action="#">
				<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("User Details","معلومات العضو") ?></h6>
				<hr class="light-grey-hr"/>
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("English Name","الاسم باللغة الانجليزية") ?></label>
						<input type="text" id="applicant[enName]" class="form-control" value="<?php echo $applicant["enName"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Arabic Name","الاسم باللغة العربية") ?></label>
						<input type="text" id="applicant[arName]" class="form-control" value="<?php echo $applicant["arName"];?>">
						</div>
					</div>

				</div>
			</form>
		</div>
		</div>
		</div>
		</div>
	</div>
</div>