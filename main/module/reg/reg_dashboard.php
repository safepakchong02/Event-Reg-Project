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
        background: rgb(255, 126, 37);
        background: linear-gradient(180deg, rgba(255, 126, 37, 1) 28%, rgba(255, 198, 37, 1) 100%);
    }

    .btn_title {
        background-color: #f1f1f1;
        color: black;
    }

    .circular-progress-join {
        position: relative;
        height: 180px;
        width: 180px;
        border-radius: 50%;
        background: conic-gradient(#28B463 3.6deg, #ededed 0deg);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .circular-progress-join::before {
        content: "";
        position: absolute;
        height: 150px;
        width: 150px;
        border-radius: 50%;
        background-color: #f1f1f1;
        align-items: center;
    }

    .progress-value-join {
        position: relative;
        font-size: 35px;
        font-weight: 600;
        color: #28B463;
    }

    .circular-progress-no_join {
        position: relative;
        height: 180px;
        width: 180px;
        border-radius: 50%;
        background: conic-gradient(#CB4335 3.6deg, #ededed 0deg);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .circular-progress-no_join::before {
        content: "";
        position: absolute;
        height: 150px;
        width: 150px;
        border-radius: 50%;
        background-color: #f1f1f1;
        align-items: center;
    }

    .progress-value-no_join {
        position: relative;
        font-size: 35px;
        font-weight: 600;
        color: #CB4335;
    }

    .circular-progress-all {
        position: relative;
        height: 180px;
        width: 180px;
        border-radius: 50%;
        background: conic-gradient(#3498DB 3.6deg, #ededed 0deg);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .circular-progress-all::before {
        content: "";
        position: absolute;
        height: 150px;
        width: 150px;
        border-radius: 50%;
        background-color: #f1f1f1;
        align-items: center;
    }

    .progress-value-all {
        position: relative;
        font-size: 35px;
        font-weight: 600;
        color: #3498DB;
    }

    .text-size {
        font-size: 20px;
    }

    .title {
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-radius: 25px;
        background-color: white;
    }
</style>

<div ng-controller="<?= $ctrl_name ?>"><br>
    <!-- header -->
    <div class="container-fluid"><br>
        <div class="row justify-content-md-center" align="center">
            <div class="col-auto title">
                <h3 class="" align="center">กิจกรรม <b>{{event_data[0].ev_title}}</b></h3>
            </div>
        </div>
    </div>
    <hr><br>
    <!-- end header -->
    <div class="container">
        <div class="row justify-content-md-center" align="center">
            <div class="col-xs-6 col-md-3">
                <div class="circular-progress-join">
                    <span class="progress-value-join">{{report_sum.Join}}</span>
                </div>
                <br><text class="text-black text-size"><i class="bi bi-people-fill"></i>จำนวนผู้มาเข้าร่วม</text>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="circular-progress-no_join">
                    <span class="progress-value-no_join">{{report_sum.no_join}}</span>
                </div>
                <br><text class="text-black text-size"><i class="bi bi-people-fill"></i>จำนวนผู้ไม่มาเข้าร่วม</text>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="circular-progress-all">
                    <span class="progress-value-all">{{report_sum.all}}</span>
                </div>
                <br><text class="text-black text-size"><i class="bi bi-people-fill"></i>จำนวนผู้ลงทะเบียน</text>
            </div>
        </div>
    </div><br>
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