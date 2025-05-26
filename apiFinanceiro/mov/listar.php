<?php 

include_once('../conexao.php');

$postjson = json_decode(file_get_contents('php://input'), true);

//$data = date("Y-m-d");
//$data_mes = date('Y-m-d', strtotime("+1 month", strtotime($data)));

$quantidade = 13;

//$pagina = @$_GET['pagina'] * $quantidade;

$data = @$_GET['data'];
$data1 = @$_GET['data1'];
$busca = @$_GET['lanc'];


$total_saldo_geral = 0;
$total_saldo_geralF = 0;
//TRAZER O SALDO GERAL
$query_t = $pdo->query("SELECT * from movimentacoes where lancamento = '$busca' order by id desc");
$res_t = $query_t->fetchAll(PDO::FETCH_ASSOC);
if(@count($res_t)>0){
    for($it=0; $it < @count($res_t); $it++){
        foreach ($res_t[$it] as $key => $value){} 

            $data_primeiro_reg = $res_t[$it]['data'];   

        if($res_t[$it]['tipo'] == 'Entrada'){
            $total_saldo_geral += $res_t[$it]['valor'];
        }else{
            $total_saldo_geral -= $res_t[$it]['valor'];
        }
    }

    if($total_saldo_geral < 0){
        $classe_saldo_geral = '#ab3824';
    }else{
        $classe_saldo_geral = '#0d6327';
    }

    $total_saldo_geralF = number_format($total_saldo_geral, 2, ',', '.');
}



$query = $pdo->prepare("SELECT * FROM movimentacoes WHERE (data BETWEEN '$data' and '$data1') and lancamento = '$busca' order by data asc, id asc ");

$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);

$total_saldo = 0;
    $total_saldoF = 0;
for ($i=  0; $i < count($res); $i++) { 
    foreach ($res[$i] as $key => $value) {
    }




  $id = $res[$i]['id'];
        $cp1 = $res[$i]['tipo'];
        $cp2 = $res[$i]['movimento'];
        $cp3 = $res[$i]['descricao'];
        $cp4 = $res[$i]['valor'];
        $cp5 = $res[$i]['usuario'];
        $cp6 = $res[$i]['data'];
        $cp7 = $res[$i]['lancamento'];
        $cp8 = $res[$i]['plano_conta'];
        $cp9 = $res[$i]['documento'];


        $total_saldo_periodo = 0;
        $total_saldo_periodoF = 0;
        $contador = $i + 1;

        //TRAZER O SALDO GERAL
        $query_t = $pdo->query("SELECT * from movimentacoes where lancamento = '$busca' and data >= '$data_primeiro_reg' and data <= '$cp6' order by data asc, id asc");
        $res_t = $query_t->fetchAll(PDO::FETCH_ASSOC);
        if(@count($res_t)>0){
            for($it=0; $it < @count($res_t) and $id != $res_t[$it]['id']; $it++){
                foreach ($res_t[$it] as $key => $value){} 

                    if($res_t[$it]['tipo'] == 'Entrada'){
                        $total_saldo_periodo += $res_t[$it]['valor'];
                    }else{
                        $total_saldo_periodo -= $res_t[$it]['valor'];
                    }
                }
            }




            if($cp1 == 'Entrada'){
                $classe = '#0d6327';
                $total_saldo += $cp4;
                $total_saldo_periodo = $total_saldo_periodo + $cp4;
                $classe_linha = '';

            }else{
                $classe = '#ab3824';
                $classe_linha = '#ab3824';
                $total_saldo -= $cp4;
                $total_saldo_periodo = $total_saldo_periodo - $cp4;
            }



            if($total_saldo < 0){
                $classe_saldo = '#0d6327';
            }else{
                $classe_saldo = '#ab3824';
            }

            if($total_saldo_periodo < 0){
                $classe_saldo_periodo = '#ab3824';
            }else{
                $classe_saldo_periodo = '#0d6327';
            }





            $query1 = $pdo->query("SELECT * from usuarios where id = '$cp5' ");
            $res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
            if(@count($res1) > 0){
                $nome_usu = $res1[0]['nome'];
            }



            $data = implode('/', array_reverse(explode('-', $cp6)));
            $valor = number_format($cp4, 2, ',', '.');
            $total_saldoF = number_format($total_saldo, 2, ',', '.');
            $total_saldo_periodoF = number_format($total_saldo_periodo, 2, ',', '.');
   

    $dados[] = array(
        'id' => $id,
        'data' => $data,
        'classe' => $classe_linha,
        'movimento' => $cp2,
        'descricao' => $cp3,
        'usuario' => $nome_usu,
        'documento' => $cp9,
        'plano_conta' => $cp8,
        'valor' => $valor,
        'saldo_geral' => $total_saldo_geralF,
        'classe_saldo' => $classe_saldo_geral,
        'classe_valor' => $classe,
        'saldo_periodo' => $total_saldo_periodoF,
        'classe_periodo' => $classe_saldo_periodo,
        
    );
}

if(count($res) > 0){
    $result = json_encode(array('success'=>true, 'resultado'=>@$dados, 'total'=>@$total_saldo_geralF, 'classeSaldo'=>@$classe_saldo_geral));
}else{
    $result = json_encode(array('success'=>false, 'resultado'=>'0', 'total'=>@$total_saldo_geralF, 'classeSaldo'=>@$classe_saldo_geral));
}

echo $result;

?>