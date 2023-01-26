<script ng-init="data_event.ev_limit=-1;data_event.ev_dtype=[];">
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        let method = 'POST';
        const numberOfDtype = 12;

        for (let index = 0; index < numberOfDtype; index++) {
            $scope.data_event.ev_dtype[index] = true;
        }

        // console.log($scope.data_event.ev_dtype);

        // start show event
        let params = (new URL(document.location)).searchParams.get("ev_id");
        params = params === null ? "-1" : params;

        $http.get(`main/model/event/query_event.php?event_view=show_data&ev_id=${params}`)
            .then((res) => { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }) // end then

        /* ==================SAVE================== */
        $scope.create_event = () => { // start save_event function
            $http({
                method: `POST`,
                url: 'main/model/event/query_event.php?event_view=create',
                data: `ev_title=${$scope.data_event.ev_title}` + // string
                    `ev_detail=${$scope.data_event.ev_detail}` + // string
                    `ev_limit=${$scope.data_event.ev_limit}` + // number
                    `ev_dtype=${parseInt(boolArrayToLSB($scope.data_event.ev_dtype), 2)}` + // number
                    `ev_selfReg=${$scope.data_event.ev_selfReg}` + // bool
                    `ev_preReg=${$scope.data_event.ev_preReg}` + // bool
                    `ev_public=${$scope.data_event.ev_public}` + // bool
                    `ev_Gps=${$scope.data_event.ev_Gps}` + // bool
                    `ev_latitude=${$scope.data_event.ev_latitude}` + // long
                    `ev_longitude=${$scope.data_event.ev_longitude}` + // long
                    `ev_preRegStart=${convertDate($scope.data_event.ev_preRegStart)}` + // datetime string
                    `ev_preRegEnd=${convertDate($scope.data_event.ev_preRegEnd)}` + // datetime string
                    `ev_checkInStart=${convertDate($scope.data_event.ev_checkInStart)}` + // datetime string
                    `ev_checkInEnd=${convertDate($scope.data_event.ev_checkInEnd)}` + // datetime string
                    `ev_eventStart=${convertDate($scope.data_event.ev_eventStart)}` + // datetime string
                    `&ev_eventEnd=${convertDate($scope.data_event.ev_detail)}`, // datetime string
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((res) => {
                    // console.log(response.data);
                    $("#modal-add").modal("hide");
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        location.reload();
                    }, 1500)
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });

        }; // end save_event function
        /* ==================END SAVE================== */

        /* ==================DELETE================== */
        $scope.delete_event = (ev_id) => { // start delete_event function
            if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                $http.delete(`main/model/event/query_event.php?event_view=del_event&ev_id=${ev_id}`)
                    .then((res) => { // start then
                        $("#modal-status_success").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 1500)
                    }) // end then
            }
        } // end delete_event
        /* ==================END DELETE================== */

    }); // end controller function
</script>