import React, {Component} from 'react';
import Navigation from './../../components/nav/navigation';
import Sidebar from './../../components/nav/sidebar'
import Footer from './../../components/footer/footer'
import routes from './../../route';

import {BrowserRouter as  Switch, Route, Link} from 'react-router-dom';
import RouteWithSubRoutes from './../../components/RouteWithSubRoutes'

class ManagePage extends Component {
  render() {
    return (
        <div>
          <Navigation/>
          <Sidebar/>
          <div className="wrapper">
            {this.contentAdmin(routes)}
            <Footer/>
          </div>
        </div>
    );
  }
  contentAdmin = (routes) => {
    var result = null;
      result = routes.map((route, index) => {
        return (<RouteWithSubRoutes  key={index} {...route}/>);
      });
    return <Switch>
      {result}
    </Switch>;
  }
}
export default ManagePage;