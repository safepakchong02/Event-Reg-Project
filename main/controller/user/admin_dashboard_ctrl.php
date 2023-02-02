<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        // เรียกข้อมูล ผู้ใช้ในระบบ
        $http({
            method: `GET`,
            url: `api/user`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `${$scope.ac_token}`
            }
        }).then((res) => {
            $scope.data_user = res.data.results_data;
        })

        $scope.addUser = () => {
            $http({
                method: `POST`,
                url: `api/user`,
                data: `u_email=${$scope.data_user_add.u_email}` +
                    `&u_password=${$scope.data_user_add.u_password}` +
                    `&u_role=${$scope.data_user_add.u_role}` +
                    `&ud_emp_id=${$scope.data_user_add.ud_emp_id}` +
                    `&ud_card_id=${$scope.data_user_add.ud_card_id}` +
                    `&ud_prefix=${$scope.data_user_add.ud_prefix}` +
                    `&ud_firstName=${$scope.data_user_add.ud_firstName}` +
                    `&ud_lastName=${$scope.data_user_add.ud_lastName}` +
                    `&ud_gender=${$scope.data_user_add.ud_gender}` +
                    `&ud_birthDate=${$scope.data_user_add.ud_birthDate}` +
                    `&ud_phone=${$scope.data_user_add.ud_phone}` +
                    `&ud_orgName=${$scope.data_user_add.ud_orgName}` +
                    `&ud_department=${$scope.data_user_add.ud_department}` +
                    `&ud_position=${$scope.data_user_add.ud_position}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                delete $scope.data_user_add;
            })
        }

        $scope.editUserRole = async (u_userId) => {
            const {
                value: fruit
            } = await Swal.fire({
                title: 'กรุณาเลือกสิทธิ์การใช้งาน',
                input: 'select',
                inputOptions: {
                    '0': 'User',
                    '1': 'Manager',
                    '2': 'Super Manager',

                },
                inputPlaceholder: 'กรุณาเลือกสิทธิ์การใช้งาน',
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        $scope.data_user_add.u_role = value;
                        resolve()
                    })
                }
            })

            $http({
                method: `PATCH`,
                url: `api/user${u_userId}`,
                data: `u_role=${$scope.data_user_add.u_role}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Authorization': `${$scope.ac_token}`
                }
            }).then((res) => {
                delete $scope.data_user_add;
            })
        }

        $scope.logOutUser = (u_userId) => {
            swal({
                title: "คุณต้องให้ผู้ใช้ออกจากระบบหรือไม่",
                text: "การกระทำนี้จะไม่สามารถออกจากระบบทันที แต่จะทำให้ไม่สามารถใช้งานได้จนกว่าจะเข้าสู่ระบบใหม่",
                icon: "warning",
                buttons: [
                    'ยกเลิก',
                    'ยืนยัน'
                ],
                dangerMode: true,
            }).then((isConfirm) => {
                if (isConfirm) {
                    $http({
                        method: `PATCH`,
                        url: `api/user${u_userId}/logOut`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': `${$scope.ac_token}`
                        }
                    }).then((res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'ดำเนินการเสร็จสิ้น',
                        })
                    })
                }
            })

        }

        $scope.deleteUser = (u_userId) => {
            swal({
                title: "คุณต้องลบผู้ใช้นี้หรือไม่",
                text: "เมื่อลบแล้วจะไม่สามารถกู้คืนได้",
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
                        url: `api/user${u_userId}`,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'Authorization': `${$scope.ac_token}`
                        }
                    }).then((res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'ดำเนินการเสร็จสิ้น',
                        })
                    })
                }
            })
        }
    }); // end controller function
</script>