@component('mail::message')
<h2>Hello ,<h2>
        <p>Your Leave application has been <b>Approved</b> .</p>
        <i><br>
            Hope to see you soon !!!
        </i>

        @component('mail::button', ['url' => 'http://www.task.gcn.com.np/'])
        Click here...
        @endcomponent

        Thanks,<br>
        {{Auth::user()->name}}
        @endcomponent
