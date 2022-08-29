<!-- import ctrl -->
<?
$ctrl_name = "event_detail_manage_ctrl";
include("main/controller/$ctrl_name.php");
?>

<? if (isset($_GET["ev_id"])) { ?>
    <!-- ข้อมูลผู้ลงทะเบียน -->
    <? $ev_id = $_GET["ev_id"]; ?>
    <div class="col-12 pt-4" ng-controller="<?= $ctrl_name ?>">
        <h2>รายชื่อผู้ลงทะเบียน</h2><br>
        <div class="container" style="width:100%">
            <div class="row">
                <div class="col">
                    <h3>กิจกรรม : ...</3>
                </div>
                <div class="col-9">
                    <div class="col-12" align="right">
                        <button ng-hide="haveData" type="button" class="btn btn-success btn-sm " data-bs-toggle="modal" data-bs-target="#modal-add">
                            <i class="bi bi-person-plus-fill"></i> เพิ่มรายชื่อ
                        </button>
                        <a href="index.php?p=event&m=event_detail_setting&id=<?= $ev_id ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-gear-wide-connected"></i> ตั้งค่าการลงทะเบียน
                        </a>
                        <a href="index.php?p=event&m=event_detail_import&id=<?= $ev_id ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-upload"></i> นำเข้าข้อมูล
                        </a>
                        <button ng-hide="haveData" type="button" class="btn btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#modal-add">
                            <i class="bi bi-file-earmark-arrow-up"></i></i> Export
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- แสดงข้อมูล -->
        <table ng-hide="haveData" id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th ng-repeat="header in header_data">{{header}}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="row in data">
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
                });
            });
        </script>
    </div>
    <!-- จบการแสดงข้อมูล -->
<? } else { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
<? } ?>