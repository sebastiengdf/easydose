import React, {Component} from 'react';
import PatientCard from './PatientCard';
import BlockNavigationPatient from './BlockNavigationPatient';
import BoutonSearch from '../Search/BoutonSearch';
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
                   <div className="row">
                        <div className="col-md-12 ml-3 paddingrightcustom " style={{left:"-2px"}}>
                            <div className="row">
                                <div className="col-md-10 onglet1a pr-0 mr-0 pt-1">Liste des patients </div> 
                                <div className="pl-0 ml-0 col-md-2 onglet1b"> </div>                            
                            </div>
                        </div>
                    </div>
                    <div className="row">
                        <BoutonSearch /><BlockNavigationPatient objectpatient={this.props.objectpatient} loading={this.props.loading} />          
                    </div>
                        {this.props.loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) : (
                            <div className={'row   mx-1 overflow-auto  h-50'}>
                                { 
                                this.props.objectpatient.state.patients['hydra:member'].map(patient =>
                                    <PatientCard patient={patient} offset={this.props.objectpatient.state.patients['hydra:view']["@id"]}/>
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