<table
        align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:600px;" width="600"
>
    <tr>
        <td  style="mso-line-height-rule:exactly;">
            <v:image
                    style="border:0;height:250px;mso-position-horizontal:center;position:absolute;width:600px;z-index:-3;" src="{{ url($post->image) }}" xmlns:v="urn:schemas-microsoft-com:vml"
            />
            <![endif]-->
            <div style="margin:0 auto;max-width:600px;">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                    <tr style="vertical-align:top;">
                        <td background="{{ url($post->image) }}" style="background:#ffffff url({{ url($post->image) }}) no-repeat center center / cover;background-position:center center;background-repeat:no-repeat;padding:0px;vertical-align:top;"
                            height="250">
                            <!--[if mso | IE]>
                            <table
                                    border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
                            >
                                <tr>
                                    <td >
                            <![endif]-->
                            <div class="mj-hero-content" style="margin:0px auto;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;margin:0px;">
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;margin:0px;"> </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                </table>
            </div>
            <!--[if mso | IE]>
            </td>
            </tr>
            </table>

            <table
                    align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
            >
                <tr>
                    <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
            <![endif]-->
            <div style="background:#f2f5f8;background-color:#f2f5f8;Margin:0px auto;max-width:600px;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f2f5f8;background-color:#f2f5f8;width:100%;">
                    <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                                <tr>

                                    <td
                                            style="vertical-align:bottom;width:600px;"
                                    >
                            <![endif]-->
                            <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                                    <tr>
                                        <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:center;color:#000000;">
                                                <h1>{{ $post->title }}</h1>
                                                <p>{{ substr($post->short, 0, 250) }}...</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" vertical-align="middle" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
                                                <tr>
                                                    <td align="center" bgcolor="#00adee" role="presentation" style="border:2px solid #00adee;border-radius:100px;color:white;cursor:auto;padding:10px 25px;" valign="middle">
                                                        <a href="{{ url('blog/' . $post->slug . '/' . $post->id . '?news=' . $newsletter->verification . '&email=' . $subscriber->verification) }}" style="background:#00adee;color:white;font-family:Roboto;font-size:14px;font-weight:normal;line-height:1.5;Margin:0;text-decoration:none;text-transform:none;" target="_blank">
                                                            Saznaj više
                                                        </a> </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]>
                            </td>

                            </tr>

                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--[if mso | IE]>
            </td>
            </tr>
            </table>