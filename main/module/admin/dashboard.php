<div class="container-fluid">
    <div class="row pb-1 pt-5 text-center">
        <!-- edit here -->
        <div class="col-sm-6 pb-2">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">จำนวนผู้ใช้งานทั้งหมด</h5>
                    <h1>574</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 pb-2">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">จำนวนกิจกรรมทั้งหมด</h5>
                    <h1>23</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-2">
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-success">เพิ่มผู้ใช้งาน <i class="bi bi-plus-square-dotted"></i></a>
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
                    <td>{{checkString(row.u_userId)}}</td>
                    <td>{{checkString(row.u_email)}}</td>
                    <td>{{checkString(row.ud_name)}}</td>
                    <td>{{checkString(row.ud_role)}}</td>
                    <td>{{checkString(row.lastLogin)}}</td>
                    <td>
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">แก้ไขสิทธิผู้ใช้</a></li>
                            <li><a class="dropdown-item" href="#">ออกจากระบบ</a></li>
                            <li><a class="dropdown-item" href="#">ลบ</a></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>