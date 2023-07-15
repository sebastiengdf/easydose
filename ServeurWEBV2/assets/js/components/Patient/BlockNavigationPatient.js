
import React, {Component} from 'react';
import Bouton from '../Navigation/Bouton';

class BlockNavigationPatient extends Component {
    constructor() {
        super();
    } 
    render() {        
        return(
                      <div className="col-md-12">
                    <div style={{float:'right',marginTop:'5px'}} className="dataTables_paginate paging_simple_numbers">
                    {
                        this.props.loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) : (  
                        <ul className="pagination">
                            <Bouton objectpatient={this.props.objectpatient} number={"Premier"} url={this.props.objectpatient.state.patients['hydra:view']["hydra:first"]}/>
                            <Bouton objectpatient={this.props.objectpatient} number={"Précedent"} url={this.props.objectpatient.state.patients['hydra:view']["hydra:previous"]}/>
                            <Bouton objectpatient={this.props.objectpatient} number={"Suivant"} url={this.props.objectpatient.state.patients['hydra:view']["hydra:next"]}/>....
                            <Bouton objectpatient={this.props.objectpatient} number={"Dernier"} url={this.props.objectpatient.state.patients['hydra:view']["hydra:last"]}/>
                        </ul>
                        
                            )}


                </div>
            </div>
        )
        }       
}
export default BlockNavigationPatient;
