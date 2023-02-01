<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        // เรียกข้อมูล กิจกรรมของฉัน
        $http({
            method: `GET`,
            url: `api/event/MyEvent`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `token`
            }
        }).then((res) => {
            $scope.myEvent = res.data.results_data;
        })

        // เรียกข้อมูล กิจกรรมที่ฉันดูแล/สร้าง
        $http({
            method: `GET`,
            url: `api/event/ModEvent`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `token`
            }
        }).then((res) => {
            $scope.ModEvent = res.data.results_data;
        })
    }); // end controller function
</script>