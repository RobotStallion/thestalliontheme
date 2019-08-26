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