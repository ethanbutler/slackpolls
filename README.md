# SlackPolls

SlackPolls is a WordPress theme that integrates with your Slack channel to display live poll results from your team.

This is intended to be a silly project designed to push the limits of what WordPress is supposed to do – there are million better ways of building an application like this.

## Dependencies

This theme requires [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/) to work.

## Installation and Configuring Slack

Download a zip of this repo and add it via the WordPress theme uploader. Then, activate the theme.

Make sure Outgoing WebHooks are enabled as part of your Slack room. Add two outgoing hooks:

1. When a message starts with QUESTION:, POST to http://your.domain.com/wp-json/v1/polls
1. When a message starts with ANSWER:, POST to http://your.domain.com/wp-json/v1/response

This theme is pre-configured with the ACF Fields you'll need to make the magic happen, cap'n – once installed, go to "Slack Integration" and enter the tokens that Slack gives you for each webhook.

## Using Slack

In a public channel, simply start a message with "QUESTION: " and within moments, you'll receive a response that this is the current question.

Reply with a message starting with "ANSWER: " to respond. Results will automatically update on your site.

## Thanks

This project uses:

* [React](https://facebook.github.io/react/)
* [React-D3](http://www.reactd3.org/)
