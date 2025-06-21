<div>
    @if (session('success') || session('error'))
        <div aria-live="polite" aria-atomic="true"
            style="position: fixed; top: 1rem; right: 1rem; min-width: 300px; z-index: 9999;">
            <div class="toast align-items-center {{ session('success') ? 'bg-success' : 'bg-danger' }} text-white border-0 show"
                role="alert" id="sessionToast" data-delay="3000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') ?? session('error') }}
                    </div>
                    <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close"
                        style="background: none; border: none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var toastEl = document.getElementById('sessionToast');
                if (toastEl) {
                    // Bootstrap 4/5 toast initialization
                    $(toastEl).toast({
                        delay: 3000
                    });
                    $(toastEl).toast('show');
                }
            });
        </script>
    @endif
</div>
