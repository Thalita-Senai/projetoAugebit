<?php 
include_once('../conexao.php');
include_once('../../config.php');

$data_hoje = date('Y-m-d');
$data_amanha = date('Y/m/d', strtotime("+1 days",strtotime($data_hoje)));

$postjson = json_decode(file_get_contents('php://input'), true);

//$data = date("Y-m-d");
//$data_mes = date('Y-m-d', strtotime("+1 month", strtotime($data)));

$quantidade = 13;

//$pagina = @$_GET['pagina'] * $quantidade;

$data = @$_GET['data'];
$data1 = @$_GET['data1'];

$query = $pdo->prepare("SELECT * FROM contas_receber WHERE (vencimento BETWEEN '$data' and '$data1') and status = 'Pendente' order by vencimento asc, id asc ");

$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i=  0; $i < count($res); $i++) { 
    foreach ($res[$i] as $key => $value) {
    }

    $fornecedor = $res[$i]['cliente'];

    $query1 = $pdo->query("SELECT * from clientes where id = '$fornecedor' ");
    $res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
    if(@count($res1) > 0){
         @$fornecedor_nome = $res1[0]['nome'];
     }else{
         @$fornecedor_nome = $res[$i]['descricao'];
     }

     $arquivo = $res[$i]['arquivo'];
     //EXTRAIR EXTENSÃO DO ARQUIVO
    $ext = pathinfo($arquivo, PATHINFO_EXTENSION);   
    if($ext == 'pdf'){ 
        $tumb_arquivo = 'pdf.png';
    }else if($ext == 'rar' || $ext == 'zip'){
        $tumb_arquivo = 'rar.png';
    }else{
        $tumb_arquivo = $arquivo;
    }


        //PEGAR RESIDUOS DA CONTA
    $total_resid = 0;
    $valor_com_residuos = 0;
    $id = $res[$i]['id'];
    $valor_conta = $res[$i]['valor'];
    $query2 = $pdo->query("SELECT * FROM valor_parcial WHERE id_conta = '$id'");
    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    if(@count($res2) > 0){

        $fornecedor_nome = '(Resíduo) - ' .$fornecedor_nome;

        for($i2=0; $i2 < @count($res2); $i2++){
            foreach ($res2[$i2] as $key => $value){} 
                $id_res = $res2[$i2]['id'];
            $valor_resid = $res2[$i2]['valor'];
            $total_resid += $valor_resid;
        }


        $valor_com_residuos = $valor_conta + $total_resid;
    }
    if($valor_com_residuos > 0){
        $vlr_antigo_conta = '('.$valor_com_residuos.')';
       
    }else{
        $vlr_antigo_conta = '';
       
    }



    //RECUPERAR DIAS VENCIDOS
        $data_venc_carencia = date('Y/m/d', strtotime("-$dias_carencia days",strtotime($data_hoje)));
        
        if(strtotime($res[$i]['vencimento']) < strtotime($data_venc_carencia)){
            $dif = strtotime($data_venc_carencia) - strtotime($res[$i]['vencimento']);
            $dias_vencidos = floor($dif / (60*60*24));
        }else{
            $dias_vencidos = '0';
        }

        $juros = ($dias_vencidos * $valor_juros_dia) * $res[$i]['valor'] / 100;

        if($res[$i]['vencimento'] < date('Y-m-d')){
            $multa = $res[$i]['valor'] * $valor_multa / 100;
        }else{
            $multa = 0;
        }
        
   

    $dados[] = array(
        'id' => $res[$i]['id'],
        'cliente' => $fornecedor_nome,
        'saida' => $res[$i]['entrada'],
        'vencimento' => $res[$i]['vencimento'],
        'frequencia' => $res[$i]['frequencia'],
        'valor' => $res[$i]['valor'],
        'status' => $res[$i]['status'],
        'arquivo' => $res[$i]['arquivo'],
        'tumb' => $tumb_arquivo,
        'valor_antigo' => $vlr_antigo_conta,
        'multa' => $multa,
        'juros' => $juros,
    );
}

if(count($res) > 0){
    $result = json_encode(array('success'=>true, 'resultado'=>@$dados));
}else{
    $result = json_encode(array('success'=>false, 'resultado'=>'0'));
}

echo $result;

?>