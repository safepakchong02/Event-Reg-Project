<div class="modal fade" tabindex="-1" id="modal-detail_add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle"></i> เพิ่มข้อมูลผู้ลงทะเบียน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="detail_add" ng-submit="add_member()" ng-controller="<?= $ctrl_name ?>">
          <div class="row">
            <div class="col-6" ng-if="check.no" id="no">
              <div class="form-group pb-2">
                <label> ลำดับที่ :</label>
                <input type="text" ng-model="data_add.no" name="data_add.no" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.hn" id="hn">
              <div class="form-group pb-2">
                <label> HN :</label>
                <input type="text" ng-model="data_add.hn" name="data_add.hn" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.emp_id" id="emp_id">
              <div class="form-group pb-2">
                <label> รหัสพนักงาน :</label>
                <input type="text" ng-model="data_add.emp_id" name="data_add.emp_id" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.card_id" id="card_id">
              <div class="form-group pb-2">
                <label> รหัสบัตรประชาชน :</label>
                <input type="text" ng-model="data_add.card_id" name="data_add.card_id" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.prefix" id="prefix">
              <div class="form-group pb-2">
                <label> คำนำหน้า :</label>
                <input type="text" ng-model="data_add.prefix" name="data_add.prefix" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.name" id="name">
              <div class="form-group pb-2">
                <label> ชื่อ :</label>
                <input type="text" ng-model="data_add.name" name="data_add.name" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.surname" id="surname">
              <div class="form-group pb-2">
                <label> นามสกุล :</label>
                <input type="text" ng-model="data_add.surname" name="data_add.surname" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.call" id="call">
              <div class="form-group pb-2">
                <label> เบอร์โทรศัพท์ :</label>
                <input type="tel" ng-model="data_add.call" name="data_add.call" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.com_name" id="com_name">
              <div class="form-group pb-2">
                <label> ชื่อบริษัท :</label>
                <input type="text" ng-model="data_add.com_name" name="data_add.com_name" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.dep" id="dep">
              <div class="form-group pb-2">
                <label> แผนก :</label>
                <input type="text" ng-model="data_add.dep" name="data_add.dep" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.pos" id="pos">
              <div class="form-group pb-2">
                <label> ตำแหน่ง :</label>
                <input type="text" ng-model="data_add.pos" name="data_add.pos" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.gender" id="gender">
              <div class="form-group pb-2">
                <label>เพศ :</label>
                <select class="form-select" ng-model="data_add.gender">
                  <option selected>------โปรดระบุ------</option>
                  <option value="ชาย">ชาย</option>
                  <option value="หญิง">หญิง</option>
                  <option value="เพศทางเลือก">เพศทางเลือก</option>
                </select>
              </div>
            </div>
            <div class="col-6" ng-if="check.age" id="age">
              <div class="form-group pb-2">
                <label> อายุ :</label>
                <input type="number" ng-model="data_add.age" name="data_add.age" class="form-control">
              </div>
            </div>
            <div class="col-6" ng-if="check.birthDate" id="birthDate">
              <div class="form-group pb-2">
                <label> วันเดือนปีเกิด :</label>
                <input type="date" ng-model="data_add.birthDate" name="data_add.birthDate" class="form-control">
              </div>
            </div>
            <div class="col-12" ng-if="check.comment" id="comment">
              <div class="form-group pb-2">
                <label> หมายเหตุ :</label>
                <textarea rows="3" ng-model="data_add.comment" name="data_add.comment" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="detail_add" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>