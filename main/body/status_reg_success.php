<div class="modal fade" tabindex="-1" id="modal-status_reg_success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                <div class="row text-center">
                    <div class="col-12">
                        <span style="font-size:1.5rem;"><b>ดำเนินการเสร็จสิ้น</b></span>
                    </div>
                    <div class="col-12">
                        <i class="bi bi-check2-circle " style="color: #49C83E; font-size:7rem;"></i>
                    </div>
                </div>
                <form ng-controller="<?= $ctrl_name ?>">
                    <div class="row">
                        <div class="col-6" ng-hide="!check.emp_id">
                            <div class="form-group pb-2">
                                <label> รหัสพนักงาน :</label>
                                <input type="text" ng-model="preview.emp_id" name="preview.emp_id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.com_name">
                            <div class="form-group pb-2">
                                <label> ชื่อบริษัท :</label>
                                <input type="text" ng-model="preview.com_name" name="preview.com_name" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.name">
                            <div class="form-group pb-2">
                                <label> ชื่อ-สกุล :</label>
                                <input type="text" ng-model="preview.name" name="preview.name" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.card_id">
                            <div class="form-group pb-2">
                                <label> รหัสบัตรประชาชน :</label>
                                <input type="text" ng-model="preview.card_id" name="preview.card_id" value="{{preview.card_id}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.dep">
                            <div class="form-group pb-2">
                                <label> แผนก :</label>
                                <input type="text" ng-model="preview.dep" name="preview.dep" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.pos">
                            <div class="form-group pb-2">
                                <label> ตำแหน่ง :</label>
                                <input type="text" ng-model="preview.pos" name="preview.pos" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.call">
                            <div class="form-group pb-2">
                                <label> เบอร์โทรศัพท์ :</label>
                                <input type="tel" ng-model="preview.call" name="preview.call" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.gender">
                            <div class="form-group pb-2">
                                <label> เพศ :</label>
                                <select class="form-select" ng-model="preview.gender">
                                    <option>------โปรดระบุ------</option>
                                    <option value="male" ng-selected="preview.gender == 'male'">ชาย</option>
                                    <option value="female" ng-selected="preview.gender == 'female'">หญิง</option>
                                    <option value="LGBTQ+" ng-selected="preview.gender == 'LGBTQ+'">เพศทางเลือก</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.age">
                            <div class="form-group pb-2">
                                <label> อายุ :</label>
                                <input type="number" ng-model="preview.age" name="preview.age" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.birthDate">
                            <div class="form-group pb-2">
                                <label> วันเดือนปีเกิด :</label>
                                <input type="date" ng-model="preview.birthDate" name="preview.birthDate" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.salary">
                            <div class="form-group pb-2">
                                <label> เงินเดือน :</label>
                                <input type="number" ng-model="preview.salary" name="preview.salary" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>