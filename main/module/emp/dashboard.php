<!-- import ctrl -->
<?
$ctrl_name = "emp_manage_ctrl";
include("main/controller/$ctrl_name.php");
?>

<!-- เริ่ม dashboard -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 pt-4" ng-controller="<?= $ctrl_name ?>">
            <!-- status -->
            <?include("main/body/status_success.php");?>
            <!-- end status -->
            <h1>แสดงรายชื่อพนักงาน</h1><br>
            <!-- เพิ่มข้อมูล -->
            <div class="d-flex justify-content-end pb-2">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-add">
                    <i class="bi bi-plus-circle"></i> เพิ่มข้อมูลพนักงาน
                </button>
            </div>
            <? include("main/module/emp/emp_add.php"); ?>
            <!-- จบการเพิ่มข้อมูล -->
            <!-- แสดงข้อมูล -->
            <table datatable="ng" id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr class="table-dark">
                        <th>รหัสพนักงาน</th>
                        <th>ชื่อ-สกุล</th>
                        <th>แผนก</th>
                        <th>สิทธิ์การใช้งาน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="show_emp_data in emp_data">
                        <? include("main/module/emp/emp_edit.php"); ?>
                        <td>{{show_emp_data.user_id}}</td> <!-- "ev_id" is name col -->
                        <td>{{show_emp_data.user_name}} {{show_emp_data.user_surname}}</td>
                        <td>{{show_emp_data.dep_name}}</td>
                        <td>{{show_emp_data.perm}}</td>
                        <td>
                            <!-- not edit -->
                            <a ng-click="reset_password(show_emp_data.id)" class="btn btn-info btn-sm text-white">เปลี่ยนรหัสผ่าน</a>
                            <button ng-click="edit_emp_view(show_emp_data.id)" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit">แก้ไข</button>
                            <button ng-click="delete_emp(show_emp_data.id)" class="btn btn-danger btn-sm">ลบ</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        // scrollX: true,
                    });
                });
            </script>
            <!-- จบการแสดงข้อมูล -->
        </div>
    </div>
</div>
<!-- จบ dashboard -->