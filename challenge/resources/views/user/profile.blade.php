
@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center; ">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin: 0 auto">
            <div>
          
          

            </div>
     <div class="data-user" style="margin: 70px">
        <div class="col-md-4" style="display:block; float: left;">
            @if(Auth::user()->image)

        <div class="container-avatar" style="width: 250px; border-radius:900px;overerflow:hidden" >
            <img style="width: 250px; height:250px; border-radius:900px;overerflow:hidden"  class="avatar" src="{{ route('user.avatar',['filename'=>Auth::user()->image])}} "/>
        </div>
             @endif
  
  </div>
     </div>
     <div class="col-md-8" style="margin: 110px">
        <h1 style="font-size: 30px; color:blue; ">{{'@'.$user->nick}}</h1>
        <h2 style="font-size: 25px; color:#444; font-family:Arial, Helvetica, sans-serif; margin:10px">{{$user->name.' '. $user->surname}}</h2>
        <p style="font-size: 20px; color:#444; margin-left:10px; margin-top:5px" >{{$user->email}}</p>
   <p style="font-size:10px;margin-left:10px;margin-top:12px">{{'Se unió: '.$user->created_at}}</p>
     </div>
            
    


            
        </div>
    </div>
</div>
@endsection