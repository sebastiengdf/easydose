import React, {Component} from 'react';


class PatientCard extends Component {
    render() {
        if (this.props.patient.sex=="FEMME"){
            this.classnamecorner="rightcornerwoman text-right background"
            }
        else{
            this.classnamecorner="rightcornerauto text-right background"
            }
        return (
            <div key={this.props.patient.id}>
                <div className="card weather-card mb-4 mt-4 mr-2 ml-2 content2" style={{width:"18.5em",height: "30em"}}>
                    
                    <div className={this.classnamecorner}>
                    </div>
                        <div className="text-right backgroundtextmanuel font-weight-bold">
                            E.S.R. Auto
                        </div>	                       
                        <div className="card-body pb-1">                                                    
                            <div  className="d-flex flex-row">                                                        
                                <h4 className="card-title font-weight-bold  ">{this.props.patient.nom}</h4>
                                                             
                            </div>
                            <div className="lead">
                            {this.props.patient.prenom} 
                            </div>
                        </div>
                    </div>
            </div>

        );
      }

}
export default PatientCard;