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
        <form>
            <div class="form-group">
                <label for="applicantFullName">Applicant Full Name</label>
                <input type="text" class="form-control" id="applicantFullName">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address">
            </div>
            <div class="form-group">
                <label for="civilId">Civil ID No.</label>
                <input type="text" class="form-control" id="civilId">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" class="form-control" id="area">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street">
            </div>
            <div class="form-group">
                <label for="block">Block</label>
                <input type="text" class="form-control" id="block">
            </div>
            <div class="form-group">
                <label for="bloodType">Blood Type</label>
                <input type="text" class="form-control" id="bloodType">
            </div>
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" class="form-control" id="nationality">
            </div>
            <div class="form-group">
                <label for="house">House</label>
                <input type="text" class="form-control" id="house">
            </div>
            <div class="form-group">
                <label for="ave">Ave</label>
                <input type="text" class="form-control" id="ave">
            </div>
            <div class="form-group">
                <label for="visaType">Visa Type</label>
                <input type="text" class="form-control" id="visaType">
            </div>
            <div class="form-group">
                <label for="visaExpiry">Visa Expiry Date</label>
                <input type="date" class="form-control" id="visaExpiry">
            </div>
            <div class="form-group">
                <label for="flat">Flat</label>
                <input type="text" class="form-control" id="flat">
            </div>
            <div class="form-group">
                <label for="floor">Floor</label>
                <input type="text" class="form-control" id="floor">
            </div>
            <div class="form-group">
                <label for="fishingLicenseExpiry">Fishing License Expiry Date</label>
                <input type="date" class="form-control" id="fishingLicenseExpiry">
            </div>
            <div class="form-group">
                <label for="employer">Employer</label>
                <input type="text" class="form-control" id="employer">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone">
            </div>
            <div class="form-group">
                <label for="sponsorName">Sponsor’s Name</label>
                <input type="text" class="form-control" id="sponsorName">
            </div>
            <div class="form-group">
                <label for="sponsorCid">Sponsor’s CID No</label>
                <input type="text" class="form-control" id="sponsorCid">
            </div>
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
            <div class="form-group">
                <label for="acknowledgement">ACKNOWLEDGEMENT</label>
                <textarea class="form-control" id="acknowledgement" rows="5">
I the undersigned hereby certify that I can swim efficiently and have not experienced any cases of loss of consciousness or epilepsy. I undertake to inform the health authorities responsible for the medical examination if such an incident occurs to me or to suffer any of the diseases in which the leadership of the boat becomes a danger to me or to others. The Law of Small Vessels No. 36/1960, as amended, and the ministerial decrees thereof.
                </textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date">
            </div>
            <div class="form-group">
                <label for="signature">Signature</label>
                <input type="text" class="form-control" id="signature">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control-file" id="photo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
