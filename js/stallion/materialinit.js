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
