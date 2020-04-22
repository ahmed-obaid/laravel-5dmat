 

{{csrf_field()}}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">user Name</label>
                          <input value='' name='name' type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">email</label>
                          <input value='{{isset($row)?$row->email:""}}' name='email' type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">password</label>
                          <input value=' '  name='password' type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">status users</label>
                          <select name='group'class="form-control" >
                            <option value='user'{{isset($row)&& $row->group=="user" ?'selected':''}} >user</option>
                            <option value='admin'{{isset($row)&& $row->group=="admin" ?'selected':''}}>admin</option>
                            
                          </select>
                          
                        </div>
                      </div>
                    </div>






 