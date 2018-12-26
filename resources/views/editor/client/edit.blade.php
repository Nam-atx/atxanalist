@extends('editor.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Candidate</div>
                <div class="card-body1">
                    <form class="form-horizontal" method="post" action="{{route('editor.client.update',$client->id)}}" id="client_validate">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="PUT">
                     <div class="control-group row-fluid">
                       <div class="span6">
                         
                          <label class="control-label">Name</label>
                          <div class="controls {{ $errors->has('name') ? ' is-invalid' : '' }}">
                            <input type="text" name="name" value="{{$client->name}}" >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                          </div>
                        
                       </div>
                       <div class="span6">
                         
                          <label class="control-label">Contact</label>
                            <div class="controls {{ $errors->has('contact') ? ' is-invalid' : '' }}">
                              <input type="text" name="contact" value="{{$client->contact}}" >
                              @if ($errors->has('contact'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('contact') }}</strong>
                                  </span>
                              @endif
                            </div>
                          
                       </div>
                     </div>

                     <div class="control-group row-fluid">
                       <div class="span6">
                         <label class="control-label">Designation</label>
                        <div class="controls {{ $errors->has('designation') ? ' is-invalid' : '' }}">
                          <input type="text" name="designation"  value="{{$client->designation}}" >
                          @if ($errors->has('designation'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('designation') }}</strong>
                              </span>
                          @endif
                        </div>

                       </div>
                       <div class="span6">
                         
                         <label class="control-label">Phone</label>
                          <div class="controls {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            <input type="text" name="phone"  value="{{$client->phone}}" >
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                          </div>

                       </div>
                     </div>


                     <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Email</label>
                          <div class="controls {{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <input type="email" name="email" value="{{$client->email}}" >
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                        <div class="span6">
                          <label class="control-label">Contact one</label>
                          <div class="controls {{ $errors->has('contact_1') ? ' is-invalid' : '' }}">
                            <input type="text" name="contact_1"  value="{{$client->contact_1}}" >
                            @if ($errors->has('contact_1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_1') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                     </div>

                     <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Designation One</label>
                        <div class="controls {{ $errors->has('designation_1') ? ' is-invalid' : '' }}">
                          <input type="text" name="designation_1" value="{{$client->designation_1}}" >
                          @if ($errors->has('designation_1'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('designation_1') }}</strong>
                              </span>
                          @endif
                        </div>

                        </div>

                        <div class="span6">
                          <label class="control-label">Phone One</label>
                          <div class="controls {{ $errors->has('phone_1') ? ' is-invalid' : '' }}">
                            <input type="text" name="phone_1" value="{{$client->phone_1}}" >
                            @if ($errors->has('phone_1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_1') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                     </div>

                     <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Email One</label>
                          <div class="controls {{ $errors->has('email_1') ? ' is-invalid' : '' }}">
                            <input type="email" name="email_1" value="{{$client->email_1}}" >
                            @if ($errors->has('email_1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email_1') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                        <div class="span6">
                          <label class="control-label">Contact Two</label>
                          <div class="controls {{ $errors->has('contact_2') ? ' is-invalid' : '' }}">
                            <input type="text" name="contact_2"  value="{{$client->contact_2}}" >
                            @if ($errors->has('contact_2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_2') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        
                     </div>


                     <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Designation Two</label>
                          <div class="controls {{ $errors->has('designation_2') ? ' is-invalid' : '' }}">
                            <input type="text" name="designation_2" value="{{$client->designation_2}}" >
                            @if ($errors->has('designation_2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation_2') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                        <div class="span6">

                          <label class="control-label">Phone Two</label>
                          <div class="controls {{ $errors->has('phone_2') ? ' is-invalid' : '' }}">
                            <input type="text" name="phone_2" value="{{$client->phone_2}}" >
                            @if ($errors->has('phone_2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_2') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>
                        
                     </div>



                    <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Email Two</label>
                          <div class="controls {{ $errors->has('email_2') ? ' is-invalid' : '' }}">
                            <input type="email" name="email_2" value="{{$client->email_2}}" >
                            @if ($errors->has('email_2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email_2') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                        <div class="span6">
                          <label class="control-label">Fax</label>
                          <div class="controls {{ $errors->has('fax') ? ' is-invalid' : '' }}">
                            <input type="text" name="fax" value="{{$client->fax}}" >
                            @if ($errors->has('fax'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fax') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>
                        
                    </div>


                    <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">City</label>
                          <div class="controls {{ $errors->has('city') ? ' is-invalid' : '' }}">
                            <input type="text" name="city" value="{{$client->city}}" >
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                        <div class="span6">

                          <label class="control-label">State</label>
                          <div class="controls {{ $errors->has('state') ? ' is-invalid' : '' }}">
                            <input type="text" name="state" value="{{$client->state}}" >
                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>
                        
                    </div>


                    <div class="control-group row-fluid">
                        <div class="span6">

                          <label class="control-label">Zipcode</label>
                          <div class="controls {{ $errors->has('zipcode') ? ' is-invalid' : '' }}">
                            <input type="text" name="zipcode"  value="{{$client->zipcode}}" >
                            @if ($errors->has('zipcode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('zipcode') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                        <div class="span6">

                          <label class="control-label">Requirement</label>
                          <div class="controls {{ $errors->has('requirement') ? ' is-invalid' : '' }}">
                            <textarea name="requirement" > {{$client->requirement}} </textarea>
                            @if ($errors->has('requirement'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('requirement') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>
                        
                    </div>


                    <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Opening Date</label>
                          <div class="controls {{ $errors->has('opening_date') ? ' is-invalid' : '' }}">
                            <input type="date" name="opening_date"  value="{{$client->opening_date}}" >
                            @if ($errors->has('opening_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('opening_date') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                        <div class="span6">
                          <label class="control-label">DND</label>
                          <div class="controls {{ $errors->has('dnd') ? ' is-invalid' : '' }}">
                            <input type="checkbox" name="dnd"  {{($client->dnd)?'checked':''}}>
                            @if ($errors->has('dnd'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dnd') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                    </div>
                    

                    <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Portal</label>
                          <div class="controls {{ $errors->has('portal') ? ' is-invalid' : '' }}">
                            <select id="portal" name="portal" class="form-control">
                                <option value="">-- select --</option>
                                <option value="School Spring" {{($client->portal=='School Spring')?'selected':''}}>School Spring</option>
                                <option value="K12 Job Spot" {{($client->portal=='K12 Job Spot')?'selected':''}}>K12 Job Spot</option>
                                <option value="US Reap" {{($client->portal=='US Reap')?'selected':''}}>US Reap</option>
                                <option value="TASA" {{($client->portal=='TASA')?'selected':''}}>TASA</option>
                                <option value="ED Join" {{($client->portal=='ED Join')?'selected':''}}>ED Join</option>
                                <option value="Teachers-Teachers" {{($client->portal=='Teachers-Teachers')?'selected':''}}>Teachers-Teachers</option>
                                <option value="NJ Hire" {{($client->portal=='NJ Hire')?'selected':''}}>NJ Hire</option>
                                <option value="NJ School Job" {{($client->portal=='NJ School Job')?'selected':''}}>NJ School Job</option>
                                <option value="Indeed" {{($client->portal=='Indeed')?'selected':''}}>Indeed</option>
                                <option value="Top School" {{($client->portal=='Top School')?'selected':''}}>Top School</option>
                                <option value="IL Jobs Banks" {{($client->portal=='IL Jobs Banks')?'selected':''}}>IL Jobs Banks</option>
                              </select>
                            @if ($errors->has('portal'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('portal') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <div class="span6">

                          <label class="control-label">Profile</label>
                          <div class="controls {{ $errors->has('profile') ? ' is-invalid' : '' }}">
                            <select id="profile" name="profile" class="form-control">
                                <option value="">-- select --</option>
                                <option value="SLP" {{($client->profile=='SLP')?'selected':''}}>SLP</option>
                                <option value="SLP-A" {{($client->profile=='SLP-A')?'selected':''}}>SLP-A</option>
                                <option value="SLP" {{($client->profile=='SLP')?'selected':''}}>SLP</option>
                                <option value="Psych" {{($client->profile=='Psych')?'selected':''}}>Psych</option>
                                <option value="SET" {{($client->profile=='SET')?'selected':''}}>SET</option>
                                <option value="SET-A" {{($client->profile=='SET-A')?'selected':''}}>SET-A</option>
                                <option value="RSP" {{($client->profile=='RSP')?'selected':''}}>RSP</option>
                                <option value="Para-Pro" {{($client->profile=='Para-Pro')?'selected':''}}>Para-Pro</option>
                                <option value="SN" {{($client->profile=='SN')?'selected':''}}>SN</option>
                                <option value="PT" {{($client->profile=='PT')?'selected':''}}>PT</option>
                                <option value="PTA" {{($client->profile=='PTA')?'selected':''}}>PTA</option>
                                <option value="OT" {{($client->profile=='OT')?'selected':''}}>OT</option>
                                <option value="COTA" {{($client->profile=='COTA')?'selected':''}}>COTA</option>
                                <option value="SW" {{($client->profile=='SW')?'selected':''}}>SW</option>
                              </select>
                            @if ($errors->has('profile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('profile') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>
                    </div>

                    <div class="control-group row-fluid">
                        <div class="span6">

                          <label class="control-label">Start Date</label>
                          <div class="controls {{ $errors->has('start_date') ? ' is-invalid' : '' }}">
                            <input type="date" name="start_date"  value="{{$client->start_date}}" >
                            @if ($errors->has('start_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>

                        <div class="span6">
                          <label class="control-label">Subject</label>
                          <div class="controls {{ $errors->has('subject') ? ' is-invalid' : '' }}">
                            <input type="text" name="subject" value="{{$client->subject}}" >
                            @if ($errors->has('subject'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                    </div>


                    <div class="control-group row-fluid">
                        <div class="span6">
                          <label class="control-label">Weblink</label>
                          <div class="controls {{ $errors->has('weblink') ? ' is-invalid' : '' }}">
                            <input type="text" name="weblink" value="{{$client->weblink}}" >
                            @if ($errors->has('weblink'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('weblink') }}</strong>
                                </span>
                            @endif
                          </div>

                        </div>
                        <div class="span6">
                          <label class="control-label">Update Required</label>
                          <div class="controls">
                            <input type="checkbox" name="update_required"  {{($client->update_required)?'checked':''}}>
                            @if ($errors->has('update_required'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('update_required') }}</strong>
                                </span>
                            @endif
                            
                          </div>
                        </div>
                        
                    </div>

                    <div class="control-group row-fluid">
                      <div class="form-actions">
                          <input type="submit" value="Save" class="btn btn-success">
                      </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
