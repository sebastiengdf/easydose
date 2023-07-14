// ./assets/js/components/Users.js
    
import React, {Component} from 'react';
import axios from 'axios';
    
class Bodyparts extends Component {
    constructor() {
        super();
        this.state = { bodyparts: [], loading: true};
    }
    
    componentDidMount() {
        this.getBodyparts();
    }
    
    getBodyparts() {
       axios.get(`http://localhost:81/api/bodyparts`).then(bodyparts => {
           this.setState({ bodyparts: bodyparts.data, loading: false})
       })
    }
    
    render() {
        const loading = this.state.loading;
        return(
            <div>
                <section className="row-section">
                    <div className="container">
                        <div className="row">
                            <h2 className="text-center"><span>List of Bodyparts</span>Created with <i
                                className="fa fa-heart"></i> by sebgdf</h2>
                        </div>
                        {loading ? (
                            <div className={'row text-center'}>
                                <span className="fa fa-spin fa-spinner fa-4x"></span>
                            </div>
                        ) : (
                            <div className={'row'}>
                                { console.log(this.state.bodyparts['hydra:member']) ,
                                  this.state.bodyparts['hydra:member'].map(bodypart =>
                                    <div className="col-md-10 offset-md-1 row-block" key={bodypart.id}>
                                        <ul id="sortable">
                                            <li>
                                                <div className="media">                                                    
                                                    <div className="media-body">
                                                        <h4>{bodypart.dcmname}</h4>
                                                        <p>{bodypart.easydosename}</p>
                                                    </div>                                                    
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                )}
                            </div>
                        )}
                    </div>
                </section>
            </div>
        )
    }
}
export default Bodyparts;