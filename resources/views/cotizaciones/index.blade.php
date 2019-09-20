@extends('layouts.app')
@section('titulo')
    Cotización 
@endsection
@section('content')
<form action="#" class="steps-validation wizard-circle">
  <!-- Step 1 -->
  <h6>General</h6>
  <fieldset>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="firstName4">First Name :</label>
          <input type="text" class="form-control required" id="firstName4">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="lastName4">Last Name :</label>
          <input type="text" class="form-control" id="lastName4">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="emailAddress7">Email Address :</label>
          <input type="email" class="form-control" id="emailAddress7">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="location3">Select City :</label>
          <select class="custom-select form-control" id="location3" name="location">
            <option value="">Select City</option>
            <option value="Amsterdam">Amsterdam</option>
            <option value="Berlin">Berlin</option>
            <option value="Frankfurt">Frankfurt</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="phoneNumber4">Phone Number :</label>
          <input type="tel" class="form-control" id="phoneNumber4">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="date4">Date of Birth :</label>
          <input type="date" class="form-control" id="date4">
        </div>
      </div>
    </div>
  </fieldset>
  <!-- Step 2 -->
  <h6>Cotizar</h6>
  <fieldset>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="proposalTitle4">Proposal Title :</label>
          <input type="text" class="form-control" id="proposalTitle4">
        </div>
        <div class="form-group">
          <label for="emailAddress8">Email Address :</label>
          <input type="email" class="form-control" id="emailAddress8">
        </div>
        <div class="form-group">
          <label for="videoUrl4">Video URL :</label>
          <input type="url" class="form-control" id="videoUrl4">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="jobTitle6">Job Title :</label>
          <input type="text" class="form-control" id="jobTitle6">
        </div>
        <div class="form-group">
          <label for="shortDescription4">Short Description :</label>
          <textarea name="shortDescription" id="shortDescription4" rows="4" class="form-control"></textarea>
        </div>
      </div>
    </div>
  </fieldset>
  <!-- Step 3 -->
  <h6>Check list</h6>
  <fieldset>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="eventName4">Event Name :</label>
          <input type="text" class="form-control" id="eventName4">
        </div>
        <div class="form-group">
          <label for="eventType4">Event Type :</label>
          <select class="custom-select form-control" id="eventType4" data-placeholder="Type to search cities"
          name="eventType4">
            <option value="Banquet">Banquet</option>
            <option value="Fund Raiser">Fund Raiser</option>
            <option value="Dinner Party">Dinner Party</option>
            <option value="Wedding">Wedding</option>
          </select>
        </div>
        <div class="form-group">
          <label for="eventLocation4">Event Location :</label>
          <select class="custom-select form-control" id="eventLocation4" name="location">
            <option value="">Select City</option>
            <option value="Amsterdam">Amsterdam</option>
            <option value="Berlin">Berlin</option>
            <option value="Frankfurt">Frankfurt</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Event Date - Time :</label>
          <div class='input-group'>
            <input type='text' class="form-control datetime" />
            <div class="input-group-append">
              <span class="input-group-text">
                <span class="ft-calendar"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="eventStatus4">Event Status :</label>
          <select class="custom-select form-control" id="eventStatus4" name="eventStatus">
            <option value="Planning">Planning</option>
            <option value="In Progress">In Progress</option>
            <option value="Finished">Finished</option>
          </select>
        </div>
        <div class="form-group">
          <label>Requirements :</label>
          <div class="c-inputs-stacked">
            <div class="d-inline-block custom-control custom-checkbox">
              <input type="checkbox" name="status4" class="custom-control-input" id="staffing4">
              <label class="custom-control-label" for="staffing4">Staffing</label>
            </div>
            <div class="d-inline-block custom-control custom-checkbox">
              <input type="checkbox" name="status4" class="custom-control-input" id="catering4">
              <label class="custom-control-label" for="catering4">Catering</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </fieldset>
  <!-- Step 4 -->
  <h6>Invoice</h6>
  <fieldset>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="meetingName4">Name of Meeting :</label>
          <input type="text" class="form-control" id="meetingName4">
        </div>
        <div class="form-group">
          <label for="meetingLocation4">Location :</label>
          <input type="text" class="form-control" id="meetingLocation4">
        </div>
        <div class="form-group">
          <label for="participants4">Names of Participants</label>
          <textarea name="participants" id="participants4" rows="4" class="form-control"></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="decisions4">Decisions Reached</label>
          <textarea name="decisions" id="decisions4" rows="4" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Agenda Items :</label>
          <div class="c-inputs-stacked">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agenda4" class="custom-control-input" id="item41">
              <label class="custom-control-label" for="item41">1st item</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agenda4" class="custom-control-input" id="item42">
              <label class="custom-control-label" for="item42">2nd item</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agenda4" class="custom-control-input" id="item43">
              <label class="custom-control-label" for="item43">3rd item</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agenda4" class="custom-control-input" id="item44">
              <label class="custom-control-label" for="item44">4th item</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="agenda4" class="custom-control-input" id="item45">
              <label class="custom-control-label" for="item45">5th item</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </fieldset>
</form>
@endsection

