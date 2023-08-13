import React, {Component} from 'react';

class Bouton extends Component {
    constructor() {
        super();
    }
    setnumber(){
        this.number=this.props.url
        this.number=(''+this.number).split("=")[1]
        if(this.props.libelle!='' && this.props.libelle!=null &&  this.props.libelle!="Current")
            this.number=this.props.libelle
    }
    setactive(){        
        if(this.props.objectpatient.currentpage==this.props.url)
            this.classname="paginate_button page-item active"
        else
            this.classname="paginate_button page-item"
    }
    render() {
        this.setnumber();
        this.setactive();
            return(
                (this.number!='' && this.number!=null)?                
                <li className={this.classname}>
                    <a  onClick={() => this.props.objectpatient.getPatients(this.props.url)} className="page-link" style={{backgroundColor:'rgb(56,107,255)!important'}} href="#">{this.number}</a>
                </li>:null
            )
        
        }   
}
export default Bouton;
