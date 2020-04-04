  <div class="nv-sidebar" id="nv-sidebar">
        <nav id="sidebar" class="nv-sidebar-content">
            <div class="sidebar-header nv-title">
              <i class="fas fa-store"></i>
              <div class="nv-text nv-font-bc">
                NV SHOP
              </div>
            </div>

            <div class="nv-profile">
              <div class="nv-profile-content">
                <div class="nv-left">
                  <i class="fas fa-user"></i>
                </div>
                <div class="nv-right">
                  <div class="nv-upper-text nv-font-c">Welcome!</div>
                  <div class="nv-lower-text nv-font-bc">Darren Carlos</div>
                </div>
              </div>
            </div>

            <ul class="list-unstyled components nv-menu">

                <li class="active">
                    <div href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-home"></i>
                        <div class="nv-text nv-font-bc">Home/Dashboard</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li >
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('dashboard')" >
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <a class="nv-text nv-font-c">Index</a>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#inventory-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-car-side"></i>
                        <div class="nv-text nv-font-bc">Inventory</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="inventory-sub-menu">
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('parts-and-materials-inventory')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Parts and Accessories</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Cars</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#orders-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-clipboard-list"></i>
                        <div class="nv-text nv-font-bc">Orders</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="orders-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#booked-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-edit"></i>
                        <div class="nv-text nv-font-bc">Booked Services</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="booked-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#checklist-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-check"></i>
                        <div class="nv-text nv-font-bc">Vehicle Check List</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="checklist-sub-menu">
                        <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('vehicle-check-list')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#jobs-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-wrench"></i>
                        <div class="nv-text nv-font-bc">Job Order</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="jobs-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#invoicing-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-file-invoice"></i>
                        <div class="nv-text nv-font-bc">Invoicing</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="invoicing-sub-menu">
                        <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('invoicing')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#vehicle-storage-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-warehouse"></i>
                        <div class="nv-text nv-font-bc">Vehicle Storage Mgmt.</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="vehicle-storage-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#releasing-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-share-square"></i>
                        <div class="nv-text nv-font-bc">Releasing Module</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="releasing-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">New</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#warranty-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-shield-alt"></i>
                        <div class="nv-text nv-font-bc">Service Warranty</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="warranty-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#featured-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-star"></i>
                        <div class="nv-text nv-font-bc">Featured Product Mgmt.</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="featured-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#promos-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-percentage"></i>
                        <div class="nv-text nv-font-bc">Promo and Sales Product</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="promos-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#purchase-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-truck-loading"></i>
                        <div class="nv-text nv-font-bc">Purchase History</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="purchase-sub-menu">
                        <li>
                          <div class="nv-sub-menu">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
</div>
<script src="{{ asset('admin\js\sidebar.js') }}" ></script>
