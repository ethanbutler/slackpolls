require( 'whatwg-fetch' )

let React = require( 'react' )
let Poll  = require( './Poll' )
let eq    = require( 'array-equal')

module.exports = React.createClass( {

  getInitialState: function(){
    return {
      polls: []
    }
  },

  getPollData: function(){
    fetch( this.props.api+'/polls' )
      .then( function(response){
        return response.json()
      } )
      .then( function( data ){
        console.log( data )
        if( eq( data, this.state.polls ) ){
          return
        }
        this.setState( {
          polls: data
        } )
      }.bind(this) )
  },

  componentDidMount: function(){
    this.getPollData()
    setInterval( this.getPollData, 2000 )
  },

  render: function(){
    return <main>
      { this.state.polls.map( poll => {
        return <Poll key={poll.id} name={poll.name} results={poll.results} />
      } ) }
    </main>
  }

} )
