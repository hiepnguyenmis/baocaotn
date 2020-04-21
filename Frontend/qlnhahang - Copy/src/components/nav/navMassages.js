import React, {Component} from 'react';
import MassageItem from './navMassageItem';

class navMessages extends Component {
  render() {

    return (
      <li className="nav-item dropdown">
        <a className="nav-link" data-toggle="dropdown" href="#">
          <i className="far fa-comments"/>
          <span className="badge badge-danger navbar-badge">3</span>
        </a>
        <div className="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <MassageItem/>
          
          <a href="#" className="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
    );
  }
}
export default navMessages;
