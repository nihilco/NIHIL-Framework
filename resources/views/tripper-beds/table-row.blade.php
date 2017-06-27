                                 <tr>
                               <td>
                                  <div class="checkbox c-checkbox">
                                     <label>
                                        <input type="checkbox">
                                        <span class="fa fa-check"></span>
                                     </label>
                                  </div>
                               </td>
                                      <td>{{ $c }}</td>
<td>{{ $tripper->last_name }}, {{ $tripper->first_name }}</td>
@php
    $s = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $trip->starts_at);
    $e = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $trip->ends_at);
for($d = $s->startOfDay(); $d <= $e; $d->addDay()) {
    echo '<td>                                  <div class="checkbox c-checkbox">
                                     <label>
                                        <input type="checkbox">
                                        <span class="fa fa-check"></span>
                                     </label>
                                  </div></td>';
}
@endphp

                            </tr>