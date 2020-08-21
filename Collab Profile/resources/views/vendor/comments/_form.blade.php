<div class="card">
    <div class="card-body">
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />

            {{-- Guest commenting --}}
            @if(isset($guest_commenting) and $guest_commenting == true)
                <div class="form-group">
                    <label for="message">Enter your name here:</label>
                    <input type="text" class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                    @error('guest_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Enter your email here:</label>
                    <input type="email" class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                    @error('guest_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <div class="form-group">
                <label style="font-size:14px" for="message">Comment:</label>
                <div class="row">
                    <div style="" class="col-11 CommentDiv">
                        <textarea style="border: 1px solid black; height: 40px" class="form-control @if($errors->has('message')) is-invalid @endif" name="message" ></textarea>
                        <div class="invalid-feedback">
                            Your message is required.
                        </div>
                    </div>
                    <div style="padding-right:0px;padding-left:0px;" class="col-1">
                        <button style="color:black; border-color:black" type="submit" class="cmd_send btn btn-sm btn-outline-dark text-uppercase">
                            <i style="font-size: 18px;" class="cmd_send_icon p-1 pt-2 far fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<br />