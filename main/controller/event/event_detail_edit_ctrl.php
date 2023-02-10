<script ng-init="data_event.ev_limit=-1;data_event.ev_dType=[];">
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
            $scope.data_event.ev_dType[index] = false;
        }
        $scope.data_event.ev_dType[0] = true;
        $scope.data_event.ev_dType[2] = true;
        $scope.data_event.ev_dType[3] = true;

        // ดึงข้อมูลเพื่อแก้ไข
        let ev_eventId = (new URL(document.location)).searchParams.get("ev_eventId");
        $scope.isCreate = ev_eventId === null ? true : false;
        // console.log($scope.isCreate);
        // console.log(ev_eventId);

        if (!$scope.isCreate) {
            $http({
                method: `GET`,
                url: `api/event/${ev_eventId}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                // console.log(res.data.resultData[0]);
                let data_event = res.data.resultData[0];
                $scope.data_event.ev_eventId = data_event.ev_eventId; // string
                $scope.data_event.ev_title = data_event.ev_title; // string
                editor.setData(decodeHTML(data_event.ev_detail)); // html
                $scope.data_event.ev_limit = parseInt(data_event.ev_limit);
                $scope.data_event.ev_dType = LSBToBoolArray(data_event.ev_dType); // boolean array
                $scope.data_event.ev_public = intToBool(data_event.ev_public); // boolean
                $scope.data_event.ev_preReg = intToBool(data_event.ev_preReg); // boolean
                $scope.data_event.ev_selfReg = intToBool(data_event.ev_selfReg); // boolean
                $scope.data_event.ev_preRegStart = createDate(data_event.ev_preRegStart); // JS datetime-local
                $scope.data_event.ev_preRegEnd = createDate(data_event.ev_preRegEnd); // JS datetime-local
                $scope.data_event.ev_checkInStart = createDate(data_event.ev_checkInStart); // JS datetime-local
                $scope.data_event.ev_checkInEnd = createDate(data_event.ev_checkInEnd); // JS datetime-local
                $scope.data_event.ev_eventStart = createDate(data_event.ev_eventStart); // JS datetime-local
                $scope.data_event.ev_eventEnd = createDate(data_event.ev_eventEnd); // JS datetime-local

                console.log(data_event);
                console.log($scope.data_event);
            }) // end then
        } // end if isCreate

        /* ==================SAVE================== */

        $scope.save_event = (method, path_api) => { // start save_event function
            let url = $scope.isCreate ? `api/event/` : `api/event/${$scope.data_event.ev_eventId}`;

            // console.log(boolArrayToLSB($scope.data_event.ev_dType));
            // console.log(parseInt(boolArrayToLSB($scope.data_event.ev_dType), 2));
            // console.log($scope.data_event.ev_dType);

            $http({
                method: `${method}`,
                url: `${url}`,
                data: `u_userId=${$scope.u_userId}` + // string        
                    `&ev_title=${$scope.data_event.ev_title}` + // string
                    `&ev_detail=${encodeHTML(editor.getData())}` + // string
                    `&ev_limit=${$scope.data_event.ev_limit}` + // int
                    `&ev_dType=${parseInt(boolArrayToLSB($scope.data_event.ev_dType), 2)}` + // int
                    `&ev_selfReg=${boolToInt($scope.data_event.ev_selfReg)}` + // int
                    `&ev_preReg=${boolToInt($scope.data_event.ev_preReg)}` + // int
                    `&ev_public=${boolToInt($scope.data_event.ev_public)}` + // int
                    `&ev_gps=${boolToInt(false)}` + // int
                    `&ev_lat=${0.00}` + // long
                    `&ev_long=${0.00}` + // long
                    `&ev_preRegStart=${convertDate($scope.data_event.ev_preRegStart)}` + // string datetime-local
                    `&ev_preRegEnd=${convertDate($scope.data_event.ev_preRegEnd)}` + // string datetime-local
                    `&ev_checkInStart=${convertDate($scope.data_event.ev_checkInStart)}` + // string datetime-local
                    `&ev_checkInEnd=${convertDate($scope.data_event.ev_checkInEnd)}` + // string datetime-local
                    `&ev_eventStart=${convertDate($scope.data_event.ev_eventStart)}` + // string datetime-local
                    `&ev_eventEnd=${convertDate($scope.data_event.ev_eventEnd)}`, // string datetime-local
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                    console.log(res);
                    // console.log(res.config.data);
                    if (res.data.code !== 201 && res.data.code !== 200) Swal.fire({
                        icon: 'error',
                        title: 'บันทึกข้อมูลไม่สำเร็จ',
                        text: res.code
                    });
                    else Swal.fire({
                        icon: 'success',
                        title: 'บัมทึกข้อมูลเสร็จสิ้น',
                    }).then((res) => {
                        location.replace("index.php");
                    });
                }, // end is success
                (res) => { // optional
                    console.log(res);
                    // failed
                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สามารถบันทึกข้อมูลได้',
                    }) // end is error
                }); // end then

        }; // end save_event function
        /* ==================END SAVE================== */

        /* ==================DELETE================== */
        $scope.delete_event = (ev_eventId) => { // start delete_event function

            Swal.fire({
                title: 'คุณต้องการลบกิจกรรมนี้หรือไม่?',
                text: "ข้อมูลทั้งหมด และรายชื่อลงทะเบียนจะหายไป",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $http({
                        method: `DELETE`,
                        url: `api/event/${ev_eventId}`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': `${$scope.ac_token}`
                        }
                    }).then((res) => {
                            // console.log(res);
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบข้อมูลเสร็จสิ้น',
                            }).then((res) => {
                                location.replace("index.php");
                            });
                        }, // end then
                        (res) => { // optional
                            // failed
                            console.log(res);
                            Swal.fire({
                                icon: 'error',
                                title: 'ไม่สามารถลบข้อมูลได้',
                                text: res.error
                            })
                        }); // end error
                } // end if result.isConfirmed
            }) // end then Swal result
        } // end delete_event
        /* ==================END DELETE================== */

    }); // end controller function
</script>

<script>

</script>