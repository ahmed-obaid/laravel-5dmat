 

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
                          <textarea value='{{isset($row)?$row->desc:""}}' name='desc' type="text" class="form-control">
                          {{isset($row)?$row->desc:""}}
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">youtube url</label>
                          <input value='{{isset($row)?$row->youtube:""}}' name='youtube' type="url" class="form-control">
                          
                        </div>
                      </div>
                    </div>

                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">status video</label>
                          <select name='published'class="form-control" >
                            <option value='1'{{isset($row)&& $row->published==1 ?'selected':''}}>published</option>
                            <option value='0'{{isset($row)&& $row->published==0 ?'selected':''}} >hidden</option>
                          </select>
                          
                        </div>
                      </div>
                    </div>

                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> video category</label>
                          <select name='cat_id'class="form-control" >
                          @foreach($categories as $category)

                           <option value='{{$category->id}}'{{isset($row)&& $row->cat_id== $category->id ?'selected':''}}  >{{$category->name}} </option>

                          @endforeach
                           
                          </select>     
                          
                        </div>
                      </div>
                    </div>



                    


                    <div class='row'>
                      <div class="col-md-5">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">meta-keywords</label>
                          <input value='{{isset($row)?$row->meta_keywords:""}} '  name='meta_keywords' type="text" class="form-control">
                        </div>
                      </div>
                    </div>







                    <div class='row'>
                      <div class="col-md-5">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">meta-desc</label>
                          <input value='{{isset($row)?$row->meta_desc:""}} '  name='meta_desc' type="text" class="form-control">
                        </div>
                      </div>
                    </div>

                    
                    
                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> video skills</label>
                          <select name="skills[]" class="form-control" multiple   style='height:100px' >
                          @foreach($skills as $skill)

                           <option value='{{$skill->id}}'{{isset($skill_id)&&in_array($skill->id , $skill_id)?'selected':''}}  >  {{$skill->name}} </option>

                          @endforeach
                           
                          </select>     
                          
                        </div>
                      </div>
                    </div>

                    <div class='row'>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> video tags</label>
                          <select name="tags[]" class="form-control" multiple   style='height:100px' >
                          @foreach($tags as $tag)

                           <option value='{{$tag->id}}'{{isset($tag_id)&&in_array($tag->id , $tag_id)?'selected':''}}  >  {{$tag->name}} </option>

                          @endforeach
                           
                          </select>     
                          
                        </div>
                      </div>
                    </div>

                    <div class='row'>
                      <div class="col-md-5">
                        <div class=" ">
                          <label  >image</label>
                          <input value='{{isset($row)?$row->image:""}}'  name='image' type="file"/>
                        </div>
                      </div>
                    </div>






 