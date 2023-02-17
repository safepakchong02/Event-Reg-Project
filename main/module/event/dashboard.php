<!DOCTYPE html>
<!-- import ctrl -->

<?
$ctrl_path = "event";
$ctrl_name = "dashboard_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>
<!-- เริ่ม dashboard -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>">
    <div class="row pb-5 pt-5">
        <!-- edit here -->
        <h1>สวัสดี!!! {{ud_name}}</h1>
        <!-- <a href="index.php?p=user&m=profile" class="btn btn-primary col-auto">โปรไฟล์ >></a> -->
    </div>
    <div class="row">
        <!-- edit here -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="myEvent-tab" data-bs-toggle="tab" data-bs-target="#myEvent-pane" type="button" role="tab" aria-controls="myEvent-pane" aria-selected="true">กิจกรรมของฉัน</button>
            </li>
            <li class="nav-item" role="presentation" ng-if="u_role == 1">
                <button class="nav-link" id="manageEvent-tab" data-bs-toggle="tab" data-bs-target="#manageEvent-pane" type="button" role="tab" aria-controls="manageEvent-pane" aria-selected="false">กิจกรรมที่ฉันดูแล</button>
            </li>
        </ul>
        <div class="tab-content dashBoard" id="myTabContent">
            <div class="tab-pane fade show active" id="myEvent-pane" role="tabpanel" aria-labelledby="myEvent-tab" tabindex="0">
                <? include("main/body/checkInState.php"); ?>
                <div class="row pt-3">
                    <div class="col-sm-4 pb-2" ng-repeat="myEvent in myEvents">
                        <div class="card {{myEvent.ev_checkInState}}">
                            <div class="card-body">
                                <h5 class="card-title">{{myEvent.ev_title}}</h5>
                                <a href="index.php?p=event&m=event_detail&ev_eventId={{myEvent.ev_eventId}}" class="btn btn-primary">รายละเอียด <i class="bi bi-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="manageEvent-pane" role="tabpanel" aria-labelledby="manageEvent-tab" tabindex="0" ng-if="u_role == 1">
                <? include("main/body/checkInState.php"); ?>
                <div class="row pt-3">
                    <div class="col-sm-4 pb-2">
                        <a href="index.php?p=event&m=event_detail_edit" class="btn btn-success">สร้างกิจกรรม <i class="bi bi-plus-square-dotted"></i></a>
                    </div>
                    <div class="row pt-3">
                        <div class="col-sm-4 pb-2" ng-repeat="modEvent in modEvents">
                            <div class="card {{modEvent.ev_checkInState}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{modEvent.ev_title}}</h5>
                                    <a href="index.php?p=event&m=event_detail&ev_eventId={{modEvent.ev_eventId}}" class="btn btn-primary">รายละเอียด <i class="bi bi-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- จบ dashboard -->