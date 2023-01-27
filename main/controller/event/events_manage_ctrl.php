<script ng-init="data_event.ev_limit=-1;data_event.ev_dtype=[];">
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        const numberOfDtype = 12;

        ClassicEditor
            .create(document.querySelector('#ev_detail'), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(error);
            });

        for (let index = 0; index < numberOfDtype; index++) {
            $scope.data_event.ev_dtype[index] = false;
        }
        $scope.data_event.ev_dtype[0] = true;
        $scope.data_event.ev_dtype[2] = true;
        $scope.data_event.ev_dtype[3] = true;

        // start show event
        let params = (new URL(document.location)).searchParams.get("ev_id");
        params = params === null ? "-1" : params;
        $scope.isCreate = params === null ? true : false;

        if (params !== "-1") {
            $http.get(`main/model/event/query_event.php?event_view=show_data&ev_id=${params}`)
                .then((res) => { // start then
                    $scope.event_data = res.data.results_data; // "results_data" is key in json format
                    editor.setData(decodeHTML($scope.data_event.ev_detail));
                    $scope.data_event.ev_limit = parseInt($scope.data_event.ev_limit);
                    $scope.data_event.ev_dtype = LSBToBoolArray($scope.data_event.ev_dtype);
                    $scope.data_event.ev_preRegStart = createDate($scope.data_event.ev_preRegStart);
                    $scope.data_event.ev_preRegEnd = createDate($scope.data_event.ev_preRegEnd);
                    $scope.data_event.ev_checkInStart = createDate($scope.data_event.ev_checkInStart);
                    $scope.data_event.ev_checkInEnd = createDate($scope.data_event.ev_checkInEnd);
                    $scope.data_event.ev_eventStart = createDate($scope.data_event.ev_eventStart);
                    $scope.data_event.ev_eventEnd = createDate($scope.data_event.ev_eventEnd);
                }) // end then
        }

        /* ==================SAVE================== */

        $scope.save_event = (method, path_api) => { // start save_event function
            // console.log($scope.data_event);
            // console.log(encodeHTML(editor.getData()));
            $http({
                method: `${method}`,
                url: `main/model/event/query_event.php?event_view=${path_api}`,
                data: `u_userId=${"1234"}` + // string
                    `ev_eventId=${$scope.data_event.ev_eventId}` + // string
                    `ev_title=${$scope.data_event.ev_title}` + // string
                    `ev_detail=${encodeHTML(editor.getData())}` + // string
                    `ev_limit=${$scope.data_event.ev_limit}` + // number
                    `ev_dtype=${parseInt(boolArrayToLSB($scope.data_event.ev_dtype), 2)}` + // number
                    `ev_selfReg=${$scope.data_event.ev_selfReg}` + // bool
                    `ev_preReg=${$scope.data_event.ev_preReg}` + // bool
                    `ev_public=${$scope.data_event.ev_public}` + // bool
                    `ev_Gps=${""}` + // bool
                    `ev_lat=${""}` + // long
                    `ev_long=${""}` + // long
                    `ev_preRegStart=${convertDate($scope.data_event.ev_preRegStart)}` + // datetime string
                    `ev_preRegEnd=${convertDate($scope.data_event.ev_preRegEnd)}` + // datetime string
                    `ev_checkInStart=${convertDate($scope.data_event.ev_checkInStart)}` + // datetime string
                    `ev_checkInEnd=${convertDate($scope.data_event.ev_checkInEnd)}` + // datetime string
                    `ev_eventStart=${convertDate($scope.data_event.ev_eventStart)}` + // datetime string
                    `&ev_eventEnd=${convertDate($scope.data_event.ev_eventEnd)}`, // datetime string
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'บัมทึกข้อมูลเสร็จสิ้น',
                    })
                },
                function(res) { // optional
                    // failed
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สามารถบันทึกข้อมูลได้',
                        text: res.error
                    })
                });

        }; // end save_event function
        /* ==================END SAVE================== */

        /* ==================DELETE================== */
        $scope.delete_event = (ev_eventId) => { // start delete_event function
            swal({
                title: "คุณต้องการลบกิจกรรมนี้หรือไม่",
                text: "ข้อมูลทั้งหมด และรายชื่อลงทะเบียนจะหายไป",
                icon: "warning",
                buttons: [
                    'ยกเลิก',
                    'ยืนยัน'
                ],
                dangerMode: true,
            }).then((isConfirm) => {
                if (isConfirm) {
                    $http.delete(`main/model/event/query_event.php?event_view=deleteEvent&ev_id=${ev_eventId}`)
                        .then((res) => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ลบข้อมูลเสร็จสิ้น',
                                })
                            },
                            function(res) { // optional
                                // failed
                                Swal.fire({
                                    icon: 'error',
                                    title: 'ไม่สามารถลบข้อมูลได้',
                                    text: res.error
                                })
                            });
                }
            })
        } // end delete_event
        /* ==================END DELETE================== */

    }); // end controller function
</script>