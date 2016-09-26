<?php

class PollResults {

  function __construct( $id ){

    $this->id = $id;
    $this->name = get_the_title( $id );
    $this->date = get_the_date( 'M d, Y', $id );
    $this->results = $this->get_post_results( $id );

  }

  private function get_post_results( $id ){

    $results = get_field( 'results', $id );
    if( !$results ){
      return 'No results yet!';
    }

    $results_counted = [];
    $total = count( $results );

    foreach( $results as $result ){
      $response = $result['response'];
      $results_counted[$response] = isset( $results_counted[$response] ) ? $results_counted[$response] + 1 : 1;
    }

    foreach( $results_counted as $result => $count ){
      $results_formatted[] = [
        'name' => $result,
        'value' => $count
      ];
    }

    return $results_formatted;

  }

}
