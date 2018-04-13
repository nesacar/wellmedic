<!--[if mso | IE]>
<table
        align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
>
    <tr>
        <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]-->
<div style="Margin:0px auto;max-width:600px;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
        <tbody>
        <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0;padding-top:0;text-align:center;vertical-align:top;">
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
                            <td align="left" style="font-size:0px;padding:0px;word-break:break-word;">
                                <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                    <div class="image image--hero"> <img src="{{ url($post->image) }}" /> </div>
                                </div>
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
                                    <a href="{{ url('blog/' . $post->slug . '/' . $post->id . '?news=' . $newsletter->verification . '&email=' . $subscriber->verification) }}" class="btn">Saznaj više</a> </div>
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