
import React, {Component} from 'react';
import Bouton from '../Navigation/Bouton';

class BlockNavigationPatient extends Component {
    constructor() {
        super();
    }
    seturls(){
        if (!this.props.loading){
            this.urlfirst=this.props.objectpatient.state.patients['hydra:view']["hydra:first"]
            this.urlprevious=this.props.objectpatient.state.patients['hydra:view']["hydra:previous"]
            this.urlcurrent=this.props.objectpatient.currentpage
            this.urlnext=this.props.objectpatient.state.patients['hydra:view']["hydra:next"]
            this.urllast=this.props.objectpatient.state.patients['hydra:view']["hydra:last"]

            if(this.urlcurrent===this.urlfirst){
                this.urlprevious=''
                this.urlfirst=''
            }
            if(this.urlprevious===this.urlfirst){
                this.urlprevious=''
            }
            if(this.urllast===this.urlnext){
                this.urlnext=''
            }
            if(this.urlcurrent===this.urllast){
                this.urllast=''
                this.urlnext=''
            }
        }
    }
    render() {
        this.seturls()       
        return(
                      <div className="col-md-12">
                    <div style={{float:'right',marginTop:'5px'}} className="dataTables_paginate paging_simple_numbers">
                    {
                        this.props.loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) :
                        
                        (  
                        <ul className="pagination">
                            <Bouton objectpatient={this.props.objectpatient}  url={this.urlfirst}  libelle="Premier"/>
                            <Bouton objectpatient={this.props.objectpatient}  url={this.urlprevious}/>
                            <Bouton objectpatient={this.props.objectpatient}  url={this.urlcurrent} libelle="Current"/>                            
                            <Bouton objectpatient={this.props.objectpatient}  url={this.urlnext}/>
                            <Bouton objectpatient={this.props.objectpatient}  url={this.urllast} libelle="Dernier"/>
                        </ul>
                        
                            )}


                </div>
            </div>
        )
        }       
}
export default BlockNavigationPatient;
