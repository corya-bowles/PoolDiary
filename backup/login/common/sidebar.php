<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Pool Diary
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com" class="simple-text">
                    PD
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                      <img src="<?php echo $avatar_path; ?>">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?php echo $login_session; ?>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="landing.php">
                            <i class="material-icons">list</i>
                            <p>Facility List</p>
                        </a>
                     </li>
                     <li>
                        <a href="waterform.php">
                            <i class="material-icons">content_paste</i>
                            <p>Water Test</p>
                        </a>
                     </li>
                </ul>
            </div>
        </div>