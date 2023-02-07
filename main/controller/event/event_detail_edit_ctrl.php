<script ng-init="data_event.ev_limit=-1;data_event.ev_dtype=[];">
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
                let data_event = res.data.resultData[0];
                $scope.data_event.ev_eventId = data_event.ev_eventId; // string
                $scope.data_event.ev_title = data_event.ev_title; // string
                editor.setData(decodeHTML(data_event.ev_detail)); // html
                $scope.data_event.ev_limit = parseInt(data_event.ev_limit);
                $scope.data_event.ev_dtype = LSBToBoolArray(data_event.ev_dtype); // boolean array
                $scope.data_event.ev_public = Boolean(data_event.ev_public); // boolean
                $scope.data_event.ev_preReg = Boolean(data_event.ev_preReg); // boolean
                $scope.data_event.ev_selfReg = Boolean(data_event.ev_selfReg); // boolean
                $scope.data_event.ev_preRegStart = createDate(data_event.ev_preRegStart); // JS datetime-local
                $scope.data_event.ev_preRegEnd = createDate(data_event.ev_preRegEnd); // JS datetime-local
                $scope.data_event.ev_checkInStart = createDate(data_event.ev_checkInStart); // JS datetime-local
                $scope.data_event.ev_checkInEnd = createDate(data_event.ev_checkInEnd); // JS datetime-local
                $scope.data_event.ev_eventStart = createDate(data_event.ev_eventStart); // JS datetime-local
                $scope.data_event.ev_eventEnd = createDate(data_event.ev_eventEnd); // JS datetime-local
            }) // end then
        } // end if isCreate

        /* ==================SAVE================== */

        $scope.save_event = (method, path_api) => { // start save_event function
            let url = $scope.isCreate ? `api/event/` : `api/event/${$scope.data_event.ev_eventId}`;
            $http({
                method: `${method}`,
                url: `${url}`,
                data: `u_userId=${$scope.u_userId}` + // string
                    `&ev_title=${$scope.data_event.ev_title}` + // string
                    `&ev_detail=${encodeHTML(editor.getData())}` + // string
                    `&ev_limit=${$scope.data_event.ev_limit}` + // int
                    `&ev_dtype=${parseInt(boolArrayToLSB($scope.data_event.ev_dtype), 2)}` + // int
                    `&ev_selfReg=${Number($scope.data_event.ev_selfReg)}` + // int
                    `&ev_preReg=${Number($scope.data_event.ev_preReg)}` + // int
                    `&ev_public=${Number($scope.data_event.ev_public)}` + // int
                    `&ev_Gps=${""}` + // boolean
                    `&ev_lat=${""}` + // long
                    `&ev_long=${""}` + // long
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
                    console.log(res.data);
                    if (res.code !== 201) Swal.fire({
                        icon: 'error',
                        title: 'บันทึกข้อมูลไม่สำเร็จ',
                        text: res.code
                    });
                    else Swal.fire({
                        icon: 'success',
                        title: 'บัมทึกข้อมูลเสร็จสิ้น',
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
                    $http({
                        method: `DELETE`,
                        url: `api/event/deleteEvent/${ev_eventId}`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': `${$scope.ac_token}`
                        }
                    }).then((res) => {
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบข้อมูลเสร็จสิ้น',
                            })
                        }, // end then
                        (res) => { // optional
                            // failed
                            Swal.fire({
                                icon: 'error',
                                title: 'ไม่สามารถลบข้อมูลได้',
                                text: res.error
                            })
                        }); // end error
                } // end if
            }) // end then is isConfirm
        } // end delete_event
        /* ==================END DELETE================== */

    }); // end controller function
</script>

<script>

</script>