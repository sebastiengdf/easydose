
import React, {Component} from 'react';
import Bouton from '../Navigation/Bouton';

class BlockNavigationPatient extends Component {
    constructor() {
        super();
    } 
    render() {
        return(
            <div className="row">
                <div className="col-md-11">
                    <div style={{float:'right',marginTop:'5px'}} className="dataTables_paginate paging_simple_numbers">
                    <ul className="pagination">
                    <Bouton objectpatient={this.props.objectpatient} number={"Précedent"}/>
                    <Bouton number={"1"}/>
                    <Bouton number={"2"}/>....
                    <Bouton number={"Suivant"}/>
                    </ul>
                </div>
                <div className="col-md-1">

                </div>
            </div>
            </div>
        )
        }       
}
export default BlockNavigationPatient;
