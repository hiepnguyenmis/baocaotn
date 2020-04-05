import React from 'react';
import {BrowserRouter as Router, Switch, Route, Link} from 'react-router-dom';
import Sidebar from './components/nav/sidebar';
import Navigation from './components/nav/navigation';
import Index from './components/index/index';
import './App.css';
import Employees from './components/manage/Employees/employees';
import Menu from './components/manage/Menu/menu';
import Material from './components/manage/Material/material'

function App() {
  return (
    <Router>
      <div className="wrapper">
        {/* Navbar */}
        <Navigation/> {/* /.navbar */}
        {/* Main Sidebar Container */}
        <Sidebar/> {/* Content Wrapper. Contains page content */}
        {/* Content Header (Page header) */}
        {/* <Index/> */}
        {/* /.content-wrapper */}
        {/* Control Sidebar */}
        <aside className="control-sidebar control-sidebar-dark">
          {/* Control sidebar content goes here */}
        </aside>
        {/* /.control-sidebar */}
        {/* Main Footer */}
        <footer className="main-footer">
          <strong>
            Copyright © 2014-2019
            <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
          All rights reserved.
          <div className="float-right d-none d-sm-inline-block">
            <b>Version</b>
            3.0.2
          </div>
        </footer>
      </div>

      <Switch>
        <Route exact path='/'>
          <Index/>
        </Route>
        <Route path='/employees'>
          <Employees/>
        </Route>
        <Route path='/menu'>
          <Menu/>
        </Route>
        <Route path='/material'>
          <Material/>
        </Route>
        
      </Switch>
    </Router>
  );
}

export default App;
