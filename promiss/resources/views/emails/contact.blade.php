<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nový dopyt</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f7; font-family: Arial, sans-serif; color:#111;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <!-- Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#111; color:#fff; padding:24px 32px;">
                            <h2 style="margin:0; font-size:20px;">Nový dopyt z webu</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:32px;">

                            <!-- Info box -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                                <tr>
                                    <td style="padding:12px 0; border-bottom:1px solid #eee;">
                                        <strong>Meno</strong><br>
                                        {{ $data['name'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0; border-bottom:1px solid #eee;">
                                        <strong>Email</strong><br>
                                        <a href="mailto:{{ $data['email'] }}" style="color:#111;">
                                            {{ $data['email'] }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0; border-bottom:1px solid #eee;">
                                        <strong>Telefón</strong><br>
                                        {{ $data['phone'] ?: '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;">
                                        <strong>Typ eventu</strong><br>
                                        {{ $data['event_type'] }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Message -->
                            <div style="background:#f9f9fb; padding:20px; border-radius:8px;">
                                <strong>Správa</strong>
                                <p style="margin-top:10px;">
                                    {!! nl2br(e($data['message'])) !!}
                                </p>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px 32px; font-size:12px; color:#777; text-align:center;">
                            Tento e-mail bol odoslaný z kontaktného formulára na webe.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>