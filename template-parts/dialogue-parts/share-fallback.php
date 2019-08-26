<div class="mdc-dialog"
     role="alertdialog"
     aria-modal="true"
     aria-labelledby="my-dialog-title"
     aria-describedby="my-dialog-content">
  <div class="mdc-dialog__container">
    <div class="mdc-dialog__surface">
      <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
      <h2 class="mdc-dialog__title" id="my-dialog-title"><!--
     -->Share<!--
   --></h2>
      <div class="mdc-dialog__content" id="my-dialog-content">
        <ul class="mdc-list mdc-list--avatar-list">
          <li class="mdc-list-item" tabindex="0" data-mdc-dialog-action="copy">
            <span class="mdc-list-item__text">Copy Link</span>
          </li>
          <li class="mdc-list-item" data-mdc-dialog-action="facebook">
            <span class="mdc-list-item__text">Facebook</span>
          </li>
          <!-- ... -->
        </ul>
      </div>
    </div>
  </div>
  <div class="mdc-dialog__scrim"></div>
</div>