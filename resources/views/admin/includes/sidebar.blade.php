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
                  <div class="nv-lower-text nv-font-bc">Admin</div>
                </div>
              </div>
            </div>

            <ul class="list-unstyled components nv-menu">
              @if( session('role') == 'admin' )
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
                          <div class="nv-sub-menu"  onclick="window.location.href ='/admin/dashboard/home';" >
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <a class="nv-text nv-font-c">Home</a>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <div href="#inventory-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-car-side"></i>
                        <div class="nv-text nv-font-bc">Inventory and Services</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="inventory-sub-menu">
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('inventory.index')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Parts and Accessories</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('car.index')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Cars</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('services.index')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Services</div>
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
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('orders.index')">
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
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('bookings.index')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">New</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('bookings.rejected')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Rejected</div>
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
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('checklist.index')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">New</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('checklist.list')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">History</div>
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
                        <div class="nv-sub-menu"  v-on:click="loadAdminPage('job.monitoring')">
                          <div class="nv-title">
                            <i class="fas fa-circle"></i>
                            <div class="nv-text nv-font-c">Monitoring</div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="nv-sub-menu"  v-on:click="loadAdminPage('job.completed')">
                          <div class="nv-title">
                            <i class="fas fa-circle"></i>
                            <div class="nv-text nv-font-c">Completed & For Invoicing</div>
                          </div>
                        </div>
                      </li>
                        <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('job.index')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Create</div>
                            </div>
                          </div>
                        </li>
                        <!-- <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('job.list')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                        <li> -->
                        <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('job.unassigned')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Unassigned / New</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('job.history')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">History</div>
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
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('invoice.history')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">History</div>
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
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('releasing.list')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Available for Release</div>
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
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('warranty.list')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Active List</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('warranty.history')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">History</div>
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
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('vehicle.index')">
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
                        <div class="nv-text nv-font-bc">Featured </div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="featured-sub-menu">
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('featured.list')">
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
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('promo.index')">
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
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('purchasing.new')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">New</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                    <ul class="collapse list-unstyled" id="purchase-sub-menu">
                        <li>
                          <div class="nv-sub-menu"  v-on:click="loadAdminPage('promo.index')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">List</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                <li class="active" v-on:click="loadAdminPage('configuration.index')">
                    <div data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="fas fa-cogs"></i>
                        <div class="nv-text nv-font-bc">Configuration</div>
                      </div>

                    </div>
                </li>
                @endif
                @if( session('role') != 'admin' )
                <li class="active">
                    <div href="#employee-portal-sub-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nv-main-menu">
                      <div class="nv-title">
                        <i class="far fa-address-card"></i>
                        <div class="nv-text nv-font-bc">Employee Portal</div>
                      </div>
                      <div class="nv-caret">
                        <i class="fas fa-angle-down"></i>
                      </div>
                    </div>
                    <ul class="collapse list-unstyled" id="employee-portal-sub-menu">
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('employee.assigned')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Current Assigned Jobs</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="nv-sub-menu" v-on:click="loadAdminPage('employee.history')">
                            <div class="nv-title">
                              <i class="fas fa-circle"></i>
                              <div class="nv-text nv-font-c">Jobs History</div>
                            </div>
                          </div>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
</div>
<script src="{{ asset('admin\js\sidebar.js') }}" ></script>
