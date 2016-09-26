<?php

add_action( 'rest_api_init', function(){

  register_rest_route( 'v1', 'polls/(?P<id>\d+)', [
    'methods' => 'GET',
    'callback' => function( $data ){
        $id = $data['id'];
        return new PollResults( $id );
    }
  ] );

} );
