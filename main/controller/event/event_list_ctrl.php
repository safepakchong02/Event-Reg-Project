<script>
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        // เรียกข้อมูล กิจกรรมทั้งหมดที่เป็นสารธารณะ
        $http({
            method: `GET`,
            url: `api/event/`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `${$scope.ac_token}`
            }
        }).then((res) => {
            $scope.event_list = res.data.results_data;
        })
    }); // end controller function
</script>