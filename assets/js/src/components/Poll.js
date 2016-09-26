let RandCol  = require( 'randomcolor' )
let React    = require( 'react' )
let PieChart = require( 'react-d3-basic' ).PieChart

module.exports = React.createClass( {

  render: function(){
    if( typeof this.props.results === 'string' ){
      return <article id={this.props.id}>
        <h2>{this.props.name}</h2>
        <p>Results pending.</p>
      </article>
    }

    let value = d => {
      return d.value
    }
    let name = d => {
      return d.name
    }
    let chartSeries = this.props.results.map( result => {
      return {
        "field": result.name,
        "name": result.name
      }
    } )
    return <article id={this.props.id}>
      <h2>{this.props.name}</h2>
      <PieChart
        width={400}
        height={400}
        data={this.props.results}
        chartSeries={chartSeries}
        value={value}
        name={name}
      />
    </article>
  }

} )
