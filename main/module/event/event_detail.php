<!-- import ctrl -->
<?
$ctrl_name = "event_detail_manage_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <!-- ข้อมูลผู้ลงทะเบียน -->
    <? $ev_id = $_GET["ev_id"]; ?>
    <div class="col-12 pt-4" ng-controller="<?= $ctrl_name ?>">
        <h1>รายชื่อผู้ลงทะเบียน</h1><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3>กิจกรรม : {{ev_title}}</3>
                </div>
                <div class="col-9">
                    <div class="col-12" align="right">
                        <button ng-hide="isEmpty" type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-detail-add">
                            <i class="bi bi-person-plus-fill"></i> เพิ่มรายชื่อ
                        </button>
                        <a href="index.php?p=event&m=event_detail_setting&ev_id=<?= $ev_id ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-gear-wide-connected"></i> ตั้งค่าการลงทะเบียน
                        </a>
                        <a href="index.php?p=event&m=event_detail_import&ev_id=<?= $ev_id ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-upload"></i> นำเข้าข้อมูล
                        </a>
                        <a href="index.php?p=event&m=event_detail_export&ev_id=<?= $ev_id ?>" ng-hide="isEmpty" class="btn btn-info btn-sm ">
                            <i class="bi bi-file-earmark-arrow-up"></i></i> Export
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- แสดงข้อมูล -->
        <table id="example" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th ng-repeat="header in header_data">{{header}}</th>
                    <th data-priority="1"></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="row in table_data">
                    <td ng-repeat="col in row">{{col}}</td>
                    <td>
                        <button class="btn btn-info btn-sm text-white">ข้อมูลผู้ลงทะเบียน</button>
                        <button class="btn btn-warning btn-sm">แก้ไข</button>
                        <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    scrollX: true,
                    responsive: true,
                    columnDefs: [{
                        responsivePriority: 1,
                        targets: -1
                    }]
                });
            });
        </script>
    </div>
    <!-- จบการแสดงข้อมูล -->
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>