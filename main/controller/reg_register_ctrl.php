<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        const clearData = () => {
            $scope.add_detail_emp_id = "";
            $scope.add_detail_card_id = "";
            $scope.add_detail_name = "";
            $scope.add_detail_call = "";
            $scope.add_detail_com_name = "";
            $scope.add_detail_dep = "";
            $scope.add_detail_pos = "";
            $scope.add_detail_salary = null;
            $scope.add_detail_gender = "";
            $scope.add_detail_age = null;
            $scope.add_detail_birthDate = "";
        }

        const searchBy = (key) => {
            switch (key) {
                case "emp_id":
                    return $scope.add_detail_emp_id;
                    break;
                case "card_id":
                    return $scope.add_detail_card_id;
                    break;
                default:
                    return "";
                    break;
            }
        }

        $scope.preview = () => {
            $scope.preview = {};
            $scope.preview.emp_id = $scope.add_detail_emp_id;
            $scope.preview.card_id = $scope.add_detail_card_id;
            $scope.preview.name = $scope.add_detail_name;
            $scope.preview.call = $scope.add_detail_call;
            $scope.preview.com_name = $scope.add_detail_com_name;
            $scope.preview.dep = $scope.add_detail_dep;
            $scope.preview.pos = $scope.add_detail_pos;
            $scope.preview.salary = $scope.add_detail_salary;
            $scope.preview.gender = $scope.add_detail_gender;
            $scope.preview.age = $scope.add_detail_age;
            $scope.preview.birthDate = $scope.add_detail_birthDate;
        }

        // init page
        clearData();

        // start show event
        $http.get("main/model/reg/query_reg.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }) // end then

        $http.get("main/model/event/query_event_detail_setting.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.check = res.data.results_data[0];
                $scope.reg_by = res.data.results_data[0]["has_reg_by"];
                $scope.has_reg_by = convertNameCol($scope.reg_by);
            }); // end then

        $scope.add_member = () => {
            var birthDate = "";

            // check value
            if ($scope.add_detail_birthDate !== "")
                birthDate = convertDate($scope.add_detail_birthDate);
            if ($scope.add_detail_salary === null)
                $scope.add_detail_salary = "";
            if ($scope.add_detail_age === null)
                $scope.add_detail_age = "";
            // end check value

            // check exist data
            $scope.isExist = true;
            $scope.isNoData = true;
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
                    $scope.isExist = response.data.isExist;

                    // add data
                    if (!$scope.isExist) {
                        var now = new Date();
                        var reg_date = convertDate(now.toString());

                        $http({
                            method: 'POST',
                            url: 'main/model/reg/query_reg.php?event_view=add',
                            data: `ev_id=<?= $_GET["ev_id"] ?>` +
                                `&emp_id=${$scope.add_detail_emp_id}` +
                                `&card_id=${$scope.add_detail_card_id}` +
                                `&name=${$scope.add_detail_name}` +
                                `&call=${$scope.add_detail_call}` +
                                `&com_name=${$scope.add_detail_com_name}` +
                                `&dep=${$scope.add_detail_dep}` +
                                `&pos=${$scope.add_detail_pos}` +
                                `&salary=${$scope.add_detail_salary}` +
                                `&gender=${$scope.add_detail_gender}` +
                                `&age=${$scope.add_detail_age}` +
                                `&birthDate=${birthDate}` +
                                `&reg_date=${reg_date}`,
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(function(response) {
                                $scope.preview();
                                var status = response.data.status;

                                $("#modal-detail_add").modal("hide");
                                clearData();

                                if (status) {
                                    $("#modal-status_reg_success").modal("show");
                                    setTimeout(() => {
                                        $("#modal-status_reg_success").modal("hide");
                                    }, 2000)
                                }
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
                        }, 2000)
                    } //end if else isExist
                    // end add data
                },
                (response) => { // optional
                    // failed
                    console.log(response);
                });
            // end check exist data
        } // end add_member function

    }); // end controller function
</script>