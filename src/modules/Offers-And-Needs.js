import $ from 'jquery';

class OffersAndNeeds{
    constructor(){
        this.links = $('.tomc-community-offers-and-needs-link');
        this.events();
    }

    events(){
        this.links.on('click', this.animateSpan.bind(this));
    }

    
    animateSpan(e){
        $(e.target).addClass('contracting');
    }

}

export default OffersAndNeeds;