@component('mail::message')
<h2>Hello,<h2>
        <p>Your Leave Application Is <b>Rejected</b>.</p>
        <i>
            Please Contact Office for further queries !!!
        </i>

        @component('mail::button', ['url' => 'http://www.task.gcn.com.np/'])
        Click here...
        @endcomponent

        Thanks,<br>
        {{Auth::user()->name}}
        @endcomponent
