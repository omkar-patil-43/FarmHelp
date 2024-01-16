<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient Email</label>
                        <input type="text" class="form-control" value="<?php echo $data['email']; ?>" id="email">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Your Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Subject</label>
                        <input type="email" class="form-control" id="subject">

                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message</label>
                        <textarea class="form-control" id="body"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="button" onclick="sendEmail()" value="Send An Email" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>