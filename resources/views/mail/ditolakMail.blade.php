<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>{{ $mailData['title'] }}</title>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        .ReadMsgBody {
            width: 100%;
            background-color: #ffffff;
        }

        .ExternalClass {
            width: 100%;
            background-color: #ffffff;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        html {
            width: 100%;
        }

        body {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            margin: 0;
            padding: 0;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        table td {
            border-collapse: collapse;
        }

        .yshortcuts a {
            border-bottom: none !important;
        }

        img {
            display: block !important;
        }

        a {
            text-decoration: none;
            color: #e54a39;
        }

        /* Media Queries */

        @media only screen and (max-width: 640px) {
            body {
                width: auto !important;
            }

            table[class="table600"] {
                width: 450px !important;
            }

            table[class="table-container"] {
                width: 90% !important;
            }

            table[class="container2-2"] {
                width: 47% !important;
                text-align: left !important;
            }

            table[class="full-width"] {
                width: 100% !important;
                text-align: center !important;
            }

            img[class="img-full"] {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            body {
                width: auto !important;
            }

            table[class="table600"] {
                width: 290px !important;
            }

            table[class="table-container"] {
                width: 82% !important;
            }

            table[class="container2-2"] {
                width: 100% !important;
                text-align: left !important;
            }

            table[class="full-width"] {
                width: 100% !important;
                text-align: center !important;
            }

            img[class="img-full"] {
                width: 100% !important;
            }
        }
    </style>

</head>

<body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"
    offset="0" topmargin="0" leftmargin="0">

    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" bgcolor="#006600" background="img/bg-main-a.jpg" style="background-size: cover; background-position: center;">
                <table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="20" style="font-size: 1px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <img src="{{ $message->embed(asset('upload/footerLogo.png')) }}" alt="logo" width="380" height="60">
                        </td>
                    </tr>
                    <tr>
                        <td height="100" style="font-size: 1px; line-height: 100px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 36px; font-weight: 400; color: #ffffff; line-height: 44px; letter-spacing: 1px;">
                            PENERIMAAN SISWA BARU <br>{{ $mailData['unit'] }} SANTA URSULA BANDUNG
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table width="150" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="10" style="border-bottom: 1px solid #ffffff;"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="15" style="font-size: 1px; line-height: 15px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 18px; font-weight: 400; color: #ffffff; line-height: 22px; letter-spacing: 4px;">
                            PENGUMUMAN HASIL PSB {{ $mailData['unit'] != 'TBTK' ? '[JALUR ' . $mailData['registration_path'] . ']' : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td height="140" style="font-size: 1px; line-height: 140px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" bgcolor="#ffffff">
                <table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="50" style="font-size: 1px; line-height: 50px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 400; color: #111; letter-spacing: 2px; line-height: 28px;">
                            MOHON MAAF KAMU BELUM DITERIMA DI {{ $mailData['unit'] }} SANTA URSULA BANDUNG
                        </td>
                    </tr>
                    <tr>
                        <td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 24px; font-weight: 400; color: #111; letter-spacing: 2px; line-height: 28px;">
                TERIMA KASIH
            </td>
        </tr>
        <tr>
            <td height="30" style="font-size: 1px; line-height: 30px;">&nbsp;</td>
        </tr>
    </table>

    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" bgcolor="#006600">
                <table class="table600" width="600" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 400; color: #ffffff; line-height: 24px;">
                            PSB {{ $mailData['unit'] }} SANTA URSULA BANDUNG © {{ date('Y') }} ALL RIGHTS RESERVED
                        </td>
                    </tr>
                    <tr>
                        <td height="10" style="font-size: 1px; line-height: 10px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
