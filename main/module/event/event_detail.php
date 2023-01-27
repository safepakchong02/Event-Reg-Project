<div class="container-fluid">
    <div class="row pt-5">

    </div>
    <div class="row">
        <!-- edit here -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="eventDetail-tab" data-bs-toggle="tab" data-bs-target="#eventDetail" type="button" role="tab" aria-controls="eventDetail" aria-selected="true">รายละเอียดกิจกรรม</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="eventReport" data-bs-toggle="tab" data-bs-target="#eventReport-pane" type="button" role="tab" aria-controls="eventReport-pane" aria-selected="false">รายงานกิจกรรม</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="manageEvent" data-bs-toggle="tab" data-bs-target="#manageEvent-pane" type="button" role="tab" aria-controls="manageEvent-pane" aria-selected="false">จัดการกิจกรรม</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="eventDetail" role="tabpanel" aria-labelledby="eventDetail-tab" tabindex="0">
                <div class="row pt-3">
                    <div class="col-10 pb-2">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">รายละเอียดกิจกรรม</h3>
                                <h5 class="card-title">บลาๆๆ</h5>
                                <h5 class="card-title">บลาๆๆ</h5>
                                <h5 class="card-title">บลาๆๆ</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 pb-2">
                        <div class="row">
                            <div class="col-md-12 pb-2">
                                <img src="./asset/user.png" alt="" height="150px">
                            </div>
                            <div class="col-md-12">
                                <div class="card color-success">
                                    <div class="card-body">
                                        <h5 class="card-title">45/100</h5>
                                        <a href="#" class="btn btn-primary">ลงทะเบียน</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="eventReport-pane" role="tabpanel" aria-labelledby="eventReport" tabindex="0">
                <div class="row pt-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">รายงานกิจกรรม</h3>
                            <h5 class="card-title">บลาๆๆ</h5>
                            <h5 class="card-title">บลาๆๆ</h5>
                            <h5 class="card-title">บลาๆๆ</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="manageEvent-pane" role="tabpanel" aria-labelledby="manageEvent" tabindex="0">
                <div class="row pt-3">
                    <div class="col-10 pb-2"></div>
                    <div class="col-2 pb-2">
                        <a href="#" class="btn btn-primary">แก้ไขกิจกรรม <i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
                <div class="row pt-3">
                    <table class="table">
                        <thead>
                            <tr class="table-info">
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr class="table-info">
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>