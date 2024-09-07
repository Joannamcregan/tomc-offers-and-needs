import $ from 'jquery';

class OffersAndNeeds{
    constructor(){
        this.links = $('.tomc-community-offers-and-needs-link');
        this.postNeedSpan = $('#tomc-post-need');
        this.addNeedOverlay = $('#tomc-add-need-overlay');
        this.addNeedOverlayCloseButton = $('#tomc-add-need-overlay-close');
        this.addNeedBody = $('#tomc-add-event-overlay-body');
        this.addNeedContinue = $('#tomc-add-need-continue');
        this.addNeedTitleInput = $('#tomc-new-need-title');
        this.noTitleError = $('#tomc-add-event-no-title-error');
        this.events();
        this.needTitle;
    }

    events(){
        this.links.on('click', this.animateSpan.bind(this));
        this.postNeedSpan.on('click', this.openAddNeedOverlay.bind(this));
        this.addNeedOverlayCloseButton.on('click', this.closeAddNeedOverlay.bind(this));
        this.addNeedContinue.on('click', this.setTitle.bind(this));
    }

    
    animateSpan(e){
        $(e.target).addClass('contracting');
    }

    openAddNeedOverlay(e){
        $(e.target).addClass('contracting');
        this.addNeedOverlay.removeClass('hidden');
        this.addNeedOverlay.addClass('search-overlay--active');
    }

    closeAddNeedOverlay(){
        this.addNeedBody.html('');
        this.addNeedOverlay.removeClass('search-overlay--active');
        this.addNeedOverlay.addClass('hidden');
    }
    setTitle(){
        if (this.addNeedTitleInput.val() != ''){
            this.noTitleError.addClass('hidden');
            this.needTitle = this.addNeedTitleInput.val();
            console.log(this.needTitle);
        } else {
            this.noTitleError.removeClass('hidden');
        }
    }

}

export default OffersAndNeeds;