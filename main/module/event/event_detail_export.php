<div class="container-fluid"><br>
    <div class="row" >
        <div class="col-1" style="width: 140px;">
            <button type="button" class="btn btn-primary"><i class="bi bi-caret-left-fill"></i>ย้อนกลับ</button>
        </div>
        <div class="col">
            <h1>ออกรายงานผล</h1>
        </div>
    </div>
    <div class="container">
      <table class="table">
            <thead>
                <tr>
                    <div class="col-4">
                        <div class="col">
                            <h3>ค้นหาข้อมูล</h3>
                        </div>
                    </div>
                </tr>
                <tr>
                  <td>
                    <div class="box-body">
         			    <div class="row">
						    <div class="col-md-4">
							    <div class="form-group">
								    <label>รหัสพนักงาน :</label>
                                    <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />  
							    </div>
						    </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                
                                    <label >แผนก :</label>
                                    <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >ตำแหน่ง :</label>
                                    <input type="search" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </div>
					    </div>
                        <br>
                        <div class="row">
						    <div class="col-md-4">
							    <div class="form-group">
								    <label>เพศ :</label>
                                    <select class="form-control selectpicker" id="select-country" data-live-search="true">
                                        <option data-tokens="/">---ไม่ระบุข้อมูล---</option>
                                        <option data-tokens="/">ชาย</option>
                                        <option data-tokens="/">หญิง</option>
                                        <option data-tokens="/">เพศทางเลือก</option>
                                    </select>  
							    </div>
						    </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >สถานะลงทะเบียน :</label>
                                    <select class="form-control selectpicker" id="select-country" data-live-search="true">
                                        <option data-tokens="/">---ไม่ระบุข้อมูล---</option>
                                        <option data-tokens="/">เปิดลงทะเบียน</option>
                                        <option data-tokens="/">ปิดลงทะเบียน</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >วันที่เข้ากิจกรรม :</label>
                                    <input type="datetime-local" class="form-control rounded" placeholder="------- ไม่ระบุข้อมูล -------" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </div>
					    </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer"><br>
                        <button type="submit" id="submit" class="btn btn-success btn-sm" ng-click="Export()" ><i class="bi bi-file-earmark-excel-fill"></i>  Export Excel</button>
                    </div>
                    <!-- /.box-footer-->
                  </td>
                </tr>
            </thead>
        </table>
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
                    <td align="center">123456789</td>
                    <td>ปัญญทัศน์ ศรีบุตรวงศ์</td>
                    <td>ชาย</td>
                    <td>สารสนเทศ</td>
                    <td>15/09/2565 16:00</td>
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