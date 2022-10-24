<!-- import ctrl -->
<?
$ctrl_name = "reg_search_ctrl";
include("main/controller/$ctrl_name.php");

if (!isset($_GET["ev_id"])) { ?>
    <meta http-equiv="refresh" content="0;url=index.php?p=reg&m=event_dashboard">
<? } ?>

<!-- style -->
<style>
    .dataTables_filter {
        display: none;
    }
</style>
<!-- end style -->

<!-- content -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>"><br>
    <div class="row">
        <div class="col-1" style="width: 140px;">
            <a href="index.php?p=event&m=event_detail&ev_id=<?= $_GET["ev_id"] ?>" class="btn btn-primary"><i class="bi bi-caret-left-fill"></i>ย้อนกลับ</a>
        </div>
        <div class="col">
            <h1>ส่งออกข้อมูล</h1>
        </div>
    </div>

    <!-- search key -->
    <div class="container pb-3"><br>
        <div class="row">
            <div class="col-md-4">
                <h3>ค้นหาข้อมูล</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 pb-3" ng-show="check.no">
                        <div class="form-group">
                            <label>ลำดับที่ :</label>
                            <input type="search" onkeyup="searchColumn(0, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.emp_id">
                        <div class="form-group">
                            <label>รหัสพนักงาน :</label>
                            <input type="search" onkeyup="searchColumn(1, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.card_id">
                        <div class="form-group">
                            <label>บัตรประชาชน :</label>
                            <input type="search" onkeyup="searchColumn(2, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.name">
                        <div class="form-group">
                            <label>ชื่อ-นามสกุล :</label>
                            <input type="search" onkeyup="searchColumn(4, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.com_name">
                        <div class="form-group">
                            <label>ชื่อบริษัท :</label>
                            <input type="search" onkeyup="searchColumn(6, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.dep">
                        <div class="form-group">
                            <label>แผนก :</label>
                            <input type="search" onkeyup="searchColumn(7, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.pos">
                        <div class="form-group">
                            <label>ตำแหน่ง :</label>
                            <input type="search" onkeyup="searchColumn(8, this.value)" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" />
                        </div>
                    </div>
                    <div class="col-md-4 pb-3" ng-show="check.gender">
                        <div class="form-group">
                            <label>เพศ :</label>
                            <select class="form-control" onchange="searchColumn(9, this.value)">
                                <option value="">------- ไม่ระบุข้อมูล -------</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                                <option value="ทางเลือก">เพศทางเลือก</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label>สถานะการลงทะเบียน :</label>
                            <select class="form-control" onchange="searchColumn(12, this.value)">
                                <option value="">------- ไม่ระบุข้อมูล -------</option>
                                <option value="/">เข้าร่วม</option>
                                <option value="-">ไม่เข้าร่วม</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 pb-3">
                        <div class="form-group">
                            <label>วันที่เข้ากิจกรรม :</label>
                            <input type="search" onkeyup="searchColumn(12, this.value)" class="form-control rounded" placeholder="dd/mm/yyyy hh:mm หรือ hh:mm" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer"><br>
                <button type="button" class="btn btn-success btn-sm" ng-click="export()"><i class="bi bi-file-earmark-excel-fill"></i> Export Excel</button>
            </div>
        </div>
    </div>
    <!-- end search key -->

    <div class="pb-3">
        <span class="h3">รายชื่อผู้ลงทะเบียน</span>
    </div>

    <!-- data table -->
    <div class="table-responsive">
        <table datatable="ng" id="example" class="table nowrap dt-responsive" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th ng-show="check.no">ลำดับที่</th>
                    <th ng-show="check.emp_id">รหัสพนักงาน</th>
                    <th ng-show="check.card_id">รหัสบัตรประชาชน</th>
                    <th ng-show="check.prefix">คำนำหน้า</th>
                    <th ng-show="check.name">ชื่อ - สกุล</th>
                    <th ng-show="check.call">เบอร์โทรศัพท์</th>
                    <th ng-show="check.com_name">ชื่อบริษัท</th>
                    <th ng-show="check.dep">แผนก</th>
                    <th ng-show="check.pos">ตำแหน่ง</th>
                    <th ng-show="check.gender">เพศ</th>
                    <th ng-show="check.age">อายุ</th>
                    <th ng-show="check.birthDate">วันเกิด</th>
                    <th>วันที่เข้าร่วมกิจกรรม</th>
                    <th ng-show="check.comment">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="row in data_table">
                    <td ng-show="check.no">{{row.no}}</td>
                    <td ng-show="check.emp_id">{{row.emp_id}}</td>
                    <td ng-show="check.card_id">{{row.card_id}}</td>
                    <td ng-show="check.prefix">{{row.prefix}}</td>
                    <td ng-show="check.name">{{row.name}}</td>
                    <td ng-show="check.call">{{row.call}}</td>
                    <td ng-show="check.com_name">{{row.com_name}}</td>
                    <td ng-show="check.dep">{{row.dep}}</td>
                    <td ng-show="check.pos">{{row.pos}}</td>
                    <td ng-show="check.gender">{{row.gender}}</td>
                    <td ng-show="check.age">{{row.age}}</td>
                    <td ng-show="check.birthDate">{{row.birthDate}}</td>
                    <td>{{checkReg(row.reg_date)}}</td>
                    <td ng-show="check.comment">{{row.comment}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- end data table -->
</div>
<!-- end content -->
<!-- script built in -->
<script>
    const searchColumn = (c, k) => {
        table = $('#example')
            .DataTable()
            .column(c)
            .search(k)
            .draw();
    }
</script>
<!-- end script built in -->