@extends('layouts.backend-layout')

@section('title')
    Send Message
@endsection

@section('breadcrumb')
    Send Message
@endsection

@section('content')
        @if($status === false)
            <h3>You have to wait for next Day.</h3>
            <h3>Today You have already sent messages to members.</h3>
        @else
    <form method="post" action="{{ route('createMessage') }}" enctype="multipart/form-data"
          class="needs-validation"
          novalidate autocomplete="off">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                <strong>Success -</strong> {{ session('success') }}
            </div>
        @endif

        @if(session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                <strong>Warning -</strong> {{ session('danger') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label" for="validationCustom01">Send to</label>

            <select class="form-select mb-3" name="send_to" required>
{{--                <option selected value="">Select Members</option>--}}
                {{--<option value="active_members">Active Members</option>--}}
                <option value="morning">Morning Shift Members</option>
                <option value="evening">Evening Shift Members</option>
                <option value="night">Night Shift Members</option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter title.
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="validationCustom03">Schedule Period</label>
            <select class="form-select mb-3" name="schedule_period" required>
                <option selected value="">Select Schedule</option>
                <option value="daily">Daily</option>
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter schedule period.
            </div>
        </div>
        <hr/>
        <h6>For Text Message</h6>

        <div class="mb-3">
            <label class="form-label" for="validationCustom02">Test Message</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Enter text message"
                   name="text_message" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please enter text message.
            </div>
        </div>
        <hr/>
        {{--            <h6>For Image Message</h6>--}}

        {{--            <div class="mb-3">--}}
        {{--                <label class="form-label" for="validationCustom02">Image Message</label>--}}
        {{--                <input type="file" class="form-control" id="validationCustom02" placeholder="Enter image message"--}}
        {{--                       name="message_url">--}}
        {{--                <div class="valid-feedback">--}}
        {{--                    Looks good!--}}
        {{--                </div>--}}
        {{--                <div class="invalid-feedback">--}}
        {{--                    Please enter image message.--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="mb-3">--}}
        {{--                <label class="form-label" for="validationCustom02">Image Caption</label>--}}
        {{--                <input type="text" class="form-control" id="validationCustom02"--}}
        {{--                       placeholder="Enter image message caption"--}}
        {{--                       name="message_caption">--}}
        {{--                <div class="valid-feedback">--}}
        {{--                    Looks good!--}}
        {{--                </div>--}}
        {{--                <div class="invalid-feedback">--}}
        {{--                    Please enter image message caption.--}}
        {{--                </div>--}}
        {{--            </div>--}}

        <button class="btn btn-primary" type="submit">Schedule Now</button>
    </form>
        @endif
@endsection
