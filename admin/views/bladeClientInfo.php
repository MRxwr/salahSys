<?php 
if( $application = selectDBNew("applications",[$_GET["id"]],"`id` = ?","")){
	$applicant = json_decode($application[0]["applicant"],true);
	$address = json_decode($application[0]["address"],true);
	$applicationVisa = json_decode($application[0]["visa"],true);
	$sponsor = json_decode($application[0]["sponsor"],true);
	$attachment = json_decode($application[0]["attachment"],true);
}else{
	header("LOCATION: ?v=Applications");die();
}
?>
<style>
	.img-fluid{
		width: 100px;
		height: 100px;
	}
</style>
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

					<!-- application Info -->
					<div class="col-12 text-center">
					<hr class="light-grey-hr"/>
					<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("Application Info","معلومات الطلب") ?></h6>
					<hr class="light-grey-hr"/>
					</div>
<? var_dump($application); ?>
					<div class="col-md-4">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("License ID","رقم الرخصة") ?></label>
						<input type="text" name="licenseId" class="form-control" value="<?php echo $application[0]["licenseId"];?>">
						</div>
					</div>

					<!-- location -->

					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label mb-10"><? echo direction("Test Location","موقع الإختبار") ?></label>
							<select class="form-control" name="locationId" id="licenseType">
								<?php
								if( $locations = selectDB("location","`status` = '0' ORDER BY `enTitle` ASC") ){
									foreach( $locations as $location ){
										// check if selected
										$selected = ($location["id"] == $application[0]["locationId"]) ? "selected" : "";
										?>
										<option value="<?= $location["id"] ?>" <? echo $selected ?>><?= $location["enTitle"] . " - " . $location["arTitle"] ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Test Date","تاريخ الاختبار") ?></label>
						<input type="date" name="testDate" class="form-control" value="<?php echo $application[0]["testDate"];?>">
						</div>
					</div>

					<!-- applicant -->
					<div class="col-12 text-center">
						<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("Applicant Details","بيانات مقدم الطلب") ?></h6>
						<hr class="light-grey-hr"/>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("English Name","الاسم باللغة الانجليزية") ?></label>
						<input type="text" name="applicant[enName]" class="form-control" value="<?php echo $applicant["enName"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Arabic Name","الاسم باللغة العربية") ?></label>
						<input type="text" name="applicant[arName]" class="form-control" value="<?php echo $applicant["arName"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Civil Id","الرقم المدني") ?></label>
						<input type="number" step="any" minlength="12" maxlength="12" name="applicant[civilId]" class="form-control" value="<?php echo $applicant["civilId"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Date of birth","تاريخ الميلاد") ?></label>
						<input type="date" name="applicant[dob]" class="form-control" value="<?php echo $applicant["dob"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Mobile Number","رقم الجوال") ?></label>
						<input type="number" step="any" minlength="8" maxlength="8" name="applicant[phone]" class="form-control" value="<?php echo $applicant["phone"];?>">
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
						<label class="control-label mb-10"><? echo direction("Blood Type","نوع الدم") ?></label>
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

					<!-- address -->

					<div class="col-12 text-center">
						<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("Address Details","عنوان مقدم الطلب") ?></h6>
						<hr class="light-grey-hr"/>
					</div>

					<div class="col-md-12">
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
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Block","القطعه") ?></label>
						<input type="text" name="address[block]" class="form-control" value="<?php echo $address["block"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Street","الشارع") ?></label>
						<input type="text" name="address[street]" class="form-control" value="<?php echo $address["street"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("House","المنزل") ?></label>
						<input type="text" name="address[house]" class="form-control" value="<?php echo $address["house"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Avenu","الجاده") ?></label>
						<input type="text" name="address[ave]" class="form-control" value="<?php echo $address["ave"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Flat","الشقة") ?></label>
						<input type="text" name="address[flat]" class="form-control" value="<?php echo $address["flat"];?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Floor","الدور") ?></label>
						<input type="text" name="address[floor]" class="form-control" value="<?php echo $address["floor"];?>">
						</div>
					</div>

					<!-- visa -->

					<div class="col-12 text-center">
						<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("Visa Details","فيزا مقدم الطلب") ?></h6>
						<hr class="light-grey-hr"/>
					</div>

					<div class="col-md-4">
						<div class="form-group">
						<label class="control-label mb-10"><? echo direction("Visa Type","نوع الفيزا") ?></label>
						<select class="form-control" name="visa[Type]" id="visaType">
							<?php
							if( $visas = selectDB("visatype","`status` = '0' ORDER BY `enTitle` ASC") ){
								foreach( $visas as $visa ){
									// check if selected
									$selected = ($visa["id"] == $applicationVisa["Type"]) ? "selected" : "";
									?>
									<option value="<?= $visa["id"] ?>" <? echo $selected ?>><?= $visa["enTitle"] . " - " . $visa["arTitle"] ?></option>
									<?php
								}
							}
							?>
						</select>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
                            <label class="control-label mb-10"><? echo direction("Visa Expirey Date","تاريخ أنتهاء الفيزا") ?></label>
                            <input type="date" name="visa[ExpireyDate]" class="form-control" id="visaExpireyDate" value="<?php echo $applicationVisa["ExpireyDate"];?>">
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label mb-10"><? echo direction("Fishing License Expiry Date","تاريخ أنتهاء الرخصة البحرية") ?></label>
							<input type="date" name="visa[FLEdate]" class="form-control" id="FLEdate" value="<?php echo $applicationVisa["FLEdate"];?>">
						</div>
					</div>

					<!-- sponsor -->

					<div class="col-12 text-center">
						<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("Sponsors Details","بيانات الكفيل") ?></h6>
						<hr class="light-grey-hr"/>
					</div>

					<div class="col-md-4">
						<div class="form-group">
                            <label class="control-label mb-10"><? echo direction("Employer","جهة العمل") ?></label>
                            <input type="text" name="sponsor[Employer]" class="form-control" id="employer" value="<?php echo $sponsor["Employer"];?>">
                        </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
                            <label class="control-label mb-10"><? echo direction("Sponsors Name","اسم الكفيل") ?></label>
                            <input type="text" name="sponsor[Name]" class="form-control" id="SponsorsName" value="<?php echo $sponsor["Name"];?>">
                        </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
                            <label class="control-label mb-10"><? echo direction("Sponsors Civil ID No.","رقم الهوية للكفيل") ?></label>
                            <input type="number" name="sponsor[CivilId]" pattern="[0-9]*" step='1' min='0' minlength="8" value="<?php echo $sponsor["CivilId"];?>" class="form-control" id="sponsorsCivilId">
                        </div>
					</div>

					<!-- application Type -->
					<div class="col-12 text-center">
						<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("Type","نوع") ?></h6>
						<hr class="light-grey-hr"/>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label mb-10"><? echo direction("Application Type","نوع الطلب") ?></label>
							<select class="form-control" name="applicationType" id="applicationType">
								<?php
								if( $applicationTypes = selectDB("applicationtype","`status` = '0' ORDER BY `enTitle` ASC") ){
									foreach( $applicationTypes as $applicationType ){
										// check if selected
										$selected = ($applicationType["id"] == $application[0]["applicationType"]) ? "selected" : "";
										?>
										<option value="<?= $applicationType["id"] ?>" <? echo $selected ?>><?= $applicationType["enTitle"] . " - " . $applicationType["arTitle"] ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>
					
					<!-- license Type -->

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label mb-10"><? echo direction("License Type","نوع الرخصة") ?></label>
							<select class="form-control" name="licenseType" id="licenseType">
								<?php
								if( $licenseTypes = selectDB("licensetype","`status` = '0' ORDER BY `enTitle` ASC") ){
									foreach( $licenseTypes as $licenseType ){
										// check if selected
										$selected = ($licenseType["id"] == $application[0]["licenseType"]) ? "selected" : "";
										?>
										<option value="<?= $licenseType["id"] ?>" <? echo $selected ?>><?= $licenseType["enTitle"] . " - " . $licenseType["arTitle"] ?></option>
										<?php
									}
								}
								?>
							</select>
						</div>
					</div>

					<!-- attchaments -->
					<div class="col-12 text-center">
						<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i><?php echo direction("Attachments","المرفقات") ?></h6>
						<hr class="light-grey-hr"/>
					</div>

					<div class="col-md-6">
					<div class="form-group">
                        <label for="photo"><? echo direction("Personal Photo","الصورة الشخصية") ?></label>
                        <input type="file" name="photo" class="form-control-file" id="photo" >
                    </div>
					</div>
					
					<div class="col-md-6">
					<div class="form-group">
                        <a href="../logos/<?php echo $attachment["photo"];?>" target="_blank"><img src="../logos/<?php echo $attachment["photo"];?>" alt="photo" class="img-fluid"></a>
                    </div>
					</div>

                    <div class="col-md-6">
					<div class="form-group">
                        <label for="photo"><? echo direction("Civil ID","البطاقة المدنية") ?></label>
                        <input type="file" name="civilId" class="form-control-file" id="civilId" >
                    </div>
					</div>

					<div class="col-md-6">
					<div class="form-group">
						<a href="../logos/<?php echo $attachment["civilId"];?>" target="_blank"><img src="../logos/<?php echo $attachment["civilId"];?>" alt="photo" class="img-fluid"></a>
                    </div>
					</div>

                    <div class="col-md-6">
					<div class="form-group">
                        <label for="photo"><? echo direction("Driving Licence","رخصة القيادة") ?></label>
                        <input type="file" name="drivingLicence" class="form-control-file" id="drivingLicence" >
                    </div>
					</div>

					<div class="col-md-6">
					<div class="form-group">
						<a href="../logos/<?php echo $attachment["drivingLicence"];?>" target="_blank"><img src="../logos/<?php echo $attachment["drivingLicence"];?>" alt="photo" class="img-fluid"></a>
                    </div>
					</div>

                    <div class="col-md-6">
					<div class="form-group">
                        <label for="photo"><? echo direction("Passport [Non Kuwaiti]","جواز للغير كويتي") ?></label>
                        <input type="file" name="Passport" class="form-control-file" id="Passport">
                    </div>
					</div>

					<div class="col-md-6">
					<div class="form-group">
						<a href="../logos/<?php echo $attachment["passport"];?>" target="_blank"><img src="../logos/<?php echo $attachment["passport"];?>" alt="photo" class="img-fluid"></a>
                    </div>
					</div>

                    <div class="col-md-6">
					<div class="form-group">
                        <label for="photo"><? echo direction("Boat captain degree [PAAET / AUK] for Pleasure (A)","شهادة قائد زورق من ( التطبيقي / الإستراليه ) للنزهه (أ)") ?></label>
                        <input type="file" name="PADegree" class="form-control-file" id="PADegree">
                    </div>
					</div>

					<div class="col-md-6">
					<div class="form-group">
						<a href="../logos/<?php echo $attachment["degree"];?>" target="_blank"><img src="../logos/<?php echo $attachment["degree"];?>" alt="photo" class="img-fluid"></a>
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