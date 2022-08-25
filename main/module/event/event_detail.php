<? if (isset($_GET["id"])) { ?>
    <!-- ข้อมูลผู้ลงทะเบียน -->
    <div class="col-12 pt-4">
        <h2>รายชื่อผู้ลงทะเบียน</h2><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>กิจกรรม : ...</3>
                </div>
                <div class="col-9">
                    <div class="col-12" align="right">
                        <button type="button" class="btn btn-success btn-sm " data-bs-toggle="modal" data-bs-target="#modal-add">
                            <i class="bi bi-person-plus-fill"></i> เพิ่มรายชื่อ
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add">
                            <i class="bi bi-gear-wide-connected"></i> ตั้งค่าการลงทะเบียน
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add">
                            <i class="bi bi-upload"></i> นำเข้าข้อมูล
                        </button>
                        <button type="button" class="btn btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#modal-add">
                            <i class="bi bi-file-earmark-arrow-up"></i></i> Export
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- แสดงข้อมูล -->
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr class="table-dark">
                    <th>รหัสพนักงาน</th>
                    <th>รหัสบัตรประชาชน</th>
                    <th>ชื่อ-สกุล</th>
                    <th>เพศ</th>
                    <th>แผนก</th>
                    <th>วันที่เข้ากิจกรรม</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">1</td>
                    <td>123456789</td>
                    <td>ปัญญทัศน์ ศรีบุตรวงศ์</td>
                    <td>ชาย</td>
                    <td>สารสนเทศ</td>
                    <td>15/09/2565 16:00</td>
                    <td>
                        <button class="btn btn-info btn-sm text-white">ข้อมูลผู้ลงทะเบียน</button>
                        <button class="btn btn-warning btn-sm">แก้ไข</button>
                        <button class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td>123456789</td>
                    <td>ปัญญทัศน์ ศรีบุตรวงศ์</td>
                    <td>หญิง</td>
                    <td>สารสนเทศ</td>
                    <td>15/09/2565 16:00</td>
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
        <!-- จบการแสดงข้อมูล -->
    <? } else { ?>
        <meta http-equiv="refresh" content="0;url=index.php?p=event&m=dashboard">
    <? } ?>