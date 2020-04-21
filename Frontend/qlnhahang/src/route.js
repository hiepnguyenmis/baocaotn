import React from 'react';
import HomePage from './pages/HomePage/HomePage';
import NotFoundPage from './pages/NotFoundPage/NotFoundPage';
import LoginPage from './pages/LoginPage/LoginPage';
import ManagementPage from './pages/Magement/ManagementPage';
import EmployeePage from './pages/Magement/EmployeePage/EmployeePage';

import Index from './components/index/index'

const routes =[
    {
        path: '/',
        exact:true,
        main: ()=><HomePage/> 
    },
    {
        path: '/dangnhap',
        exact: false,
        main:()=><LoginPage/>
    },
    {
        path: '/trangquantri',
        exact:false,
        main:()=><ManagementPage/>,
        
    },
    {
        path: '',
        exact: false,
        main: ()=><NotFoundPage/>
    }

];

export default routes;