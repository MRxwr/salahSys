<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب منح رخصة نوخذة بحري</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .form-group label {
            width: 20%;
            text-align: left;
        }
        .form-group input,
        .form-group select {
            width: 75%;
            padding: 5px;
        }
        .form-group input[type="radio"] {
            width: auto;
        }
        .acknowledgement {
            margin-top: 20px;
        }
        .acknowledgement p {
            margin-bottom: 5px;
        }
        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature div {
            width: 30%;
        }
        .official-use {
            border-top: 1px solid #000;
            padding-top: 20px;
            margin-top: 20px;
        }
        .official-use h3 {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>طلب منح رخصة نوخذة بحري</h1>
        <form>
            <div class="section">
                <div class="form-group">
                    <label for="fullName">الاسم الكامل</label>
                    <input type="text" id="fullName" name="fullName">
                </div>
                <div class="form-group">
                    <label for="civilId">الرقم المدني</label>
                    <input type="text" id="civilId" name="civilId">
                </div>
                <div class="form-group">
                    <label for="address">العنوان</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="area">المنطقة</label>
                    <input type="text" id="area" name="area">
                </div>
                <div class="form-group">
                    <label for="dob">تاريخ الميلاد</label>
                    <input type="date" id="dob" name="dob">
                </div>
                <div class="form-group">
                    <label for="gender">الجنس</label>
                    <select id="gender" name="gender">
                        <option value="male">ذكر</option>
                        <option value="female">أنثى</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bloodType">فصيلة الدم</label>
                    <input type="text" id="bloodType" name="bloodType">
                </div>
                <div class="form-group">
                    <label for="nationality">الجنسية</label>
                    <input type="text" id="nationality" name="nationality">
                </div>
                <div class="form-group">
                    <label for="street">شارع</label>
                    <input type="text" id="street" name="street">
                </div>
                <div class="form-group">
                    <label for="block">قطعة</label>
                    <input type="text" id="block" name="block">
                </div>
                <div class="form-group">
                    <label for="house">المنزل</label>
                    <input type="text" id="house" name="house">
                </div>
                <div class="form-group">
                    <label for="ave">جادة</label>
                    <input type="text" id="ave" name="ave">
                </div>
                <div class="form-group">
                    <label for="flat">شقة</label>
                    <input type="text" id="flat" name="flat">
                </div>
                <div class="form-group">
                    <label for="floor">الدور</label>
                    <input type="text" id="floor" name="floor">
                </div>
                <div class="form-group">
                    <label for="employer">جهة العمل</label>
                    <input type="text" id="employer" name="employer">
                </div>
                <div class="form-group">
                    <label for="phone">تلفون</label>
                    <input type="text" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="sponsorName">اسم الكفيل</label>
                    <input type="text" id="sponsorName" name="sponsorName">
                </div>
                <div class="form-group">
                    <label for="sponsorCid">الرقم المدني للكفيل</label>
                    <input type="text" id="sponsorCid" name="sponsorCid">
                </div>
                <div class="form-group">
                    <label for="visaType">نوع الإقامة</label>
                    <input type="text" id="visaType" name="visaType">
                </div>
                <div class="form-group">
                    <label for="visaExpiry">تاريخ انتهاء الإقامة</label>
                    <input type="date" id="visaExpiry" name="visaExpiry">
                </div>
                <div class="form-group">
                    <label for="fishingLicenseExpiry">تاريخ انتهاء رخصة الصيد</label>
                    <input type="date" id="fishingLicenseExpiry" name="fishingLicenseExpiry">
                </div>
            </div>

            <div class="section">
                <h2>نوع الطلب</h2>
                <div class="form-group">
                    <label>جديد</label>
                    <input type="radio" id="new" name="applicationType" value="new">
                    <label for="new">نزهة (A)</label>
                    <input type="radio" id="pleasureA" name="licenseType" value="pleasureA">
                    <label for="pleasureA">نزهة (B)</label>
                    <input type="radio" id="pleasureB" name="licenseType" value="pleasureB">
                    <label for="pleasureB">صيد (A)</label>
                    <input type="radio" id="fishingA" name="licenseType" value="fishingA">
                    <label for="fishingA">صيد (B)</label>
                    <input type="radio" id="fishingB" name="licenseType" value="fishingB">
                    <label for="fishingB">رحلات بحرية</label>
                    <input type="radio" id="cruise" name="licenseType" value="cruise">
                    <label for="cruise">حكومي/تجاري</label>
                    <input type="radio" id="govComm" name="licenseType" value="govComm">
                </div>
            </div>

            <div class="acknowledgement">
                <h2>إقــــــرار</h2>
                <p>
                    أقرأنا الموقع أدناه بأنني أجید السباحة بكفاءة، ,وأنني لم أصب بأي حالات فقدان الوعي
                    أو الصرع وأتعھد بإبلاغ الجھات المسؤولة عن الفحص الطبي في حال حدوث مثل ذلك لي
                    أو إصابتي بأي من الأمراض التي تصبح معھا قیادتي للقارب خطراً علي أو على الآخرین،
                    كما أقر بالالتزام بما جاء في قانون السفن الصغیرة رقم 1960/36 وتعديلاته والقرارات الوزارية التابعة له.
                </p>
                <p>
                    I the undersigned hereby certify that I can swim efficiently and have not experienced any cases of loss of consciousness or epilepsy.
                    I undertake to inform the health authorities responsible for the medical examination if such an incident occurs to me or to suffer
                    any of the diseases in which the leadership of the boat becomes a danger to me or to others. The Law of Small Vessels No. 36/1960,
                    as amended, and the ministerial decrees thereof.
                </p>
                <div class="signature">
                    <div>
                        <label for="date">التاريخ</label>
                        <input type="date" id="date" name="date">
                    </div>
                    <div>
                        <label for="signature">التوقيع</label>
                        <input type="text" id="signature" name="signature">
                    </div>
                    <div>
                        <label for="name">الاسم</label>
                        <input type="text" id="name" name="name">
                    </div>
                </div>
            </div>

            <div class="official-use">
                <h3>للاستعمال الرسمي فقط</h3>
                <div class="form-group">
                    <label for="officialPhoto">صورة شخصية</label>
                    <input type="file" id="officialPhoto" name="officialPhoto">
                </div>
                <div class="form-group">
                    <label for="licenseNo">رقم الرخصة</label>
                    <input type="text" id="licenseNo" name="licenseNo">
                </div>
                <div class="form-group">
                    <label for="officialComments">ملاحظات</label>
                    <textarea id="officialComments" name="officialComments"></textarea>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
