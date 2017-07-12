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
                               <td>{{ $account->mode }}</td>
                               <td>{{ $account->name }}</td>
                               <td>{{ $account->stripe_id }}</td>
<td>{{ $account->created_at }}</td>
                               <td>
                                   <ul class="list-inline">
                                      <li><a href="/accounts/{{ $account->id }}"><em class="fa fa-eye"></em></a></li>
                                      <li><a href="/accounts/{{ $account->id }}/edit"><em class="fa fa-edit"></em></a></li>
                                      <li><a href="/accounts/{{ $account->id }}/delete"><em class="fa fa-trash"></em></a></li>
                                   </ul>
                               </td>
                            </tr>