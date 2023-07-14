import React, {Component} from 'react';
import PatientCard from './PatientCard';

class BlockListpatient extends Component {
    constructor() {
        super();
    }
    render() {
        return(
            <div className="col-md-12 col-xs-12">
            <div className="container-fluid mt-5">
                <div className="card-cascade card-cascade narrower">
                    <div className="flatcard">
                        {this.props.loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) : (
                            <div className={'row   mx-1 overflow-auto  h-50'}>
                                { 
                                console.log(this.props.patients['hydra:member']) ,
                                this.props.patients['hydra:member'].map(patient =>
                                    <PatientCard patient={patient} />
                                )}
                            </div>
                        )}
                        
                    </div>
                </div>
            </div>
            </div>
        )
    }
}
export default BlockListpatient;