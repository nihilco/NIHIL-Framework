@extends('layouts.admin')

@section('content')

    <!-- Main section-->
    <section>
        <!-- Page content-->
        <div class="content-wrapper">
            <div class="content-heading">
                Transaction Types
                <small>some small phrase</small>
            </div>
            <div class="row">
                <!-- Blog Content-->
                <div class="col-lg-9">

                    <!-- START panel-->
                    <div class="panel panel-default">
                        <!-- START table-responsive-->
                        <div class="table-responsive">
                            <table id="table-ext-1" class="table table-bordered table-hover">
                                <thead class="panel-footer">
                                    <tr>
                                        <th data-check-all>
                                            <div data-toggle="tooltip" data-title="Check All" class="checkbox c-checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                        <span class="fa fa-check"></span>
                                                </label>
                                            </div>
                                        </th>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date Created</th>
                                        <th>&nbsp;</th>              
                                    </tr>
                                </thead>
                                <tbody>
@if(count($transactionTypes) > 0)
                                    @php
                                        $c=0;
                                    @endphp
                                    @foreach($transactionTypes as $transactionType)
                                        @php
                                            $c++;
                                        @endphp
                                        @include('transaction-types.table-row', compact($transactionType, $c))
                                    @endforeach
                                            @else
<tr><td colspan="5">No transaction types found.</td></tr>
                                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- END table-responsive-->
                        <div class="panel-footer">
                                            <div class="row">
                                            <div class="col-sm-3">
                            <div class="input-group">
                               <select class="input-sm form-control">
                                  <option value="0">Bulk action</option>
                                  <option value="1">Delete</option>
                                  <option value="2">Clone</option>
                                  <option value="3">Export</option>
                               </select>
                               <span class="input-group-btn">
                                  <button class="btn btn-sm btn-default">Apply</button>
                               </span>
                           </div>

</div>
                                            </div>
                                            
                       </div>
                </div>
                <!-- END panel-->    

                       </div>
                   </div>
              </div>
          </section>
    
@endsection