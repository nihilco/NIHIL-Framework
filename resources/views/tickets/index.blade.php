@extends('layouts.admin')

@section('content')

<!-- Main section-->
          <section>
         <!-- Page content-->
                      <div class="content-wrapper">
                <h3>Tickets</h3>
                <div class="row">
                   <div class="col-md-4">
                      <!-- Aside panel-->
                      <div class="panel b">
                         <div class="panel-body bb">
                            <p>Overvall progress</p>
                            <div class="table-grid table-grid-align-middle mv">
                               <div class="col">
                                  <div class="progress progress-xs m0">
                                     <div style="width:48%" class="progress-bar progress-bar-info">48%</div>
                                  </div>
                               </div>
                               <div class="hidden-xs col wd-xxs text-right">
                                  <div class="text-bold text-muted">48%</div>
                               </div>
                            </div>
                         </div>
                         <div class="panel-body">
                            <p>Metrics</p>
                            <div class="row text-center">
                               <div class="col-xs-3 col-md-6 col-lg-3">
                                  <div class="inline mv">
                                     <div data-sparkline="" values="20,80" data-type="pie" data-height="50" data-slice-colors="[&quot;#edf1f2&quot;, &quot;#23b7e5&quot;]" class="sparkline"></div>
                                  </div>
                                  <p class="mt-lg">Issues</p>
                               </div>
                               <div class="col-xs-3 col-md-6 col-lg-3">
                                  <div class="inline mv">
                                     <div data-sparkline="" values="60,40" data-type="pie" data-height="50" data-slice-colors="[&quot;#edf1f2&quot;, &quot;#27c24c&quot;]" class="sparkline"></div>
                                  </div>
                                  <p class="mt-lg">Bugs</p>
                               </div>
                               <div class="col-xs-3 col-md-6 col-lg-3">
                                  <div class="inline mv">
                                     <div data-sparkline="" values="20,80" data-type="pie" data-height="50" data-slice-colors="[&quot;#edf1f2&quot;, &quot;#ff902b&quot;]" class="sparkline"></div>
                                  </div>
                                  <p class="mt-lg">Hours</p>
                               </div>
                               <div class="col-xs-3 col-md-6 col-lg-3">
                                  <div class="inline mv">
                                     <div data-sparkline="" values="30,70" data-type="pie" data-height="50" data-slice-colors="[&quot;#edf1f2&quot;, &quot;#f05050&quot;]" class="sparkline"></div>
                                  </div>
                                  <p class="mt-lg">Assigned</p>
                               </div>
                            </div>
                         </div>
                         <table class="table bb">
                            <tbody>
                               <tr>
                                  <td>
                                     <strong>Assigned Hours</strong>
                                  </td>
                                  <td>68 hs</td>
                               </tr>
                               <tr>
                                  <td>
                                     <strong>Time Consumed</strong>
                                  </td>
                                  <td>32 hs</td>
                               </tr>
                               <tr>
                                  <td>
                                     <strong>Issues</strong>
                                  </td>
                                  <td>19</td>
                               </tr>
                               <tr>
                                  <td>
                                     <strong>Bugs</strong>
                                  </td>
                                  <td>16</td>
                               </tr>
                               <tr>
                                  <td>
                                     <strong>Health</strong>
                                  </td>
                                  <td>
                                     <em class="fa fa-smile-o fa-lg text-warning"></em>
                                  </td>
                               </tr>
                               <tr>
                                  <td>
                                     <strong>Commits</strong>
                                  </td>
                                  <td>140</td>
                               </tr>
                               <tr>
                                  <td>
                                     <strong>Recently closed</strong>
                                  </td>
                                  <td>
                                     <div data-height="120" data-scrollable="" class="list-group">
                                        <table class="table table-bordered bg-transparent">
                                           <tbody>
                                              <tr>
                                                 <td><a href="" class="text-muted">BI:54678</a>
                                                 </td>
                                              </tr>
                                              <tr>
    <td><a href="" class="text-muted">BI:55778</a>
                                                 </td>
                                              </tr>
                                              <tr>
    <td><a href="" class="text-muted">BI:56878</a>
                                                 </td>
                                              </tr>
                                              <tr>
    <td><a href="" class="text-muted">BI:57978</a>
                                                 </td>
                                              </tr>
                                              <tr>
    <td><a href="" class="text-muted">BI:1107</a>
                                                 </td>
                                              </tr>
                                           </tbody>
                                        </table>
                                     </div>
                                  </td>
                               </tr>
                               <tr>
                                  <td>
                                     <strong>Last closed on</strong>
                                  </td>
                                  <td>12/01/2016</td>
                               </tr>
                            </tbody>
                         </table>
                      </div>
                      <!-- end Aside panel-->
                   </div>
                   <div class="col-md-8">
                      <div class="mb-lg clearfix">
                         <div class="pull-left">
                            <button type="button" class="btn btn-sm btn-info">New ticket</button>
                         </div>
                         <div class="pull-right">
                            <p class="mb0 mt-sm">0 open | 0 closed | 0 total</p>
                         </div>
                      </div>
                      <div class="panel b">
                         <div class="panel-body">
                            <div class="table-responsive">
                               <table id="datatable1" class="table">
                                  <thead>
                                     <tr>
                                        <th>Type</th>
                                        <th>#ID</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Priority</th>
                                        <th>Asigned</th>
                                        <th>Status</th>
                                     </tr>
                                  </thead>
                                  <tbody>

    @if(count($tickets))

    @foreach($tickets as $ticket)

    @include('tickets.ticket-row')
    
    @endforeach

    @else

    <tr>
      <td colspan="7">No tickets found</td>
    </tr>
    
    @endif
                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>

@endsection