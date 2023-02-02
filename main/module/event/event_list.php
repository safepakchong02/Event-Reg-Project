<!-- import ctrl -->
<?
$ctrl_path = "event";
$ctrl_name = "event_list_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<!-- เริ่ม dashboard -->
<div class="container-fluid" ng-controller="<?= $ctrl_name ?>">
    
</div>
<!-- จบ dashboard -->