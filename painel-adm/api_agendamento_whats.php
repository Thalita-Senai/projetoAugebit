<?php
  $url = "http://api.enviame.com.br/agendar-text";

  $data = array('instance' => "5531975275084",
                'to' => $tel_cliente,
                'token' => '2UJN5-705-111L1',
                'message' => $mensagem_api,
                'data' => $data_msg);

  

  $options = array('http' => array(
                 'method' => 'POST',
                 'content' => http_build_query($data)
  ));

  $stream = stream_context_create($options);

  $result = @file_get_contents($url, false, $stream);

  //echo $result;
?>
  