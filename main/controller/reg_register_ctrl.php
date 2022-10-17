<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http, $interval) { // start controller function
        const clearData = () => {
            $scope.data_add = {};
            $scope.data_add.emp_id = "";
            $scope.data_add.card_id = "";
            $scope.data_add.name = "";
            $scope.data_add.call = "";
            $scope.data_add.com_name = "";
            $scope.data_add.dep = "";
            $scope.data_add.pos = "";
            $scope.data_add.no = null;
            $scope.data_add.gender = "";
            $scope.data_add.age = null;
            $scope.data_add.birthDate = "";
        }

        const searchBy = (key) => {
            switch (key) {
                case "emp_id":
                    return $scope.data_add.emp_id;
                    break;
                case "card_id":
                    return $scope.data_add.card_id;
                    break;
                default:
                    return "";
                    break;
            }
        }

        // init page
        clearData();

        /* =============SHOW DATA============= */
        const checkReg = () => {
            $http.get("main/model/reg/query_reg.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
                .then((res) => { // start then
                    $scope.regIsOpen = true;
                    $scope.event_data = res.data.results_data; // "results_data" is key in json format

                    let now = new Date();
                    let st = createDate($scope.event_data[0].ev_date_start);
                    let ed = createDate($scope.event_data[0].ev_date_end);

                    if (now >= st && now <= ed) {
                        $scope.regIsOpen = true;
                        // console.log("open");
                        $("#reg_open").removeClass("ng-hide");
                        $("#reg_close").addClass("ng-hide");
                    } else {
                        $scope.regIsOpen = false;
                        // console.log("close");
                        $("#reg_open").addClass("ng-hide");
                        $("#reg_close").removeClass("ng-hide");
                    }
                }) // end then
        } // end checkReg func
        checkReg();
        $interval(() => {
            checkReg();
            // console.log("reload");
        }, 300000)

        $http.get("main/model/event/query_event_detail_setting.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.check = res.data.results_data[0];
                $scope.reg_by = res.data.results_data[0]["has_reg_by"];
                $scope.has_reg_by = convertNameCol($scope.reg_by);
            }); // end then
        /* =============END SHOW DATA============= */

        /* =============REGISTER============= */
        $scope.register = () => {
            $scope.reg = $("#reg").val();
            // console.log($scope.reg);
            $http({
                method: 'POST',
                url: 'main/model/reg/query_reg.php?event_view=noData',
                data: `ev_id=<?= $_GET["ev_id"] ?>` +
                    `&key=${$scope.reg_by}` +
                    `&value=${$scope.reg}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((res) => {
                var isNoData = res.data.noData;

                if (!isNoData) {
                    var data = res.data.results_data[0];
                    var id = data.id;
                    var now = new Date();
                    var reg_date = convertDate(now.toString());

                    $http({
                        method: 'POST',
                        url: 'main/model/reg/query_reg.php?event_view=reg',
                        data: `id=${id}` +
                            `&reg_date=${reg_date}`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    }).then((res) => {
                        // console.log(res.data);
                        $scope.preview = data;
                        $scope.preview.birthDate = createDate(data.birthDate);
                        // console.log($scope.preview);
                        $("#modal-status_reg_success").modal("show");
                    });
                } else {
                    $("#modal-status_reg_error_isNoData").modal("show");
                    setTimeout(() => {
                        $("#modal-status_reg_error_isNoData").modal("hide");
                    }, 15000)
                } // end else if 

                $scope.reg = "";
                $("#reg").val("");
                delete $scope.preview;
            }); // end then
        } // end function register
        /* =============END REGISTER============= */

        /* =============ADD MEMBER============= */
        $scope.add_member = () => {
            var birthDate = "";

            // check value
            if ($scope.data_add.birthDate !== "")
                birthDate = convertDate($scope.data_add.birthDate);
            if ($scope.data_add.no === null)
                $scope.data_add.no = "";
            if ($scope.data_add.age === null)
                $scope.data_add.age = "";
            // end check value

            // check exist data
            $http({
                method: 'POST',
                url: 'main/model/reg/query_reg.php?event_view=hasExist',
                data: `ev_id=<?= $_GET["ev_id"] ?>` +
                    `&key=${$scope.reg_by}` +
                    `&value=${searchBy($scope.reg_by)}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((response) => {
                    // console.log($scope);
                    var isExist = response.data.isExist;
                    // console.log(isExist);

                    // add data
                    if (!isExist) {
                        var reg_date = "";
                        $http({
                            method: 'POST',
                            url: 'main/model/reg/query_reg.php?event_view=add',
                            data: `ev_id=<?= $_GET["ev_id"] ?>` +
                                `&emp_id=${$scope.data_add.emp_id}` +
                                `&card_id=${$scope.data_add.card_id}` +
                                `&name=${$scope.data_add.name}` +
                                `&call=${$scope.data_add.call}` +
                                `&com_name=${$scope.data_add.com_name}` +
                                `&dep=${$scope.data_add.dep}` +
                                `&pos=${$scope.data_add.pos}` +
                                `&no=${$scope.data_add.no}` +
                                `&gender=${$scope.data_add.gender}` +
                                `&age=${$scope.data_add.age}` +
                                `&no=${$scope.data_add.no}` +
                                `&birthDate=${birthDate}` +
                                `&reg_date=${reg_date}`,
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then((res) => {
                                $("#modal-detail_add").modal("hide");
                                clearData();
                                $("#modal-status_success").modal("show");
                                setTimeout(() => {
                                    $("#modal-status_success").modal("hide");
                                }, 15000)
                            },
                            function(response) { // optional
                                // failed
                                console.log(response);
                            }); //end then
                    } else {
                        $("#modal-detail_add").modal("hide");
                        clearData();

                        $("#modal-status_reg_error_isExist").modal("show");
                        setTimeout(() => {
                            $("#modal-status_reg_error_isExist").modal("hide");
                        }, 15000)
                    } //end if else isExist
                    // end add data
                },
                (response) => { // optional
                    // failed
                    console.log(response);
                });
            // end check exist data
        } // end add_member function
        /* =============END ADD MEMBER============= */

    }); // end controller function
</script>