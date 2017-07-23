<?php

require_once("/lib/Conekta.php");

//setApiKey();

\Conekta\Conekta::setApiKey("key_Car5kpxzXvRGyZA2PN85jQ");

$valid_order =
    array(
        'line_items'=> array(
            array(
                'name'        => 'Box of Cohiba S1s',
                'description' => 'Imported From Mex.',
                'unit_price'  => 20000,
                'quantity'    => 1,
                'sku'         => 'cohb_s1',
                'category'    => 'food',
                'tags'        => array('food', 'mexican food')
                )
           ),
          'currency'    => 'mxn',
          'metadata'    => array('test' => 'extra info'),
          "charges" => array(
                array(
                    "payment_method" => array(
                      "payment_source_id" => "card_2fkJPFjQKABcmiZWy",
                            "type" => "card"
                    )//payment_method
                ) //first charge
            ) //charges
          /*'charges'     => array(
              array(
                  'payment_source' => array(
                      'type'       => 'oxxo_cash',
                      'expires_at' => strtotime(date("Y-m-d H:i:s")) + "36000"
                   ),
                   'amount' => 20000
                )
            )*/,
            'currency'      => 'mxn',
            'customer_info' => array(
                'name'  => 'John Constantine',
                'phone' => '+5213353319758',
                'email' => 'hola@hola.com'
            )
        );

try {
  $order = \Conekta\Order::create($valid_order);
  //Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
} catch (\Conekta\ProcessingError $e){ 
  echo $e->getMessage();
} catch (\Conekta\ParameterValidationError $e){
  echo $e->getMessage();
}/* finally (\Conekta\Handler $e){
  echo $e->getMessage();
}*/

?>