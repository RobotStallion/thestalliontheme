class StallionMaterial {
  constructor() {
    this.addClassesChips();
    this.materialDrawerInit();
    this.addRipple();
    this.shareDialog = this.initShareDialogue();
  }

  //Boilerplate
  getShareDialogue(){
    return this.shareDialog;
  }

  /*
    Share Dialog Functions
  
  
  */

  openShareDialog(){
      this.shareDialog.open();
      this.listenShareEvent();
  }

  listenShareEvent(){
      this.shareDialog.listen('MDCDialog:closing', () => {
          console.log(event.detail.action);
          if(event.detail.action == 'copy'){
            WebShareObj.linkToClipboard();
          }else if(event.detail.action == 'facebook'){
            WebShareObj.linkToFacebook();
          }
          
      });
  }


  //Drawer Initialisation
  materialDrawerInit() {
    const drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector(".mdc-drawer"));

    const appBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.querySelector(".app-bar"));
    appBar.setScrollTarget(document.getElementById('content'));
    appBar.listen('MDCTopAppBar:nav', () => {
      drawer.open = !drawer.open;
    });
  }k

  //Chips Initialisation
  addClassesChips() {
    try{
    mdc.chips.MDCChipSet.attachTo(document.querySelector(".mdc-chip-set"));
    const cat_menu = document.querySelector("#cat-menu");
    cat_menu.className += " mdc-chip-set--choice mdc-chip-set";

    const cat_chips = cat_menu.querySelectorAll(".menu-item");
    const chips = [].map.call(cat_chips, function (el) {
      el.className += " mdc-chip";

    });
  }catch(e){
    console.log(e);
  }
  }

  addRipple() {
    const selector = '.mdc-card__primary-action';
    const ripples = [].map.call(document.querySelectorAll(selector), function (el) {
      return new mdc.ripple.MDCRipple(el);
    });
  }

  initShareDialogue() {
    const dialog = mdc.dialog.MDCDialog.attachTo(document.querySelector('.mdc-dialog'));
    return dialog;
  }

}

class WebShare {

  //Variable button reference
  constructor(button) {
    button.addEventListener('click', event => {
      this.sharelink();
    });
    this.window_url = document.querySelector('link[rel=canonical]') ? document.querySelector('link[rel=canonical]').href : document.location.href;
    this.window_title = document.title;

  }
  sharelink() {
    if (navigator.share) {
      navigator.share({
          title: this.window_title,
          url: this.window_url
        }).then(() => {
          console.log('Share Suceeded');
        })
        .catch(console.error);
    } else {
      console.log("Fallback to Share")
      StallionMaterialObj.openShareDialog();
    }
  }

  linkToClipboard() {

    navigator.clipboard.writeText(this.window_url)
      .then(() => {
        console.log('Text copied to clipboard');
      })
      .catch(err => {
        // This can happen if the user denies clipboard permissions:
        console.error('Could not copy text: ', err);
      });

  }

  linkToFacebook(){
    window.open('https://facebook.com/sharer/sharer.php?u='+this.window_url);

  }

}
StallionMaterialObj = null;
WebShareObj = null;

window.addEventListener('load', function() {
    const sharebutton = document.querySelector('#sharebutton');
    StallionMaterialObj = new StallionMaterial();
    WebShareObj = new WebShare(sharebutton)

    $('#secondary, #primary').theiaStickySidebar();
  });
  