<script ng-init="data_event.ev_limit=-1;data_event.ev_dtype=[];">
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        let qrcode = new QRCode(document.getElementById("qrcode"), {
            text: location.href,
            width: 240,
            height: 240,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // ดึงข้อมูลเพื่อแก้ไข
        let ev_eventId = (new URL(document.location)).searchParams.get("ev_eventId");
        $scope.isCreate = ev_eventId === null ? true : false;
        let preRegStart;
        let preRegEnd;
        let checkInStart;
        let checkInEnd;

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
                console.log(res);
                $scope.event_data = res.data.resultData[0];
                $scope.event_data.ev_eventId = event_data.ev_eventId; // string
                $scope.event_data.ev_title = event_data.ev_title; // string
                $scope.event_data.ev_detail = decodeHTML($scope.event_data.ev_detail); // html

                $scope.isPreReg = Boolean($scope.event_data.ev_preReg);
                $scope.isSelfCheckIn = Boolean($scope.event_data.ev_selfReg);

                preRegStart = createDate($scope.data_event.ev_preRegStart);
                preRegEnd = createDate($scope.data_event.ev_preRegEnd);
                checkInStart = createDate($scope.data_event.ev_checkInStart);
                checkInEnd = createDate($scope.data_event.ev_checkInStart);
            }) // end then
        } // end if isCreate

        $scope.preReg = () => {
            let now = new Date();

            if (now >= preRegStart && now <= preRegEnd) {
                $http({
                    method: `GET`,
                    url: `api/event/${$scope.event_data.ev_eventId}/preRegister`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': `${$scope.ac_token}`
                    }
                }).then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'ลงทะเบียนล่วงหน้าเรียบร้อย',
                    })
                })
            }
        }

        $scope.checkIn = () => {
            let now = new Date();

            if (now >= checkInStart && now <= checkInEnd) {
                $http({
                    method: `GET`,
                    url: `api/event/${$scope.event_data.ev_eventId}/checkIn`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': `${$scope.ac_token}`
                    }
                }).then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'ลงชื่อเข้างานเรียบร้อย',
                    })
                })
            }
        }

        $scope.checkInByMod = (u_userId) => {
            let now = new Date();

            if (now >= checkInStart && now <= checkInEnd) {
                $http({
                    method: `GET`,
                    url: `api/event/${$scope.event_data.ev_eventId}/checkIn/${u_userId}`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': `${$scope.ac_token}`
                    }
                }).then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'ลงชื่อเข้างานเรียบร้อย',
                    })
                })
            }
        }


    }); // end controller function
</script>