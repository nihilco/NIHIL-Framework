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
                               <td>{{ $user->username }}</td>
                               <td>{{ $user->email }}</td>
                               <td>{{ $user->name }}</td>
<td>{{ $user->created_at }}</td>
                               <td>
                                   <ul class="list-inline">
                                      <li><a href="/users/{{ $user->id }}"><em class="fa fa-eye"></em></a></li>
                                      <li><a href="/users/{{ $user->id }}/edit"><em class="fa fa-edit"></em></a></li>
                                      <li><a href="/users/{{ $user->id }}/delete"><em class="fa fa-trash"></em></a></li>
                                   </ul>
                               </td>
                            </tr>