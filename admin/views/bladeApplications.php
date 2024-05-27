<?php 
if( isset($_GET["hide"]) && !empty($_GET["hide"]) ){
	if( updateDB('applications',array('hidden'=> '2'),"`id` = '{$_GET["hide"]}'") ){
		header("LOCATION: ?v=Applications");
	}
}

if( isset($_GET["show"]) && !empty($_GET["show"]) ){
	if( updateDB('applications',array('hidden'=> '0'),"`id` = '{$_GET["show"]}'") ){
		header("LOCATION: ?v=Applications");
	}
}

if( isset($_GET["delId"]) && !empty($_GET["delId"]) ){
	if( updateDB('applications',array('status'=> '1'),"`id` = '{$_GET["delId"]}'") ){
		header("LOCATION: ?v=Applications");
	}
}

if( isset($_POST["fullName"]) ){
	$id = $_POST["update"];
	unset($_POST["update"]);
	if ( $id == 0 ){
		$_POST["password"] = sha1($_POST["password"]);
		if( insertDB("applications", $_POST) ){
			header("LOCATION: ?v=Applications");
		}else{
		?>
		<script>
			alert("Could not process your request, Please try again.");
		</script>
		<?php
		}
	}else{
		if( !empty($_POST["password"]) ){
			$_POST["password"] = sha1($_POST["password"]);
		}else{
			$password = selectDB("users","`id` = '{$id}'");
			$_POST["password"] = $password[0]["password"];
		}
		if( updateDB("users", $_POST, "`id` = '{$id}'") ){
			header("LOCATION: ?v=Applications");
		}else{
		?>
		<script>
			alert("Could not process your request, Please try again.");
		</script>
		<?php
		}
	}
}
?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo direction("List of Applications","قائمة الطلبات") ?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="table-wrap mt-40">
<div class="table-responsive">
	<table class="table display responsive product-overview mb-30" id="myTable">
		<thead>
		<tr>
		<th><?php echo direction("Date","التاريخ") ?></th>
		<th><?php echo direction("English Name","الإسم بالإنجليزي") ?></th>
		<th><?php echo direction("Arabic Name","الإسم بالعربي") ?></th>
		<th><?php echo direction("Mobile","الهاتف") ?></th>
		<th><?php echo direction("Location","المكان") ?></th>
		<th><?php echo direction("Application Type","نوع الطلب") ?></th>
		<th><?php echo direction("License Type","نوع الرخصة") ?></th>
		<th class="text-nowrap"><?php echo direction("Actions","الخيارات") ?></th>
		</tr>
		</thead>
		
		<tbody>
		<?php 
		if( $applications = selectDB("applications","`status` = '0' AND `hidden` = '0' ORDER BY `id` DESC") ){
			for( $i = 0; $i < sizeof($applications); $i++ ){
                $applicant = json_decode($applications[$i]["applicant"],true);
                if( $location = selectDB("location","`id` = '{$applications[$i]["locationId"]}'") ){
					$location = direction($location[0]["enTitle"],$location[0]["arTitle"]);
				}else{
					$location = "";
				}
                if( $applicationtype = selectDB("applicationtype","`id` = '{$applications[$i]["applicationType"]}'") ){
					$applicationType = direction($applicationtype[0]["enTitle"],$applicationtype[0]["arTitle"]);
				}else{
					$applicationType = "";
				}
                if( $licenseType = selectDB("licensetype","`id` = '{$applications[$i]["licenseType"]}'") ){
					$licenseType = direction($licenseType[0]["enTitle"],$licenseType[0]["arTitle"]);
				}else{
					$licenseType = "";
				}
				?>
				<tr>
                <td id="date<?php echo $applications[$i]["id"]?>" ><?php echo $applications[$i]["date"] ?></td>
				<td id="enName<?php echo $applications[$i]["id"]?>" ><?php echo $applicant["enName"] ?></td>
				<td id="arName<?php echo $applications[$i]["id"]?>" ><?php echo $applicant["arName"] ?></td>
				<td id=" mobile<?php echo $applications[$i]["id"]?>" ><?php echo $applicant["phone"] ?></td>
				<td><?php echo $location ?></td>
				<td><?php echo $applicationType ?></td>
				<td><?php echo $licenseType ?></td>
				<td class="text-nowrap">
					<a href="?v=ClientInfo&id=<?php echo $applications[$i]["id"] ?>" class="mr-25" data-toggle="tooltip" data-original-title="<?php echo direction("More","المزيد") ?>"> <i class="fa fa-plus text-inverse m-r-10"></i>
					<a href="<?php echo "?v={$_GET["v"]}&delId={$applications[$i]["id"]}" ?>" data-toggle="tooltip" data-original-title="<?php echo direction("Delete","حذف") ?>"><i class="fa fa-close text-danger"></i>
				</a>			
				</td>
				</tr>
				<?php
			}
		}
		?>
		</tbody>
		
	</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
	$(document).on("click",".edit", function(){
		var id = $(this).attr("id");
		var email = $("#email"+id).html();
		var name = $("#name"+id).html();
		var mobile = $("#mobile"+id).html();
		var dateJoined = $("#date"+id).html();
		$("input[name=email]").val(email);
		$("input[name=phone]").val(mobile);
		$("input[name=update]").val(id);
		$("input[name=fullName]").val(name);
		$("input[name=date]").val(dateJoined);
	})
</script>