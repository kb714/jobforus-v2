<!-- Emails use the XHTML Strict doctype -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- The character set should be utf-8 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <!-- Link to the email's CSS, which will be inlined into the email -->
    <link rel="stylesheet" href="foundation-emails.css">
</head>

<body>
<container>
    <row>
        <columns>
            <spacer size="20"></spacer>
            <center>
                <img src="{{ $message->embed(storage_path('app/public/logo.png')) }}" alt="JobForUs">
            </center>
            <spacer size="10"></spacer>
            <center>
                <menu>
                    <item style="color: #9c1780;" href="{{ route('home.index') }}">JobForUs</item>
                    <item style="color: #9c1780;" href="{{  route('home.page', 'como-funciona')  }}">¿Como funciona?</item>
                    <item style="color: #9c1780;" href="{{  route('home.page', 'transparentes')  }}">Transparentes</item>
                </menu>
            </center>
            <hr>
            <p class="text-center">Su mensaje fue recibido con éxito, pronto nos pondremos en contacto con usted</p>
        </columns>
    </row>
</container>
</body>
</html>