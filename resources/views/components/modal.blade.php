@props(['id', 'title', 'submit' => null])

<!-- Open the modal using ID.showModal() method -->
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">{{ $title }}</h3>
        {{ $slot }}
        <div class="modal-action">
            <button type="submit" class="btn btn-primary">{{ $submit }}</button>
            <button type="button" onclick="editModal.close()" class="btn text-gray border-gray">Close</button>
        </div>
    </div>
</dialog>
