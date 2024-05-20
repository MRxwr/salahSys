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
                Applicant Information
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="applicantFullName">Applicant Full Name</label>
                            <input type="text" class="form-control" id="applicantFullName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="civilId">Civil ID No.</label>
                            <input type="text" class="form-control" id="civilId">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bloodType">Blood Type</label>
							<select class="form-control" id="bloodType">
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
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" id="nationality">
                        </div>
                    </div>
					<div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="visaType">Visa Type</label>
							<select class="form-control" id="visaType">
                                <option>Fisher</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="visaExpireyDate">Visa Expirey Date</label>
                            <input type="date" class="form-control" id="visaExpireyDate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="FLEdate">Fishing License Expiry Date</label>
                            <input type="date" class="form-control" id="FLEdate">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="employer">Employer</label>
                            <input type="text" class="form-control" id="employer">
                        </div>
                    </div>
					<div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="SponsorsName">Sponsors Name</label>
                            <input type="text" class="form-control" id="SponsorsName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sponsorsCivilId">Sponsors Civil ID No.</label>
                            <input type="text" class="form-control" id="sponsorsCivilId">
                        </div>
                    </div>
					<div class="form-row">
						<div class="form-group col-md-6">
                            <label for="phone">Personal Phone</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        <div class="form-group col-md-6">
							<label for="photo">Photo</label>
                        	<input type="file" class="form-control-file" id="photo">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Address Information -->
        <div class="card my-4">
            <div class="card-header">
                Address Information
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="area">Area</label>
                            <input type="text" class="form-control" id="area">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="block">Block</label>
                            <input type="text" class="form-control" id="block">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="house">House</label>
                            <input type="text" class="form-control" id="house">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ave">Ave</label>
                            <input type="text" class="form-control" id="ave">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="flat">Flat</label>
                            <input type="text" class="form-control" id="flat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="floor">Floor</label>
                            <input type="text" class="form-control" id="floor">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Application Type -->
        <div class="card my-4">
            <div class="card-header">
                Application Type
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="applicationType">Application Type</label>
                        <select class="form-control" id="applicationType">
                            <option>New</option>
                            <option>Renewal</option>
                            <option>Replacement of lost</option>
                            <option>Replace. of damage</option>
                            <option>Update</option>
                            <option>Upgrade</option>
                            <option>Government/Comm.</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- License Type -->
        <div class="card my-4">
            <div class="card-header">
                License Type
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="licenseType">License Type</label>
                        <select class="form-control" id="licenseType">
                            <option>Pleasure (A)</option>
                            <option>Pleasure (B)</option>
                            <option>Fishing (A)</option>
                            <option>Fishing (B)</option>
                            <option>Cruise</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Acknowledgement -->
        <div class="card my-4">
            <div class="card-header">
                ACKNOWLEDGEMENT
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="acknowledgement">ACKNOWLEDGEMENT</label>
                        <textarea class="form-control" id="acknowledgement" rows="5">
I the undersigned hereby certify that I can swim efficiently and have not experienced any cases of loss of consciousness or epilepsy. I undertake to inform the health authorities responsible for the medical examination if such an incident occurs to me or to suffer any of the diseases in which the leadership of the boat becomes a danger to me or to others. The Law of Small Vessels No. 36/1960, as amended, and the ministerial decrees thereof.
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit form</button>
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
