import React, {Component} from 'react';
import {BrowserRouter as Router, Switch, Route, Link} from 'react-router-dom';

class Sidebar extends Component {
  render() {

    return (
      <aside className="main-sidebar sidebar-dark-primary elevation-4">
        {/* Brand Logo */}
        <a className="brand-link">
          <img
            src="dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            className="brand-image img-circle elevation-3"
            style={{
            opacity: '.8'
          }}/>
          <span className="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        {/* Sidebar */}
        <div className="sidebar">
          {/* Sidebar user panel (optional) */}
          <div className="user-panel mt-3 pb-3 mb-3 d-flex">
            <div className="image">
              <img
                src="dist/img/user2-160x160.jpg"
                className="img-circle elevation-2"
                alt="User Image"/>
            </div>
            <div className="info">
              <a  className="d-block">Alexander Pierce</a>
            </div>
          </div>
          {/* Sidebar Menu */}
          <nav className="mt-2">
            <ul
              className="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false">
              {/* Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library */}
              <li className="nav-item has-treeview menu-open">
                <a className="nav-link active">
                  <i className="nav-icon fas fa-tachometer-alt"/>
                  <p>
                    Dashboard
                    <i className="right fas fa-angle-left"/>
                  </p>
                </a>       
              </li>
              <li className="nav-item has-treeview">
                <a  className="nav-link">
                  <i className="nav-icon far fa-envelope"/>
                  <p>
                    Quản lý
                    <i className="fas fa-angle-left right"/>
                  </p>
                </a>
                <ul className="nav nav-treeview">
                  <li className="nav-item">
                    <a  className="nav-link">
                      <i className="far fa-circle nav-icon"/>
                      <p>Thực đơn</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a  className="nav-link">
                      <i className="far fa-circle nav-icon"/>
                      <p>Nguyên liệu</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a  className="nav-link">
                      <i className="far fa-circle nav-icon"/>
                      <p>Bài viết</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a  className="nav-link">
                      <i className="far fa-circle nav-icon"/>
                      Nhan viên
                    </a>
                  </li>
                  <li className="nav-item">
                    <a  className="nav-link">
                      <i className="far fa-circle nav-icon"/>
                      <p>Khách hàng</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li className="nav-item has-treeview">
                <a  className="nav-link">
                  <i className="nav-icon far fa-envelope"/>
                  <p>
                    Thống kê
                    <i className="fas fa-angle-left right"/>
                  </p>
                </a>
                <ul className="nav nav-treeview">
                  <li className="nav-item">
                    <a  className="nav-link">
                      <i className="far fa-circle nav-icon"/>
                      <p>Doanh thu</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a  className="nav-link">
                      <i className="far fa-circle nav-icon"/>
                      <p>Hóa đơn</p>
                    </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </nav>
          {/* /.sidebar-menu */}
        </div>
        {/* /.sidebar */}
      </aside>
    );
  }
}
export default Sidebar;