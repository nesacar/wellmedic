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
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                                <tr>
                            <![endif]-->
                            <!-- articles -->
                            <!--[if mso | IE]>
                            <td
                                    style="vertical-align:top;width:300px;"
                            >
                            <![endif]-->
                            <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                    <!-- article -->
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                                <div class="image thumbnail">
                                                    <img src="{{ url($post1->image) }}" /> </div>
                                                <div class="artcile">
                                                    {{--<span class="caption">30. Decembar 2017</span>--}}
                                                    <h2 class="article_title">{{ $post1->title }}</h2>
                                                    <p class="article_body">{{ substr($post1->short, 0, 250) }}...</p>
                                                    <div style="text-align: center;">
                                                        <a href="{{ url('blog/' . $post1->slug . '/' . $post1->id . '?news=' . $newsletter->verification . '&email=' . $subscriber->verification) }}" class="btn btn--outline">Pročitaj više</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]>
                            </td>
                            <![endif]-->
                            <!-- /article -->
                            <!--[if mso | IE]>
                            <td
                                    style="vertical-align:top;width:300px;"
                            >
                            <![endif]-->
                            <div class="mj-column-per-50 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                    <!-- article -->
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div style="font-family:Roboto;font-size:14px;line-height:1.5;text-align:left;color:#000000;">
                                                <div class="image thumbnail"> <img src="{{ url($post2->image) }}" /> </div>
                                                <div class="artcile">
                                                    {{--<span class="caption">30. Decembar 2017</span>--}}
                                                    <h2 class="article_title">{{ $post2->title }}</h2>
                                                    <p class="article_body">{{ substr($post2->short, 0, 250) }}...</p>
                                                    <div style="text-align: center;">
                                                        <a href="{{ url('blog/' . $post2->slug . '/' . $post2->id . '?news=' . $newsletter->verification . '&email=' . $subscriber->verification) }}" class="btn btn--outline">Pročitaj više</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]>
                            </td>
                            <![endif]-->
                            <!-- /article -->
                            <!--[if mso | IE]>
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
            <![endif]-->
            <!-- /articles -->