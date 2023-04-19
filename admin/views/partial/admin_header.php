<style>
    #navbarDropdown{
        text-transform: uppercase;
    }
</style>
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand ms-4" href="index">

                <span class="logo-text">

                            <img src="<?=$site_url?>/admin/admin_images/logotest.png" alt="" height="100px" class="dark-logo the_logo"  style="margin-top: -16px"/>

                        </span>
            </a>
            <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
               href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-lg-none d-md-block ">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white "
                       href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav me-auto mt-md-0 ">

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <?=type_user()?> - <?=$user_name?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                </li>
            </ul>
        </div>
    </nav>
</header>