import React, {Component} from 'react';


class PatientCard extends Component {

    setrightcorner(){
        if (this.props.patient.sex=="FEMME"){
            this.classnamecorner="rightcornerwoman text-right background"
            }
        else{
            if (this.props.patient.age<=15)
                this.classnamecorner="rightcornerpedia text-right background"
            else
                this.classnamecorner="rightcornerauto text-right background"
            }
    }
    
    setcivilite(){
        if (this.props.patient.sex<="FEMME"){
            this.civilite="Mme "
            this.nele="Née le :"
            }else{
            this.civilite="Mr "
            this.nele="Né le :"
            }
    }
    setNrdalerte(){
        if (this.props.patient.nrdhavealerte)
            this.nrdalerte=<i className="fas fa-exclamation red-text"></i>
        else
            this.nrdalerte=''
    }
    setDosealerte(){
        if (this.props.patient.sumhavealerte)
            this.doseclassName="text-center font-weight-bold"
        else
            this.doseclassName="text-center font-weight-bold"
    }
    render() {
        this.setrightcorner()
        this.setcivilite()
        this.setNrdalerte()
        this.setDosealerte()
        return (
            <div key={this.props.patient.id}>
                <div className="card weather-card mb-4 mt-4 mr-2 ml-2 content2" style={{width:"18.5em",height: "30em"}}>
                    
                    <div className={this.classnamecorner}>
                    </div>
                        <div className="text-right backgroundtextmanuel font-weight-bold">
                            Doses<br></br><h4 className={this.doseclassName}><strong>{this.props.patient.nbdoses}</strong></h4>
                        </div>	                       
                        <div className="card-body pb-1">                                                    
                            <div  className="d-flex flex-row">
                                                                                      
                                <h4 className="card-title font-weight-bold  ">{this.nrdalerte} {this.civilite}{this.props.patient.nom}</h4>                          
                            </div>                            
                            <div className="lead">
                            {this.props.patient.prenom} 
                            </div>
                            <div className="row card-text">
                                <div className="col-lg-5">
                                    <strong>{this.nele}</strong>
                                </div>
                                <div className="col-lg-7 pl-0 pr-0">
                                    <p>{new Date(this.props.patient.datenaissance).toLocaleDateString()}</p>
                                </div>
                                <div className="col-lg-5">
                                    <strong>N° IPP</strong>
                                </div>
                                <div className="col-lg-7 pl-0 pr-0">
                                    <p>{this.props.patient.numipp}</p>
                                </div>
                                <div className="col-lg-5">
                                    <strong>Id Easydose</strong>
                                </div>
                                <div className="col-lg-7 pl-0 pr-0">
                                    <p>{this.props.patient.idregional}</p>
                                </div>
                            </div>
                            <div className="progress md-progress">
          	                    <div className="progress-bar black" role="progressbar" style={{width: "40%"}} aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div className="row card-text">
                                <div className="col-lg-5">
                                    <strong>Conseils :</strong> 
                                </div>                                
                                <div className="col-lg-12">
                    
                                        Afin de limiter la dose reçue par le patient :
                                        Adaptez les constantes de l’examen à la morphologie du patient
                                        Limitez la zone d’exposition à la région d’intérêt (utilisez les diaphragmes ou réduisez au maximum les limites supérieures et inférieures d’exploration sur le « Scout View »)
                    
                                </div>
                            </div>

                            <div className="progress md-progress">
          	                    <div className="progress-bar black" role="progressbar" style={{width: "40%"}} aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div className="text-center">
                                <span className="waves-input-wrapper waves-effect waves-light">
                                    <input style={{border:"2px solid rgb(56,107,255) !important",color:"rgb(56,107,255) !important"}} type="button" className="btn btn-outline-primary waves-effect" onClick={() => getinfopatient(this.props.patient.id,"http://localhost/patient/infopatient/idtoreplace","http://localhost/patient/tdpatient/idtoreplace")} value="Consulter fiche patient">
                                    </input>
                                </span>
                            </div>

                        </div>
                    </div>
            </div>

        );
      }

}
export default PatientCard;