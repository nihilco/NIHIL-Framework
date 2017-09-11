<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>NIHIL Framework</title>

    <style type="text/css">
     /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
     #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
     .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
     .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
     body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
img{-ms-interpolation-mode:bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

     /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
     body{margin:0; padding:0;}
     img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
     table{border-collapse:collapse !important;}
     body, #bodyTable, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;}

     /* /\/\/\/\/\/\/\/\/ TEMPLATE STYLES /\/\/\/\/\/\/\/\/ */

     /* ========== Page Styles ========== */

      #bodyCell{padding:20px;}
      #templateContainer{width:600px;}

      body, #bodyTable{
        background-color:#DEE0E2;
      }

      #bodyCell{
        border-top:4px solid #BBBBBB;
      }

      #templateContainer{
        border:1px solid #BBBBBB;
      }

      h1{
        color:#202020 !important;
        display:block;
        font-family:Helvetica;
        font-size:26px;
        font-style:normal;
        font-weight:bold;
        line-height:100%;
        letter-spacing:normal;
        margin-top:0;
        margin-right:0;
        margin-bottom:10px;
        margin-left:0;
        text-align:left;
      }

      h2{
        color:#404040 !important;
        display:block;
        font-family:Helvetica;
        font-size:20px;
        font-style:normal;
        font-weight:bold;
        line-height:100%;
        letter-spacing:normal;
        margin-top:0;
        margin-right:0;
        margin-bottom:10px;
        margin-left:0;
        text-align:left;
      }

      h3{
        color:#606060 !important;
        display:block;
        font-family:Helvetica;
        font-size:16px;
        font-style:italic;
        font-weight:normal;
        line-height:100%;
        letter-spacing:normal;
        margin-top:0;
        margin-right:0;
        margin-bottom:10px;
        margin-left:0;
        text-align:left;
      }

h4{
    /*@editable*/ color:#808080 !important;
  display:block;
    /*@editable*/ font-family:Helvetica;
    /*@editable*/ font-size:14px;
    /*@editable*/ font-style:italic;
    /*@editable*/ font-weight:normal;
    /*@editable*/ line-height:100%;
    /*@editable*/ letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:10px;
    margin-left:0;
    /*@editable*/ text-align:left;
}

/* ========== Header Styles ========== */

#templatePreheader{
/*@editable*/ background-color:#F4F4F4;
/*@editable*/ border-bottom:1px solid #CCCCCC;
    }

.preheaderContent{
    /*@editable*/ color:#808080;
    /*@editable*/ font-family:Helvetica;
    /*@editable*/ font-size:10px;
    /*@editable*/ line-height:125%;
    /*@editable*/ text-align:left;
 }

.preheaderContent a:link, .preheaderContent a:visited, /* Yahoo! Mail Override */ .preheaderContent a .yshortcuts /* Yahoo! Mail Override */{
    /*@editable*/ color:#606060;
    /*@editable*/ font-weight:normal;
    /*@editable*/ text-decoration:underline;
 }

#templateHeader{
/*@editable*/ background-color:#F4F4F4;
/*@editable*/ border-top:1px solid #FFFFFF;
    /*@editable*/ border-bottom:1px solid #CCCCCC;
        }

.headerContent{
    /*@editable*/ color:#505050;
    /*@editable*/ font-family:Helvetica;
    /*@editable*/ font-size:20px;
    /*@editable*/ font-weight:bold;
    /*@editable*/ line-height:100%;
    /*@editable*/ padding-top:0;
    /*@editable*/ padding-right:0;
    /*@editable*/ padding-bottom:0;
    /*@editable*/ padding-left:0;
    /*@editable*/ text-align:left;
    /*@editable*/ vertical-align:middle;
 }

.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
    /*@editable*/ color:#EB4102;
    /*@editable*/ font-weight:normal;
    /*@editable*/ text-decoration:underline;
 }

#headerImage{
height:auto;
max-width:600px;
}

/* ========== Body Styles ========== */

#templateBody{
/*@editable*/ background-color:#F4F4F4;
/*@editable*/ border-top:1px solid #FFFFFF;
    /*@editable*/ border-bottom:1px solid #CCCCCC;
        }

.bodyContent{
    /*@editable*/ color:#505050;
    /*@editable*/ font-family:Helvetica;
    /*@editable*/ font-size:14px;
    /*@editable*/ line-height:150%;
    padding-top:20px;
     padding-right:20px;
     padding-bottom:20px;
     padding-left:20px;
     /*@editable*/ text-align:left;
 }

.bodyContent a:link, .bodyContent a:visited, /* Yahoo! Mail Override */ .bodyContent a .yshortcuts /* Yahoo! Mail Override */{
    /*@editable*/ color:#EB4102;
    /*@editable*/ font-weight:normal;
    /*@editable*/ text-decoration:underline;
 }

.bodyContent img{
   display:inline;
   height:auto;
     max-width:560px;
 }

/* ========== Footer Styles ========== */

#templateFooter{
/*@editable*/ background-color:#F4F4F4;
/*@editable*/ border-top:1px solid #FFFFFF;
    }

