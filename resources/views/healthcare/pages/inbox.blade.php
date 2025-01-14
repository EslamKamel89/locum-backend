<div class="mt-0 tab-pane fade" id="inbox" role="tabpanel" aria-labelledby="setting-tab">
    <div class="mb-4 card" style="margin-bottom: 6rem !important">
        <div class="text-white card-header bg-primary">Inbox</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 bg-light border-end" style="height: 600px; overflow-y: auto;">
                    <div class="p-3 border-bottom">
                        <div class="fw-bold"><img
                                src="{{ asset( "https://randomuser.me/api/portraits/men/" . fake()->numberBetween( 1, 99 ) . ".jpg" ) }}"
                                alt="Profile Picture" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                            John Doe</div>
                        <div class="text-muted">Hey! How are you?</div>
                    </div>
                    <div class="p-3 border-bottom">
                        <div class="fw-bold"><img
                                src="{{ asset( "https://randomuser.me/api/portraits/men/" . fake()->numberBetween( 1, 99 ) . ".jpg" ) }}"
                                alt="Profile Picture" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                            Jane Smith</div>
                        <div class="text-muted">Are we still on for tomorrow?</div>
                    </div>
                    <div class="p-3 border-bottom">
                        <div class="fw-bold"><img
                                src="{{ asset( "https://randomuser.me/api/portraits/men/" . fake()->numberBetween( 1, 99 ) . ".jpg" ) }}"
                                alt="Profile Picture" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                            Michael Johnson</div>
                        <div class="text-muted">Can you send me the report?</div>
                    </div> <!-- Add more inbox items as needed -->
                </div>
                <div class="col-md-8 d-flex flex-column" style="height: 600px;">
                    <div class="p-3 text-dark bg-muted border-bottom"><img
                            src="{{ asset( "https://randomuser.me/api/portraits/men/" . fake()->numberBetween( 1, 99 ) . ".jpg" ) }}"
                            alt="Profile Picture" class="rounded-circle me-3" style="width: 40px; height: 40px;"> John
                        Doe</div>
                    <div class="p-3 overflow-auto flex-grow-1">
                        <div class="mb-3 d-flex"> <img
                                src="{{ asset( "https://randomuser.me/api/portraits/men/" . fake()->numberBetween( 1, 99 ) . ".jpg" ) }}"
                                alt="Profile Picture" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                            <div class="p-2 rounded flex-shrink-1 bg-light">
                                <div class="mb-1">Hey! How are you?</div>
                                <div>I've been wanting to catch up.</div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex"> <img
                                src="{{ asset( "https://randomuser.me/api/portraits/men/" . fake()->numberBetween( 1, 99 ) . ".jpg" ) }}"
                                alt="Profile Picture" class="rounded-circle me-3" style="width: 40px; height: 40px;">
                            <div class="p-2 rounded flex-shrink-1 bg-light">
                                <div>Sure, let's chat!</div>
                            </div>
                        </div> <!-- Add more chat messages as needed -->
                    </div>
                    <div class="p-3 border-top">
                        <div class="input-group"> <input type="text" class="form-control"
                                placeholder="Type a message..."> <button class="btn btn-primary"
                                type="button">Send</button> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>