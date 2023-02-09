<script ng-init="hasEdit=false">
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        let ev_eventId = (new URL(document.location)).searchParams.get("register");
        $scope.isRegister = ev_eventId === null ? true : false;

        $scope.edit = () => {
            $scope.hasEdit = true;

            document.querySelectorAll("input").forEach((element) => {
                element.disabled = false;
            })
            document.querySelectorAll("select").forEach((element) => {
                element.disabled = false;
            })
        }

        if ($scope.isRegister) {
            // เรียกข้อมูล ข้อมูลผู้ใช้
            $http({
                method: `GET`,
                url: `api/user/profile`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                $scope.profile_data = res.data.resultData;
                $scope.profile_data.ud_birthDate = createDate($scope.profile_data.ud_birthDate);
                $scope.profile_data.u_password = null;
                console.log($scope.profile_data);
            })
        } else $scope.edit();

        $scope.editProfile = (url, method, u_userId) => {
            $http({
                method: `${method}`,
                url: `api/${url}`,
                data: `u_userId=${u_userId}` + // string        
                    `&u_email=${$scope.profile_data.u_email}` + // string
                    `&u_password=${$scope.profile_data.u_password}` + // string
                    `&ud_emp_id=${$scope.profile_data.ud_emp_id}` + // string
                    `&ud_card_id=${$scope.profile_data.ud_card_id}` + // string
                    `&ud_prefix=${$scope.profile_data.ud_prefix}` + // string
                    `&ud_firstName=${$scope.profile_data.ud_firstName}` + // string
                    `&ud_lastName=${$scope.profile_data.ud_lastName}` + // string
                    `&ud_gender=${$scope.profile_data.ud_gender}` + // string
                    `&ud_birthDate=${convertDate($scope.profile_data.ud_birthDate)}` + // string
                    `&ud_phone=${$scope.profile_data.ud_phone}` + // string
                    `&ud_orgName=${$scope.profile_data.ud_orgName}` + // string
                    `&ud_department=${$scope.profile_data.ud_department}` + // string
                    `&ud_position=${$scope.profile_data.ud_position}`, // string
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
                        text: res.message
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
        }

        $scope.deactivate = () => {
            Swal.fire({
                title: 'คุณต้องการลบผู้ใช้นี้หรือไม่?',
                text: "ข้อมูลทั้งหมดจะหายไป",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $http({
                        method: `POST`,
                        url: `api/user/deactivate`,
                        data: `u_userId=${$scope.u_userId}`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': `${$scope.ac_token}`
                        }
                    }).then((res) => {
                            console.log(res);
                            if (res.data.code !== 201 && res.data.code !== 200) Swal.fire({
                                icon: 'error',
                                title: 'error',
                            })
                            else Swal.fire({
                                icon: 'success',
                                title: 'ลบผู้ใช้เสร็จสิ้น',
                            })
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
        }

    }); // end controller function
</script>