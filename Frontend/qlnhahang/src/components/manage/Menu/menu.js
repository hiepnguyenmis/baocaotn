import React, {Component} from 'react';
import MenuItems from './menuItem'
import MenuAdd from './menuAdd'

class Menu extends Component {
  render() {

    return (
      <div className="content-wrapper">
        {/* Content Header (Page header) */}
        <section className="content-header">
          <div className="container-fluid">
            <div className="row mb-2">
              <div className="col-sm-6">
                <h1>DataTables</h1>
              </div>
              <div className="col-sm-6">
                <ol className="breadcrumb float-sm-right">
                  <li className="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li className="breadcrumb-item active">DataTables</li>
                </ol>
              </div>
            </div>
          </div>{/* /.container-fluid */}
        </section>
        {/* Main content */}
        <section className="content">
          <div className="row">
            <div className="col-12">
              <div className="card">
                <div className="card-header">
                  <h3 className="card-title">DataTable with minimal features &amp; hover style</h3>
                </div>
                {/* /.card-header */}
                <div className="card-body table-responsive">
                  <table id="example2" className="table table-bordered table-hover ">
                    <thead>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                        <th>
                          <a type="button" data-toggle="modal" data-target="#menuAdd">
                            <div>
                              <i className="fas fa-plus text-success"/>
                              Thêm mới
                            </div>

                          </a>

                          <MenuAdd/>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <MenuItems/>
                      <MenuItems/>
                      <MenuItems/>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                {/* /.card-body */}
              </div>
              {/* /.card */}

            </div>
            {/* /.col */}
          </div>
          {/* /.row */}
        </section>
        {/* /.content */}
      </div>

    );
  }
}
export default Menu;
