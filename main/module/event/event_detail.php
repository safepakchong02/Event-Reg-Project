<!-- import ctrl -->
<?
$perm = true;
$ctrl_path = "event";
$ctrl_name = "events_manage_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<div class="container" ng-controller="<?= $ctrl_name ?>">
    <div class="row pt-3">
        <h1>สร้างกิจกรรม</h1>
        <form>
            <div class="row">
                <div class="col pb-2">
                    <label for="data_event.ev_title" class="form-label">ชื่อกิจกรรม</label>
                    <input type="text" class="form-control" id="data_event.ev_title" name="data_event.ev_title" ng-model="data_event.ev_title">
                </div>
                <div class="col pb-2">
                    <label for="data_event.ev_limit" class="form-label">จำกัดจำนวน(-1 ไม่จำกัด)</label>
                    <input type="number" class="form-control" id="data_event.ev_limit" name="data_event.ev_limit" ng-model="data_event.ev_limit">
                </div>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlTextarea1" class="form-label">Event detail</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="row pt-3 pb-3 border rounded-2">
                <div class="col-12 pb-4">
                    <span class="h5">ประเภทข้อมูลที่ต้องการ</span>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input disabled class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[0]">
                        <label class="form-check-label" for="">
                            อีเมล
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[1]">
                        <label class="form-check-label" for="">
                            คำนำหน้า
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input disabled class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[2]">
                        <label class="form-check-label" for="">
                            ชื่อ
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input disabled class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[3]">
                        <label class="form-check-label" for="">
                            นามสกุล
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[4]">
                        <label class="form-check-label" for="">
                            รหัสพนักงาน / รหัสนักศึกษา
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[5]">
                        <label class="form-check-label" for="">
                            รหัสบัตรประชาชน
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[6]">
                        <label class="form-check-label" for="">
                            เพศ
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[7]">
                        <label class="form-check-label" for="">
                            วันเกิด
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[8]">
                        <label class="form-check-label" for="">
                            เบอร์โทรศัพท์
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[9]">
                        <label class="form-check-label" for="">
                            ชื่อบริษัท / ชื่อสถานศึกษา
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[10]">
                        <label class="form-check-label" for="">
                            แผนก / สาขาวิชา
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="data_event.ev_dtype" name="data_event.ev_dtype" ng-model="data_event.ev_dtype[11]">
                        <label class="form-check-label" for="">
                            ตำแหน่ง / ชั่นปี
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="data_event.ev_public" name="data_event.ev_public" ng-model="data_event.ev_public">
                    <label class="form-check-label" for="data_event.ev_public">กิจกรรมนี้เปิดเป็นสารธารณะหรือไม่</label>
                </div>
            </div>
            <div class="mb">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="data_event.ev_selfReg" name="data_event.ev_selfReg" ng-model="data_event.ev_selfReg">
                    <label class="form-check-label" for="data_event.ev_selfReg">ลงทะเบียนด้วยตนเอง</label>
                </div>
            </div>
            <div class="mb">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="data_event.ev_preReg" name="data_event.ev_preReg" ng-model="data_event.ev_preReg">
                    <label class="form-check-label" for="data_event.ev_preReg">ลงทะเบียนล่วงหน้า</label>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="exampleFormControlTextarea1" class="form-label">ev_preRegStart</label>
                    <input type="datetime-local" class="default" />
                </div>
                <div class="col-sm-6">
                    <label for="exampleFormControlTextarea1" class="form-label">ev_preRegEnd</label>
                    <input type="datetime-local" class="default" />
                </div>
            </div>
            <div class="mb-1">
                <label for="exampleFormControlTextarea1" class="form-label">Event check-in</label>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="exampleFormControlTextarea1" class="form-label">ev_checkInStart</label>
                    <input type="datetime-local" class="default" />
                </div>
                <div class="col-sm-6">
                    <label for="exampleFormControlTextarea1" class="form-label">ev_checkInEnd</label>
                    <input type="datetime-local" class="default" />
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Event start</label>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="exampleFormControlTextarea1" class="form-label">ev_eventStart</label>
                    <input type="datetime-local" class="default" />
                </div>
                <div class="col-sm-6 pb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ev_eventEnd</label>
                    <input type="datetime-local" class="default" />
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>