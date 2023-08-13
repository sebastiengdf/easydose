// ./assets/js/components/Patients.js
    
import React, {Component} from 'react';
import axios from 'axios';
import BlockListpatient from './BlockListpatient';


class Patients extends Component {
    constructor() {
        super();
        this.state = { patients: [], loading: true};
        this.currentpage=`/api/patients?page=1`;
    }
    
    componentDidMount() {
        this.getPatients(`/api/patients?page=1`);
    }
    
    getPatients(page) {
        this.currentpage=`http://localhost:81`+page;
        axios.get(`http://localhost:81`+page).then(patients => {
           this.setState({ patients: patients.data, loading: false})
       })
    }
    
    render() {
        const loading = this.state.loading;
        return(
                <div>
                    <BlockListpatient objectpatient={this} loading={loading}/>
                </div>
        )
    }
}
export default Patients;