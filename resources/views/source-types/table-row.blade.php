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
                               <td>{{ $sourceType->name }}</td>
<td>{{ $sourceType->created_at }}</td>
                               <td>
                                   <ul class="list-inline">
                                      <li><a href="/source-types/{{ $sourceType->id }}"><em class="fa fa-eye"></em></a></li>
                                      <li><a href="/source-types/{{ $sourceType->id }}/edit"><em class="fa fa-edit"></em></a></li>
                                      <li><a href="/source-types/{{ $sourceType->id }}/delete"><em class="fa fa-trash"></em></a></li>
                                   </ul>
                               </td>
                            </tr>