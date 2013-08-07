<div id="signin-register">
  {{ Form::open(array('url' => '/users/authenticate', 'id' => 'signin-form')) }}
  <div class="col-lg-5 panel">
    <div class="panel-heading"><b>Sign in</b></div>
    <div class="form-group">
      <label>Email address</label>
      {{ Form::text("email", "", array("class" => "form-control", "placeholder" => "Email")) }}
    </div>
    <div class="form-group">
      <label>Password</label>
      {{ Form::password("password", array("class" => "form-control", "placeholder" => "Password")) }}
    </div>
    <div class="checkbox">
      <label>
        {{ Form::checkbox('remember_me', '') }} Remember me
      </label>
    </div>
    <div class="btn-group btn-group-justified">
      <a data-loading="Signing in...." id="submit-signin" href="#" class="btn btn-primary">Submit</a>
    </div>
  </div>
  {{ Form::close() }}
</div>
<script>
  $("#error-message").hide();
  $(document).ready(function() {
    $("#submit-signin").click(function(e) {
      $("#submit-signin").button('loading'); 
      $("#error-message").hide();
      $.ajax({
        url: '/users/authenticate',
        method: 'POST',
        data: $("#signin-form").serialize(),
        success: function(resp) {
          if(resp['result'] === 'error') {
            var messages = ""; 
            for(var key in resp['messages']) {
              messages += resp['messages'][key] + "</br>";
            }
            $("#messages").html(messages);
            $("#error-message").show();
            } else {
            alert(resp['result']);       
          }
        },
        complete: function() {
          $("#submit-signin").button('reset'); 
        }
      })
      e.preventDefault();
      return false; 
    })
  });
</script>
