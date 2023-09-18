@extends('layouts.master_layout')
@section('title', 'Blank')

@section('content')
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Blank</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pages</a>
                </li>
                <li class="breadcrumb-item active">Blank
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Feather icons section start -->
          <section id="feather-icons">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Blank</h4>
                              <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                              <div class="heading-elements">
                                  <ul class="list-inline mb-0">
                                      <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                      <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                      <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="card-body collapse in">
                              <div class="card-block">
                                  
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- // Feather icons section end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection