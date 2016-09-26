<?php

add_action( 'rest_api_init', function(){

  register_rest_route( 'v1', 'polls', [
    'methods' => 'POST',
    'callback' => function( $data ){

      $params = $data->get_params();

      if( !isset( $params['text'] ) ){
        return [ 'text' => 'No poll name provided.' ];
      }

      $poll_title = str_replace( 'QUESTION: ', '', $params['text'] );
      $token = get_field( 'polls_token', 'option');

      if( !isset( $params['token'] ) || $params['token'] !== $token ){
        return [ 'text' => 'You are not authorized to submit a new poll.' ];
      }

      $new_poll = wp_insert_post( [
        'post_type' => 'poll',
        'post_title' => $poll_title,
        'post_status' => 'publish'
      ] );

      if( $new_poll ){
        return [ 'text' => 'The current poll is: '.$poll_title ];
      } else {
        return [ 'text' => 'Error creating poll.' ];
      }
    }

  ] );

} );
