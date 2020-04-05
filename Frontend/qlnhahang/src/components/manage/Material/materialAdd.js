import React, {Component} from 'react';

class MaterialAdd extends Component {
  render() {
    return (
        <div
        class="modal fade fade bd-example-modal-lg"
        id="materialAdd"
        tabindex="-1"
        role="dialog"
        aria-labelledby="materialAddTitle"
        aria-hidden="true">
        <div className="modal-dialog modal-dialog-centered  modal-lg " role="document">
          <div className="modal-content">
            <div className="modal-header">
              <h5 className="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div className='modal-body'>
              <div className="card card-default">
                <div className="card-body">
                  <div className="row">
                    <div className="col-md-6">
                      <div className="form-group">
                        <label>Minimal</label>
                        <select
                          className="form-control select2"
                           defaultValue={'selected'}>
                          <option selected="selected">Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      {/* /.form-group */}
                      <div className="form-group">
                        <label>Disabled</label>
                        <select
                          className="form-control select2"
                          disabled="disabled"
                          style={{
                          width: '100%'
                        }}>
                          <option selected="selected">Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      {/* /.form-group */}
                    </div>
                    {/* /.col */}
                    <div className="col-md-6">
                      <div className="form-group">
                        <label>Multiple</label>
                        <select
                          className="select2"
                          multiple="multiple"
                          data-placeholder="Select a State"
                          style={{
                          width: '100%'
                        }}>
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      {/* /.form-group */}
                      <div className="form-group">
                        <label>Disabled Result</label>
                        <select
                          className="form-control select2"
                          style={{
                          width: '100%'
                        }}>
                          <option selected="selected">Alabama</option>
                          <option>Alaska</option>
                          <option disabled="disabled">California (disabled)</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      {/* /.form-group */}
                    </div>
                    {/* /.col */}
                  </div>
                  {/* /.row */}
                  <h5>Custom Color Variants</h5>
                  <div className="row">
                    <div className="col-12 col-sm-6">
                      <div className="form-group">
                        <label>Minimal (.select2-danger)</label>
                        <select
                          className="form-control select2 select2-danger"
                          data-dropdown-css-class="select2-danger"
                          style={{
                          width: '100%'
                        }}>
                          <option selected="selected">Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      {/* /.form-group */}
                    </div>
                    {/* /.col */}
                    <div className="col-12 col-sm-6">
                      <div className="form-group">
                        <label>Multiple (.select2-purple)</label>
                        <div className="select2-purple">
                          <select
                            className="select2"
                            multiple="multiple"
                            data-placeholder="Select a State"
                            data-dropdown-css-class="select2-purple"
                            style={{
                            width: '100%'
                          }}>
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                          </select>
                        </div>
                      </div>
                      {/* /.form-group */}
                    </div>
                    {/* /.col */}
                  </div>
                  {/* /.row */}
                </div>
                {/* /.card-body */}

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    );
  }
}
export default MaterialAdd;
