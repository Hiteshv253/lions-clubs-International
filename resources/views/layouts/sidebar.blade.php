<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                  <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="NotificationModalbtn-close"></button>
                  </div>
                  <div class="modal-body">
                        <div class="mt-2 text-center">
                              <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                         colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                              <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                              </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                              <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                    It!</button>
                        </div>
                  </div>

            </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
      <!-- LOGO -->
      <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="index" class="logo logo-dark">
                  <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                  </span>
            </a>
            <!-- Light Logo-->
            <a href="index" class="logo logo-light">
                  <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
                  </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                  <i class="ri-record-circle-line"></i>
            </button>
      </div>

      <div id="scrollbar">
            <div class="container-fluid">

                  <div id="two-column-menu">
                  </div>
                  <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarDashboards">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="dashboard-analytics" class="nav-link" data-key="t-analytics">
                                                      Analytics </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="dashboard-crm" class="nav-link" data-key="t-crm"> CRM </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="dashboard-ecommerce" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="dashboard-crypto" class="nav-link" data-key="t-crypto"> Crypto
                                                </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="dashboard-projects" class="nav-link" data-key="t-projects">
                                                      Projects </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="dashboard-nft" class="nav-link" data-key="t-nft"> NFT</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="dashboard-job" class="nav-link" data-key="t-job">Job</a>
                                          </li>
                                    </ul>
                              </div>
                        </li> <!-- end Dashboard Menu -->


                        <!-- end Dashboard Menu -->



                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span>
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarUI">
                                    <i class="ri-pencil-ruler-2-line"></i> <span data-key="t-base-ui">Base UI</span>
                              </a>
                              <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                                    <div class="row">
                                          <div class="col-lg-4">
                                                <ul class="nav nav-sm flex-column">
                                                      <li class="nav-item">
                                                            <a href="ui-alerts" class="nav-link" data-key="t-alerts">Alerts</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-badges" class="nav-link" data-key="t-badges">Badges</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-buttons" class="nav-link" data-key="t-buttons">Buttons</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-colors" class="nav-link" data-key="t-colors">Colors</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-cards" class="nav-link" data-key="t-cards">Cards</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-carousel" class="nav-link" data-key="t-carousel">Carousel</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-dropdowns" class="nav-link" data-key="t-dropdowns">Dropdowns</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-grid" class="nav-link" data-key="t-grid">Grid</a>
                                                      </li>
                                                </ul>
                                          </div>
                                          <div class="col-lg-4">
                                                <ul class="nav nav-sm flex-column">
                                                      <li class="nav-item">
                                                            <a href="ui-images" class="nav-link" data-key="t-images">Images</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-tabs" class="nav-link" data-key="t-tabs">Tabs</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-accordions" class="nav-link"
                                                               data-key="t-accordion-collapse">Accordion & Collapse</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-modals" class="nav-link" data-key="t-modals">Modals</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-offcanvas" class="nav-link" data-key="t-offcanvas">Offcanvas</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-placeholders" class="nav-link"
                                                               data-key="t-placeholders">Placeholders</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-progress" class="nav-link" data-key="t-progress">Progress</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-notifications" class="nav-link"
                                                               data-key="t-notifications">Notifications</a>
                                                      </li>
                                                </ul>
                                          </div>
                                          <div class="col-lg-4">
                                                <ul class="nav nav-sm flex-column">
                                                      <li class="nav-item">
                                                            <a href="ui-media" class="nav-link" data-key="t-media-object">Media
                                                                  object</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-embed-video" class="nav-link" data-key="t-embed-video">Embed
                                                                  Video</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-typography" class="nav-link"
                                                               data-key="t-typography">Typography</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-lists" class="nav-link" data-key="t-lists">Lists</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-links" class="nav-link"><span data-key="t-links">Links</span>
                                                                  <span class="badge badge-pill bg-success" data-key="t-new">New</span></a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-general" class="nav-link" data-key="t-general">General</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-ribbons" class="nav-link" data-key="t-ribbons">Ribbons</a>
                                                      </li>
                                                      <li class="nav-item">
                                                            <a href="ui-utilities" class="nav-link" data-key="t-utilities">Utilities</a>
                                                      </li>
                                                </ul>
                                          </div>
                                    </div>
                              </div>
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarAdvanceUI">
                                    <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Advance UI</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="advance-ui-sweetalerts" class="nav-link" data-key="t-sweet-alerts">Sweet
                                                      Alerts</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-nestable" class="nav-link" data-key="t-nestable-list">Nestable
                                                      List</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-scrollbar" class="nav-link" data-key="t-scrollbar">Scrollbar</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-animation" class="nav-link" data-key="t-animation">Animation</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-tour" class="nav-link" data-key="t-tour">Tour</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-swiper" class="nav-link" data-key="t-swiper-slider">Swiper
                                                      Slider</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-ratings" class="nav-link" data-key="t-ratings">Ratings</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-highlight" class="nav-link" data-key="t-highlight">Highlight</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="advance-ui-scrollspy" class="nav-link" data-key="t-scrollSpy">ScrollSpy</a>
                                          </li>
                                    </ul>
                              </div>
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="widgets">
                                    <i class="ri-honour-line"></i> <span data-key="t-widgets">Widgets</span>
                              </a>
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarForms">
                                    <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Forms</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarForms">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="forms-elements" class="nav-link" data-key="t-basic-elements">Basic
                                                      Elements</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-select" class="nav-link" data-key="t-form-select">
                                                      Form Select </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-checkboxs-radios" class="nav-link"
                                                   data-key="t-checkboxs-radios">Checkboxs & Radios</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-pickers" class="nav-link" data-key="t-pickers">
                                                      Pickers </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-masks" class="nav-link" data-key="t-input-masks">Input
                                                      Masks</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-advanced" class="nav-link" data-key="t-advanced">Advanced</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-range-sliders" class="nav-link" data-key="t-range-slider">
                                                      Range
                                                      Slider </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-validation" class="nav-link" data-key="t-validation">Validation</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-wizard" class="nav-link" data-key="t-wizard">Wizard</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-editors" class="nav-link" data-key="t-editors">Editors</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-file-uploads" class="nav-link" data-key="t-file-uploads">File
                                                      Uploads</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-layouts" class="nav-link" data-key="t-form-layouts">Form
                                                      Layouts</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="forms-select2" class="nav-link" data-key="t-select2">Select2</a>
                                          </li>
                                    </ul>
                              </div>
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarTables">
                                    <i class="ri-layout-grid-line"></i> <span data-key="t-tables">Tables</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarTables">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="tables-basic" class="nav-link" data-key="t-basic-tables">Basic
                                                      Tables</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="tables-gridjs" class="nav-link" data-key="t-grid-js">Grid
                                                      Js</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="tables-listjs" class="nav-link" data-key="t-list-js">List
                                                      Js</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="tables-datatables" class="nav-link"
                                                   data-key="t-datatables">Datatables</a>
                                          </li>
                                    </ul>
                              </div>
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarCharts">
                                    <i class="ri-pie-chart-line"></i> <span data-key="t-charts">Charts</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarCharts">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="#sidebarApexcharts" class="nav-link" data-bs-toggle="collapse"
                                                   role="button" aria-expanded="false" aria-controls="sidebarApexcharts"
                                                   data-key="t-apexcharts">
                                                      Apexcharts
                                                </a>
                                                <div class="collapse menu-dropdown" id="sidebarApexcharts">
                                                      <ul class="nav nav-sm flex-column">
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-line" class="nav-link" data-key="t-line"> Line
                                                                  </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-area" class="nav-link" data-key="t-area"> Area
                                                                  </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-column" class="nav-link" data-key="t-column">
                                                                        Column </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-bar" class="nav-link" data-key="t-bar">
                                                                        Bar </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-mixed" class="nav-link" data-key="t-mixed"> Mixed
                                                                  </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-timeline" class="nav-link" data-key="t-timeline">
                                                                        Timeline </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-range-area" class="nav-link"><span
                                                                              data-key="t-range-area">Range Area</span> <span
                                                                              class="badge badge-pill bg-success"
                                                                              data-key="t-new">New</span></a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-funnel" class="nav-link"><span
                                                                              data-key="t-funnel">Funnel</span> <span
                                                                              class="badge badge-pill bg-success"
                                                                              data-key="t-new">New</span></a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-candlestick" class="nav-link"
                                                                     data-key="t-candlstick"> Candlstick </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-boxplot" class="nav-link" data-key="t-boxplot">
                                                                        Boxplot </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-bubble" class="nav-link" data-key="t-bubble">
                                                                        Bubble </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-scatter" class="nav-link" data-key="t-scatter">
                                                                        Scatter </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-heatmap" class="nav-link" data-key="t-heatmap">
                                                                        Heatmap </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-treemap" class="nav-link" data-key="t-treemap">
                                                                        Treemap </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-pie" class="nav-link" data-key="t-pie">
                                                                        Pie </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-radialbar" class="nav-link"
                                                                     data-key="t-radialbar"> Radialbar </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-radar" class="nav-link" data-key="t-radar"> Radar
                                                                  </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                  <a href="charts-apex-polar" class="nav-link" data-key="t-polar-area">
                                                                        Polar Area </a>
                                                            </li>
                                                      </ul>
                                                </div>
                                          </li>
                                          <li class="nav-item">
                                                <a href="charts-chartjs" class="nav-link" data-key="t-chartjs">
                                                      Chartjs </a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="charts-echarts" class="nav-link" data-key="t-echarts">
                                                      Echarts </a>
                                          </li>
                                    </ul>
                              </div>
                        </li>

                        <li class="nav-item">
                              <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                                 aria-expanded="false" aria-controls="sidebarIcons">
                                    <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Icons</span>
                              </a>
                              <div class="collapse menu-dropdown" id="sidebarIcons">
                                    <ul class="nav nav-sm flex-column">
                                          <li class="nav-item">
                                                <a href="icons-remix" class="nav-link" data-key="t-remix">Remix</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="icons-boxicons" class="nav-link" data-key="t-boxicons">Boxicons</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="icons-materialdesign" class="nav-link"
                                                   data-key="t-material-design">Material Design</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="icons-lineawesome" class="nav-link" data-key="t-line-awesome">Line
                                                      Awesome</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="icons-feather" class="nav-link" data-key="t-feather">Feather</a>
                                          </li>
                                          <li class="nav-item">
                                                <a href="icons-crypto" class="nav-link"> <span data-key="t-crypto-svg">Crypto
                                                            SVG</span></a>
                                          </li>
                                    </ul>
                              </div>
                        </li>





                  </ul>
            </div>
            <!-- Sidebar -->
      </div>

      <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
