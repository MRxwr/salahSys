<?php
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");
if( isset($_POST["applicant"]["fullName"]) && !empty($_POST["applicant"]["fullName"]) ){
	if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
		$_POST["applicant"]["photo"] = uploadImageBanner($_FILES['photo']['tmp_name']);
	}else{
		$_POST["applicant"]["photo"] = "";
	}
	$data["applicant"] = json_encode($_POST["applicant"]);
	$data["address"] = json_encode($_POST["address"]);
	$data["applicationType"] = $_POST["applicationType"];
	$data["licenseType"] = $_POST["licenseType"];
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
</head>
<body>
    <div class="container my-4">
        <h1 class="text-center">Application for Skipper License</h1>
        
        <!-- Applicant Information -->
        <div class="card my-4">
            <div class="card-header">
                Applicant Information / معلومات الطالب
            </div>
            <div class="card-body">
                <form action="index" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="applicantFullName">Applicant Full Name / الاسم الكامل</label>
                            <input type="text" name="applicant[fullName]" class="form-control" id="applicantFullName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="civilId">Civil ID No. / رقم الهوية</label>
                            <input type="text" name="applicant[civilId]"class="form-control" id="civilId" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dob">Date of Birth / تاريخ الميلاد</label>
                            <input type="date" name="applicant[dob]" class="form-control" id="dob" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender / الجنس</label>
                            <select class="form-control" name="applicant[gender]" id="gender" required>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
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
                                        <option value="<?= $country["CountryName"] ?>"><?= $country["CountryName"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
					<div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="visaType">Visa Type / نوع الفيزا</label>
                            <select class="form-control" name="applicant[visaType]" id="visaType" required>
                                <?php
                                if( $areas = selectDB("visaType","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $areas as $area ){
                                        ?>
                                        <option value="<?= $area["enTitle"] ?>"><?= $area["enTitle"] . " - " . $area["arTitle"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="visaExpireyDate">Visa Expirey Date / تاريخ إنتهاء الفيزا</label>
                            <input type="date" name="applicant[visaExpireyDate]" class="form-control" id="visaExpireyDate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="FLEdate">Fishing License Expiry Date / تاريخ أنتهاء الرخصة البحرية</label>
                            <input type="date" name="applicant[FLEdate]" class="form-control" id="FLEdate">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employer">Employer / جهة العمل</label>
                            <input type="text" name="applicant[employer]" class="form-control" id="employer">
                        </div>
                    </div>
					<div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="SponsorsName">Sponsors Name / اسم الكفيل </label>
                            <input type="text" name="applicant[SponsorsName]" class="form-control" id="SponsorsName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sponsorsCivilId">Sponsors Civil ID No. / رقم الهوية للكفيل</label>
                            <input type="text" name="applicant[sponsorsCivilId]" class="form-control" id="sponsorsCivilId">
                        </div>
                    </div>
					<div class="form-row">
						<div class="form-group col-md-6">
                            <label for="phone">Personal Phone / هاتف</label>
                            <input type="tel" name="applicant[phone]" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group col-md-6">
							<label for="photo">Photo</label>
                        	<input type="file" name="photo" class="form-control-file" id="photo">
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
                                        <option value="<?= $area["enTitle"] ?>"><?= $area["enTitle"] . " - " . $area["arTitle"] ?></option>
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
                            <input type="text" name="address[street]" class="form-control" id="street">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="block">Block / القطعة</label>
                            <input type="text" name="address[block]" class="form-control" id="block">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="house">House / المنزل</label>
                            <input type="text" name="address[house]" class="form-control" id="house">
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
                        <select class="form-control" name="applicationType" id="applicationType" required>
                                <?php
                                if( $areas = selectDB("applicationType","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $areas as $area ){
                                        ?>
                                        <option value="<?= $area["enTitle"] ?>"><?= $area["enTitle"] . " - " . $area["arTitle"] ?></option>
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
                        <select class="form-control" name="licenseType" id="licenseType" required>
                                <?php
                                if( $areas = selectDB("licenseType","`status` = '0' ORDER BY `enTitle` ASC") ){
                                    foreach( $areas as $area ){
                                        ?>
                                        <option value="<?= $area["enTitle"] ?>"><?= $area["enTitle"] . " - " . $area["arTitle"] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                        </select>
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
                        <textarea class="form-control" id="acknowledgement" rows="5" disabled>
I the undersigned hereby certify that I can swim efficiently and have not experienced any cases of loss of consciousness or epilepsy. I undertake to inform the health authorities responsible for the medical examination if such an incident occurs to me or to suffer any of the diseases in which the leadership of the boat becomes a danger to me or to others. The Law of Small Vessels No. 36/1960, as amended, and the ministerial decrees thereof.
                        </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <textarea class="form-control" id="acknowledgement" rows="5" disabled>
اقر أﻧﺎ اﻟﻣوﻗﻊ أدﻧﺎه ﺑﺄﻧﻧﻲ أﺟﯾد اﻟﺳﺑﺎﺣﺔ ﺑﻛﻔﺎءة، ,وأﻧﻧﻲ ﻟم أﺻب ﺑﺄي ﺣﺎﻻت ﻓﻘدان اﻟوﻋﻲ
أو اﻟﺻرع وأﺗﻌﮭد ﺑﺈﺑﻼغ اﻟﺟﮭﺎت اﻟﺻﺣﯾﺔ اﻟﻣﺳؤوﻟﺔ ﻋن اﻟﻔﺣص اﻟطﺑﻲ ﺣﺎل ﺣدوث
ﻣﺛل ذﻟك ﻟﻲ أو إﺻﺎﺑﺗﻲ ﺑﺄي ﻣن اﻷﻣراض اﻟﺗﻲ ﺗﺻﺑﺢ ﻣﻌﮭﺎ ﻗﯾﺎدﺗﻲ ﻟﻠﻘﺎرب ﺧطراً ﻋﻠﻲ
أو ﻋﻠﻰ اﻵﺧرﯾن، ﻛﻣﺎ أﻗر ﺑﺎﻻﻟﺗزام ﺑﻣﺎ ﺟﺎء ﻓﻲ ﻗﺎﻧون اﻟﺳﻔن اﻟﺻﻐﯾرة رﻗم 1960/36
وتعديلاته والقرارات الوزارية التابعة له.
                        </textarea>
                    </div>
                </div>
					<div class="form-group text-center">
                    	<button type="submit" class="btn btn-primary">Submit form</button>
					</div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
