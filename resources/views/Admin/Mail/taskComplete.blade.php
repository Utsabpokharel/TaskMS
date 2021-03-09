@component('mail::message')
<h2>Hello ,<h2>
        <p>The Task assigned for me is completed.</p>
        <i>I am here to inform you that the task entitled as<b>"{{$title}}"</b> which was assigned to me is completed
            and all the necessary files and documents are submitted.<br>
            Hope to get more tasks from you.<b></b>
        </i>
        @component('mail::button', ['url' => 'http://www.task.gcn.com.np/'])
        Dashboard
        @endcomponent
        <br>

        Thanks,<br>
        {{Auth::user()->name}}
        @endcomponent
