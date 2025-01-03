<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
-->
</style>

    <table cellspacing="0" style="width: 100%; text-align: center">
        <tr>
            <td style="width: 50%; text-align: left !important;">
                @yield('entete')
            </td>
            <td style="width: 50%; text-align: right; color: #444444;">
                {{-- <img style="width: 100%;" src="{{ asset('admin/logo.png') }}" alt="Logo"><br> --}}
                @yield('date')
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%"> A <br> Monsieur/Madame <br> @yield('destinataire')</td>
        </tr>
    </table>
    <br>
    <br>
    
    <br>
    <i>
        <b><u>Objet </u>: @yield('subject') </b><br>
        
    </i>
    <br>
    <br>
    Madame, Monsieur,<br>
    <br>
    <br>
    <div style="text-align: justify;">
    	@yield('message')
    </div>
    <nobreak>
        <br>
        Dans cette attente, nous vous prions de recevoir, Madame, Monsieur, Cher Client, nos meilleures salutations.<br>
        <br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:60%;"></td>
                <td style="width:40%; text-align: right; ">
                    <br>
                    @yield('signature')
                </td>
            </tr>
        </table>
    </nobreak>
