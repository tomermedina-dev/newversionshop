<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>


</head>

<body> -->
    <!-- <div class="wrapper"> -->
        <!-- Sidebar  -->
        <nav id="sidebar" class="e-sidebar-content">
            <div class="sidebar-header e-title">
              <i class="fas fa-store"></i>
              <div class="e-text e-font-heading-bold">
                NV SHOP
              </div>
            </div>
            <div class="e-profile">
              <div class="e-profile-content">
                <div class="e-left">
                  <i class="fas fa-user"></i>
                </div>
                <div class="e-right">
                  <div class="e-upper-text e-font-heading-light">Welcome!</div>
                  <div class="e-lower-text e-font-heading-bold">Darren Carlos</div>
                </div>
              </div>
            </div>

            <ul class="list-unstyled components e-menu">

                <li class="active">
                    <div href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-home"></i>
                        <div class="e-text e-font-heading-bold">Home/Dashboard</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                          <div class="e-sub-menu">
                            <div class="e-title">
                              <i class="fas fa-circle"></i>
                              <div class="e-text e-font-heading-light">Matrix</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="e-sub-menu">
                            <div class="e-title">
                              <i class="fas fa-circle"></i>
                              <div class="e-text e-font-heading-light">Overall Total Sales</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-clipboard-list"></i>
                        <div class="e-text e-font-heading-bold">Order Summary</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-edit"></i>
                        <div class="e-text e-font-heading-bold">Booked Services</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-car-side"></i>
                        <div class="e-text e-font-heading-bold">Vehicle Check List</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-wrench"></i>
                        <div class="e-text e-font-heading-bold">Job Order</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-file-invoice"></i>
                        <div class="e-text e-font-heading-bold">Invoicing</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-warehouse"></i>
                        <div class="e-text e-font-heading-bold">Vehicle Storage Mgmt.</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-share-square"></i>
                        <div class="e-text e-font-heading-bold">Releasing Module</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-shield-alt"></i>
                        <div class="e-text e-font-heading-bold">Service Warranty</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-star"></i>
                        <div class="e-text e-font-heading-bold">Featured Product Mgmt.</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
                <li class="active">
                    <div href="#andSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle e-main-menu">
                      <div class="e-title">
                        <i class="fas fa-percentage"></i>
                        <div class="e-text e-font-heading-bold">Promo and Sales Product</div>
                      </div>
                      <div class="e-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
              <i class="fas fa-align-justify"></i>
          </button>




        </div>
    <!-- </div> -->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->


<!-- </body>

</html> -->
