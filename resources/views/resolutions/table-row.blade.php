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
                               <td>{{ $resolution->name }}</td>
<td>{{ $resolution->created_at }}</td>
                               <td>
                                   <ul class="list-inline">
                                      <li><a href="/resolutions/{{ $resolution->id }}"><em class="fa fa-eye"></em></a></li>
                                      <li><a href="/resolutions/{{ $resolution->id }}/edit"><em class="fa fa-edit"></em></a></li>
                                      <li><a href="/resolutions/{{ $resolution->id }}/delete"><em class="fa fa-trash"></em></a></li>
                                   </ul>
                               </td>
                            </tr>