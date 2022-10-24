<style>
    /* li.nav-item:hover a {
        border-style: solid;
        border-width: 1px;
        padding: 5px 5px 5px 5px;
    } */

    nav div div ul li a,
    nav div div ul li a:after,
    nav div div ul li a:before {
        transition: all .25s;
    }

    nav.shift div div ul li a {
        position: relative;
        z-index: 1;
    }

    nav.shift ul li a:hover {
        color: #91640F;
    }

    nav.shift ul li a:after {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        width: 100%;
        height: 1px;
        content: '.';
        color: transparent;
        background: #F1C40F;
        /*change background color */
        visibility: none;
        opacity: 0;
        z-index: -1;
        border-radius: 20px;
    }

    nav.shift ul li a:hover:after {
        opacity: 1;
        visibility: visible;
        height: 100%;
    }
</style>

<? if (!isset($_GET["event"])) { ?>
    <nav class="navbar navbar-expand-sm navbar-light shift" style="background-color: #ee5b23;">
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