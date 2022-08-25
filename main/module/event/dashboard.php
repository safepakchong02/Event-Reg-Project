<!-- import ctrl -->
<?
$ctrl_name = "events_manage_ctrl";
include("main/controller/$ctrl_name.php");
?>

<!-- เริ่ม dashboard -->
<div class="container-fluid" ng-app="<?= $app_name ?>" ng-controller="<?= $ctrl_name ?>">
    <div class="row">
        <div class="col-12 pt-4">
            <h1>รายชื่อกิจกรรม</h1><br>
            <!-- เพิ่มข้อมูล -->
            <div class="d-flex justify-content-end pb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add">
                    <i class="bi bi-plus-circle"></i> เพิ่มกิจกรรม
                </button>
            </div>
            <? include("main/module/event/event_add.php"); ?>
            <!-- จบการเพิ่มข้อมูล -->
            <!-- แสดงข้อมูล -->
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr class="table-dark">
                        <th>ไอดี</th>
                        <th>ชื่อกิจกรรม</th>
                        <th>เจ้าหน้าที่ลงทะเบียน</th>
                        <th>สถานะลงทะเบียน</th>
                        <th>วันที่เปิดลงทะเบียน</th>
                        <th>วันที่ปิดลงทะเบียน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-danger" ng-repeat="show_event_data in event_data">
                        <? include("main/module/event/event_edit.php"); ?>
                        <td>{{$scope.show_event_data.ev_id}}</td> <!-- "ev_id is name col" -->
                        <td>{{$scope.show_event_data.ev_title}}</td>
                        <td>{{$scope.show_event_data.ev_assign_to}}</td>
                        <td>{{$scope.show_event_data.ev_status}}</td>
                        <td>{{$scope.show_event_data.ev_date_start}}</td>
                        <td>{{$scope.show_event_data.ev_date_end}}</td>
                        <td>
                            <a href="index.php?p=event&m=event_detail&id={{$scope.show_event_data.ev_id}}" class="btn btn-info btn-sm text-white">ข้อมูลผู้ลงทะเบียน</a>
                            <button ng-click="edit_event_view(show_event_data.ev_id)" class="btn btn-warning btn-sm">แก้ไข</button>
                            <button ng-click="delete_event(show_event_data.ev_id)" class="btn btn-danger btn-sm">ลบ</button>
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
            <!-- จบการแสดงข้อมูล -->
        </div>
    </div>
</div>
<!-- จบ dashboard -->