import React, {Component} from 'react';
import {BrowserRouter as Router, Switch, Route, Link} from 'react-router-dom';
import RouteWithSubRoutes from './components/RouteWithSubRoutes'


import './App.css';
import routes from './route';

class App extends Component {
  render() {

    return (
      <Router>
        <div className="wrapper">
          {this.showContent(routes)}
        </div>
      </Router>
    );
  }
  showContent = (routes) => {
    var result = null;

    if (routes.length > 0) {
      result = routes.map((route, index) => {
        return (
          <RouteWithSubRoutes key={index} {...route}/>
        );
      });
    }
    return <Switch>
      {result}
    </Switch>;
  }
  
}

export default App;