.footerContent{
    /*@editable*/ color:#808080;
    /*@editable*/ font-family:Helvetica;
    /*@editable*/ font-size:10px;
    /*@editable*/ line-height:150%;
    padding-top:20px;
     padding-right:20px;
     padding-bottom:20px;
     padding-left:20px;
     /*@editable*/ text-align:left;
 }

.footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
    /*@editable*/ color:#606060;
    /*@editable*/ font-weight:normal;
    /*@editable*/ text-decoration:underline;
 }

/* /\/\/\/\/\/\/\/\/ MOBILE STYLES /\/\/\/\/\/\/\/\/ */

@media only screen and (max-width: 480px){
    /* /\/\/\/\/\/\/ CLIENT-SPECIFIC MOBILE STYLES /\/\/\/\/\/\/ */
    body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:none !important;} /* Prevent Webkit platforms from changing default text sizes */
    body{width:100% !important; min-width:100% !important;} /* Prevent iOS Mail from adding padding to the body */

    /* /\/\/\/\/\/\/ MOBILE RESET STYLES /\/\/\/\/\/\/ */
    #bodyCell{padding:10px !important;}

    /* /\/\/\/\/\/\/ MOBILE TEMPLATE STYLES /\/\/\/\/\/\/ */

    /* ======== Page Styles ======== */

    #templateContainer{
    max-width:600px !important;
    /*@editable*/ width:100% !important;
}

h1{
    /*@editable*/ font-size:24px !important;
    /*@editable*/ line-height:100% !important;
}

h2{
    /*@editable*/ font-size:20px !important;
    /*@editable*/ line-height:100% !important;
}

h3{
    /*@editable*/ font-size:18px !important;
    /*@editable*/ line-height:100% !important;
}

h4{
    /*@editable*/ font-size:16px !important;
    /*@editable*/ line-height:100% !important;
}

/* ======== Header Styles ======== */

#templatePreheader{display:none !important;} /* Hide the template preheader to save space */

#headerImage{
height:auto !important;
/*@editable*/ max-width:600px !important;
/*@editable*/ width:100% !important;
}

.headerContent{
    /*@editable*/ font-size:20px !important;
    /*@editable*/ line-height:125% !important;
 }

/* ======== Body Styles ======== */

.bodyContent{
    /*@editable*/ font-size:18px !important;
    /*@editable*/ line-height:125% !important;
 }

/* ======== Footer Styles ======== */

.footerContent{
    /*@editable*/ font-size:14px !important;
    /*@editable*/ line-height:115% !important;
 }

.footerContent a{display:block !important;} /* Place footer social and utility links on their own lines, for easier access */
}
    </style>
  </head>

  <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;margin: 0;padding: 0;background-color: #DEE0E2;height: 100% !important;width: 100% !important;">
      <center>
      <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;margin: 0;padding: 0;background-color: #DEE0E2;border-collapse: collapse !important;height: 100% !important;width: 100% !important;">
      <tr>
      <td align="center" valign="top" id="bodyCell" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;margin: 0;padding: 20px;border-top: 4px solid #BBBBBB;height: 100% !important;width: 100% !important;">
      <!-- BEGIN TEMPLATE // -->
      <table border="0" cellpadding="0" cellspacing="0" id="templateContainer" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 600px;border: 1px solid #BBBBBB;border-collapse: collapse !important;">
      <tr>
      <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">





      @yield('content')

                                                                                     <tr>
                                                                                     <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">

      <!-- BEGIN FOOTER // -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;background-color: #F4F4F4;border-top: 1px solid #FFFFFF;border-collapse: collapse !important;">
                                        <tr>
                                            <td valign="top" class="footerContent" mc:edit="footer_content00" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0pt;mso-table-rspace: 0pt;color: #808080;font-family: Helvetica;font-size: 10px;line-height: 150%;padding-top: 20px;padding-right: 20px;padding-bottom: 20px;padding-left: 20px;text-align: left;">

                                                                                       <em>Copyright &copy; 2009-<?= date('Y') ?> The NIHIL Corporation, All rights reserved.</em><br />
                                                                                                                <strong>The NIHIL Corporation</strong> 6409 Sail Pointe Lane, Hixson, TN 37343
                                                                                       
                                            </td>
                                                                                       <td>
                                                                                      <a href="#" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #EB4102;font-weight: normal;text-decoration: underline;font-family:Helvetica;font-size: 12px;">nihil.co</a>&nbsp;&nbsp;&nbsp;<a href="#" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #EB4102;font-weight: normal;text-decoration: underline;font-family:Helvetica;font-size: 12px;">unsubscribe</a>&nbsp;&nbsp;&nbsp;<a href="#" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #EB4102;font-weight: normal;text-decoration: underline;font-family:Helvetica;font-size: 12px;">preferences</a>&nbsp;
                                                                                       </td>
                                        </tr>
                                    </table>
                                    <!-- // END FOOTER -->
                                </td>
                            </tr>
                        </table>
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>