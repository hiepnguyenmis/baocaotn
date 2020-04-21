import React, {Component} from 'react';

class Footer extends Component {
  render() {

    return (
      <div>
          <aside className="control-sidebar control-sidebar-dark"></aside>
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
    );
  }
}
export default Footer;
