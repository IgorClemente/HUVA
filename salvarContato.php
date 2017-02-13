<?php


if (isset($_POST['envio'])){


    /*** Configuração de E-mail ***/

    $enviaFormularioParaNome = 'Contato GRUPO HUVA';
    $enviaFormularioParaEmail = 'edukeke@hotmail.com';
    $caixaPostalServidorNome = 'Contato Site';
    $caixaPostalServidorEmail = 'igor.clemente@aerosoftcargas.com.br';
    $caixaPostalServidorSenha = 'igorvibelike';

    /*** Configuração de E-mail ***/


    $nomeCompleto  = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cepp  = $_POST['cepp'];
    $telefoneResidencial = $_POST['telefoneR'];
    $telefoneCelular = $_POST['telefoneC'];
    $operadora  = $_POST['operadora'];
    $nascData = $_POST['nascData'];
    $estadoCivil = $_POST['estadoCivil'];
    $email = $_POST['email'];
    $escolheOp  = $_POST['escolheOp'];
    $encontroParticipou  = $_POST['encontroParticipou'];
    $encontroConvidado  = $_POST['encontroConvidado'];
    $contatoRecadoNome  = $_POST['contatoRecadoNome'];
    $contatoRecadoTel  = $_POST['contatoRecadoTel'];
    $optionsRadios = $_POST['optionsRadios'];


    $assunto = "Novo Usuário Cadastrado -  54 Encontro HUVA";

    $mensagemConcatenada = 'Informações do Usuário: '.'<br/><br/>';
    $mensagemConcatenada .= 'Nome: '.$nomeCompleto.'<br/><br/>';
    $mensagemConcatenada .= 'Endereço: '.$endereco.'<br/><br/>';
    $mensagemConcatenada .= 'Bairro: '.$bairro.'<br/><br/>';
    $mensagemConcatenada .= 'Cidade: '.$cidade.'<br/><br/>';
    $mensagemConcatenada .= 'CEP: '.$cepp.'<br/><br/>';
    $mensagemConcatenada .= 'Telefone Residencial: '.$telefoneResidencial.'<br/><br/>';
    $mensagemConcatenada .= 'Telefone Celular: '.$telefoneCelular.'<br/><br/>';
    $mensagemConcatenada .= 'Operadora: '.$operadora.'<br/><br/>';
    $mensagemConcatenada .= 'Data de Nascimento: '.$nascData.'<br/><br/>';
    $mensagemConcatenada .= 'Estado Civil: '.$estadoCivil.'<br/><br/>';
    $mensagemConcatenada .= 'Já fez encontro? '.$escolheOp.'<br/><br/>';
    $mensagemConcatenada .= 'Encontro que participou: '.$encontroParticipou.'<br/><br/>';
    $mensagemConcatenada .= 'Quem convidou: '.$encontroConvidado.'<br/><br/>';
    $mensagemConcatenada .= 'Contato para recado: '.$contatoRecadoNome.'<br/><br/>';
    $mensagemConcatenada .= 'Telefone do Contato: '.$contatoRecadoTel.'<br/><br/>';
    $mensagemConcatenada .= 'Como ficou sabendo: '.$optionsRadios.'<br/><br/>';
    


    /*** Parâmetros necessários ao Servidor SMTP ***/

    require_once('phpmailer/PHPMailerAutoload.php');
    require_once("phpmailer/class.phpmailer.php");
    require_once ("phpmailer/class.smtp.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth  = true;
    $mail->Charset   = 'utf8_decode()';
    $mail->Host  = 'smtp.'. 'gmail.com';//substr(strstr($caixaPostalServidorEmail, '@'), 1);//
    $mail->Port  = '587';
    $mail->Username  = $caixaPostalServidorEmail;
    $mail->Password  = $caixaPostalServidorSenha;
    $mail->From  = $caixaPostalServidorEmail;
    $mail->FromName  = utf8_decode($caixaPostalServidorNome);
    $mail->IsHTML(true);
    $mail->Subject  = utf8_decode($assunto);
    $mail->Body  = utf8_decode($mensagemConcatenada);


    $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));

    /*** Parâmetros necessários ao Servidor SMTP ***/


    /*** Salvando Informações no Banco de Dados  EM TESTE***/


        $con = new mysqli("huvadb.mysql.uhserver.com", "huva128", "Huv@2017", "huvadb");
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $qryLista = mysqli_query($con, "INSERT INTO usuarios(nomeUser,endereco) VALUES($nomeCompleto,$endereco);");



    if(!$mail->Send()){

        $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
}else{
        $mensagemRetorno = 'Formulário enviado com sucesso!';

        echo "<script>window.location = 'sucesso.html'</script>";
    }

}

?>