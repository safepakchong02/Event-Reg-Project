<!-- import ctrl -->
<?
$perm = true;
$ctrl_path = "event";
$ctrl_name = "events_manage_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<div class="container" ng-controller="<?= $ctrl_name ?>" data-editor="ClassicEditor" data-collaboration="false" data-revision-history="false">
    <div class="row pt-3">
        <h1>สร้างกิจกรรม</h1>
        <form>
            <div class="row pb-3">
                <div class="col pb-2">
                    <label for="ev_title" class="form-label">ชื่อกิจกรรม</label>
                    <input type="text" class="form-control" id="ev_title" name="ev_title" ng-model="data_event.ev_title">
                </div>
                <div class="col pb-2">
                    <label for="ev_limit" class="form-label">จำกัดจำนวน (-1 ไม่จำกัด)</label>
                    <input type="number" class="form-control" id="ev_limit" name="ev_limit" ng-model="data_event.ev_limit">
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-sm-12">
                    <span class="">รายละเอียดกิจกรรม</span>
                </div>
                <div class="col-sm-12">
                    <div id="ev_detail">

                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-3 border rounded-2">
                <div class="col-12 pb-4">
                    <span class="h5">ประเภทข้อมูลที่ต้องการ</span>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input disabled class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[0]">
                        <label class="form-check-label" for="ev_dtype">
                            อีเมล
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[1]">
                        <label class="form-check-label" for="ev_dtype">
                            คำนำหน้า
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input disabled class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[2]">
                        <label class="form-check-label" for="ev_dtype">
                            ชื่อ
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input disabled class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[3]">
                        <label class="form-check-label" for="ev_dtype">
                            นามสกุล
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[4]">
                        <label class="form-check-label" for="ev_dtype">
                            รหัสพนักงาน / รหัสนักศึกษา
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[5]">
                        <label class="form-check-label" for="ev_dtype">
                            รหัสบัตรประชาชน
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[6]">
                        <label class="form-check-label" for="ev_dtype">
                            เพศ
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[7]">
                        <label class="form-check-label" for="ev_dtype">
                            วันเกิด
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[8]">
                        <label class="form-check-label" for="ev_dtype">
                            เบอร์โทรศัพท์
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[9]">
                        <label class="form-check-label" for="ev_dtype">
                            ชื่อบริษัท / ชื่อสถานศึกษา
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[10]">
                        <label class="form-check-label" for="ev_dtype">
                            แผนก / สาขาวิชา
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_dtype" name="ev_dtype" ng-model="data_event.ev_dtype[11]">
                        <label class="form-check-label" for="ev_dtype">
                            ตำแหน่ง / ชั่นปี
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-3 border rounded-2">
                <div class="col-12 mt-3 pb-3">
                    <span class="h5">ตั้งค่าการลงทะเบียน</span>
                </div>
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_public" name="ev_public" ng-model="data_event.ev_public">
                        <label class="form-check-label" for="ev_public">กิจกรรมนี้เปิดเป็นสารธารณะหรือไม่</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_preReg" name="ev_preReg" ng-model="data_event.ev_preReg">
                        <label class="form-check-label" for="ev_preReg">กิจกรรมนี้เปิดให้ลงทะเบียนล่วงหน้าหรือไม่</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ev_selfReg" name="ev_selfReg" ng-model="data_event.ev_selfReg">
                        <label class="form-check-label" for="ev_selfReg">กิจกรรมนี้สามารถลงทะเบียนเข้างานด้วยตนเองได้หรือไม่</label>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-3 border rounded-2">
                <div class="col-12 mt-3 pb-3">
                    <span class="h5">ตั้งค่าวัน/เวลา</span>
                </div>
                <div class="col-sm-4">
                    <label for="ev_eventStart" class="form-label">เริ่มกิจกรรม</label>
                    <input type="datetime-local" class="form-control" id="ev_eventStart" name="ev_eventStart" ng-model="data_event.ev_eventStart">
                    <br>
                    <label for="ev_eventEnd" class="form-label">จบกิจกรรม</label>
                    <input type="datetime-local" class="form-control" id="ev_eventEnd" name="ev_eventEnd" ng-model="data_event.ev_eventEnd">
                </div>
                <div class="col-sm-4" ng-show="data_event.ev_preReg">
                    <label for="ev_preRegStart" class="form-label">เปิดลงทะเบียนล่วงหน้า</label>
                    <input type="datetime-local" class="form-control" id="ev_preRegStart" name="ev_preRegStart" ng-model="data_event.ev_preRegStart">
                    <br>
                    <label for="ev_preRegEnd" class="form-label">ปิดลงทะเบียนล่วงหน้า</label>
                    <input type="datetime-local" class="form-control" id="ev_preRegEnd" name="ev_preRegEnd" ng-model="data_event.ev_preRegEnd">
                </div>
                <div class="col-sm-4">
                    <label for="ev_checkInStart" class="form-label">เปิดลงทะเบียนเข้างาน</label>
                    <input type="datetime-local" class="form-control" id="ev_checkInStart" name="ev_checkInStart" ng-model="data_event.ev_checkInStart">
                    <br>
                    <label for="ev_checkInEnd" class="form-label">ปิดลงทะเบียนเข้างาน</label>
                    <input type="datetime-local" class="form-control" id="ev_checkInEnd" name="ev_checkInEnd" ng-model="data_event.ev_checkInEnd">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary" ng-if="!isCreate" ng-click="save_event('POST','createEvent')">บันทึก</button>
                    <button type="button" class="btn btn-primary" ng-if="isCreate" ng-click="save_event('PATCH','editEvent')">บันทึก</button>
                    <button type="button" class="btn btn-danger" ng-if="isCreate" ng-click="delete_event(data_event.ev_eventId)">ลบกิจกรรม</button>
                </div>
            </div>
        </form>
    </div>
</div>