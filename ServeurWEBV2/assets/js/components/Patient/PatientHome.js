// ./assets/js/components/Patient.js

import React, {Component} from 'react';
import {Route, Routes,Navigate, Link, withRouter} from 'react-router-dom';
import Patients from './Patients';


class PatientHome extends Component {

    render() {
        return (
           <div>
               <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                   <Link className={"navbar-brand"} to={"/patients"}> Test Patients</Link>
                   <div className="collapse navbar-collapse" id="navbarText">
                       <ul className="navbar-nav mr-auto">
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/Patients"}> Patients </Link>
                           </li>
                       </ul>
                   </div>
               </nav>


               <Routes>
                   <Route path="/api/patients" element={<Patients/>} />
               </Routes>

           </div>
        )
    }
}
export default Patients;