<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potvrdenie dopytu</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f7; font-family: Arial, sans-serif; color:#111;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <!-- Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#111; color:#fff; padding:28px 32px; text-align:center;">
                            <h2 style="margin:0; font-size:22px;">Ďakujeme za prejavený záujem o naše služby</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:32px;">

                            <p style="margin-top:0;">
                                Dobrý deň <strong>{{ $data['name'] }}</strong>,
                            </p>

                            <p>
                                váš dopyt sme úspešne prijali a už na ňom pracujeme.  
                                Ozveme sa vám čo najskôr s odpoveďou.
                            </p>

                            <!-- Summary -->
                            <div style="margin:24px 0; padding:20px; background:#f9f9fb; border-radius:8px;">
                                <strong>Prehľad vášho dopytu:</strong>

                                <p style="margin:12px 0 0;">
                                    <strong>Typ eventu:</strong><br>
                                    {{ $data['event_type'] }}
                                </p>

                                <p style="margin:12px 0 0;">
                                    <strong>Správa:</strong><br>
                                    {!! nl2br(e($data['message'])) !!}
                                </p>
                            </div>

                            <p>
                                Ak by ste chceli doplniť ďalšie informácie, stačí odpovedať na tento e-mail.
                            </p>

                            <p style="margin-top:24px;">
                                S pozdravom,<br>
                                <strong>Promiss Agency</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px 32px; font-size:12px; color:#777; text-align:center;">
                            Tento e-mail je potvrdením prijatia vášho dopytu.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>