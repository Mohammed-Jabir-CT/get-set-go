@props(['id', 'title'])

<!-- Open the modal using ID.showModal() method -->
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">{{ $title }}</h3>
        <div class="divider">   </div>
        <div class="modal-action">
            {{ $slot }}
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>
