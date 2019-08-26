StallionMaterialObj = null;
WebShareObj = null;

window.addEventListener('load', function() {
    const sharebutton = document.querySelector('#sharebutton');
    StallionMaterialObj = new StallionMaterial();
    WebShareObj = new WebShare(sharebutton)

    $('#secondary, #primary').theiaStickySidebar();
  });
  