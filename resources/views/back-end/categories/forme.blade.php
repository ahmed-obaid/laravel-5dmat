 

{{csrf_field()}}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> Name</label>
                          <input value='{{isset($row)?$row->name:""}}' name='name' type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">description</label>
                          <textarea value='{{isset($row)?$row->meta_desc:""}}' name='meta_desc' type="text" class="form-control">
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">meta-keywords</label>
                          <input value='{{isset($row)?$row->meta_keywords:""}} '  name='meta_keywords' type="text" class="form-control">
                        </div>
                      </div>
                    </div>






 