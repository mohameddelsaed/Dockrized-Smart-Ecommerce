<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كود التحقق</title>
</head>
<body style="margin:0; padding:0; background-color:#f5f5f5; font-family: 'Segoe UI', Tahoma, Arial, sans-serif;">

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f5f5; padding:40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="480" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">

                    <!-- Header / Logo -->
                    <tr>
                        <td align="center" style="background-color:#ffffff; padding:32px 0 16px 0; border-bottom:1px solid #f0f0f0;">
                            <span style="font-size:26px; font-weight:800; color:#111111; letter-spacing:1px;">
                                RIVO<span style="color:#FF6A00;">.</span>
                            </span>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:32px 40px;">
                            <h2 style="margin:0 0 8px 0; font-size:20px; color:#111111;">
                                كود التحقق الخاص بك
                            </h2>
                            <p style="margin:0 0 24px 0; font-size:14px; color:#777777; line-height:1.6;">
                                استخدم الكود ده عشان تأكد حسابك على Rivo. الكود صالح لمدة {{ \App\Services\OtpService::OTP_EXPIRES_MINUTES }} دقايق بس.
                            </p>

                            <!-- OTP Box -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="background-color:#fff5eb; border:1px dashed #FF6A00; border-radius:10px; padding:20px 0;">
                                        <span style="font-size:32px; font-weight:700; letter-spacing:8px; color:#FF6A00;">
                                            {{ $otp }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:24px 0 0 0; font-size:13px; color:#999999; line-height:1.6;">
                                لو انت مطلبتش الكود ده، ممكن تتجاهل الرسالة دي بأمان، حسابك لسه محمي.
                            </p>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:0 40px;">
                            <hr style="border:none; border-top:1px solid #f0f0f0; margin:0;">
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding:24px 40px 32px 40px;">
                            <p style="margin:0; font-size:12px; color:#aaaaaa;">
                                محتاج مساعدة؟ زور <a href="#" style="color:#FF6A00; text-decoration:none;">مركز المساعدة</a>
                            </p>
                            <p style="margin:8px 0 0 0; font-size:12px; color:#cccccc;">
                                &copy; {{ date('Y') }} Rivo. جميع الحقوق محفوظة.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>