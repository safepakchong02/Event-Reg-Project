<!-- import ctrl -->
<?
$ctrl_name = "reg_dashboard_ctrl";
include("main/controller/$ctrl_name.php");

if (!isset($_GET["ev_id"])) { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=reg&m=event_dashboard">
<? } ?>
<style>
    body {
        margin: 0;
        background-color: #ee5b23;
    }

    .btn_title {
        background-color: #00b0b2;
        color: #FBFCFC;
    }
</style>

<div ng-controller="<?= $ctrl_name ?>"><br>
    <div class="container-fluid"><br>
        <div class="row justify-content-md-center" align="center">
            <div class="col-xs-6 col-md" style="padding-bottom: 1rem;">
                <div class="card text-white btn_title mb-3 shadow" style="width: 20rem; border-radius: 2rem;">
                    <h3 class="card-body" align="center">กิจกรรม <b>{{event_data[0].ev_title}}</b></h3>
                    <h8 class="card-title" align="center">{{event_data[0].ev_date_start}} - {{event_data[0].ev_date_end}}</h8>
                </div>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="container">
        <div class="row justify-content-md-center" align="center">
            <div class="col-xs-6 col-md-3" style="padding-bottom: 1rem;">
                <div class="card text-white btn_custom mb-3 shadow" style="max-width: 18rem; border-radius: 2rem;">
                    <div class="card-body">
                        <ion-icon name="people-outline"></ion-icon>
                        <i class="bi bi-people-fill"></i> จำนวนผู้มาเข้าร่วม
                        <hr>
                        <h5 class="card-title" align="center">จำนวน {{report_sum.Join}} คน</h5>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3" style="padding-bottom: 1rem;">
                <div class="card text-white btn_danger mb-3 shadow" style="max-width: 18rem; border-radius: 2rem;">
                    <div class="card-body">
                        <ion-icon name="cart-outline"></ion-icon>
                        <i class="bi bi-people-fill"></i> จำนวนผู้ไม่มาเข้าร่วม
                        <hr>
                        <h5 class="card-title" align="center">จำนวน {{report_sum.no_join}} คน</h5>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3" style="padding-bottom: 1rem;">
                <div class="card text-white btn_normal mb-3 shadow" style="max-width: 18rem; border-radius: 2rem;">
                    <div class="card-body">
                        <ion-icon name="desktop-outline"></ion-icon>
                        <i class="bi bi-people-fill"></i> จำนวนผู้ลงทะเบียน
                        <hr>
                        <h5 class="card-title" align="center">จำนวน {{report_sum.all}} คน</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <select class="form-select" ng-model="group_by" ng-change="loadData()">
                    <option value="">สรุปผลตาม</option>
                    <option value="com_name" ng-show="check.com_name">ชื่อบริษัท</option>
                    <option value="dep" ng-show="check.dep">แผนก</option>
                    <option value="pos" ng-show="check.pos">ตำแหน่ง</option>
                    <option value="gender" ng-show="check.gender">เพศ</option>
                </select>
            </div>
        </div>
    </div>
    <br><br>

    <div class="container">
        <div class="row">
            <div ng-repeat="report in report_data" class="col-xl-3 col-sm-5 col-12" style="padding-bottom: 1rem;">
                <div style="background-color: #f5e3a9; border-radius: 2rem;">
                    <div style="padding: 1rem;">
                        <span class="h5">{{report[group_by]}}</span> <br>
                        <span class="progress-text">มา</span>
                        <div class="progress" style="height: 35px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" ng-style="{width: widthCal(report['join'], report['no_join'])}">
                                <b style="font-size: 15px;">{{report["join"]}}</b>
                            </div>
                        </div>
                        <span class="progress-text">ไม่มา</span>
                        <div class="progress" style="height: 35px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" ng-style="{width: widthCal(report['no_join'], report['join'])}">
                                <b tyle="font-size: 15px;">{{report["no_join"]}}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!------------>
</div>