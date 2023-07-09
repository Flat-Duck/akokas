<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>       --}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <label class="form-label">Add Your Reply</label>
                            <textarea id="content" class="form-control" rows="3" spellcheck="false" data-ms-editor="true"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <button data="0" class="btn btn-primary ms-auto" id="submit" data-bs-dismiss="modal">Reply</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal-report').on('click', '#submit', function(e) {
        var id = $(this).data('recordId');
        $("<input />").attr("type", "hidden")
        .attr("name", "content")
        .attr("value", $('#content').val() )
        .appendTo('#reply'+id);
        document.forms['reply'+id].submit();
    });

    $('#modal-report').on('show.bs.modal', function(e) {
        var data = $(e.relatedTarget).data();
        $('#submit', this).data('recordId', data.recordId);
    });
</script>
