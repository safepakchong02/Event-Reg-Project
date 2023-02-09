<!-- import ctrl -->
<?
$ctrl_path = "admin";
$ctrl_name = "dashboard_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<div class="container-fluid" ng-controller="<?= $ctrl_name ?>">
    <div class="row pb-1 pt-5 text-center">
        <!-- edit here -->
        <div class="col-sm-6 pb-2">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">จำนวนผู้ใช้งานทั้งหมด</h5>
                    <h1>{{admin_data.users}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 pb-2">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">จำนวนกิจกรรมทั้งหมด</h5>
                    <h1>{{admin_data.events}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table datatable="ng" id="example" class="table nowrap dt-responsive" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th>ไอดีผู้ใช้</th>
                    <th>อีเมล</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>สิทธิผู้ใช้</th>
                    <th>เข้าสู่ระบบล่าสุด</th>
                    <th>เมนู</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-light" ng-repeat="row in users">
                    <td>{{row.u_userId}}</td>
                    <td>{{row.u_email}}</td>
                    <td>{{row.ud_firstName}} {{row.ud_lastName}}</td>
                    <td>{{showRole(row.u_role)}}</td>
                    <td>{{row.ac_createTime}}</td>
                    <td>
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            action
                        </button>
                        <ul class="dropdown-menu">
                            <li><button ng-click="resetPassword(row.u_userId)" class="dropdown-item">รีเซ็ทรหัสผ่าน</button></li>
                            <li><button ng-click="changeRole(row.u_userId)" class="dropdown-item">แก้ไขสิทธิผู้ใช้</button></li>
                            <li><button ng-click="forceLogout(row.u_userId)" class="dropdown-item">ออกจากระบบ</button></li>
                            <li><button ng-click="removeUser(row.u_userId)" class="dropdown-item">ลบ</button></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>