<?php

add_action( 'init', function(){

  # Register polls
  register_post_type( 'poll', [
    'labels' => [
      'name' => 'Polls',
      'singular_name' => 'Poll'
    ],
    'menu_position' => 5,
    'public' => true,
    'show_in_menu' => true,
    'supports' => 'title'
  ] );

  # Add ACF fields to polls
  if( function_exists( 'acf_add_local_field_group') ){
    acf_add_local_field_group( [
      'key' => 'poll_results',
      'title' => 'Results',
      'fields' => [
        [
          'key' => 'results',
          'label' => 'Results',
          'name' => 'results',
          'type' => 'repeater',
          'sub_fields' => [
            [
              'key' => 'name',
              'label' => 'Name',
              'name' => 'name',
              'type' => 'text'
            ],
            [
              'key' => 'response',
              'label' => 'Response',
              'name' => 'response',
              'type' => 'text'
            ]
          ]
        ]
      ],
      'location' => [ [ [
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'poll'
      ] ] ]
    ] );
  }

  if( function_exists( 'acf_add_options_page' ) ){
    acf_add_options_page( [
      'page_title' => 'Slack Integrations',
      'menu_title' => 'Slack Integrations',
      'menu_slug' => 'slack-integrations'
    ] );

    if( function_exists( 'acf_add_local_field_group' ) ){
      acf_add_local_field_group( [
        'key' => 'slack_tokens',
        'title' => 'Slack Tokens',
        'fields' => [
          [
            'key' => 'polls_token',
            'label' => 'Polls Token',
            'name' => 'polls_token',
            'type' => 'password'
          ],
          [
            'key' => 'response_token',
            'label' => 'Response Token',
            'name' => 'response_token',
            'type' => 'password'
          ]
        ],
        'location' => [ [ [
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'slack-integrations'
        ] ] ]
      ] );
    }

  }

}, 0 );
