<!-- You can open the modal using ID.showModal() method-->

<dialog id="{{ $id }}" class="modal">
  <div class="modal-box w-11/12 max-w-5xl">
    <h3 id="success-modal-heading" class="text-lg font-bold">{{ $heading }}</h3>
    <p id="success-modal-text" class="py-4">{{ $text }}</p>
    <div class="modal-action">
      <form method="dialog">
        <a id="success-modal-link" href="{{ $link }}" class="btn">{{ $action }}</a>
      </form>
    </div>
  </div>
</dialog>