<table width="100%" height="100%" border="0" cellpadding="20" cellspacing="0"
       style="margin:0;border-collapse:collapse;border-spacing:0;padding:20px;font-family: Arial;">
    <tr>
        <td width="100%" valign="top" align="center" bgcolor="#eceeed">
            <table border="0" cellpadding="0" cellspacing="0" class="body"
                   style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;width:100%;background:#fff;max-width:550px;margin:0px;border-radius:5px;">
                <tr style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                    <td class="container" style="padding:0;border-collapse:collapse;border-spacing:0;">
                        <div class="content" style="margin:0;padding:0;">
                            <table class="main" style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;width:100%;">
                                <tr style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                    <td class="wrapper"
                                        style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                        <table border="0" cellpadding="0" cellspacing="0"
                                               style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;width:100%;">
                                            <tr style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                                <td style="margin:0;padding:0;padding-top:25px;border-collapse:collapse;border-spacing:0;">
                                                    <div class="headerimage" style="margin:0 auto;padding:0;width: 150px;">
                                                        <img src="{{ $message->embed(public_path().'/images/transparent-logo.png') }}"
                                                             alt="header"
                                                             style="margin:0;padding:0;border-radius:5px 5px 0px 0px;overflow:hidden;"
                                                             width="100%"/>
                                                    </div>
                                                    <div class="in-content" style="margin:0;padding:0;padding:30px;">
                                                        <h3 style="margin:0;font-family:Helvetica, Arial;line-height:1.4;color:#3f526d;font-weight:500;font-size:20px;margin:20px 0px 15px;padding:0;">
                                                            Einladung!</h3>
                                                        <p style="margin:0;padding:0;font-family:Helvetica, Arial;margin-bottom:10px;font-weight:300;color:#96a6b0;font-size:15px;line-height:1.6;">
                                                            Jemand möchte das du seiner WG beitrittst.</p>
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                               class="btn btn-primary" width="100%"
                                                               style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                                            <tbody style="margin:0;padding:0;">
                                                            <tr style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                                                <td align="center"
                                                                    style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                                           style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                                                        <tbody style="margin:0;padding:0;">
                                                                        <tr style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                                                            <td style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                                                                                <div style="margin:0;padding:0;text-align: center;width: 100%;">
                                                                                    <a href="{{ route('accept', $invite->flat_id) }}" target="_blank"
                                                                                       class="cta-button"
                                                                                       style="margin:0;padding:0;display:inline-block;background:#13a399;color:#fff;text-decoration:none;padding:15px 25px;border-radius:5px;font-size:14px;letter-spacing:1px;font-weight:100;margin:20px auto;">
                                                                                        Registrieren</a></div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" valign="top" align="center" bgcolor="#eceeed">
            <table style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;width: 100%;max-width: 550px;margin: 0px auto;text-align: center;color: #ccc;font-size: 14px;"
                   align="center">
                <tr style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">
                    <td style="margin:0;padding:0;border-collapse:collapse;border-spacing:0;">&copy; 2019 flat42.com</td>
                </tr>
            </table>
        </td>
    </tr>
</table>