        <!-- admin left aside bar here -->

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu ">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link mt-1" href="index.php">
                            <div class="sb-nav-link-icon"> <i class="fa fa-comments" aria-hidden="true"></i></div>
                            Comments
                        </a>
                        <a class="nav-link mt-1" href="inbox.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-inbox" aria-hidden="true"></i></i></div>
                            Inbox
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            Recipes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="recipeList.php">All recipes</a>
                                <a class="nav-link" href="recipeAdd.php"> Add new recipes</a>
                            </nav>
                        </div>
                        <a class="nav-link mt-1" href="recipe_category_list.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-inbox" aria-hidden="true"></i></i></div>
                            Recipe Categories
                        </a>
                      
                       
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= $admin ?>
                </div>
            </nav>
        </div>