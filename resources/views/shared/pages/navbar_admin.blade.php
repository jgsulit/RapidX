<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <!-- <div class="main-menu-header">
                <input type="text" placeholder="Search" class="menu-search form-control round"/>
            </div> -->
    <!-- / main menu header-->

    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class="active nav-item"><a href="{{ route('dashboard') }}"><i class="icon-dashboard"></i><span
                            data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Dashboard</span></a>
                </li>
            </ul>
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class=" nav-item"><a href="users"><i class="icon-users"></i><span
                            data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Users</span></a>
                </li>
            </ul>

            <li id="quadsnav" style="display: none;" class="nav-item"><a href="#"><i class="icon-paper"></i><span data-i18n="nav.dash.main"
                        class="menu-title">QUADS</span>
                    <!-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span> --></a>
                <ul class="menu-content">
                    <div id="ardsnav" style="display: none;">
                        <li><a href="../ARD" data-i18n="nav.dash.main" class="menu-item">Audit Result</a>
                        </li>
                    </div>
                    <div id="qcpatrolnav" style="display: none;">
                        <li><a href="../qc_patrol" data-i18n="nav.dash.main" class="menu-item">QC Patrol</a>
                        </li>
                    </div>
                </ul>
            </li>

            <div id="aidrcnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../aidrc"><i class="icon-paper"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">AIDRC</span></a>
                    </li>
                </ul>

            </div>

            <div id="ilqcmnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../ilqcm"><i class="icon-paper"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">ILQCM</span></a>
                    </li>
                </ul>

            </div>

            <div id="dstlmsnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../dstlms"><i class="icon-tasks"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">DSTLMS</span></a>
                    </li>
                </ul>

            </div>

            <div id="jorv2nav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../JO_Requestv2"><i class="icon-wrench"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">JO Request
                                V2</span></a>
                    </li>
                </ul>
            </div>

            {{-- <div id="jorv2navCopy" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../JO_Requestv2Copy"><i class="icon-wrench"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">JO Request
                                V2 TEST</span></a>
                    </li>
                </ul>
            </div> --}}

            <div id="chasnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                    <li class=" nav-item"><a href="../RapidX_chas/chas"><i class="icon-paper"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">CHAS</span></a>
                    </li>
                </ul>
            </div>

            <div id="statboardnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../StatusBoard"><i class="icon-television"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Status Board
                                System</span></a>
                    </li>
                </ul>
            </div>

            <div id="pmcsfesnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../pmcsfes"><i class="icon-paper"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">PMCSFES</span></a>
                    </li>
                </ul>
            </div>

            <div id="bbtfsnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../bbtfs"><i class="icon-ship"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">BBTFS</span></a>
                    </li>
                </ul>
            </div>

            <div id="customerClaimDatabaseSystem" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../customer_claim_database_system"><i class="icon-paper"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Customer Claim
                                System</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="CashAdvanceId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../cash_advance"><i class="icon-usd"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Online Cash
                                Advance</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="workPermitId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../ohswp/dashboard"><i class="icon-briefcase"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">OHS Work
                                Permit</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="grindingInventoryId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../grinding_inventory/"><i class="icon-book"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Grinding
                                Inventory</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- <div id="generalKnowledgeExaminationId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../GKOTES/"><i class="icon-folder-open"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">General Knowledge <br> Examination</span>
                        </a>
                    </li>
                </ul>
            </div> --}}

            <div id="key4MonitoringId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../okfms/"><i class="icon-bar-chart"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Key 4
                                Monitoring</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="key15MonitoringId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../ctms/"><i class="icon-bar-chart"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Key 15 -
                                CTMS</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="JsoxId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        {{-- <a href="../Jsox/"><i class="icon-bar-chart"></i> --}}
                            <a href="../Jsox/"><img src="{{ asset('public/images/Search1.png') }}" width="21" height="24">
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">&nbsp;&nbsp;JSOX Databse</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="PreshipmentId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../OnlinePreShipment/"><i class="icon-paper"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Online Pre-Shipment</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="SDCRSId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../sdcr_status/"><i class="icon-paper"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">SDCRS System</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="FAC_ETLSId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../FAC_ETLS/"><i class="icon-paper"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">FAC - ETLS</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="DMRPQCId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-wrench" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../DMRPQC/"><i class="icon-wrench"></i><i class="icon-paper"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">DMR & PQC</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="RTRHId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../RT_RH/dashboard"><i class="icon-paper"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">RTRH Monitoring System</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="IssAttsId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../iss_atts/"><i class="icon-paper"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">ISS ATTS</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="recallexamnav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item"><a href="../recall_exam"><i class="icon-paper"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Recall Exam</span></a>
                    </li>
                </ul>

            </div>

            <div id="wbsBarcodeGenNav" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-cube" class="navigation navigation-main">
                    <li class="nav-item"><a href="../WBS_Barcode"><i class="icon-cube"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">WBS QR Code Generator</span></a>
                    </li>
                </ul>
            </div>
            <div id="ppsImsId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-cube" class="navigation navigation-main">
                    <li class="nav-item"><a href="../pps_ims"><i class="icon-cube"></i><span
                                data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">PPS IMS</span></a>
                    </li>
                </ul>
            </div>
            <div id="shuttleAllocationSystemId" style="display: none;">
                <ul id="main-menu-navigation" data-menu="icon-paper" class="navigation navigation-main">
                    <li class="nav-item">
                        <a href="../shuttle_allocation_system/"><i class="icomoon icon-location"></i>
                            <span data-i18n="nav.bootstrap_tables.table_basic" class="menu-title">Shuttle Allocation System</span>
                        </a>
                    </li>
                </ul>
            </div>

        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>

<script>
    /*
        This id is came from master_layout.blade.php, it is automatically passed to the txtGlobalUserId input
        so we can collect current user's id value and will be used to get the current user module accesses
        Commented by Jannus - 11-23-2021
    */
    let id = $("#txtGlobalUserId").val();
    getUserAccess(id);
</script>
<!-- / main menu-->
