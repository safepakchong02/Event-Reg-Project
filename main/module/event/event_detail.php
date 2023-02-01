<!-- import ctrl -->
<?
$ctrl_path = "event";
$ctrl_name = "event_detail_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<div class="container-fluid" ng-controller="<?= $ctrl_name ?>">
    <div class="row pb-2 pt-5">
        <h1>{{event_data.ev_title}}</h1>
        <p>วันเวลาเปิด-ปิดลงทะเบียนล่วงหน้า : {{event_data.ev_preRegStart}} - {{event_data.ev_preRegEnd}}</p>
        <p>วันเวลาเปิด-ปิดลงทะเบียนเข้างาน : {{event_data.ev_checkInStart}} - {{event_data.ev_checkInEnd}}</p>
        <p>วันเวลาที่กิจกรรมเริ่ม-จบ : {{event_data.ev_eventStart}} - {{event_data.ev_eventEnd}}</p>
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
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="manageEvent" data-bs-toggle="tab" data-bs-target="#manageEvent-pane" type="button" role="tab" aria-controls="manageEvent-pane" aria-selected="false">จัดการกิจกรรม</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="eventDetail" role="tabpanel" aria-labelledby="eventDetail-tab" tabindex="0">
                <div class="row pt-3">
                    <div class="col-10 pb-2">
                        <div class="card text-center">
                            <div class="card-header">
                                รายละเอียดกิจกรรม
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{event_data.ev_detail}}</p>
                            </div>
                            <div class="card-footer">
                                <span>QR code สำหรับกิจกรรมนี้</span><br>
                                <div id="qrcode" class="d-flex justify-content-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 pb-2">
                        <div class="row pb-2">
                            <div class="col-sm-12">
                                <div class="card text-center color-success">
                                    <img src="./asset/user.png" class="card-img-top img-thumbnail color-success">
                                    <div class="card-body">
                                        <p class="h5">สร้างโดย</p>
                                        <p>นายอิทธิพล สิงห์บุรี</p>
                                        <hr>
                                        <p class="h5">จำนวนผู้เข้าร่วม</p>
                                        <p>47/120</p>
                                        <hr>
                                        <button type="button" ng-click="preReg()" ng-if="isPreReg" id="preReg" class="btn btn-sm btn-primary">ลงทะเบียนล่วงหน้า <i class="bi bi-box-arrow-in-right"></i></button>
                                        <button type="button" ng-click="checkIn()" ng-if="isSelfCheckIn" id="checkIn" class="btn btn-sm btn-primary">ลงทะเบียน <i class="bi bi-box-arrow-in-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="eventReport-pane" role="tabpanel" aria-labelledby="eventReport" tabindex="0">
                <div class="row pt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">รายงานกิจกรรม</h3>
                            <h5 class="card-title">บลาๆๆ</h5>
                            <h5 class="card-title">บลาๆๆ</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="manageEvent-pane" role="tabpanel" aria-labelledby="manageEvent" tabindex="0">
                <div class="row pt-3">
                    <div class="col-10 pb-2"></div>
                    <div class="col-2 pb-2">
                        <a href="#" class="btn btn-primary">แก้ไขกิจกรรม <i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
                <div class="row pt-3">
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr class="table-info">
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>