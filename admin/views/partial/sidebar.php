<style>
    .sidebar-nav ul .sidebar-item .sidebar-link {
        border-bottom: 1px solid #8080804a;
    }
</style>
<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="index" aria-expanded="false"><i class="ti-panel"></i><span
                                class="hide-menu">Tableau de bord</span></a></li>
                <?php
                if(isset($_SESSION['email_admin'])){
                ?>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="boutiques" aria-expanded="false">
                        <i class="ti-shopping-cart"></i><span class="hide-menu">Boutiques</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="cat_boutiques" aria-expanded="false"><i class="ti-shopping-cart-full"></i><span
                                class="hide-menu">Catégories boutiques</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="cat_articles" aria-expanded="false"><i class="ti-package"></i><span
                                class="hide-menu">Catégories d´articles</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="offres" aria-expanded="false"><i class="ti-gift"></i><span
                                    class="hide-menu">Offres</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="clients" aria-expanded="false"><i class="ti-id-badge"></i><span
                                class="hide-menu">Clients</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="logs" aria-expanded="false">
                        <i class="ti-bookmark-alt"></i><span class="hide-menu">Logs</span></a>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="parametres" aria-expanded="false">
                        <i class="ti-settings"></i><span class="hide-menu">Paramètres</span></a>
                    <?php } else  {?>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="articles" aria-expanded="false"><i class="mdi me-2 mdi-table"></i><span
                                    class="hide-menu">Articles</span></a></li>

                    <?php } ?>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="commande" aria-expanded="false"><i class="mdi me-2 mdi-table"></i><span
                                class="hide-menu">Commandes</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                             href="logout" aria-expanded="false"><i class="ti-power-off"></i><span
                                class="hide-menu">Deconnexion</span></a></li>
            </ul>

        </nav>

    </div>

</aside>