@extends('layouts.app')

@section('content')


<div>
<h1 class="m-8 mt-4 text-4xl font-bold">User Settings</h1>
</div>



    
<div class="block md:w-1/2 lg:w-1/3 mt-8">
    <table class="table-auto border-collapse border border-gray-400 table w-full m-8 bg-white-700 p-8 mx-auto max-w-7xl shadow-xl">
       
       <tr class="table-row border p-8">
           
          <td class="py-2 px-2 font-bold">User Name</td>
           <td>{{ $user->name }}</td>
          </tr>

          <tr class="table-row border p-8">
           <td class="py-2 px-2 font-bold">Notification time:</td>
           <td>{{$user->formatted_notification_time }}</td>
          </tr>

          <tr class="table-row border p-8">
           <td class="py-2 px-2 font-bold">Receive Notifications: </td>
           <td> {{ $user->formatted_notification_selection }}</td>
          </tr>


          <tr class="table-row border p-8">
                <td class="py-2 px-2 font-bold">User Timezone: </td>
                <td>
                <span>{{$user->formatted_user_timezone}}</span>
                </td>
          </tr>

          <tr class="table-row border p-8">
            <td class="py-2 px-2 font-bold">
                
                <a class="mt-8 bg-sky-500 text-white font-bold py-2 px-4 rounded hover:bg-sky-700" href="/editsettings/{{$user->id}}">Edit</a>
            </td>
          </tr>
       </table>
    </div>
@endsection