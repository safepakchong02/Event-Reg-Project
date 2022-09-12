<? if (!isset($_GET["event"])) { ?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand text-white">SUTH REG</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="index.php?p=reg&m=event_dashboard" class="nav-link text-white">แดชบอร์ด</a>
                    </li>
                    <? if (isset($_GET["ev_id"])) { ?>
                        <li class="nav-item">
                            <a href="index.php?p=reg&m=reg_dashboard&ev_id=<?= $_GET["ev_id"] ?>" class="nav-link text-white">สรุปผลกิจกรรม</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=reg&m=reg_register&ev_id=<?= $_GET["ev_id"] ?>" class="nav-link text-white">ลงทะเบียน</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?p=reg&m=reg_search&ev_id=<?= $_GET["ev_id"] ?>" class="nav-link text-white">รายชื่อลงทะเบียน</a>
                        </li>
                    <? } ?>
                </ul>
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown"><?= $_SESSION["user_name"] ?></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">เปลี่ยนรหัสผ่าน</a>
                            <a href="index.php?p=login&m=login&event=logout" class="dropdown-item">ออกจากระบบ</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<? } ?>