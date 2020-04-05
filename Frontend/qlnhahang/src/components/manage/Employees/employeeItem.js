import React, {Component} from 'react';
import EmployeeEdit from './employeeEdit';
import EmployeeDelete from './employeeDelete';
import EmployeeDetail from './employeeDetail';

class EmployeeItems extends Component {
  render() {

    return (
      <tr>
        <td>Trident</td>
        <td>Internet Explorer 4.0
        </td>
        <td>Win 95+</td>
        <td>
          4</td>
        <td>X</td>
        <td>
          <a type="button" data-toggle="modal" className='text-primary' data-target="#employeeDetail">
            <i className="far fa-eye" data-toggle="tooltip" data-placement="right" title="Chi tiết"></i>
          </a>

          <a type="button" className='ml-4 text-secondary'  data-toggle="modal" data-target="#employeeEdit">
          <i className="fas fa-edit" data-toggle="tooltip" data-placement="right" title="Sửa"></i>
          </a>
          
          <a type="button" className='ml-4 text-danger'  data-toggle="modal" data-target="#employeeDelete">
          <i className="fas fa-trash" data-toggle="tooltip" data-placement="right" title="Xóa"></i>
          </a>
        </td>
        <EmployeeEdit/>
        <EmployeeDelete/>
        <EmployeeDetail/>
      </tr>

    );
  }
}
export default EmployeeItems;
