<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        // เรียกข้อมูล
        $http({
            method: `GET`,
            url: `api/admin/users`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `${$scope.ac_token}`
            }
        }).then((res) => {
            console.log(res.data.resultData);
            $scope.users = res.data.resultData;
        })

        $scope.addUser = () => {
            
        }

        $scope.forceLogout = () => {

        }

        $scope.changeRole = () => {

        }

        $scope.removeUser = () => {

        }
    }); // end controller function
</script>