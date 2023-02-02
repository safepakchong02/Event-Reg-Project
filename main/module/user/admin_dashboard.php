<!-- import ctrl -->
<?
$ctrl_path = "user";
$ctrl_name = "admin_dashboard_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<!-- เริ่ม dashboard -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>">
    
</div>
<!-- จบ dashboard -->