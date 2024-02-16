<!-- un foreah para comen5tarios y otro para respeustas -->
<x-app-layout>
<div class="py-12">
 <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
     <div class="p-6 text-gray-900">
     @foreach($comments as $comment)
        <div class="bg-gray-100 p-4 mb-4 rounded shadow">
        <h3>
          <strong>{{$comment->user->name}}</strong>
          <small>{{$comment->created_at->diffForHumans()}}</small>
        </h3>
        <p>
           {{$comment->body}}
        </p> 
        </div>
     @foreach($comment->replies as $reply)
       <p class="ml-4 mb-4">
            -
            {{$reply->body}}
            <strong>{{$reply->user->name}} | </strong>
            <small>{{$reply->created_at->diffForHumans()}}</small>
        </p>
            @endforeach
            @endforeach
            {{ $comments->links()}}
         </div>
      </div>
    </div>
  </div>
</x-app-layout> 
