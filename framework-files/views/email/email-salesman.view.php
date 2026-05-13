<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="VEE Digital">
    <title>Resumo Merchant</title>
</head>

<body style="background-color: #3cad4c; margin: 0; font-family: Arial, Tahoma, Roboto, sans-serif;">

    <div style="position: relative; width:700px; background-color: #3cad4c; margin: 0 auto; padding: 20px 40px 30px; font-family: Arial, Tahoma, Roboto, sans-serif; font-size: 18px; line-height: 1.3; color: #ffffff;">
    
        <table border=0 cellpadding="0" cellspacing="0" width="100%" align="center" style="background-color: #3cad4c">
            <tr>
                <td>
                    <h1 style="margin: 0; padding: 30px 10px 15px; text-align: center; font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff; font-size: 25px; text-transform: uppercase; font-weight: normal;">
                        <img src="http://vee.digital/images/emkt/logo-amarelo.png" alt="" width="220" height="89" style="margin: 0 0 20px;"><br>
                        Resumo do cadastro de Vendedor
                    </h1>
                </td>
            </tr>
        </table>

        <table border=0 cellpadding="0" cellspacing="0" width="100%" align="center" style="background-color: #3cad4c; margin: 30px 0 0; font-size: 15px;">
            <tr>
                <td style="width: 200px; text-align: right; padding: 5px 10px 5px 0; font-family: Arial, Tahoma, Roboto, sans-serif;color: #f2b735;">Nome:</td>
                <td style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff;"><?=$data['name']?></td>
            </tr>
            <tr>
                <td style="width: 200px; text-align: right; padding: 5px 10px 5px 0; font-family: Arial, Tahoma, Roboto, sans-serif; color: #f2b735;">E-mail:</td>
                <td style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff;"><a href="mailto:{{$data['email']}}" target="_blank" style="color:#ffffff; text-decoration:none;"><?=$data['email']?></a></td>
            </tr>
            <tr>
                <td style="width: 200px; text-align: right; padding: 5px 10px 5px 0; font-family: Arial, Tahoma, Roboto, sans-serif;color: #f2b735;">Telefone:</td>
                <td style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff;"><?=$data['phoneNumber']?></td>
            </tr>
            <tr>
                <td style="width: 200px; text-align: right; padding: 5px 10px 5px 0; font-family: Arial, Tahoma, Roboto, sans-serif;color: #f2b735;">CPF:</td>
                <td style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff;"><?=$data['document']?></td>
            </tr>
            <tr>
                <td style="width: 200px; text-align: right; padding: 5px 10px 5px 0; font-family: Arial, Tahoma, Roboto, sans-serif;color: #f2b735;">Data de nascimento:</td>
                <td style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff;"><?=$data['birthDate']?></td>
            </tr>
        </table>

        <h2 style="margin: 30px 0 20px; padding: 30px 0 0; font-size: 18px; font-family: Arial, Tahoma, Roboto, sans-serif; color: #fff; border-top: 1px solid #fff;">Dados para acessar o Dashboard da VEE</h2>
        <p style="color: #fff; font-size: 16px;">
            Ao acessar o seu DASHBOARD <a href="https://vee.digital/{{$data['username']}}" style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #fff;">www.vee.digital/{<?=$data['username']?></a>, colocar o "Usuário" e "Senha temporária" para o primeiro acesso. Após efetuar o primeiro login, você será redirecionado para a página de alterar a senha. E neste momento, digite uma nova senha de sua preferência e clique em "Salvar senha".
        </p>
        <table border=0 cellpadding="0" cellspacing="0" width="100%" align="center" style="background-color: #3cad4c; font-size: 15px;">
            
            <tr>
                <td style="width: 200px; text-align: right; padding: 5px 10px 5px 0; font-family: Arial, Tahoma, Roboto, sans-serif; color: #f2b735; ">Usuário / Username:</td>
                <td style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff;"><?=$data['username']?></td>
            </tr>
            <tr>
                <td style="width: 200px; text-align: right; padding: 5px 10px 5px 0; font-family: Arial, Tahoma, Roboto, sans-serif; color: #f2b735; ">Senha temporária:</td>
                <td style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #ffffff;"><?=$data['pw']?></td>
            </tr>
        </table>

        <table border=0 cellpadding="0" cellspacing="0" width="100%" align="center" style="background-color: #3cad4c; font-size: 15px;">
            <tr>
                <td>
                    <p style="text-align: center; font-size: 15px; font-family: Arial, Tahoma, Roboto, sans-serif; color: #fff; border-top: 1px solid #fff; padding: 15px; margin: 50px 0 0;">
                        Para mais informações:<br>
                        <a href="tel:+551130453608" style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #fff; text-decoration: none;">(11) 3045-3608</a> | <a href="mailto:contato@vee.digital" style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #fff; text-decoration: none;">contato@vee.digital</a>
                    </p>

                    <p style="text-align: center; font-size: 15px; padding-top: 10px;">
                        <a href="http://www.vee.digital" style="font-family: Arial, Tahoma, Roboto, sans-serif; color: #fff; text-decoration: none;">
                            <img src="http://vee.digital/images/emkt/logo-amarelo.png" alt="" width="120" height="49" style="margin: 0 0 10px;"><br>
                            www.vee.digital
                        </a>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>