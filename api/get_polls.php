<?php

add_action( 'rest_api_init', function(){

  register_rest_route( 'v1', 'polls', [
    'methods' => 'GET',
    'callback' => function( $data ){

        $results = [];

        $polls = get_posts( [
          'post_type' => 'poll',
          'posts_per_page' => -1
        ] );

        foreach( $polls as $poll ){
          $results[] = new PollResults( $poll->ID );
        }

        return $results;
    }
  ] );

} );
