<?php 
if( $user = selectDBNew("applications",[$_GET["id"]],"`id` = ?","")){
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
						<label class="control-label mb-10">Name</label>
						<input type="text" id="enname" class="form-control" value="<?php echo $user[0]["fullName"];?>" disabled>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10">E-mail</label>
						<input type="text" id="arname" class="form-control" value="<?php echo $user[0]["email"];?>" disabled>
						</div>
					</div>
					<!--/span-->
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10">Phone</label>
						<input type="text" id="enname" class="form-control" value="<?php echo $user[0]["phone"];?>" disabled>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10">Joinging Date</label>
						<input type="text" id="arname" class="form-control" value="<?php $date = explode(" ",$user[0]["date"]); echo $date[0];?>" disabled>
						</div>
					</div>
					<!--/span-->
				</div>
			</form>
		</div>
		</div>
		</div>
		</div>
	</div>
</div>