import React, {Component} from 'react';


class BoutonSearch extends Component {
    constructor() {
        super();
    }

    render() {     
        return(
            <button type="button" className="btn btn-primary" data-toggle="modal" data-target="#SearchModal">
                Rechercher
            </button>       
    )

}       
}
export default BoutonSearch;