<!-- import ctrl -->
<?
$ctrl_name = "reg_dashboard_ctrl";
include("main/controller/$ctrl_name.php");

if (!isset($_GET["ev_id"])) { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=reg&m=event_dashboard">
<? } ?>

<div ng-controller="<?= $ctrl_name ?>">
    <div class="container-fluid"><br>
        <div class="row">
            <div class="col">
                <h1>ชื่อกิจกรรม: {{event_data[0].ev_title}}</h1>
                <h3>วันที่/เวลา: {{event_data[0].ev_date_start}} ถึง {{event_data[0].ev_date_end}}</h3>
            </div>
        </div><br><br>

        <div class="container">
            <div class="row justify-content-md-center" align="center">
                <div class="col-xs-6 col-md-3">
                    <div class="card text-white btn_custom mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <ion-icon name="people-outline"></ion-icon>
                            <i class="bi bi-people-fill"></i> จำนวนผู้มาเข้าร่วม
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" align="center">จำนวน 123 คน</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="card text-white btn_danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <ion-icon name="cart-outline"></ion-icon>
                            <i class="bi bi-people-fill"></i> จำนวนผู้ไม่มาเข้าร่วม
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" align="center">จำนวน 12 คน</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="card text-white btn_normal mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <ion-icon name="desktop-outline"></ion-icon>
                            <i class="bi bi-people-fill"></i> จำนวนผู้ลงทะเบียน
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" align="center">จำนวน 123 คน</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <select class="form-select" aria-label="Default select example">
                        <option data-tokens="/">สรุปผลตาม</option>
                        <option data-tokens="/">แผนก</option>
                        <option data-tokens="/">ตำแหน่ง</option>
                        <option data-tokens="/">เพศ</option>
                    </select>
                </div>
            </div>
        </div>
        <br><br>

        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-5 col-12" style="padding-bottom: 1rem;">
                    <div style="background-color: #f5e3a9; border-radius: 2rem;">
                        <div style="padding: 1rem;">
                            <span class="h5">ฝ่ายสารสนเทศ</span> <br>
                            <span class="progress-text">มา</span>
                            <div class="progress" style="height: 35px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 10%;">
                                    <b style="font-size: 15px;">10</b>
                                </div>
                            </div>
                            <span class="progress-text">ไม่มา</span>
                            <div class="progress" style="height: 35px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: 90%;">
                                    <b tyle="font-size: 15px;">90</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>