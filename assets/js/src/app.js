let ReactDOM = require( 'react-dom' )
let React    = require( 'react' )
let PollList = require( './components/PollList' )

ReactDOM.render(
  <PollList api="/wp-json/v1" />,
  document.getElementById('app')
)
