<div class="modal-dialog">
  <div class="modal-content" id="modal-content">
    {{ Form::open(array('url' => 'users/create', "id" => "register-form")) }}
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">{{ $title }}</h4>
    </div>
    <div class="modal-body">
      <div class="form-group" id="email_div">
        <label>Email</label>
        {{ Form::text("email", "", array("class" => "form-control", "placeholder" => "Email")) }}
      </div>
      <div class="form-group" id="full_name_div">
        <label>Full Name</label>
        {{ Form::text("full_name", "", array("class" => "form-control", "placeholder" => "Full name")) }}
      </div>
      <div class="form-group" id="password_div">
        <label>Password</label>
        {{ Form::password("password", array("class" => "form-control", "placeholder" => "Password")) }}
      </div>
      <div class="form-group" id="password_confirmation_div">
        <label>Confirm Password</label>
        {{ Form::password("password_confirmation", array("class" => "form-control", "placeholder" => "Confirm Password")) }}
      </div>
      {{ Form::close() }}
      <div class="modal-footer">
        <div class="btn-group btn-group-justified">
          <a id="create_user" href="#" class="btn btn-primary" data-loading-text="Saving...">Submit</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $("#error-message").hide();
  $(document).ready(function() {
    $("#create_user").click(function(e) {
      $("#create_user").button('loading');
      $('span[class="help-block"]').remove();
      $('div').removeClass('has-error');
      $.ajax({
        url: "{{ URL::to('users/create') }}",
        method: "POST", 
        data: $("#register-form").serialize(),
        success: function(resp) {
          if(resp.result === 'error') {
            for(var key in resp['messages']) {
              var input_div = '#' + key + '_div';
              $(input_div).addClass('has-error');
              $(input_div).append('<span class="help-block">' + resp['messages'][key] + '<span>');
                }
              } else {
                window.location = "{{ URL::to('/') }}"
              }
            }, 
            complete: function() {
              $("#create_user").button('reset');
            }
          });
          e.preventDefault();
          return false; 
        })
      });
    </script>
