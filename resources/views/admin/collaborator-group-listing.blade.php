@extends('admin-layout')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Collaborator Group Listing</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::to('/') }}/admin/dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Collaborator Group Listing</strong>
            </li>            
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">  
  <div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Collaborator Group Listing</h5>                  
              </div>
              <div class="ibox-content">                  
                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                          <tr>

                              <th></th>
                              <th>Sr no</th>
                              <th colspan="2">Group Owner</th>                              
                              <th>Group Name</th>
                              <th>Wedding</th>
                              <th>Members</th>                              
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($collaborator_group_listing as $key => $value)

                            <tr>                            
                              <td>
                                <div class="icheckbox_square-green checked" style="position: relative;"><input type="checkbox" checked="" class="i-checks" name="input[]" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                              </td>
                              <td> {{ $value->sr_no }} </td>
                              <td> 
                                @if(strpos($value->user_image,'graph.facebook.com') !== false)
                                  <div class="my-img-box"> <img alt="user_image" src="{{ $value->user_image }}"> </div> 
                                @else
                                  <div class="my-img-box"> <img alt="user_image" src="{{ $value->user_image }}/50"> </div> 
                                @endif                                
                              </td>
                              <td> {{ $value->user_name }} </td>
                              <td> {{ $value->name }} </td>                              
                              <td> 
                                @if(!empty($value->wedding_name))                                         
                                  <a class="btn btn-warning m-r-sm" href="{{ URL::to('/') }}/admin/wedding-details/{{ $value->wedding_id }}" role="button">{{ $value->wedding_name }}</a>                                 
                                @endif                                
                              </td>
                              <td> 
                                <a class="btn btn-primary m-r-sm" href="{{URL::to('/')}}/admin/collaborator-group-members/{{$value->id}}" role="button">Members</a> 
                              </td>
                            </tr>  

                          @endforeach
                                                  
                          </tbody>
                      </table>
                  </div>

              </div>
          </div>
      </div>

  </div>

  @if(!empty($collaborator_group_listing))
  <div class="row">    
    <div class="col-sm-12">
      <div class="dataTables_paginate paging_simple_numbers pull-right" id="editable_paginate">
        <ul class="pagination">
          @if($collaborator_group_listing[0]->page_no == 0)
            <li class="paginate_button previous disabled" id="editable_previous">
              <a href="#" aria-controls="editable" data-dt-idx="0" tabindex="0">Previous</a>
            </li>
          @else
            <li class="paginate_button previous" id="editable_previous">
              <a href="{{ URL::to('/') }}/admin/collaborator-group-listing/{{ $collaborator_group_listing[0]->keyword }}/{{ $collaborator_group_listing[0]->page_no - 1 }}" aria-controls="editable" data-dt-idx="0" tabindex="0">Previous</a>
            </li>
          @endif          
          @for($i=0; $i<$collaborator_group_listing[0]->total_pages; $i++) 
            <li class="paginate_button active">
              <a href="{{ URL::to('/') }}/admin/collaborator-group-listing/{{ $collaborator_group_listing[0]->keyword }}/{{ $i }}" aria-controls="editable" data-dt-idx="1" tabindex="0"> {{ $i+1 }} </a>
            </li>
          @endfor     
          @if($collaborator_group_listing[0]->page_no == $collaborator_group_listing[0]->total_pages - 1)
            <li class="paginate_button next disabled" id="editable_next">
              <a href="#" aria-controls="editable" data-dt-idx="7" tabindex="0">Next</a>
            </li>
          @else
            <li class="paginate_button next" id="editable_next">
              <a href="{{ URL::to('/') }}/admin/collaborator-group-listing/{{ $collaborator_group_listing[0]->keyword }}/{{ $collaborator_group_listing[0]->page_no + 1 }}" aria-controls="editable" data-dt-idx="7" tabindex="0">Next</a>
            </li>
          @endif                
        </ul>
      </div>
    </div>
  </div>
  @endif

</div>

@stop