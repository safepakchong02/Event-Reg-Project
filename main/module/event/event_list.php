<!-- import ctrl -->
<?
$ctrl_path = "event";
$ctrl_name = "event_list_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>
<link rel="stylesheet" type="text/css" href="asset/css/event.css">
<!-- เริ่ม dashboard -->
<div class="container-fluid " ng-controller="<?= $ctrl_name ?>">

    <div class="row pb-5 pt-5 text-center">
        <!-- edit here -->
        <h1>ระบบลงทะเบียนออนไลน์</h1>
    </div>
    <!-- show list -->
    <div class="dashBoard-list">
    <div class="row topRadio">
        <div class="col-1 rounded p-2 head">มุมมอง</div>
        <div class="col-auto">
            <div class="form-check rounded p-2" ng-click="showList('card')">
                <input class="form-check-input" type="radio" name="selectShowList" id="selectShowList1" checked>
                <label class="form-check-label" for="selectShowList1">
                    การ์ด
                </label>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-check rounded p-2" ng-click="showList('table')">
                <input class="form-check-input" type="radio" name="selectShowList" id="selectShowList2">
                <label class="form-check-label" for="selectShowList2">
                    ตาราง
                </label>
            </div>
        </div>
    </div>
    <!-- end show list -->

    <!-- filter -->
    <div class="row pb-3 btmRadio">
        <div class="col-1 rounded p-2 head">แสดงผล</div>
        <div class="col-auto">
            <div class="form-check p-2" ng-click="filterList('all')">
                <input class="form-check-input" type="radio" name="selectFilterShowList" id="selectFilterShowList1" checked>
                <label class="form-check-label" for="selectFilterShowList1">
                    ทั้งหมด
                </label>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-check p-2 leftMargin" ng-click="filterList('incoming')">
                <input class="form-check-input color-warning" type="radio" name="selectFilterShowList" id="selectFilterShowList2">
                <label class="form-check-label" for="selectFilterShowList2">
                    ยังไม่ถึงเวลาเปิดลงทะเบียนเข้างาน
                </label>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-check p-2 leftMargin" ng-click="filterList('opening')">
                <input class="form-check-input color-success" type="radio" name="selectFilterShowList" id="selectFilterShowList3">
                <label class="form-check-label" for="selectFilterShowList3">
                    เปิดลงทะเบียนเข้างาน
                </label>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-check p-2 leftMargin" ng-click="filterList('closed')">
                <input class="form-check-input color-danger" type="radio" name="selectFilterShowList" id="selectFilterShowList4">
                <label class="form-check-label" for="selectFilterShowList4">
                    ปิดลงทะเบียนเข้างาน
                </label>
            </div>
        </div>
    </div>
    <!-- end filter -->

    <!-- show list card -->
    <div class="row overflow-scroll" id="card_list">
        <div class="col-sm-4 pb-2" ng-repeat="list in eventLists" id="{{list.ev_checkInState}}">
            <div class="card {{list.ev_checkInState}}">
                <div class="card-body">
                    <h5 class="card-title">{{list.ev_title}}</h5>
                    <a href="index.php?p=event&m=event_detail&ev_eventId={{list.ev_eventId}}" class="btn btn-primary">ดูรายละเอียดที่นี่</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end show list card -->

    <!-- show list table -->
    <div class="row ng-hide" id="table_list">
        <div class="col-12">
            <div class="table-responsive">
                <table datatable="ng" id="example" class="table nowrap dt-responsive" style="width: 100%;">
                    <thead>
                        <tr class="table-dark">
                            <th>ชื่อกิจกรรม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="{{row.ev_checkInState}}" id="{{row.ev_checkInState}}" ng-repeat="row in eventLists">
                            <td>
                                <a href="index.php?p=event&m=event_detail&ev_eventId={{row.ev_eventId}}" class="">{{row.ev_title}}</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end show list table -->
</div>
</div>
<!-- จบ dashboard -->