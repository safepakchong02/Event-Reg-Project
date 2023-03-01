<!-- import ctrl -->
<?
$ctrl_path = "user";
$ctrl_name = "profile_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>
<link rel="stylesheet" type="text/css" href="asset/css/userProfile.css">
<!-- start profile -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>">
    <div class="row pt-3">
        <h1>ประวัติส่วนตัว</h1>
        <form>
            <!-- part 1 -->
            <div class="row pb-3 pt-3 border rounded-2 whiteBg">
                <div class="col-lg-12 pb-2">
                    <div class="col-auto">
                        <label for="u_email" class="form-label">อีเมล</label>
                        <input disabled type="email" class="form-control" id="u_email" name="u_email" ng-model="profile_data.u_email">
                    </div>
                </div>
                <div class="col-lg-4 pb-2" ng-show="editPassword" id="oldPass">
                    <div class="col-auto">
                        <label for="u_password" class="form-label">รหัสผ่านเก่า</label>
                        <input type="password" class="form-control" id="u_password" name="u_password" ng-model="profile_data.u_password">
                    </div>
                </div>
                <div class="col-lg-4 pb-2" ng-show="editPassword" id="newPass">
                    <div class="col-auto">
                        <label for="u_newPassword" class="form-label">รหัสผ่านใหม่</label>
                        <input type="password" class="form-control" id="u_newPassword" name="u_newPassword" ng-model="profile_data.u_newPassword">
                    </div>
                </div>
                <div class="col-lg-4 pb-2" ng-show="editPassword" id="repeatPass">
                    <div class="col-auto">
                        <label for="u_repeatPassword" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" class="form-control" id="u_repeatPassword" name="u_repeatPassword" ng-model="profile_data.u_repeatPassword">
                    </div>
                </div>
                <div class="col-auto pb-2">
                    <button ng-click="viewChangePassword()" type="button" class="btn btn-warning">เปลี่ยนรหัสผ่าน</button>
                    <button ng-click="changePassword()" ng-show="editPassword" type="button" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
            <!-- part 2 -->
            <div class="row pb-3 pt-3 mt-3 border rounded-2 whiteBg">
                <div class="col-lg-4 pb-2">
                    <div class="col-auto">
                        <label for="ud_prefix" class="form-label">คำนำหน้า</label>
                        <select disabled id="ud_prefix" class="form-select" ng-model="profile_data.ud_prefix">
                            <option selected ng-selected="profile_data.ud_prefix == 'เลือก...'" value="เลือก...">เลือก...</option>
                            <option ng-selected="profile_data.ud_prefix == 'นาย'" value="นาย">นาย</option>
                            <option ng-selected="profile_data.ud_prefix == 'นางสาว'" value="นางสาว">นางสาว</option>
                            <option ng-selected="profile_data.ud_prefix == 'นาง'" value="นาง">นาง</option>
                            <option ng-selected="profile_data.ud_prefix == 'อาจารย์'" value="อาจารย์">อาจารย์</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 pb-2">
                    <div class="col-auto">
                        <label for="ud_firstName" class="form-label">ชื่อ</label>
                        <input disabled type="text" class="form-control" id="ud_firstName" name="ud_firstName" ng-model="profile_data.ud_firstName">
                    </div>
                </div>
                <div class="col-lg-4 pb-2">
                    <div class="col-auto">
                        <label for="ud_lastName" class="form-label">นามสกุล</label>
                        <input disabled type="text" class="form-control" id="ud_lastName" name="ud_lastName" ng-model="profile_data.ud_lastName">
                    </div>
                </div>
                <div class="col-lg-4 pb-2">
                    <div class="col-auto">
                        <label for="ud_emp_id" class="form-label">รหัสนักศึกษา/รหัสพนักงาน</label>
                        <input disabled type="text" class="form-control" id="ud_emp_id" name="ud_emp_id" ng-model="profile_data.ud_emp_id">
                    </div>
                </div>
                <div class="col-lg-4 pb-2">
                    <div class="col-auto">
                        <label for="ud_card_id" class="form-label">รหัสบัตรประชาชน</label>
                        <input disabled type="text" class="form-control" id="ud_card_id" name="ud_card_id" ng-model="profile_data.ud_card_id">
                    </div>
                </div>
                <div class="col-sm-6 pb-2">
                    <label for="ud_gender" class="form-label">เพศ</label>
                    <div class="row">
                        <div class="col-auto">
                            <div class="form-check">
                                <input disabled class="form-check-input" type="radio" name="ud_gender" id="ud_gender1" value="ชาย" ng-model="profile_data.ud_gender">
                                <label class="form-check-label" for="ud_gender1">ชาย</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input disabled class="form-check-input" type="radio" name="ud_gender" id="ud_gender2" value="หญิง" ng-model="profile_data.ud_gender">
                                <label class="form-check-label" for="ud_gender2">หญิง</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-check">
                                <input disabled class="form-check-input" type="radio" name="ud_gender" id="ud_gender3" value="ไม่ต้องการระบุ" ng-model="profile_data.ud_gender">
                                <label class="form-check-label" for="ud_gender3">ไม่ต้องการระบุ</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 pb-2">
                    <div class="col-auto">
                        <label for="ud_birthDate" class="form-label">วันเกิด</label>
                        <input disabled type="date" class="form-control" id="ud_birthDate" name="ud_birthDate" ng-model="profile_data.ud_birthDate">
                    </div>
                </div>
                <div class="col-sm-6 pb-2">
                    <div class="col-auto">
                        <label for="ud_phone" class="form-label">เบอร์โทร</label>
                        <input disabled type="text" class="form-control" id="ud_phone" name="ud_phone" ng-model="profile_data.ud_phone">
                    </div>
                </div>
                <div class="col-sm-6 pb-2">
                    <div class="col-auto">
                        <label for="ud_orgName" class="form-label">ชื่อบริษัท/ชื่อสถานศึกษา</label>
                        <input disabled type="text" class="form-control" id="ud_orgName" name="ud_orgName" ng-model="profile_data.ud_orgName">
                    </div>
                </div>
                <div class="col-sm-6 pb-2">
                    <div class="col-auto">
                        <label for="ud_department" class="form-label">แผนก/สาขาวิชา</label>
                        <input disabled type="text" class="form-control" id="ud_department" name="ud_department" ng-model="profile_data.ud_department">
                    </div>
                </div>
                <div class="col-sm-6 pb-2">
                    <div class="col">
                        <label for="ud_position" class="form-label">ตำแหน่ง/ชั้นปี</label>
                        <input disabled type="text" class="form-control" id="ud_position" name="ud_position" ng-model="profile_data.ud_position">
                    </div>
                </div>
            </div>
            <!-- btn -->
            <div class="row pt-3 ">
                <div class="col-sm-3 pb-3">
                    <button type="button" class="btn btn-warning" ng-click="edit()">แก้ไข</button>
                    <button type="button" class="btn btn-primary" ng-show="hasEdit" ng-click="editProfile('user/profile/edit','PATCH',profile_data.u_userId)">บันทึก</button>
                    <button type="button" class="btn btn-danger" ng-show="hasEdit" ng-click="deactivate()">ลบบัญชี</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end profile -->