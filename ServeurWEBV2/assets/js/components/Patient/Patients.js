// ./assets/js/components/Patients.js
    
import React, {Component} from 'react';
import axios from 'axios';
import BlockListpatient from './BlockListpatient';
class Patients extends Component {
    constructor() {
        super();
        this.state = { patients: [], loading: true};
    }
    
    componentDidMount() {
        this.getPatients();
    }
    
    getPatients() {
        axios.get(`http://localhost:81/api/patients`).then(patients => {
           this.setState({ patients: patients.data, loading: false})
       })
    }
    
    render() {
        const loading = this.state.loading;
        return(
            <BlockListpatient patients={this.state.patients} loading={loading}/>
        )
    }
}
export default Patients;