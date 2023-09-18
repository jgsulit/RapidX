@extends('layouts.master_layout')
@section('title', 'Dashboard')

@section('content')
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- stats -->
                <div class="row">

                    <div id="divModAdmin" style="display: none;">
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="users">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="teal">0</h3> -->
                                                    <span>Users</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-users3 teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="department">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="cyan">0</h3> -->
                                                    <span>Department</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-cube cyan font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="module">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="teal">0</h3> -->
                                                    <span>Module</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-tasks teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="user_access">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="cyan">0</h3> -->
                                                    <span>User Access</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-user cyan font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="quadsdiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../QADS/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>QUADS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-orange font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="aidrcdiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../aidrc/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>AIDRC</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-purple font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="ilqcmdiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../ilqcm/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>ILQCM</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-purple font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div id="dstlmsdiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../dstlms">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>DSTLMS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="jorv2div" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../JO_Requestv2/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>JO Request V2</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-wrench blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- <div id="jorv2divCopy" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../JO_Requestv2Copy/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>JO Request V2 TEST</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-wrench blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> --}}

                        <div id="statboarddiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../StatusBoard/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Status Board System</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-television blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="chasdiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../RapidX_chas/chas">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>CHAS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="pmcsfesdiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../pmcsfes/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>PMCSFES</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="bbtfsdiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../bbtfs/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>BBTFS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-ship blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="CashAdvanceDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../cash_advance/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Online Request For Cash Advance</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-usd pink font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="workPermitDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../ohswp/dashboard">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>OHS Work Permit</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-briefcase blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="inventoryGrindingId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../grinding_inventory/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Grinding Inventory</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-book red font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- <div id="generalKnowledgeExaminationDivId" style="display: none;"
                            class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../GKOTES/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>General Knowledge Online Theoretical Examination</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-folder-open font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> --}}

                        <div id="key4MonitoringDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../okfms/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Key 4 Monitoring System</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-bar-chart blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="key15MonitoringDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../ctms/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Key 15 - CTMS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-bar-chart blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="aidrcCopydiv" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../aidrcCopy/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>AIDRC TEST</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-purple font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- SUPER USER --}}
                        <div id="JsoxDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../Jsox/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>JSOX Database</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    {{-- <i class="icon-bar-chart blue font-large-2 float-xs-right"></i> --}}
                                                    <img src="{{ asset('public/images/Search.png') }}" width="50" height="48">
                                                    <i class="fas fa-file-signature"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="PreshipmentDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../OnlinePreShipment/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Online Pre-Shipment</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
<!---->
                        <div id="FAC_ETLSDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../FAC_ETLS/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>FAC - ETLS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="DMRPQCDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../DMRPQC/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>DMR & PQC</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-wrench blue font-large-2 float-xs-right"></i>
                                                </div>

                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="RTRHDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../RT_RH/dashboard">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>RTRH Monitoring System</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="IssAttsDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../iss_atts/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>ISS ATTS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="wbsBarcodeGen" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../WBS_Barcode">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>WBS QR Code Generator</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-cube red font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
<!---->

                    </div>

                    <div id="divModQADAdmin" style="display: none;">
                        <div id="quadsdiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../QADS/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>QUADS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-orange font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="aidrcdiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../aidrc">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>AIDRC</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-purple font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="ilqcmdiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../ilqcm/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>ILQCM</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-purple font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="jorv2div1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../JO_Requestv2/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>JO Request V2</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-wrench blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div id="dstlmsdiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../dstlms">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>DSTLMS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-xs-12" id="chasdiv" style="display: none;">
                            <a href="../RapidX_chas/chas">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>CHAS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="pmcsfesdiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../pmcsfes/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>PMCSFES</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="workPermitDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../ohswp/dashboard">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>OHS Work Permit</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-briefcase blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="bbtfsdiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../bbtfs/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>BBTFS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-ship blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="CashAdvanceDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../cash_advance/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Online Request For Cash Advance</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-usd blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div id="inventoryGrindingId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../grinding_inventory/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Grinding Inventory</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-book blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- <div id="generalKnowledgeExaminationDivId1" style="display: none;"
                            class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../GKOTES/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>General Knowledge Online Theoretical Examination</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-folder-open font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> --}}

                        <div id="key4MonitoringDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../okfms/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Key 4 Monitoring System</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-bar-chart blue font-large-2 float-xs-right"></i>
                                                    {{-- <i class="icon-book blue font-large-2 float-xs-right"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="FAC_ETLSDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../FAC_ETLS/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>FAC - ETLS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="DMRPQCDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../DMRPQC/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>DMR & PQC</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-wrench blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="key15MonitoringDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../ctms/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Key 15 - CTMS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-bar-chart blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="aidrcCopydiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../aidrcCopy">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>AIDRC TEST</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper deep-purple font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        {{-- USER --}}
                        <div id="JsoxDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../Jsox/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>JSOX Database</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    {{-- <i class="icon-bar-chart blue font-large-2 float-xs-right"></i> --}}
                                                    <img src="{{ asset('public/images/Search.png') }}" width="50" height="48">
                                                    <i class="fas fa-file-signature"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="PreshipmentDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../OnlinePreShipment/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Online Pre-Shipment</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="RTRHDivId1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../RT_RH/dashboard">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>RTRH Monitoring System</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="issAttsDiv1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../iss_atts/">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>ISS ATTS</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-paper blue font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="recallExamDivId" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../recall_exam">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>Recall Exam</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-briefcase green font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="wbsBarcodeGen1" style="display: none;" class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="../WBS_Barcode">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <!-- <h3 class="deep-orange">0</h3> -->
                                                    <span>WBS QR Code Generator</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-briefcase green font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--/ stats -->
                </div>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @endsection

    @section('js_content')
        <script type="text/javascript">
            let globalUserLevelId = $("#txtGlobalUserLevelId").val();
            $(document).ready(function() {
                // alert(globalUserLevelId);
                if (globalUserLevelId == 1 || globalUserLevelId == 2) {
                    $("#divModAdmin").css('display', 'block');
                    $("#divModQADAdmin").css('display', 'none');
                } else if (globalUserLevelId == 3) {
                    $("#divModAdmin").css('display', 'none');
                    $("#divModQADAdmin").css('display', 'block');
                }

                getUserAccess(id);

            });
        </script>
    @endsection
