import React, {Component} from 'react';

class Bouton extends Component {
    constructor() {
        super();
    } 
    render() {
        return(
            <li className="paginate_button page-item active">
                <a  onClick={() => this.props.objectpatient.getPatients(this.props.url)} className="page-link" style={{backgroundColor:'rgb(56,107,255)!important'}} href="#">{this.props.number}
                </a>
            </li>
        )
        }       
}
export default Bouton;
