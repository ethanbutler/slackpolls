<?php

add_action( 'rest_api_init', function(){

  register_rest_route( 'v1', 'response', [
    'methods' => 'POST',
    'callback' => function( $data ){

      $params = $data->get_params();

      if( !isset( $params['text'] ) ){
        return [ 'text' => 'No response provided.' ];
      }

      if( !isset( $params['user_name'] ) ){
        return [ 'text' => 'You somehow didn\'t provide a name.' ];
      }

      $poll_response = str_replace( 'ANSWER: ', '', $params['text'] );
      $name = $params['user_name'];
      $token = get_field( 'response_token', 'option');

      if( !isset( $params['token'] ) || $params['token'] !== $token ){
        return [ 'text' => 'You are not authorized to respond.' ];
      }

      $most_recent_poll_id = get_posts( [
        'post_type' => 'poll'
      ] )[0]->ID;

      $results = get_field( 'results', $most_recent_poll_id );

      foreach( $results as $result ){
        if( $result['name'] === $name ){
          return [ 'text' => 'Stop answering twice, '.$name.'.' ];
        }
      }

      add_row( 'results', [
        'name' => $name,
        'response' => $poll_response
      ], $most_recent_poll_id );

    }

  ] );

} );
