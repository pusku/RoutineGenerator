@extends('layouts.app') 
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/chosenCss/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosenCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
@endsection

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="well">
                <h4> Room List</h4>
                <div class="table-fix">
                    <table class="table-edit" >
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            
                            <th>Off Day</th>
                            <th>actions</th>
                        </tr>
                        @foreach($data as $room)
                        <tr>
                            <td>{{$room->name}}</td>
                            <td>{{$room->type}}</td>
                            
                            <td>{{$room->offday}}</td>
                            <td>
                            <a href="{{route('deleteRoom',['id'=>$room->id])}}" class="btn btn-danger">X</a>
                            <a href="{{route('editRoom',['id'=>$room->id])}}" class="btn btn-info">E</a>
                            </td>
                        </tr>
                        @endforeach                
                    </table>
                </div>
            </div>
            <div class="text-center">
                
            </div>
            </div>
        <div class="col-md-5">
            <div class="well">
                @if(isset($roomEditInfo)) 
                    <h4>Update Room </h4>
                @else
                    <h4>Add Room </h4>
                @endif
                <form action="@if(isset($roomEditInfo)) {{ route ('updateRoom',['id'=>$roomEditInfo->id]) }} @else {{ route ('addRoom') }} @endif" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" @if(isset($roomEditInfo)) value='{{$roomEditInfo->name}}' @endif >
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select name="type" class="chosen-select-group form-control"  data-placeholder="Choose type..." >
                       
                                    <option value="Theory">Theory</option>
                                    <option value="Lab">Lab</option>
                                    <option value="Meeting">Meeting</option>
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="offday">Off Day:</label>
                            <select name="offday" class="chosen-select-member form-control"  data-placeholder="Choose offday...">
                            @foreach ($days as $day)
                                    <option value="{{ $day->day }}" > {{ $day->day }}</option>
                            @endforeach   
                            <option value="None" > None</option>
                            </select>
                            </div>
                    <button type="submit" class="btn btn-default">
                        @if(isset($roomEditInfo)) 
                            <h4>Update Room </h4>
                        @else
                            <h4>Add Room </h4>
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/chosenJs/chosen.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/chosenJs/prism.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript" charset="utf-8"></script>
    
    <script>
        $(".chosen-select-type").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(".chosen-select-group").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        $(".chosen-select-member").chosen({
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });

        
        $( "#startdate" ).datepicker({
            inline: true,
            changeYear: true
        });
        
        $( "#finishdate" ).datepicker({
            inline: true,
            changeYear: true
        });
    </script>
@endsection