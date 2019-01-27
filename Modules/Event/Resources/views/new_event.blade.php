@extends('family::layouts.master')

@section('page-title')
{{'Family Application Page'}}
@endsection

@section('page-content')
 <div class="row" id="event">
    <div class="col-sm-12">
        <div class="card-box">
            <form id="wizard-validation-form" action="{{route('event.register')}}" method="POST">
                @csrf
                <div>
                    <h3>Event Information</h3>
                    <section>
                        
                            <div class="col-md-3">
                                <strong>Event Information</strong>
                                    <p class="muted">Here is the section where you will specify the most important information about the event please specific.</p>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="value">Event Type</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="type" id="inputTitle" class="col-md-6 form-control">
                                            <option value=""></option>
                                            <option value="Marriage">Marriage</option>
                                            <option value="Birth">Birth</option>
                                            <option value="Death">Death</option>
                                        </select>
                                            @if ($errors->has('type'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="value">Event  Date</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="date" class="form-control">
                                            @if ($errors->has('date'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="value">Event Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="address" class="form-control" placeholder="Enter full address of the event">
                                            @if ($errors->has('address'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="value">Event Start At</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="time" name="start" class="form-control" placeholder="Enter the time that the event  will end" />
                                            @if ($errors->has('start'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('start') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="value">Event End At</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="time" name="end" class="form-control" placeholder="Enter the time that the event  will end" />
                                            @if ($errors->has('end'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('end') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div><br>
                            </div>
                        
                    </section>
                    <h3>Describe Your Event</h3>
                    <section>
                        
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>What to Announce ?</strong>
                                    <p class="muted">Please write in precise a simple description of the event in the language that most of the family members and relatives can understand.</p>
                                </div>
                                <div class="col-md-9">
                                    <label for="inputTitle">Write What To Announce</label>
                                    <textarea name="message" id="" cols="30" rows="6" class="form-control" placeholder="Write in less than or 100 words"></textarea>
                                        @if ($errors->has('message'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                        @endif
                                    <div class="separator"></div>
                                </div>
                            </div>
                        
                    </section>
                    <h3>Please Read Me</h3>
                    <section>
                        <div class="form-group clearfix">
                            <div class="col-lg-12">
                                <input id="acceptTerms-2" name="acceptTerms2" type="checkbox" class="required">
                                <label for="acceptTerms-2">Note that what you write as the message will be shared to all your related families including all families from your wife family.
                                </label>
                            </div>
                            <input type="submit" class="btb btn-primary" value="Register Event">
                        </div>

                    </section>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
