<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        $scope.checkString = (str) => {
            if (str === null || str === "" || typeof(str) === undefined) return "-";
            else return str;
        }

        let qrcode = new QRCode(document.getElementById("qrcode"), {
            text: location.href,
            width: 240,
            height: 240,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        let ev_eventId = (new URL(document.location)).searchParams.get("ev_eventId");
        $scope.isCreate = ev_eventId === null ? true : false;

        let now = new Date();
        let preRegStart;
        let preRegEnd;
        let checkInStart;
        let checkInEnd;

        if (!$scope.isCreate) {
            $http({
                method: `GET`,
                url: `api/event/${ev_eventId}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                $scope.event_data = setEventStatus(res.data.resultData)[0];

                document.getElementById("ev_detail").innerHTML = decodeHTML($scope.event_data.ev_detail); // html
                $scope.event_data.ev_limit = $scope.event_data.ev_limit === -1 ? "ไม่จำกัด" : $scope.event_data.ev_limit;
                $scope.event_data.ev_dType = LSBToBoolArray($scope.event_data.ev_dType);

                $scope.isPreReg = intToBool($scope.event_data.ev_preReg);
                $scope.isSelfCheckIn = intToBool($scope.event_data.ev_selfReg);

                if ($scope.isPreReg) {
                    preRegStart = createDate($scope.event_data.ev_preRegStart);
                    preRegEnd = createDate($scope.event_data.ev_preRegEnd);

                    if (now >= preRegStart && now <= preRegEnd) $scope.isTimePreReg = true;
                    else $scope.isTimePreReg = false;
                }
                if ($scope.isSelfCheckIn) {
                    checkInStart = createDate($scope.event_data.ev_checkInStart);
                    checkInEnd = createDate($scope.event_data.ev_checkInEnd);

                    if (now >= checkInStart && now <= checkInEnd) $scope.isTimeCheckIn = true;
                    else $scope.isTimeCheckIn = false;
                }
            }) // end then

            // start section report
            $http({
                method: `GET`,
                url: `api/event/${ev_eventId}/report`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                $scope.eventReport = res.data.resultData[0];

                let cp_join = document.querySelector(".circular-progress-join"),
                    cp_no_join = document.querySelector(".circular-progress-no_join"),
                    cp_all = document.querySelector(".circular-progress-all");

                let cp_join_value = (parseInt($scope.eventReport.checkedIn) / parseInt($scope.eventReport.signedUp)) * 100,
                    cp_no_join_vale = (parseInt($scope.eventReport.notCheckedIn) / parseInt($scope.eventReport.signedUp)) * 100,
                    cp_all_value = (parseInt($scope.eventReport.signedUp) / parseInt($scope.eventReport.signedUp)) * 100;

                cp_join.style.background = `conic-gradient(#28B463 ${cp_join_value * 3.6}deg, #ededed 0deg)`;
                cp_no_join.style.background = `conic-gradient(#CB4335 ${cp_no_join_vale * 3.6}deg, #ededed 0deg)`;
                cp_all.style.background = `conic-gradient(#3498DB ${cp_all_value * 3.6}deg, #ededed 0deg)`;
                // console.log(res.data.resultData);
            }) // end then
            // end section report

            // start section manager report
            $http({
                method: `GET`,
                url: `api/event/${ev_eventId}/member`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                $scope.eventMembers = res.data.resultData;
                // console.log(res.data.resultData);
            }) // end then

            const ctx = document.getElementById('chart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            // end section manager report
        } // end if isCreate

        $scope.preReg = () => {

            if (now >= preRegStart && now <= preRegEnd) {
                $http({
                    method: `PATCH`,
                    url: `api/event/${$scope.event_data.ev_eventId}/preRegister`,
                    data: `u_userId=${$scope.u_userId}`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': `${$scope.ac_token}`
                    }
                }).then((res) => {
                    console.log(res.data);
                    Swal.fire({
                        icon: 'success',
                        title: 'ลงทะเบียนล่วงหน้าเรียบร้อย',
                    })
                })
            }
        }

        $scope.checkIn = () => {

            if (now >= checkInStart && now <= checkInEnd) {
                $http({
                    method: `PATCH`,
                    url: `api/event/${$scope.event_data.ev_eventId}/checkIn`,
                    data: `u_userId=${$scope.u_userId}`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': `${$scope.ac_token}`
                    }
                }).then((res) => {
                    console.log(res.data);
                    Swal.fire({
                        icon: 'success',
                        title: 'ลงชื่อเข้างานเรียบร้อย',
                    })
                })
            }
        }

        $scope.checkInByMod = (u_userId) => {
            console.log("checkin");

            if (now >= checkInStart && now <= checkInEnd) {
                $http({
                    method: `PATCH`,
                    url: `api/event/${$scope.event_data.ev_eventId}/checkIn`,
                    data: `u_userId=${u_userId}`,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Authorization': `${$scope.ac_token}`
                    }
                }).then((res) => {
                    console.log(res.data);
                    Swal.fire({
                        icon: 'success',
                        title: 'ลงชื่อเข้างานเรียบร้อย',
                    })
                })
            } else console.log("error");
        }


    }); // end controller function
</script>