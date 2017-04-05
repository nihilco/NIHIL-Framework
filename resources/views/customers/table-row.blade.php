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
                               <td>{{ $customer->account->name }}</td>
                               <td>{{ $customer->stripe_id }}</td>
<td>{{ $customer->user->email }}</td>
<td>{{ $customer->created_at }}</td>
                               <td>
                                   <ul class="list-inline">
                                      <li><a href="/customers/{{ $customer->id }}"><em class="fa fa-eye"></em></a></li>
                                      <li><a href="/customers/{{ $customer->id }}/edit"><em class="fa fa-edit"></em></a></li>
                                      <li><a href="/customers/{{ $customer->id }}/delete"><em class="fa fa-trash"></em></a></li>
                                   </ul>
                               </td>
                            </tr>