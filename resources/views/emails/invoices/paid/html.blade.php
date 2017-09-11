@extends('layouts.email')

@section('content')
<!-- BEGIN PREHEADER // -->
                                          <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #F4F4F4;border-bottom: 1px solid #CCCCCC;border-collapse: collapse !important;">
                                              <tr>
      <td valign="top" class="preheaderContent" style="padding-top: 10px;padding-right: 20px;padding-bottom: 10px;padding-left: 20px;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #808080;font-family: Helvetica;font-size: 10px;line-height: 125%;text-align: left;" mc:edit="preheader_content00">
                                                                                                                                                                                                                                                                                                                                          
                                                                                                                                                                                                                                                                                                                                                                                          Thank you for your payment.
                                            </td>
                                            <td valign="top" width="180" class="preheaderContent" style="padding-top: 10px;padding-right: 20px;padding-bottom: 10px;padding-left: 0;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #808080;font-family: Helvetica;font-size: 10px;line-height: 125%;text-align: left;" mc:edit="preheader_content01">
                                                Email not displaying correctly?<br><a href="#" target="_blank" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #606060;font-weight: normal;text-decoration: underline;">View it in your browser</a>.
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END PREHEADER -->
                                </td>
                            </tr>
                        <tr>
                            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                                <!-- BEGIN HEADER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #20a8d8;border-top: 0px;border-bottom: 0px;border-collapse: collapse !important;">
                                        <tr>
                                            <td valign="top" class="headerContent" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #ffffff;font-family: Helvetica;font-size: 48px;font-weight: bold;line-height: 100%;padding-top: 25px;padding-right: 0;padding-bottom: 25px;padding-left: 0;text-align: left;vertical-align: middle;text-align:center;">
                                            NIHIL Framework
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // END HEADER -->
                                </td>
                            </tr>
                                                                                                                                                                                                                                                                                                                                                               <tr>
                                                                                                                                                                                                                                                                                                                                                               <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                                                                                                                                                                                                                                                                                                                                                               <!-- BEGIN BODY // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #F4F4F4;border-top: 1px solid #FFFFFF;border-bottom: 1px solid #CCCCCC;border-collapse: collapse !important;">
                                        <tr>
                                            <td valign="top" class="bodyContent" mc:edit="body_content" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;padding-left: 20px;text-align: left;">
                                                <h1 style="display: block;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;color: #202020 !important;">Thank you for your payment</h1>
                                                                                     <h3 style="display: block;font-family: Helvetica;font-size: 16px;font-style: italic;font-weight: normal;line-height: 100%;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;color: #606060 !important;">For your records, here are the details</h3>
      <br />
                                                <h2 style="display: block;font-family: Helvetica;font-size: 20px;font-style: normal;font-weight: bold;line-height: 100%;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 10px;margin-left: 0;text-align: left;color: #404040 !important;">Payment Information</h2>
                                                                                     <strong>Invoice:</strong> #{{ $invoice->id }}<br />
                                                                                     <strong>Amount:</strong> {{ $payment->getFormattedAmount() }}<br />
<strong>Date:</strong> {{ $payment->created_at->toRfc850String() }}<br />
<strong>Reference Number:</strong> {{ $payment->reference_number }}<br />
@if($payment->comments)
<strong>Comments:</strong> {{ $payment->comments }}<br />
@endif
                                                                                     <br />
                                                                                     Remember, you can view more information on both this <a href="{{ $payment->path() }}" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #EB4102;font-weight: normal;text-decoration: underline;">payment</a> and its <a href="{{ $invoice->path() }}" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #EB4102;font-weight: normal;text-decoration: underline;">invoice</a>, online through the web protal.
                                                                                     <br />
                                                                                     <br />
                                                                                     Do not reply to this email.  If you have any questions or concerns about this transaction, you can email us at <a href="mailto:billing@nihilframework.com" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #EB4102;font-weight: normal;text-decoration: underline;">billing@nihilframework.com</a>.
                                         </td>
                                        </tr>
                                    </table>
                                    <!-- // END BODY -->
                                </td>
                            </tr>
@endsection