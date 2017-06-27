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
                               <td>{{ $tripGroup->name }}</td>
                               <td>{{ $tripGroup->color }}</td>
<td>{{ $tripGroup->created_at }}</td>
                               <td>
                                   <ul class="list-inline">
                                      <li><a href="/trip-groups/{{ $tripGroup->id }}"><em class="fa fa-eye"></em></a></li>
                                      <li><a href="/trip-groups/{{ $tripGroup->id }}/edit"><em class="fa fa-edit"></em></a></li>
                                      <li><a href="/trip-groups/{{ $tripGroup->id }}/delete"><em class="fa fa-trash"></em></a></li>
                                   </ul>
                               </td>
                            </tr>