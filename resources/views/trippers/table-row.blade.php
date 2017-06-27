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
                               <td>{{ $tripper->last_name }}</td>
                               <td>{{ $tripper->first_name }}</td>
<td>{{ $tripper->created_at }}</td>
                               <td>
                                   <ul class="list-inline">
                                      <li><a href="/trippers/{{ $tripper->id }}"><em class="fa fa-eye"></em></a></li>
                                      <li><a href="/trippers/{{ $tripper->id }}/edit"><em class="fa fa-edit"></em></a></li>
                                      <li><a href="/trippers/{{ $tripper->id }}/delete"><em class="fa fa-trash"></em></a></li>
                                   </ul>
                               </td>
                            </tr>