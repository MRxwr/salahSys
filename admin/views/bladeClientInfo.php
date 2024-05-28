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

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Civil Id","الرقم المدني") ?></label>
						<input type="number" step="any" minlength="12" maxlength="12" id="applicant[civilId]" class="form-control" value="<?php echo $applicant["civilId"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Date of birth","تاريخ الميلاد") ?></label>
						<input type="date" id="applicant[dob]" class="form-control" value="<?php echo $applicant["dob"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Mobile Number","رقم الجوال") ?></label>
						<input type="number" step="any" minlength="8" maxlength="8" id="applicant[phone]" class="form-control" value="<?php echo $applicant["phone"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Gender","الجنس") ?></label>
						<select class="form-control" name="applicant[gender]">
							<?
							$selectedMale = ($applicant["gender"] == "Male") ? "selected" : "";
							$selectedFemale = ($applicant["gender"] == "Female") ? "selected" : "";
							?>
							<option <? echo $selectedMale ?>>Male / ذكر</option>
							<option <? echo $selectedFemale ?>>Female / انثى</option>
						</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Gender","الجنس") ?></label>
						<select class="form-control" name="applicant[bloodType]">
							<?
							$types = ["O+","O-","A+","A-","B+","B-","AB+","AB-"];
							for( $i = 0; $i < sizeof($types); $i++ ){
								$selected = ($types[$i] == $applicant["bloodType"]) ? "selected" : "";
								echo "<option{$selected}>{$types[$i]}</option>";
							}
							?>
						</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Nationality","الجنسية") ?></label>
						<select class="form-control" name="applicant[nationality]">
							<?php
                                if( $countries = selectDB("cities","`status` = '1' GROUP BY `CountryName` ORDER BY `CountryName` ASC") ){
                                    foreach( $countries as $country ){
										// check if selected
										$selected = ($country["id"] == $applicant["nationality"]) ? "selected" : "";
                                        ?>
                                        <option value="<?= $country["id"] ?>" <? echo $selected ?>><?= $country["CountryName"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
						</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Area","المنطقة") ?></label>
						<select class="form-control" name="address[area]">
							<?php
                                if( $areas = selectDB("areas","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $areas as $area ){
										// check if selected
										$selected = ($area["id"] == $address["area"]) ? "selected" : "";
                                        ?>
                                        <option value="<?= $area["id"] ?>" <? echo $selected ?>><?= direction("{$area["enTitle"]}","{$area["arTitle"]}") ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
						</select>
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