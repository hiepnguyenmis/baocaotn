import React, {Component} from 'react';

class MassageItem extends Component {
  render() {

    return (

      <div className='wrapper'>
        <a href="#" className="dropdown-item">
          {/* Message Start */}
          <div className="media">
            <img
              src="dist/img/user3-128x128.jpg"
              alt="User Avatar"
              className="img-size-50 img-circle mr-3"/>
            <div className="media-body">
              <h3 className="dropdown-item-title">
                Nora Silvester
                <span className="float-right text-sm text-warning"><i className="fas fa-star"/></span>
              </h3>
              <p className="text-sm">The subject goes here</p>
              <p className="text-sm text-muted"><i className="far fa-clock mr-1"/>
                4 Hours Ago</p>
            </div>
          </div>
          {/* Message End */}
        </a>
        <div className="dropdown-divider"/>
      </div>
    );
  }
}
export default MassageItem;