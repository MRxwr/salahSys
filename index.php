<?php
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");

if( isset($_POST) && !empty($_POST) ){
	if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
		$_POST["attachment"]["photo"] = uploadImageBanner($_FILES['photo']['tmp_name']);
	}else{
		$_POST["attachment"]["photo"] = "";
	}
    if (is_uploaded_file($_FILES['civilId']['tmp_name'])) {
		$_POST["attachment"]["civilId"] = uploadImageBanner($_FILES['civilId']['tmp_name']);
	}else{
		$_POST["attachment"]["civilId"] = "";
	}
    if (is_uploaded_file($_FILES['drivingLicence']['tmp_name'])) {
		$_POST["attachment"]["drivingLicence"] = uploadImageBanner($_FILES['drivingLicence']['tmp_name']);
	}else{
		$_POST["attachment"]["drivingLicence"] = "";
	}
    if (is_uploaded_file($_FILES['passport']['tmp_name'])) {
		$_POST["attachment"]["passport"] = uploadImageBanner($_FILES['passport']['tmp_name']);
	}else{
		$_POST["attachment"]["passport"] = "";
	}
    if (is_uploaded_file($_FILES['PADegree']['tmp_name'])) {
		$_POST["attachment"]["degree"] = uploadImageBanner($_FILES['degree']['tmp_name']);
	}else{
		$_POST["attachment"]["degree"] = "";
	}
	$data["applicant"] = json_encode($_POST["applicant"]);
	$data["address"] = json_encode($_POST["address"]);
	$data["attachment"] = json_encode($_POST["attachment"]);
	$data["visa"] = json_encode($_POST["visa"]);
	$data["sponsor"] = json_encode($_POST["sponsor"]);
	$data["applicationType"] = $_POST["applicationType"];
	$data["licenseType"] = $_POST["licenseType"];
	$data["locationId"] = $_POST["locationId"];
	$data["testDate"] = $_POST["testDate"];
	if( insertDB("applications", $data) ){
		?>
		<script>
			alert("Application submitted successfully. we will contact you soon.");
			window.location.href = "index.php";
		</script>
		<?php
	}else{
		?>
		<script>
			alert("Application failed to submit. please try again.");
			window.location.href = "index.php";
		</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application for Skipper License</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container my-4">
        <h1 class="text-center">Application for Skipper License</h1>

        <!-- Application Type -->
        <div class="card my-4">
            <div class="card-header">
                Test Date / تاريخ الإختبار
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="testDate">Test Date / تاريخ الإختبار </label>
                    <input type="text" id="testDateCal" name="testDate" class="form-control" id="testDate" required>
                </div>
            </div>
        </div>

        <!-- Application Type -->
        <div class="card my-4">
            <div class="card-header">
                Location / المكان
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="applicationType">Test Location / مكان الإختبار </label>
                        <select class="form-control" name="locationId" id="applicationType" required>
                                <?php
                                if( $locations = selectDB("location","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $locations as $location ){
                                        ?>
                                        <option value="<?= $location["id"] ?>"><?= $location["enTitle"] . " - " . $location["arTitle"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                        </select>
                    </div>
            </div>
        </div>

        <!-- Applicant Information -->
    
        <div class="card my-4">
            <div class="card-header">
                Applicant Information / معلومات الطالب
            </div>
            <div class="card-body">
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="applicantFullName">Full Name in English / الاسم الكامل بالإنجليزي</label>
                            <input type="text" name="applicant[enName]" class="form-control" id="applicantEnName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="applicantFullName">Full Name in Arabic / الاسم الكامل بالعربي</label>
                            <input type="text" name="applicant[arName]" class="form-control" id="applicantArName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="civilId">Civil ID No. / رقم الهوية</label>
                            <input type="number" name="applicant[civilId]"class="form-control" id="civilId" pattern="[0-9]*" step='1' min='0' minlength="8" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dob">Date of Birth / تاريخ الميلاد</label>
                            <input type="date" name="applicant[dob]" class="form-control" id="dob" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender / الجنس</label>
                            <select class="form-control" name="applicant[gender]" id="gender" required>
                                <option>Male / ذكر</option>
                                <option>Female / انثى</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bloodType">Blood Type / نوع الدم</label>
							<select class="form-control" name="applicant[bloodType]" id="bloodType" required>
                                <option>O+</option>
                                <option>O-</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nationality">Nationality / الجنسية</label>
                            <select class="form-control" name="applicant[nationality]" id="nationality" required>
                                <?php
                                if( $countries = selectDB("cities","`status` = '1' GROUP BY `CountryName` ORDER BY `CountryName` ASC") ){
                                    foreach( $countries as $country ){
                                        ?>
                                        <option value="<?= $country["id"] ?>"><?= $country["CountryName"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="visaType">Visa Type / نوع الفيزا</label>
                            <select class="form-control" name="visa[Type]" id="visaType">
                                <?php
                                if( $visas = selectDB("visatype","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $visas as $visa ){
                                        ?>
                                        <option value="<?= $visa["id"] ?>"><?= $visa["enTitle"] . " - " . $visa["arTitle"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="visaExpireyDate">Visa Expirey Date / تاريخ إنتهاء الفيزا</label>
                            <input type="date" name="visa[ExpireyDate]" class="form-control" id="visaExpireyDate">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="FLEdate">Fishing License Expiry Date / تاريخ أنتهاء الرخصة البحرية</label>
                            <input type="date" name="visa[FLEdate]" class="form-control" id="FLEdate">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employer">Employer / جهة العمل</label>
                            <input type="text" name="sponsor[Employer]" class="form-control" id="employer">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="SponsorsName">Sponsors Name / اسم الكفيل </label>
                            <input type="text" name="sponsor[Name]" class="form-control" id="SponsorsName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sponsorsCivilId">Sponsors Civil ID No. / رقم الهوية للكفيل</label>
                            <input type="number" name="sponsor[CivilId]" pattern="[0-9]*" step='1' min='0' minlength="8" class="form-control" id="sponsorsCivilId">
                        </div>
						<div class="form-group col-md-6">
                            <label for="phone">Personal Phone / هاتف</label>
                            <input type="number" name="applicant[phone]" class="form-control" pattern="[0-9]*" step='1' min='0' minlength="8" id="phone" required>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="card my-4">
            <div class="card-header">
                Address Information / معلومات العنوان
            </div>
            <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="area">Area / المنطقة</label>
                            <select class="form-control" name="address[area]" id="area" required>
                                <?php
                                if( $areas = selectDB("areas","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $areas as $area ){
                                        ?>
                                        <option value="<?= $area["id"] ?>"><?= $area["enTitle"] . " - " . $area["arTitle"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="street">Street / الشارع</label>
                            <input type="text" name="address[street]" class="form-control" id="street" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="block">Block / القطعة</label>
                            <input type="text" name="address[block]" class="form-control" id="block" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="house">House / المنزل</label>
                            <input type="text" name="address[house]" class="form-control" id="house" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ave">Ave / الجاده</label>
                            <input type="text" name="address[ave]" class="form-control" id="ave">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="flat">Flat / الشقة</label>
                            <input type="text" name="address[flat]" class="form-control" id="flat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="floor">Floor / الطابق</label>
                            <input type="text" name="address[floor]" class="form-control" id="floor">
                        </div>
                    </div>
            </div>
        </div>

        <!-- Application Type -->
        <div class="card my-4">
            <div class="card-header">
                Application Type / نوع الطلب
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="applicationType">Application Type / نوع الطلب</label>
                        <select class="form-control" name="applicationtype" id="applicationType" required>
                                <?php
                                if( $applicationTypes = selectDB("applicationType","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $applicationTypes as $applicationType ){
                                        ?>
                                        <option value="<?= $applicationType["id"] ?>"><?= $applicationType["enTitle"] . " - " . $applicationType["arTitle"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                        </select>
                    </div>
            </div>
        </div>

        <!-- License Type -->
        <div class="card my-4">
            <div class="card-header">
                License Type / نوع الرخصة
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label for="licenseType">License Type / نوع الرخصة</label>
                        <select class="form-control" name="licensetype" id="licenseType" required>
                                <?php
                                if( $licenseTypes = selectDB("licenseType","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $licenseTypes as $licenseType ){
                                        ?>
                                        <option value="<?= $licenseType["id"] ?>"><?= $licenseType["enTitle"] . " - " . $licenseType["arTitle"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                        </select>
                    </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="card my-4">
            <div class="card-header">
                Attachments / المرفقات
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="photo">Personal Photo / صورة شخصية</label>
                        <input type="file" name="photo" class="form-control-file" id="photo" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="photo">Civil ID / البطاقة المدنية </label>
                        <input type="file" name="civilId" class="form-control-file" id="civilId" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="photo">Driving Licence / رخصة القيادة </label>
                        <input type="file" name="drivingLicence" class="form-control-file" id="drivingLicence" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="photo">Passport [Non Kuwaiti] / جواز للغير كويتي </label>
                        <input type="file" name="Passport" class="form-control-file" id="Passport">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="photo">Boat captain degree [PAAET / AUK] for Pleasure (A) /  شهادة قائد زورق من ( التطبيقي / الإستراليه ) للنزهه (أ)</label>
                        <input type="file" name="PADegree" class="form-control-file" id="PADegree">
                    </div>
                </div>
            </div>
        </div>

        <!-- Acknowledgement -->
        <div class="card my-4">
            <div class="card-header">
                ACKNOWLEDGEMENT / إقرار
            </div>
            <div class="card-body">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <textarea class="form-control" id="enAcknowledgement" rows="5" disabled>
I the undersigned hereby certify that I can swim efficiently and have not experienced any cases of loss of consciousness or epilepsy. I undertake to inform the health authorities responsible for the medical examination if such an incident occurs to me or to suffer any of the diseases in which the leadership of the boat becomes a danger to me or to others. The Law of Small Vessels No. 36/1960, as amended, and the ministerial decrees thereof.
                        </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <textarea class="form-control" id="arAcknowledgement" rows="5" disabled>
اقر أﻧﺎ اﻟﻣوﻗﻊ أدﻧﺎه ﺑﺄﻧﻧﻲ أﺟﯾد اﻟﺳﺑﺎﺣﺔ ﺑﻛﻔﺎءة، ,وأﻧﻧﻲ ﻟم أﺻب ﺑﺄي ﺣﺎﻻت ﻓﻘدان اﻟوﻋﻲ
أو اﻟﺻرع وأﺗﻌﮭد ﺑﺈﺑﻼغ اﻟﺟﮭﺎت اﻟﺻﺣﯾﺔ اﻟﻣﺳؤوﻟﺔ ﻋن اﻟﻔﺣص اﻟطﺑﻲ ﺣﺎل ﺣدوث
ﻣﺛل ذﻟك ﻟﻲ أو إﺻﺎﺑﺗﻲ ﺑﺄي ﻣن اﻷﻣراض اﻟﺗﻲ ﺗﺻﺑﺢ ﻣﻌﮭﺎ ﻗﯾﺎدﺗﻲ ﻟﻠﻘﺎرب ﺧطراً ﻋﻠﻲ
أو ﻋﻠﻰ اﻵﺧرﯾن، ﻛﻣﺎ أﻗر ﺑﺎﻻﻟﺗزام ﺑﻣﺎ ﺟﺎء ﻓﻲ ﻗﺎﻧون اﻟﺳﻔن اﻟﺻﻐﯾرة رﻗم 1960/36
وتعديلاته والقرارات الوزارية التابعة له.
                        </textarea>
                    </div>
                </div>
					<div class="form-group text-center">
                    	<button type="submit" class="btn btn-primary">Submit form / أرسل الطلب</button>
					</div>
                
            </div>
        </div>
    </div>
    </form>
    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // block fridays and saturdays from #testDateCal
        // what should i add in html part to make it work?
        // <input type="text" id="testDateCal" name="testDateCal">
        // its not working i think i should load a datepicker library 
        // <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        $('#testDateCal').datepicker({
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [(day != 0 && day != 6)];
            }
        });
    </script>
</body>
</html>
