import React, {Component} from 'react';

class EmployeeDelete extends Component {
  render() {

    return (
      <div
        className="modal fade"
        id="employeeDelete"
        tabIndex={-1}
        role="dialog"
        aria-labelledby="employeeDeleteLabel"
        aria-hidden="true">
        <div className="modal-dialog" role="document">
          <div className="modal-content">
            <div className="modal-header">
              <h5 className="modal-title" id="employeeDeleteLabel">Modal title</h5>
              <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div className="modal-body">
              Bạn có muốn xóa...?
            </div>
            <div className="modal-footer">
              <button type="button" className="btn btn-danger" data-dismiss="modal">Hủy</button>
              <button type="button" className="btn btn-primary">Tiếp tục</button>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default EmployeeDelete;
