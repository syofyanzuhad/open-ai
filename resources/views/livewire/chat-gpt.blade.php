<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ChatGPT</div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control text-center" wire:model="prompt" placeholder="Ask something...">

                            @error('prompt') <span class="text-danger">{{ $message }}</span> @enderror

                            <button wire:click="ask" class="btn btn-primary mt-3">Send</button>

                            <div class="mt-3">
                                @if ($response)
                                    <div class="alert alert-success" role="alert">
                                        {{ $response }}
                                    </div>
                                @endif

                                @if ($error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
