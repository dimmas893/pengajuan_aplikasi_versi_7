@extends('layouts.admin.template_admin')
@section('content')


@php
$level_1 = \App\Models\User::where('id', Auth::user()->id)->where('role', 'level_1')->first();
$user = \App\Models\User::where('id', Auth::user()->id)->where('role', null)->first();  
@endphp
    @if ($level_1)
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#approve" role="tab" data-toggle="tab">Approve</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#belumapprove" role="tab" data-toggle="tab">Belum Approve</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active show" id="approve">
         <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <div id="data_admin_barang_approve"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div role="tabpanel" class="tab-pane fade in" id="belumapprove">
         <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <div id="data_admin_barang_belum_approve"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
@section('script')
    
  {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
$(function() {

      data_admin_barang_approve();

      function data_admin_barang_approve() {
        $.ajax({
          url: '/approval/data_admin_barang_approve',
          method: 'get',
          success: function(response) {
            $("#data_admin_barang_approve").html(response);
            $("table").DataTable({
                destroy: true,
                // retrieve: true,
                // paging: false
            });
          }
        });
      }

      data_admin_barang_belum_approve();

      function data_admin_barang_belum_approve() {
        $.ajax({
          url: '/approval/data_admin_barang_belum_approve',
          method: 'get',
          success: function(response) {
            $("#data_admin_barang_belum_approve").html(response);
            $("table").DataTable({ 
                destroy: true,  
                // retrieve: true,
                // paging: false 
            });
          }
        });
      }

      
    });
    
        </script>
    @endsection

    @endif
@endsection