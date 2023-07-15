// ./assets/js/components/Patients.js
    
import React, {Component} from 'react';
import axios from 'axios';
import BlockListpatient from './BlockListpatient';
import BlockNavigationPatient from './BlockNavigationPatient';
class Patients extends Component {
    constructor() {
        super();
        this.state = { patients: [], loading: true};
    }
    
    componentDidMount() {
        this.getPatients("/api/patients?page=1");
    }
    
    getPatients(page) {
        axios.get(`http://localhost:81`+page).then(patients => {
           this.setState({ patients: patients.data, loading: false})
       })
    }
    
    render() {
        const loading = this.state.loading;
        return(
                <div className="row">
                    <BlockNavigationPatient objectpatient={this} loading={loading} />
                    <BlockListpatient patients={this.state.patients} loading={loading}/>
                </div>
        )
    }
}
export default Patients;