<!-- import ctrl -->
<?
$ctrl_path = "event";
$ctrl_name = "event_detail_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<div class="container-fluid" ng-controller="<?= $ctrl_name ?>">
    <div class="row pt-3 mt-3 mb-3 rounded {{event_data.ev_checkInState}}">
        <h1>{{event_data.ev_title}}</h1>
        <span style="font-size: small;" ng-if="isPreReg">ลงทะเบียนล่วงหน้า : {{event_data.ev_preRegStart}} - {{event_data.ev_preRegEnd}}</span>
        <span style="font-size: small;">ลงทะเบียนเข้างาน : {{event_data.ev_checkInStart}} - {{event_data.ev_checkInEnd}}</span>
        <span style="font-size: small;">วันเวลากิจกรรม : {{event_data.ev_eventStart}} - {{event_data.ev_eventEnd}}</span>
    </div>
    <div class="row">
        <!-- edit here -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="eventDetail-tab" data-bs-toggle="tab" data-bs-target="#eventDetail" type="button" role="tab" aria-controls="eventDetail" aria-selected="true">รายละเอียดกิจกรรม</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="eventReport" data-bs-toggle="tab" data-bs-target="#eventReport-pane" type="button" role="tab" aria-controls="eventReport-pane" aria-selected="false">รายงานกิจกรรม</button>
            </li>
            <li class="nav-item" role="presentation" ng-if="u_userId == event_data.ev_createdBy">
                <button class="nav-link" id="manageEvent" data-bs-toggle="tab" data-bs-target="#manageEvent-pane" type="button" role="tab" aria-controls="manageEvent-pane" aria-selected="false">จัดการกิจกรรม</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="eventDetail" role="tabpanel" aria-labelledby="eventDetail-tab" tabindex="0">
                <div class="row pt-3">
                    <div class="col-9 pb-2">
                        <div class="card">
                            <div class="card-header text-center">
                                รายละเอียดกิจกรรม
                            </div>
                            <div class="card-body">
                                <div class="card-text" id="ev_detail"></div>
                            </div>
                            <div class="card-footer text-center">
                                <span>QR code สำหรับกิจกรรมนี้</span><br>
                                <div id="qrcode" class="d-flex justify-content-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 pb-2">
                        <div class="row pb-2">
                            <div class="col-sm-12">
                                <div class="card text-center {{event_data.ev_checkInState}}">
                                    <div class="card-body">
                                        <p class="h5">สร้างโดย</p>
                                        <p>{{event_data.ev_createdByName}}</p>
                                        <hr>
                                        <p class="h5">จำนวนผู้เข้าร่วม</p>
                                        <p>{{eventReport.signedUp}}/{{event_data.ev_limit}}</p>
                                        <hr>
                                        <div class="row pb-2">
                                            <div class="col-12">
                                                <button type="button" ng-click="preReg()" ng-if="isPreReg" ng-disabled="!isTimePreReg" id="preReg" class="btn btn-sm btn-primary col-12">ลงทะเบียนล่วงหน้า <i class="bi bi-box-arrow-in-right"></i></button>
                                            </div>
                                        </div>
                                        <div class="row pb-2">
                                            <div class="col-12">
                                                <button type="button" ng-click="checkIn()" ng-if="isSelfCheckIn" ng-disabled="!isTimeCheckIn" id="checkIn" class="btn btn-sm btn-primary col-12">ลงทะเบียนเข้างาน <i class="bi bi-box-arrow-in-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="eventReport-pane" role="tabpanel" aria-labelledby="eventReport" tabindex="0">
                <div class="row justify-content-md-center pt-2" align="center">
                    <div class="col-12">
                        <p class="h1">สรุปผลโดยรวม</p>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="circular-progress-join">
                            <span class="progress-value-join">{{eventReport.checkedIn}}</span>
                        </div>
                        <br><text class="text-black text-size"><i class="bi bi-people-fill"></i>จำนวนผู้มาเข้าร่วม</text>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="circular-progress-no_join">
                            <span class="progress-value-no_join">{{eventReport.notCheckedIn}}</span>
                        </div>
                        <br><text class="text-black text-size"><i class="bi bi-people-fill"></i>จำนวนผู้ไม่มาเข้าร่วม</text>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <div class="circular-progress-all">
                            <span class="progress-value-all">{{eventReport.signedUp}}</span>
                        </div>
                        <br><text class="text-black text-size"><i class="bi bi-people-fill"></i>จำนวนผู้ลงทะเบียน</text>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-md-center" align="center" ng-show="u_userId == event_data.ev_createdBy">
                    <div class="col-12">
                        <p class="h1">สรุปผลโดยละเอียด</p>
                    </div>
                    <!-- select data -->
                    <div class="col-12">
                        <div class="row justify-content-md-center" align="center">
                            <div class="col-auto">
                                <label for="filter" class="form-label">ประเภทข้อมูล</label>
                                <select class="form-select" name="filter" id="filter" ng-model="report_filter" ng-change="selectData()">
                                    <option value="month">เดือน</option>
                                    <option value="day">วัน</option>
                                    <option value="hour">ช่วงเวลา</option>
                                </select>
                            </div>
                            <div class="col-auto ng-hide" id="report_year">
                                <label for="year" class="form-label">เลือกปี</label>
                                <select class="form-select" name="year" id="year" ng-model="report_year">
                                    <? for ($i = 2000; $i <= 2050; $i++) { ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-auto ng-hide" id="report_month">
                                <label for="month" class="form-label">เลือกเดือน</label>
                                <select class="form-select" name="month" id="month" ng-model="report_month">
                                    <? for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-auto ng-hide" id="report_day">
                                <label for="day" class="form-label">เลือกวัน</label>
                                <select class="form-select" name="day" id="day" ng-model="report_day">
                                    <? for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <button ng-click="getReport()" class="btn btn-primary" id="btn" type="button">แสดงผล</button>
                            </div>
                        </div>
                    </div>

                    <!-- show data -->
                    <div class="col-6" id="body_canvas">
                        <canvas id="chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="manageEvent-pane" role="tabpanel" aria-labelledby="manageEvent" tabindex="0" ng-if="u_userId == event_data.ev_createdBy">
                <div class="row pt-3">
                    <div class="col-10 pb-2"></div>
                    <div class="col-2 pb-2">
                        <a href="index.php?p=event&m=event_detail_edit&ev_eventId={{event_data.ev_eventId}}" class="btn btn-primary">แก้ไขกิจกรรม <i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
                <div class="row pt-3">
                    <!-- data table -->
                    <div class="table-responsive">
                        <table datatable="ng" id="example" class="table nowrap dt-responsive" style="width:100%">
                            <thead>
                                <tr class="table-dark">
                                    <th ng-if="event_data.ev_dType[0]">อีเมล</th>
                                    <th ng-if="event_data.ev_dType[1]">คำนำหน้า</th>
                                    <th ng-if="event_data.ev_dType[2]">ชื่อ</th>
                                    <th ng-if="event_data.ev_dType[3]">นามสกุล</th>
                                    <th ng-if="event_data.ev_dType[4]">รหัสพนักงาน / รหัสนักศึกษา</th>
                                    <th ng-if="event_data.ev_dType[5]">รหัสบัตรประชาชน</th>
                                    <th ng-if="event_data.ev_dType[6]">เพศ</th>
                                    <th ng-if="event_data.ev_dType[7]">วันเกิด</th>
                                    <th ng-if="event_data.ev_dType[8]">เบอร์โทรศัพท์</th>
                                    <th ng-if="event_data.ev_dType[9]">ชื่อบริษัท / ชื่อสถานศึกษา</th>
                                    <th ng-if="event_data.ev_dType[10]">แผนก / สาขาวิชา</th>
                                    <th ng-if="event_data.ev_dType[11]">ตำแหน่ง / ชั่นปี</th>
                                    <th>ลงทะเบียนล่วงหน้า</th>
                                    <th>ลงทะเบียนเข้างาน</th>
                                    <th>เมนู</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light" ng-repeat="row in eventMembers">
                                    <td ng-if="event_data.ev_dType[0]">{{checkString(row.u_email)}}</td>
                                    <td ng-if="event_data.ev_dType[1]">{{checkString(row.ud_prefix)}}</td>
                                    <td ng-if="event_data.ev_dType[2]">{{checkString(row.ud_firstName)}}</td>
                                    <td ng-if="event_data.ev_dType[3]">{{checkString(row.ud_lastName)}}</td>
                                    <td ng-if="event_data.ev_dType[4]">{{checkString(row.ud_emp_id)}}</td>
                                    <td ng-if="event_data.ev_dType[5]">{{checkString(row.ud_card_id)}}</td>
                                    <td ng-if="event_data.ev_dType[6]">{{checkString(row.ud_gender)}}</td>
                                    <td ng-if="event_data.ev_dType[7]">{{checkString(row.ud_birthDate)}}</td>
                                    <td ng-if="event_data.ev_dType[8]">{{checkString(row.ud_phone)}}</td>
                                    <td ng-if="event_data.ev_dType[9]">{{checkString(row.ud_orgName)}}</td>
                                    <td ng-if="event_data.ev_dType[10]">{{checkString(row.ud_department)}}</td>
                                    <td ng-if="event_data.ev_dType[11]">{{checkString(row.ud_position)}}</td>
                                    <td>{{checkString(row.m_preReg)}}</td>
                                    <td>{{checkString(row.m_checkIn)}}</td>
                                    <td>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            เมนู
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" ng-click="checkInByMod(row.u_userId)">ลงทะเบียนเข้างาน</button></li>
                                            <li><button class="dropdown-item" ng-click="deleteMember(row.u_userId)">ลบ</button></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end data table -->
                </div>
            </div>
        </div>
    </div>
</div>