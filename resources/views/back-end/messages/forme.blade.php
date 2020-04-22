 

  
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> Name</label>
                          <input   value='{{isset($row)?$row->name:""}}' type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-10">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">email</label>
                          <input    value='{{isset($row)?$row->email:""}}' type="email" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class='row'>
                      <div class="col-md-10">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">message</label>
                          <textarea rows='8'  name='message' type="text" class="form-control">

                          {{isset($row)?$row->message:""}}
                          </textarea>
                        </div>
                      </div>
                    </div>
                    
                    <hr>

                  <h2>replay on message</h2>
              <form action='{{route("message.replay" ,["id"=>$row->id])}}' method='post'>
                 
                  {{csrf_field()}}
                  <div class='row'>
                      <div class="col-md-10">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">message</label>
                          <textarea rows='8' name='replay' type="text" class="form-control">

                          
                          </textarea>
                        </div>
                      </div>
                    </div>
                       <button type="submit" class="btn btn-primary pull-right">replay message</button>
                        <div class="clearfix"></div>
               </form>





 