<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="margin: 0; padding: 0; background-color: #6C7A89;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #6C7A89;">
    <tr>
        <td style="text-align: center;padding: 50px;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width: 600px; margin: 0 auto;">
                <tr>
                    <td style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.16);">
                        <h2 style="margin-bottom: 20px;">{{trans('emails.Password_Reset')}} </h2>
                        <p>
                            {{trans('emails.receiving')}}
                            <br>
                            <a href="{{ $resetLink }}" style="background-color: #007BFF; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;">{{trans('emails.Redefine_password')}}</a>
                        </p>
                        <p>
                            {{trans('emails.not_requested')}}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
